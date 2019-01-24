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
				singleVars.forEach(function(item, index){
					item = item.productInfo;
					var urlTienda = "https://www.liverpool.com.mx/tienda/pdp/"+item.productId;
					var html = "<a href='"+ urlTienda +"' target='_blank'>"+
			                    "<figure>"+
			                        "<img src="+ item.images.xl +">"+
			                    "</figure>"+
			                    "<strong>"+item.displayName+"</strong>"+
			                    "<span>Comprar</span>"+
			                "</a>";
					$('.carousel_notes').append(html); 
				});

				$(".carousel_notes").owlCarousel({
					items:4,
					margin:25,
					stagePadding:0,
					autoplay:false,
					smartSpeed:450,
					loop:true,
					mouseDrag:true,
					nav:true,
					dots:true,
					//navText : ['<i class="fas fa-long-arrow-alt-left"></i>','<i class="fas fa-long-arrow-alt-right"></i>'],
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
					    },
					    1000 : {
					    	items:4
					    }
					}
				});
			}else{
				//si no hay productos pero tiene url alternativa la pinta
				pintaURLAlternativa();

			}
		};

		var pintaURLAlternativa = function(){
			if(singleVars.alt_url){
					$('.experiencia .carousel_notes').remove();
					var linkHTML = "<a href='"+singleVars.alt_url.url+"' target='"+singleVars.alt_url.target+"'>" + 
									singleVars.alt_url.title + 
									"</a>";
					$('.experiencia .inner').append(linkHTML);
				}else{
					$('article.experiencia').remove();
			}
		};

		var getProducts = function(count){
			var productId = singleVars.relatedProducts[count];
			var wsBase = "https://shoppapp.liverpool.com.mx/appclienteservices/services/v3/pdp";
			var onSuccess = function(data,textStatus,jqXHR){
				console.log(data);
				// if(status.statusCode === 1){
				// 	singleVars.products.append(data);
				// }
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
					productId : productId	
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
				getProducts(0);	
			}else{
				pintaURLAlternativa();
			}
		}


	});


	
})(jQuery, this);
