$ = jQuery.noConflict();

$.fn.extend({
    animateCss: function (animationName) {
		"use strict";
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
			$(this).trigger("animationEnd");
        });
    }
});




var share = $('.share');
var pub2 = $('.to_fix_2');
var pubH = $('.to_fix_home');
var pub = $('.to_fix');
var tope = 0;
var tope2 = 0;
var tope3 = 0;
var topeH = 0;
var start = 0;
var start2 = 0;
var start3 = 0;
var startH = 0;
var supercontador = 0;
var introtext = 0;


$(document).ready(function() {
	
	"use strict";

	//$('body').append('<div class="envelope"></div>');
	
	var scrollTimer;
	
	var headerFix = function(){

		$('header').removeClass('fixed');

		var start = $('main').offset().top + 100;
		var padding = $('header').outerHeight();


		$(window).on('scroll.header',function(){
			var scrolL = $(window).scrollTop();

			$('header').removeClass('hide');

			if(scrolL >= start){
				
				$('header').addClass('fixed');
				$('main').css('padding-top',padding);



	
				// $(window).on('scroll.timer', function() {
				
					// clearTimeout(scrollTimer);
					// scrollTimer = setTimeout(function() {	
					// 	// Run code here, resizing has "stopped"
						
					// 	console.log('scroll_stopped');
						
					// 	$('header').addClass('hide');
						
					// }, 250);


				// });


			}
			else{
				
				$('header').removeClass('fixed hide');
				$('main').removeAttr('style');

			}
		});

	};
		
	
	
	var funResize = function(){
		
		var wdW = $(window).width();
		var wdH = $(window).height();
		
		//var socLinks = a;
		
		if(wdW <= 736 && wdW > wdH){//moblandscape
			$('body').removeAttr('class');
			$('body').addClass('mobile-lands');
			
			
		}
		else if(wdW <= 736 && wdW < wdH){//mobportrait
			$('body').removeAttr('class');
			$('body').addClass('mobile-port');
			
			
		}
		else if(wdW >= 736 && wdW < wdH){//tabletport
			$('body').removeAttr('class');
			$('body').addClass('tablet-port');
			
		}
		else if(wdW >= 736 && wdW > wdH && wdW < 1100){//tabletland
			$('body').removeAttr('class');
			$('body').addClass('tablet-land');
			
		}
		else{
			$('body').removeAttr('class');
			$('body').addClass('normalize');
			
			
		}
	};
	
	
	funResize();
	

	var socLinks = $('.social_links').clone();
	var menu = $('header menu').clone();

	//$('nav').append(menu);
	menu.insertBefore('.back_liver');
	$('nav').append(socLinks);

	$('#es_txt_email').attr('placeholder','Ingresa tu correo electr'+'\u00F3'+'nico')
	

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) === true) {
		$('html').addClass('mobile');
		
		/*setTimeout(function(){
			var headerH = $('header').height();
			$('main').css('padding-top',headerH);
		},4000);*/
		
		// var socLinks = $('.social_links').clone();
		// var menu = $('header menu').clone();

		// //$('nav').append(menu);
		// menu.insertBefore('.back_liver');
		// $('nav').append(socLinks);


		if( $('.note.carousel').length ){
			var gal = $('.gallery_note');
			gal.insertBefore('.the_content');


			gal.owlCarousel({
				items:1,
				singleItem:true,
				margin:0,
				stagePadding:0,
				autoplay:false,
				smartSpeed:450,
				loop:true,
				mouseDrag:true,
				nav:true,
				dots:true,
				navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>']
			});
		}


		// $(window).on('touchmove', function() {
		// 	$('header').addClass('nopub');
		// });

		// $(window).on('scroll', function() {
		// 	var scrolL = $(window).scrollTop();
		// 	if(scrolL  ===  0){		
		// 		$('header').removeClass('nopub');	
		// 	}
		// });
		
	}

	if($('html').hasClass('mobile')){
		
	}
	else{
		
			function onElementHeightChange(elm, callback){
				var lastHeight = elm.clientHeight, newHeight;
				(function run(){
					newHeight = elm.clientHeight;
					if( lastHeight != newHeight )
						callback();
					lastHeight = newHeight;
			
					if( elm.onElementHeightChangeTimer )
						clearTimeout(elm.onElementHeightChangeTimer);
			
					elm.onElementHeightChangeTimer = setTimeout(run, 200 );
				})();
			}
			
			
			onElementHeightChange(document.body, function(){
				
				$('.to_fix').removeClass('fixed');
				$('.note .share').removeClass('fixed');
				
				if( $('.to_fix').length ){
					$('.to_fix').removeClass('absolute');
					$('.to_fix').removeClass('fixed');
					pub = $('.to_fix');
					tope = ( $('.to_fix').parent().offset().top + $('.to_fix').parent().height() ) - $('.to_fix').height() - 115;
					start = $('.to_fix').offset().top - 75;
				}

					
				
				if( $('.share').length ){
					share = $('.share');
					start3 = $('.share').offset().top - 115;
					tope3 = ( $('.share').parent().offset().top + $('.share').parent().height() ) - $('.share').height() - 70;
				}
				
				$(window).trigger('scroll');
			});
					
					
				
		if( $('.to_fix').length ){	
			$(window).on('scroll.pub',function(){	
				var scrollTop = $(window).scrollTop();
				
					
				if(scrollTop >= start && scrollTop < tope){
					pub.removeClass('absolute');
					pub.addClass('fixed');
				}
				else if(scrollTop >= tope){
					pub.removeClass('fixed');
					pub.addClass('absolute');
				}
				else{
					pub.removeClass('fixed');
					pub.removeAttr('style');
					pub.removeClass('absolute');
				}
			});
		}
			
	
		if( $('.share').length ){	
			$(window).on('scroll.share',function(){	
				var scrollTop = $(window).scrollTop();
				
				if(scrollTop >= start3 && scrollTop < tope3){
				//if(scrollTop >= start){
					share.addClass('fixed');
					share.removeClass('absolute');
					share.css('margin-right',0);
				}
				else if(scrollTop >= tope3){
					share.removeClass('fixed');
					share.addClass('absolute');
					share.removeAttr('style');
				}
				else{
					share.removeClass('fixed');
					share.removeAttr('style');
					share.removeClass('absolute');
				}
			});			
		}
		
		
	//if( !$('.inner.gallery').length ){
		
		
		//para headerfijo y publicidad
		// var myInterval = setInterval(function() {

		// 	if( $('header .publicidad img').length ){
			  
		// 		//console.log('hay');
		// 		clearInterval(myInterval);
		// 		if( $('header .publicidad').is(':visible') ){
		// 			setTimeout(function(){ 
						
		// 				if( $('header .publicidad img').parent().parent().is(':visible') ){
							
		// 					//console.log('se ve');
		// 					$('header .publicidad').css('height', $('header .publicidad img').height() );
		// 				}
		// 				else{
		// 					//console.log('no se ve');
		// 					$('header .publicidad').remove();
		// 				}
						
		// 				//headerFix();
		// 			},1000);
		// 		}
		// 		else{
		// 			//headerFix();
		// 		}
				
		// 	}
		// 	else{
		// 		//console.log('nohay');


		// 		clearInterval(myInterval);
		// 		//headerFix();

		// 	}
		// }, 500);
	
		//headerFix();
		
	
	//}//sino es galeria
		
		// if( $('.top_section').length ){
		// 	$('.grid_section').stratum({
		//         padding: 20,
		//         columns: 4
		//     });

		// 	$('.grid_section2').stratum({
		//         padding: 20,
		//         columns: 4
		//     });
		// }
		
		
}//eventos desktop
	
	
	
	
	
	if($('.note').length){
		var imageExists = $('.the_content img').length;
		console.log('esnota');
		if(imageExists){
			//$('.the_content')
			console.log('hayimagen');
		}
		else{
			$('.the_content').addClass('no_img');
			console.log('nohay');
		}
	}
	




	
	
	
	//gallery fijo
	if( $('.gallery').length){


		if($('html').hasClass('mobile') ){

			var numItems = $('.thumbs figure').length;

			$('.thumbs figure').each(function(index,ele){

				var num = '<div class="numbers"><span class="ind">'+(index+1)+'</span><span class="total">'+numItems+'</span></div>';
				$(this).prepend(num);

			});



		}// si es movil
		else{

		
		
		$('main').addClass('galView');



		
		
		
		//se recuerda el intro text 
		introtext = $('.introtext').html();
		
		
		//para ver el contenido que se agrega a la galeria
		$('.ver_more_info').click(function(e){
			e.preventDefault();
			$('.more_info').show().animateCss('slideInRight');
			$('.envelope').addClass('active');
		});
		
		
		//si es formato nuevo
		if( $('.new_image').length ){
			var newImgSrc = $('.thumbs img:first-child').attr('src');
			var newImgSrc2 = newImgSrc.replace('-100x150','');	
			$('.new_image').attr('src',newImgSrc2);
		}
		else{
			
			//encuentra y guarda el intro text
			var firstDesq = $('.desq').text();
			//se la asigna a la primera imagen
			$('.thumbs figure:first-child img').removeAttr('srcset class sizes').attr('data-description',firstDesq);
			//se quita atributi srcset para tomar la imagen mas grande
			$('.poster img').removeAttr('srcset');
			
		}
		
		
		//carrusel de los thumbs
		var thumbs = $('.thumbs');
		thumbs.owlCarousel({
			margin: 15,
			loop: false,
			items:10,
			center:false,
			autoplay:false,
			nav:true,
			arrows:true,
			autoplayHoverPause:true,
			navText : ["<i class='fas fa-angle-left'></i>","<i class='fas fa-angle-right'></i>"],
			URLhashListener:false,
	        autoplayHoverPause:true,
	        startPosition: 'URLHash'
		});
	
	
		//se agregan los numeros con la contidad de slides
		$('.numbers').html('<b>1</b> / <em>'+ $('.thumbs .owl-item').length +'</em>' );
	
		
		//se lee el index y se da trigger al click para evento de cambio de imagen
		$('.thumbs .owl-item').each(function(index){
			$(this).click(function(){
				var ind = index;
				window.location.hash = '#'+ind+'';
			});
		});
		
		
		//se lee si existe el has en la URL y se da trigger al evento
		$(window).on('load',function(){
			if(window.location.hash) {
				$(window).trigger('hashchange');
			} else {
			  // Fragment doesn't exist
			  	window.location.href = "#0"
			}
		});
	
		//evento para cambio de slide
		$(window).on('hashchange', function(){
			//se lee el hash y es el valor de slide
			var numHash = window.location.hash;
			var realHash = numHash.replace('#','');
			
			//console.log(realHash);
			
			//se remueve la imagen
			$('.poster img').remove();

			//se asignan los valores de texto y numero
			var image = $('.thumbs .owl-item').eq(realHash).find('img');
			var desq = $('.thumbs .owl-item').eq(realHash).find('section').html();
			
			/*var desq2 = $('.thumbs .owl-item').eq(realHash).find('img').attr('data-rich');*/

			var imageClon = $(image).clone();
			
			//thumbs.trigger('to.owl.carousel', realHash);
			
			/*if( realHash === '0' ){
				$('.introtext').html(introtext);
			}
			else{
				$('.introtext').html(desq2);
			} */ 
			
			
			//imagen a imprimir
			var imgToPrint = imageClon.attr('src').replace('-100x150', '');
			
			//loader
			$('body').append('<i class="fas fa-circle-notch loader"></i>');

			//se imprime la imagen
			$('.poster').append('<img src="'+imgToPrint+'" class="animated fadeIn" >');
			//se elimina el loader al terminar la carga de la imagen
			$('.poster img').on('load',function(){ 
				$('i.loader').remove();
			 });
			//se agrega clase activa
			$('.thumbs .owl-item').removeClass('view');
			$('.thumbs .owl-item').eq( parseInt(realHash) ).addClass('view');
			//se cambia la descripcion por la de la imagen
			
			$('.photo_desc').html(desq);
			
			
			//se cambia la numeracion por slide
			$('.numbers b').text( parseInt(realHash)+1 );

			
			return false;

		});




	
		
		
		
	
		$('.next_photo').click(function(e){
			e.preventDefault();
				

			var inde = window.location.hash;
			inde = inde.replace('#','');

			// console.log($('.thumbs .owl-item').length-1 );
			// console.log( inde );

			if( $('.thumbs .owl-item').length-1 == inde ){
				console.log('no_more');	
			}
			else{
				var hash = window.location.hash;
				var realHash = hash.replace('#','');
				var sumHash = parseInt(realHash)+1;
				//console.log(hash);
				if(window.location.hash == undefined || window.location.hash == "#NaN" || window.location.hash == 0){
					window.location.hash = '#1';	
				}
				else{
					window.location.hash = '#'+sumHash+'';
				}
			}
			
			

		});
	
	
	
		$('.prev_photo').click(function(e){
			e.preventDefault();

			var inde = window.location.hash;
			inde = inde.replace('#','');

			if( inde === "0" ){
				console.log('no_more');	
			}
			else{
				var hash = window.location.hash;
				var realHash = hash.replace('#','');
				var lessHash = realHash-1;
				window.location.hash = '#'+lessHash+'';
			}
		
		});
	

	
		//abre carrusel de thumbs de imagenes
		$('.view_carousel').click(function(e){
			e.preventDefault();
			$('.thumbs').toggleClass('active');
			$(this).children('i').toggleClass('fa-square fa-times');
			var numHash = window.location.hash;
			var realHash = numHash.replace('#','');
			thumbs.trigger('to.owl.carousel',realHash);
		});



		

		$('body').on('click','.gallery_scroll figure img', function() {
			//var src = $(this).attr('href');
			var imageExp = $('.poster img').clone();
			var see = $('<figure class="lightimg" />');
			var seeClose = $('<a href="#" class="close"><span></span></a>');

			see.append(seeClose);
			see.append(imageExp);

			see.lightbox_me({
				centered:true,
				lightboxSpeed: 600,
				showOverlay:true,
				closeClick: true,
				destroyOnClose: true,
				overlayCSS: {background: '#000', opacity: 0.7},
				onLoad: function() {
					$('.lb_overlay').addClass('mause');
					$(this).animateCss('fadeIn');

				}
			});
		});

	
		//amplia la foto de la galeria
		$('body').on('click','.poster img', function() {
			
			//var src = $(this).attr('href');
			var imageExp = $(this).clone();
			var see = $('<figure class="lightimg" />');
			var seeClose = $('<a href="#" class="close"><span></span></a>');

			see.append(seeClose);
			see.append(imageExp);

			see.lightbox_me({
				centered:true,
				lightboxSpeed: 600,
				showOverlay:true,
				closeClick: true,
				destroyOnClose: true,
				overlayCSS: {background: '#000', opacity: 0.7},
				onLoad: function() {
					$('.lb_overlay').addClass('mause');
					$(this).animateCss('fadeIn');

				}
			});
		});
	
		}//si no es movil
		
	}//si existe galeria
	
		
	
	
	
	
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

	
	
	/*if (/MSIE 10/i.test(navigator.userAgent)) {
		// This is internet explorer 10
		console.log('isIE10');
	}*/
	/*if (/MSIE 9/i.test(navigator.userAgent)) {
	// This is internet explorer 9 or 11
		console.log = 'pages/core/ie.htm';
	}
	if (/Edge\/\d./i.test(navigator.userAgent)){
	// This is Microsoft Edge
		console.log('Microsoft Edge');
	}*/
	
	// if (/Trident\/|MSIE/.test(window.navigator.userAgent) || /MSIE 9/i.test(navigator.userAgent) || /Edge\/\d./i.test(navigator.userAgent)) {
	// 	// This is internet explorer 11
	// 	$('.slideshow img').each(function() {
	// 		var thisSrc = $(this).attr('src');
	// 		$(this).wrap('<figure class="forIE" style="background-image:url('+thisSrc+')"></figure>');
	// 		$(this).hide();
	//     });
	// 	$('.notes_grid img').each(function() {
	// 		var thisSrc = $(this).attr('src');
	// 		$(this).parent('figure').css('background-image','url('+thisSrc+')');
	// 		$(this).hide();
	//     });
	// }
	
	
	
	$('.open_search').click(function(e){
		e.preventDefault();
		$('.open_search').toggleClass('active');
		$('.search').toggleClass('active');
		if( $('.open_search').hasClass('active') ){
			$('.search input:visible').focus();	
		}
		else{
			$('.search input:hidden').trigger('blur');
		}
	});

	
	$('.open_nav').click(function(e){
		e.preventDefault();
		$('nav').addClass('open');
	});

	$('nav .close').click(function(e){
		e.preventDefault();
		$('.envelope').removeClass('show');
		$('nav').removeClass('open');
	});

	
	$('.envelope').click(function(e){
		e.preventDefault();
		$(this).removeClass('show');
		$('.open_nav').removeClass('active');
		$('nav').removeClass('open');
	});


	$('.share_opener').click(function(){
		$('.share').toggleClass('items_show');
		$(this).children('i').toggleClass('fa-share fa-times');
		$(this).toggleClass('active');
	});

	
	
	
	// $('.destacado').each(function() {
	// 	var toAnim = $(this).find('img').attr('src');
		
	// 	//console.log(toAnim);
	// 	$(this).find('img').parent('figure').css('background-image','url("'+toAnim+'")');
	// 	$(window).scroll(function() {
	// 		var x = $(this).scrollTop();
	// 		$('.destacado figure').css('background-position', 'center ' + parseInt(x * 0.01) + 'px');
	// 	}); 
 //    });
	

	$('select').parent('label').addClass('select');
	$('input[type="checkbox"]').parent('label').addClass('checkbox');
	
	
		

		
		
	$('.tabs').each(function(){
		var tabs = $(this).children('article');
		$(this).children('section').children('a').click(function(e){
			e.preventDefault();
			$(this).siblings('a').removeClass('active');
			$(this).addClass('active');
			tabs.hide();
			tabs.filter(this.hash).show();
			
			//si es detalle construir carrusel
			if(this.hash === '#detalle'){
				//carousel_hechos
				$('.carousel_hechos').owlCarousel({
					loop:true,
					nav:true,
					dots:false,
					items:1,
					autoplay:false,
				});
			}
			
		});
	});
	//init primer tab
	$('.tabs > section a:first').trigger('click');
	
		
		
	var resizeTimer;
	
	$(window).on('resize', function() {
	
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {	
			// Run code here, resizing has "stopped"
			
			funResize();
			//headerFix();
			
			
			$(window).trigger('scroll');
			
		}, 250);


	});

	

	// 	var didScroll;
	// 	var lastScrollTop = 0;
	// 	var delta = 10;
	// 	var navbarHeight = $('header').outerHeight();


	// 	var headerNewFixed = function(){

	// 	function hasScrolled() {
	// 		var st = $(this).scrollTop();

	// 		// if( st > navbarHeight){



	// 		// }
	// 		// lastScrollTop = st;





	// 		// escrolear mas que delta
	// 		if(Math.abs(lastScrollTop - st) <= delta)
	// 			return;
	// 		// para escrollear mas que el alto del header
	// 		if (st > lastScrollTop && st > navbarHeight){
	// 			// scrolldown
	// 			$('header').addClass('fixed');
	// 			$('main').css('padding-top',navbarHeight);
	// 		} else {
	// 			// scrollUp
	// 			if(st + $(window).height() < $(document).height()) {
	// 				$('header').removeClass('fixed');
	// 				$('main').css('padding-top','0');
	// 			}
	// 		}
	// 		lastScrollTop = st;
	// 	}

	// 	$(window).on('scroll.mobi',function(event){
	// 		didScroll = true;
	// 		console.log(didScroll);
	// 	});
	// 	setInterval(function() {
	// 		if (didScroll) {
	// 			hasScrolled();
	// 			didScroll = false;
	// 		}
	// 	}, 250);
		
			
	// };

	// headerNewFixed();



	var lastScrollTop = 0;
	var condition = $('header').outerHeight();

	$(window).on('scroll.updown',function(event){
	   var st = $(this).scrollTop();

	   if( st > condition ){
		   if (st > lastScrollTop){
		       // downscroll code
	   		  $('header').removeClass('fixed');
		      $('main').removeAttr('style');
		   } else {
		      // upscroll code
		      $('header').addClass('fixed');
		      $('main').css('padding-top',condition);
		   }
	   }
	   else{
	   		  $('header').removeClass('fixed');
		      $('main').removeAttr('style');
	   }
	   lastScrollTop = st;
	});

	


	
});