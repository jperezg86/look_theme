<?php get_header(); ?>
<?php
    /* The loop */
    if( have_posts () ) :  ?>
    	<section class="inner gallery">
<?php   while ( have_posts() ) : the_post(); ?>
	    	<section class="share_container">
		    <span class="share_opener"><i class="fas fa-share-alt"></i></span>
		    <div class="share">
		        <?php get_template_part("code_snippets/share_articles"); ?> 
		    </div>
	    </section>
        	<article class="text">
        		<?php $categoryArr = getMainCategoryWithDetails(get_the_ID()); ?>
		     	<div class="breadcrumbs">
	            	<a href="<?=$categoryArr['permalink'];?>">
	            		<?= $categoryArr['name']; ?>
	            	</a>
	        	</div>
	        	<h1><?= get_the_title(); ?></h1>
	        	 <h2 class="introtext">
	        	 	<?php if(has_excerpt()){ ?> 
	                           <?= get_the_excerpt();?>
	                    <?php }else{
	                            $excerpt = stripExcerpt(get_the_excerpt(), 180);
	                            echo $excerpt;      
	                          } ?>



	        	 </h2>
	        	  <?php get_template_part("code_snippets/author"); ?> 
	        	 <section class="photo_desc">
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
        			<?php 
        				$images = get_post_gallery(get_the_ID(),false);
        				$imagesIds = explode(",",$images['ids']);
        				foreach($imagesIds as $imageId){ 
        					$image = get_post($imageId);
        					?>
        					<figure>
				                <img src="<?= $image->guid; ?>">
				                <section>
				                    <p>
				                       <?= $image->post_content;?>
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