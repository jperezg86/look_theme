<?php get_header(); ?>


	<section class="top_landing tag">
        <section class="inner">
        	
            <h1><?php _e( 'Artículos de: ', 'lookliverpool' ); echo single_tag_title('', false); ?></h1>
            
        </section>
    </section>	


    <section class="inner list">


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			
			<?php get_template_part("code_snippets/card_widget_home"); ?>


		<?php endwhile; ?>

	</section>

<?php else: ?>
	<!-- article -->
	<article>
		<h1><?php _e( 'Sorry, nothing to display.', 'lookliverpool' ); ?></h1>
	</article>
	<!-- /article -->
<?php endif; ?>


<?php get_footer(); ?>
