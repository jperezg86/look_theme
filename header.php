<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

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
			        <a href="https://www.liverpool.com.mx" target="_blank">
			            <img src="<?= get_template_directory_uri() ?>/img/liverpool_bco.png" alt="Liverpool">
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
		     <form class="search">
		        <section class="inner">
		            <input type="text" placeholder="¿Qué estas buscando?">
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
