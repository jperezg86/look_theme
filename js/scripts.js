(function ($, root, undefined) {
	
	$(function () {
		'use strict';
		$('.ver_mas').click(function(e){
			e.preventDefault();
			$.ajax({
				url : liverpool_vars.ajaxurl,
				dataType: 'JSON',
				beforeSend : showLoader(),
				data : {
					action : 'get_more_notes',
					categoryId : category.id,
					page : category.page++,
				},
				success : function(result){
					// console.log(result);
					if(result.length == 0){
						$('.ver_mas').remove();
						return;	
					}

					$('body').append('<section class="inner new"><section class="grid_section"></section></section>');
					$('.inner.new').insertBefore('.inner.last');

					
					result.forEach(function(item){
						var html="<a href='" + item.url +"' class='card'>" + 
   									"<figure>"+item.thumbnail+"</figure>"+
    								"<div>"+
        								"<em>"+ item.mainCategory + "</em>"+
	        							"<strong>" + item.title +"</strong>"+
	        							"<span>"+item.excerpt+"</span>"+
	        							"<time>"+item.time+"</time>"+
	        						"</div>"+
	        					  "</a>";
	        			$('.inner.new:last .grid_section:last').append(html);
					});

					$([document.documentElement, document.body]).animate({
				        scrollTop: $('.inner.new:last').offset().top - 80,
				    },0);
					

					
				},

				complete: function(){
					$('.loader').remove();
				},

				error: function(result, textStatus){
					console.log(result);
					$('.loader').remove();
					alert(textStatus);
				}
			});
		});

		var showLoader = function(){
			$('body').append('<i class="fas fa-spinner fa-spin loader"></i>');
		};

		var printSlider = function(){
			if(singleVars.products.length > 0){


				var carousel_notes = '<section class="carousel_notes"></section>';
				$('.experiencia .inner').append(carousel_notes);

				singleVars.products.forEach(function(item, index){
					item = item.productInfo;
					var urlTienda = "https://wst.liverpool.com.mx/tienda/pdp/"+item.productId;
					// var urlTienda = "https://www.liverpool.com.mx/tienda/pdp/"+item.productId;
					var html = "<a href='"+ urlTienda +"' target='_blank'>"+
			                    "<figure>"+
			                        "<img src="+ item.images.lg +">"+
			                    "</figure>"+
			                    "<figcaption><strong>"+item.displayName+"</strong></figcaption>"+
			                    "<span>Comprar</span>"+
			                "</a>";
					$('.carousel_notes').append(html);
				});

				//console.log('exe');

				var carousel = $(".carousel_notes")


				var removeLoader = function(){
					$('.loader_carousel').remove();
				};

				if(singleVars.products.length <= 4){

					console.log('igual o menor a 4 ',singleVars.products.length);
					if(singleVars.products.length == 1){

						 removeLoader();


					}
					else{
					
						carousel.owlCarousel({
						items:4,
						margin:25,
						stagePadding:0,
						autoplay:false,
						smartSpeed:450,
						loop:false,
						mouseDrag:false,
						nav:false,
						dots:false,
						navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
						responsive : {
							    0 : {
							    	items:1,
							    	margin:0,
									mouseDrag:true,
									loop:true,
									nav:true,
									dots:true,
							    },
							    500 : {
							    	item:3,
							    	loop:true,
									nav:true,
									dots:true,
							    },
							    768 : {
							    	items:4,
							    }
							},
							afterInit: removeLoader(),
						});

					}
					
				}
				else{


					carousel.owlCarousel({
						items:4,
						margin:25,
						stagePadding:0,
						autoplay:false,
						smartSpeed:450,
						loop:true,
						mouseDrag:true,
						nav:true,
						dots:true,
						navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
						responsive : {
						    0 : {
						    	items:1,
						    	margin:0
						    },
						    500 : {
						    	item:3
						    },
						    768 : {
						    	items:4
						    }
						},
						afterInit: removeLoader(),
					});
					
				}
				// carousel.on('initilize.owl.carousel', function(event) {
				// 	console.log('asd');
				    
				// })
			}else{
				//si no hay productos pero tiene url alternativa la pinta
				pintaURLAlternativa();

			}
		};

		var pintaURLAlternativa = function(){
			if(singleVars.alt_url){
					$('.experiencia .carousel_notes').remove();
					var containerLink = "<section class='no_carousel' />"
					var linkHTML = "<a class='tienda_btn' href='"+singleVars.alt_url.url+"' target='"+singleVars.alt_url.target+"'>" + 
									singleVars.alt_url.title + 
									"</a>";
					var legendLink = "<h5>Explora todas las posibilidades que Liverpool tiene para ti</h5>";
					$('.experiencia .inner').append(containerLink);
					$('.no_carousel').append(legendLink,linkHTML)
				}else{
					$('article.experiencia:not(.older)').remove();
			}
		};

		var getProducts = function(count){
			var productId = singleVars.relatedProducts[count];
			// var wsBase = "https://shoppapp.liverpool.com.mx/appclienteservices/services/v3/pdp";
			var onSuccess = function(data,textStatus,jqXHR){
				console.log(data);
				if(data.status){
					if(data.status.status.localeCompare("OK") == 0){
						singleVars.products.push(data);
					}	
				}
				
			};

			var onComplete = function(jqXHR, textStatus){
				if(++count<singleVars.relatedProducts.length){
					console.log(count);
					getProducts(count);
				}else{
					//llena resultados		
					printSlider();
				}
			};

			var config = {
				data : {
					action : 'get_info_product',
					productId : productId.trim()	
				},
				success : onSuccess,
				complete : onComplete,
				dataType : 'json'
			}
			$.ajax(liverpool_vars.ajaxurl,config);
		}


		if(typeof is_single !== 'undefined' && typeof singleVars !== 'undefined'){
			singleVars.products = [];
			if(singleVars.haveRelatedProducts){

				var loader_carousel = '<div class="loader_carousel"><i class="fas fa-spin fa-spinner"></i></div>';
				$('.experiencia .inner').append(loader_carousel);

				getProducts(0);	
			}else{
				pintaURLAlternativa();
			}
		}


	});


	
})(jQuery, this);
