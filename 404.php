<?php get_header(); ?>

	<?php /*
		_e( 'Page not found', 'lookliverpool' ); 
		_e( 'Return home?', 'lookliverpool' );
	*/ ?>	
		
	<section class="post404">

		<article class="inner">

			<h1>
				Página no encontrada
			</h1>
			

			<section class="opts_404">

				<h3>
					<i class="fas fa-frown"></i>
					Lo sentimos, la página a la que has accesado no esta disponible
				</h3>

				<article>

					

					<a href="<?php echo home_url(); ?>">Volver al Inicio</a>

					

					<form method="get" action="http://devlook.grazia.es" role="search" class="search">
				        <section class="inner">
				            <input type="text" placeholder="Buscar algo..." name="s">
				            <button>Ir</button>
				        </section>
			    	</form>

		    	</article>
			</section>


			<h2 class="nice">Lo último</h2>

			<section class="grid_section">

			<?php 


				$args = array(
			        'post_type'     => 'post',
			        'post_status'   => 'publish',
			        'orderby'       => 'post_date',
			        'order'         => 'desc'
			    );

				$lasts_posts = getPosts($args,4);

		    	if($lasts_posts->have_posts()){
		    		while ($lasts_posts -> have_posts() ) {
		    			$lasts_posts->the_post();
		    			get_template_part("code_snippets/card_widget_home");
		    		}
		    		wp_reset_postdata();
		    	}

			?>

			</section>


			

		</article>

	</section>


<?php get_footer(); ?>
