<?php get_header(); ?>
<?php
    /* The loop */
    if( have_posts () ) :  ?>
    	<section class="inner gallery">
<?php   while ( have_posts() ) : the_post(); ?>
	    	<section class="share_container">
		    <span class="share_opener"><i class="fas fa-share-alt"></i></span>
		    <div class="share">
		        <?php 
		        	get_template_part("code_snippets/share_articles");
		        	if(function_exists('wp_ulike')) wp_ulike('get');
		        ?> 
		    </div>
	    </section>
        	<article class="text">
        		<?php $categoryArr = getMainCategoryWithDetails(get_the_ID()); ?>
		     	<div class="breadcrumbs">
	            	<a href="<?=$categoryArr['permalink'];?>">
	            		<?= $categoryArr['name']; ?>
	            	</a>
	        	</div>

	        	<section class="info_note">
		        	<?php get_template_part("code_snippets/author"); ?> 
		            <div><?= the_time("d F Y"); ?></div>
		        </section>


	        	<h1><?= get_the_title(); ?></h1>
	        	 <h2 class="introtext">
	        	 	<?php if(has_excerpt()){ ?> 
	                           <?= get_the_excerpt();?>
	                    <?php }else{
	                            $excerpt = stripExcerpt(get_the_excerpt(), 180);
	                            echo $excerpt;      
	                          } ?>
	        	 </h2>
	        	 <section class="photo_desc">
	        	 	<?= the_content(); ?> 	 
	             </section>
        	</article> <!-- text -->


        	 <figure class="poster">
	            <section class="next_prev">
	                <a href="#" class="prev_photo"><i class="fa fa-angle-left"></i></a>
	                <a href="#" class="next_photo"><i class="fa fa-angle-right"></i></a>
	            </section>
        	</figure>
        </section> <!-- inner -->

        <article class="thumbs_container">
        	<section class="inner">
        		<div class="thumbs">

					<figure>
		                <?php the_post_thumbnail('full'); ?>
		                <section>
		                    <p>
		                       <?php //$image->post_content; ?>
		                    </p>
		                </section>
		            </figure>
        			<?php 
        				$images = get_post_gallery(get_the_ID(),false);
        				$imagesIds = explode(",",$images['ids']);
        				foreach($imagesIds as $imageId){ 
        					$image = get_post($imageId);
        					$rich_text = get_field( "descripcion_enriquecida", $image->ID);
        					?>
        					<figure>
				                <img src="<?= $image->guid; ?>">
				                <section>
				                    <p>
				                    	<?php
				                    	 if( !empty($rich_text) ){ ?>
				                    		<?= $rich_text; ?> 	
				                    	<?php
				                    	 }else{ ?>
				                    		<?= $image->post_content;?> 	
				                    	<?php
				                    	 }
				                    	?>
				                    </p>
				                </section>
				            </figure>

        		<?php	
        					 
        					}
        			?>
        		</div>
        	</section>
        </article>
<?php	endwhile; 
	    wp_reset_postdata(); ?>

<?php
		if( $isAMP ){
			get_template_part("code_snippets/amp_related_products");

		}
		else{

			$compare_date = strtotime( "2018-12-31" );
			$post_date    = strtotime( $post->post_date );

			if (   $post_date < $compare_date ){
				$link = get_field("url_sin_articulos");
				if(!$link){
					get_template_part("code_snippets/link_old_posts");	
				}else{
					get_template_part("code_snippets/widget_related_products");	
				}
			}else{
				get_template_part("code_snippets/widget_related_products");	
			}

		}
	?>



	    <?php
		$relatedPosts = getRelatedPosts( get_post(), 4);
		if(!is_null($relatedPosts)){ ?> 
			 <section class="relacionados">
         		<section class="inner">
		           <h3 class="nice">Artículos relacionados</h3>
		           <section class="list_notes">
	<?php 	if ($relatedPosts->have_posts()): 
				while ($relatedPosts->have_posts()) : 
					$relatedPosts->the_post(); 
					get_template_part("code_snippets/card_widget_home");
				endwhile;
				wp_reset_postdata();
			endif; ?> 
					</section>
				</section>
			</section>
<?php	} ?> 


	    <?php get_template_part("code_snippets/code_widget_news");?>
	    
<?php 
	endif;
?>
<?php get_footer(); ?>