<?php /* Template Name: Page Inicio */ ?>
<?php get_header(); ?>

<?php $stickyPost = get_sticky_post_for_home(1);
	if($stickyPost != null) {
	  if($stickyPost->have_posts()){ ?> 
	  		<article class="top_note">
	  			<?php while($stickyPost->have_posts()){ //loop
	  					$stickyPost->the_post();  ?>
						    <section class="inner">
						        <a href="<?= get_permalink(); ?>">
						            <figure>
						                <?= the_post_thumbnail('large')?>
						            </figure>
						            <figcaption>
						            <div>
						            	<?php 

						            	 ?> 
						                <em><?= getFirstCategory(get_the_ID()); ?></em>
						                <strong><?= get_the_title(); ?></strong>
						                <?php if(has_excerpt()) { ?>
						                	<span><?= get_the_excerpt(); ?></span>
						                <?php } ?> 
						                </div>
						            </figcaption>
						        </a>    
						    </section>
				<?php } //end loop ?>
		</article>
<?php 
		wp_reset_postdata();
		} 
	}?> 

    <section class="news_home">
		<section class="inner">
            <h2 class="nice">Noticias</h2>
            <?php $noticias_query = getPostsByCategory('noticias', 7);
             	if($noticias_query -> have_posts()){ ?> 
		            <section class="list_notes noticias">
		            	<?php while($noticias_query -> have_posts()){ 
		            			$noticias_query -> the_post(); ?> 
		            			<?php get_template_part("code_snippets/card_widget_home"); ?>
		            	<?php } ?> 
		            </section>
	        <?php 
	        		wp_reset_postdata();
	    		} ?> 
        </section>
    </section>



    <section class="joy_tv">
        <section class="inner">
            <h2 class="nice txt_center">Joy.TV</h2>
            	<?php $joyTV_query = getPostsByCategory("joy_tv",8);
            			if ($joyTV_query->have_posts()) { ?> 
	                <section class="carousel_notes">
	                	<?php while($joyTV_query->have_posts()){ 
			            			$joyTV_query->the_post();
			            ?> 
	                	<a href="<?= get_the_permalink() ?> " class="card">
	                        <figure>    
	                            <?= the_post_thumbnail('medium');?>
	                        </figure>
	                        <div>
	                            <em><?= getFirstCategory(get_the_ID()); ?></em>
	                            <strong><?=get_the_title()?></strong>
	                            <time><?= the_time("d F Y"); ?></time>
	                        </div>
	                    </a>
	                	<?php } //end loop ?> 
	                </section>
	            <?php 
	            	wp_reset_postdata();
	        		} ?> 
        </section>
    </section>

<?php
	 $destacada_query = get_sticky_post_for_home(2);
	if ($destacada_query !== null) 
	  if($destacada_query->have_posts()){ ?> 
     <section class="destacado">
        <div class="inner">
    	 	<?php while($destacada_query->have_posts()) { 
    	 		$destacada_query->the_post();  ?>
	    	 	<a href="<?= get_the_permalink(); ?>" class="card">
	    	 		<figure>    
                    	<?= the_post_thumbnail("large"); ?>
                	</figure>
                	<div>
    	           		<em><?= getFirstCategory(get_the_ID()); ?></em>
	                    <strong><?= get_the_title(); ?></strong>
	                    <?php if(has_excerpt()){ ?> 
                            <span> <?= get_the_excerpt();?> </span>
                    <?php }else{
                            $excerpt = get_the_excerpt();
                            $excerpt = preg_replace('/<a[^>]*(.*?)<\/a>/s', '', $excerpt); ?> 
                                <span><?= $excerpt; ?> </span>      
                    <?php } ?>
                	</div>
	    	 	</a>
    	 	<?php 
    			}
    			wp_reset_postdata(); ?> 
        </div>
    </section>

<?php  
		} 
	// } 
?> 



<section class="inner">
        <h2 class="nice">Moda</h2>
        <?php $moda_query = getPostsByCategory('moda', 4);
             	if($moda_query -> have_posts()){ ?> 
        <section class="list_notes">
			<?php while($moda_query -> have_posts()){ 
		     		$moda_query -> the_post();
		    ?> 
		    	<?php get_template_part("code_snippets/card_widget_home"); ?> 
		    <?php
		    		wp_reset_postdata(); 
		    	}
		     ?> 
        </section>

    <?php } ?>


<?php $impresa_query = getPostsByCategory('edicion-impresa', 1); 
	  if($impresa_query->have_posts()) {
	  	while($impresa_query->have_posts()){
	  			$impresa_query->the_post();
?> 
		  <article class="impresa">
            <?php if(get_field('archivo_pdf')) {  ?> 
                    <a href="<?= the_field('archivo_pdf'); ?>" target="_blank">
                         <div>
                           <strong>Descubre la edición impresa</strong>
                           <span>Descargar <i class="fas fa-long-arrow-alt-right"></i></span>
                        </div>
                        <figure>
                           <?=the_post_thumbnail('medium'); ?>
                        </figure>
                    </a>
            <?php  } ?> 
        </article>
<?php 
		}
		wp_reset_postdata();
	} 
?>

<h2 class="nice">Tecnología</h2>
<?php $tecnologia_query = getPostsByCategory('tecnologia', 4);
 	if($tecnologia_query -> have_posts()){ ?> 
        <section class="list_notes">
        	<?php while($tecnologia_query -> have_posts()){ 
        			$tecnologia_query -> the_post(); ?> 
        			<?php get_template_part("code_snippets/card_widget_home"); ?>
        	<?php } ?> 
        </section>
<?php 
		wp_reset_postdata();
	} ?> 

</section>


<?php $destacada_query = get_sticky_post_for_home(3);
	if($destacada_query) {
	  if($destacada_query->have_posts()){ ?> 
			<section class="destacado right_img">
		        <div class="inner">
		        	<?php while($destacada_query->have_posts()) { 
    	 					$destacada_query->the_post();  ?>
					            <a href="<?= get_the_permalink(); ?>" class="card">
					    	 		<figure>    
				                    	<?= the_post_thumbnail("large"); ?>
				                	</figure>
				                	<div>
				    	           		<em><?= getFirstCategory(get_the_ID()); ?></em>
					                    <strong><?= get_the_title(); ?></strong>
					                    <?php if(has_excerpt()){ ?> 
				                            <span> <?= get_the_excerpt();?> </span>
				                    <?php }else{
				                            $excerpt = get_the_excerpt();
				                            $excerpt = preg_replace('/<a[^>]*(.*?)<\/a>/s', '', $excerpt); ?> 
				                                <span><?= $excerpt; ?> </span>      
				                    <?php } ?>
				                	</div>
					    	 	</a>	
			        <?php 
					    }
					    wp_reset_postdata();

				     ?> 
		        </div>
		    </section>
		<?php } ?>
<?php  } ?>


<?php  
	//se inserta widget de suscribete al news
	get_template_part("code_snippets/code_widget_news"); 

?>


<?php get_footer(); ?>