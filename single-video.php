<?php get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<section class="inner note video">
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
		     <?php if(has_excerpt()) {  ?> 
				      <h2 class="introtext">
				      	<?= get_the_excerpt(); ?>
				      </h2>
			  <?php } ?>

			<section class="info_note">
	            <div><?= the_time("d F Y"); ?></div>
	        </section>


	    	<figure class="main_img">
	        	<?php the_field('url_video'); ?>
	        </figure>   

	        
	         <?php get_template_part("code_snippets/author"); ?> 

	        <section class="the_content">
	        	<?= the_content(); ?> 
		        <?php $tags = get_the_tags(); 
		        	//if there is tags
		        	if($tags){ ?> 
		        		<section class="tags">
		        			<strong>Tags:</strong>
		        <?php	foreach( $tags as $tag ) { ?> 
		        			<a href="<?=get_tag_link($tag->term_id);?>" title=""><?=$tag->name;?></a>
		    	<?php	} //end foreach tags ?> 
		    			</section>
		        <?php 	} //end if tags    ?> 
		    
		    </section> <!-- the content -->    
		</article> <!-- article text --> 
	</section> <!-- inner nota --> 
	<?php wp_reset_postdata();  ?> 

	<?php get_template_part("code_snippets/widget_related_products"); ?> 

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

<?php 
		get_template_part("code_snippets/code_widget_news");
	
?> 


<?php endwhile; ?>

<?php else: ?>
	<!-- article -->
	<article>
		<h1><?php _e( 'Sorry, nothing to display.', 'lookliverpool' ); ?></h1>
	</article>
	<!-- /article -->
<?php endif; ?>

</section>

<?php get_footer(); ?>
