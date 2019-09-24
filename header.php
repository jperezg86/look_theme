<!doctype html>
<html <?php language_attributes(); ?> class="no-js">


	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<!--title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title-->

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- <meta name="description" content="<?php bloginfo('description'); ?>"> -->
		<meta name="p:domain_verify" content="579cebb9bf858f873b59814c24b5c7aa"/>

		<?php wp_head(); ?>
		
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<header>
			<section class="go_liverpool">
			    <section class="inner">
<?php
	if( wp_is_mobile() ){
	    if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
	        if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $_SERVER['HTTP_HOST']) {
	            $back = $_SERVER['HTTP_REFERER'];
	            $frase = "Volver";
	            echo '<a href="#" class="back"><span>'.$frase.'</span></a>';
	        } else {
	            // $back = esc_url( home_url( '/' ) ); 
	            // $frase = "Home";                     
	        }
	    } else {
	        // $back = esc_url( home_url( '/' ) ); 
	        // $frase = "Home";  
	    }
	    
    }
?>

			        <a href="https://www.liverpool.com.mx" target="_blank">
			            <img src="<?= get_template_directory_uri() ?>/img/liverpool.svg" alt="Liverpool">
			        </a>
			    </section>
			</section>
		    <section class="inner">   
		        <a href="<?= home_url(); ?>" class="logo"></a>
		        <menu>
		        	<?php lookliverpool_nav(); ?>
		          <!--   <ul>
		                <li><a href="#">Noticias</a></li>
		                <li><a href="#">Moda</a></li>
		                <li><a href="#">Belleza</a></li>
		                <li><a href="#">Tecnología</a></li>
		                <li><a href="#">Fitness</a></li>
		                <li><a href="#">Casa</a></li>
		                <li><a href="#">Gourmet</a></li>
		                <li><a href="#">JOY.tv</a></li>
		            </ul> -->
		        </menu>
		        <a href="#" class="open_nav"><span></span></a>
		        <a href="#" class="open_search"><span></span></a>
		    </section>
		     <form method="get" action="<?php echo home_url(); ?>" role="search" class="search">
		        <section class="inner">
		            <input type="text" placeholder="¿Qué estas buscando?" name="s">
		            <button>Ir</button>
		        </section>
		    </form>
		</header>

		<nav>
		    <a href="#" class="close"><span></span></a>
		    <a href="index.html" class="logo"><img src="<?= get_template_directory_uri() ?>/img/logo.svg"></a>
		    <a href="https://www.liverpool.com.mx/" target="_blank" class="back_liver"><i class="fas fa-long-arrow-alt-left"></i> Ir a Liverpool.com.mx</a>
		</nav>

		<!-- main content -->
		<main>
