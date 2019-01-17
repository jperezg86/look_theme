<?php get_header(); 


$busqueda = get_search_query();
$pagina_actual = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
    'posts_per_page' => 12,
    'post_type' => 'post',
    'post_status' => 'publish',
    'category__not_in' => array(1,38),
    's' => "$busqueda",
    'paged' => $paged,
    'orderby' => 'post_date',
    'order' => 'desc'
);

// query
$post_busqueda = new WP_Query($args);
wp_reset_query();
?>

	<section class="top_landing">
        <section class="inner">
            <h1>Resultados de: <em><?= $busqueda; ?></em></h1>
        </section>
    </section>



	 <section class="inner">

	<?php if ( have_posts() ) : ?>

		<section class="list">

	<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
                                
                /* No queremos que salgan las galerias completas en las busquedas */
                /*if($post->post_type == "galeria" || $post->post_type == "galeria-desfiles") {
                    continue;
                } */                               
                                
					//get_template_part( 'content', 'search' );


            	
				?>
				<a href="<?=get_the_permalink(); ?> " class="card">
				    <figure>    
				        <?= the_post_thumbnail('medium'); ?>
				    </figure>
				    <div>
				        <em>
				        	<?= getFirstCategory(get_the_ID()); ?>
				        </em>
				        <strong><?= get_the_title() ?></strong>

				        <?php if(has_excerpt()){ ?> 
				        	<span> <?= get_the_excerpt();?></span>
				    	<?php }else{ ?>
				       		<span><?= stripExcerpt(get_the_excerpt(), 100); ?></span>
						<?php }	?> 
				        <time>
				        	<?= the_time("d F Y"); ?>
				    	</time>
				    </div>
				</a>


	<?php endwhile; ?>


	</section>

	<?php get_template_part('pagination');


	?>


	<?php else : ?>

		<?php get_template_part( 'code_snippets', 'empty' ); ?>

	<?php endif; ?>



	</section>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
