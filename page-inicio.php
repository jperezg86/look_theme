<?php /* Template Name: Page Inicio */ ?>

<?php get_header(); ?>

<h1 class="hidden">Look! by Liverpool</h1>

<?php

 	$postToExclude = array();
 	// se excluyen primero los stickys
 	$postToExclude = array_slice(get_option( 'sticky_posts' ),-3);

	$popularPosts = getPopularPosts(4);
	if($popularPosts -> have_posts()){ 
		while($popularPosts -> have_posts()){
			$popularPosts->the_post();
			array_push($postToExclude,get_the_ID());
		}
		wp_reset_postdata();
	}

	// print_r(json_encode($postToExclude));

	// $latestPosts = getPosts("",4,0,true);
	// if($latestPosts -> have_posts()){ 
	// 	while($latestPosts -> have_posts()){
	// 		$latestPosts->the_post();
	// 		array_push($postToExclude,get_the_ID());
	// 	}
	// 	wp_reset_postdata();
	// }

?>

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
						                <em><?= getFirstCategory(get_the_ID()); ?></em>
						                <h2><strong><?= get_the_title(); ?></strong></h2>
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

 <!-- <section class="news_home"> -->
	<section class="inner">
        <h4 class="nice">Lo más nuevo</h4>
        <?php $latestPosts = getPosts("",4,0,$postToExclude);
         	if($latestPosts -> have_posts()){ ?> 
	            <section class="list_notes">
	            	<?php $titleElement = "h2"; ?>
	            	<?php while($latestPosts -> have_posts()){ 
	            			$latestPosts -> the_post(); ?> 
	            			<?php //get_template_part("code_snippets/card_widget_home");
	            					array_push($postToExclude,get_the_ID());
	            					include( locate_template( 'code_snippets/card_widget_home.php', false, false ) ); 
	            			?> 
	            	<?php } ?> 
	            </section>
        <?php 
        		wp_reset_postdata();
    		} ?> 
    </section>
<!-- </section> -->

<!-- <section class="news_home"> -->
		<section class="inner">
            <h4 class="nice">Lo más leído</h4>
            <?php $popularPosts = getPopularPosts(4);
             	if($popularPosts -> have_posts()){ ?> 
		            <section class="list_notes">
		            	<?php $titleElement = "h3"; ?>
		            	<?php while($popularPosts -> have_posts()){ 
		            			$popularPosts -> the_post(); ?> 
		            			<?php include( locate_template( 'code_snippets/card_widget_home.php', false, false ) );  ?>
		            	<?php } ?> 
		            </section>
	        <?php 
	        		wp_reset_postdata();
	    		} ?> 
        </section>
    <!-- </section> -->

    

    <section class="news_home">
		<section class="inner">
            <h4 class="nice">Noticias</h4>
            <?php $noticias_query = getPostsByCategory('noticias', 7, true, $postToExclude);
             	if($noticias_query -> have_posts()){ ?> 
		            <section class="list_notes noticias">
		            	<?php $titleElement = "h2"; ?>
		            	<?php while($noticias_query -> have_posts()){ 
		            			$noticias_query -> the_post(); ?> 
		            			<?php include( locate_template( 'code_snippets/card_widget_home.php', false, false ) );  ?>
		            	<?php } ?> 
		            </section>
	        <?php 
	        		wp_reset_postdata();
	    		} ?> 
        </section>
    </section>



    <section class="joy_tv">
        <section class="inner">
            <h4 class="nice txt_center">Look.TV</h4>
            	<?php $joyTV_query = getPostsByCategory("look_tv",8, true,$postToExclude);
            			if ($joyTV_query->have_posts()) { ?> 
	                <section class="carousel_notes">
	                	<?php while($joyTV_query->have_posts()){ 
			            			$joyTV_query->the_post();
			            ?> 
	                	<a href="<?= get_the_permalink() ?> " class="card">
	                        <figure>    
	                            <?= the_post_thumbnail('large');?>
	                        </figure>
	                        <div>
	                            <em><?= getFirstCategory(get_the_ID()); ?></em>
	                            <h3><strong><?=get_the_title()?></strong></h3>
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
        <h4 class="nice">Moda</h4>
        <?php $moda_query = getPostsByCategory('moda', 4, true, $postToExclude);
             	if($moda_query -> have_posts()){ ?> 
        <section class="list_notes">
        	<?php $titleElement = "h3"; ?>
			<?php while($moda_query -> have_posts()){ 
		     		$moda_query -> the_post();
		    ?> 
		    	<?php 
		    		include( locate_template( 'code_snippets/card_widget_home.php', false, false ) );
		    		wp_reset_postdata(); 
		    	}
		     ?> 
        </section>

    <?php } ?>


<?php $impresa_query = getPostsByCategory('edicion-impresa', 1, true,$postToExclude); 
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
                           <?=the_post_thumbnail('large'); ?>
                        </figure>
                    </a>
            <?php  } ?> 
        </article>
<?php 
		}
		wp_reset_postdata();
	} 
?>

<h4 class="nice">Tecnología</h4>
<?php $tecnologia_query = getPostsByCategory('tecnologia', 4, true,$postToExclude);
 	if($tecnologia_query -> have_posts()){ ?> 
        <section class="list_notes">
        	<?php $titleElement = "h3"; ?>
        	<?php while($tecnologia_query -> have_posts()){ 
        			$tecnologia_query -> the_post(); ?> 
        			<?php 
		    		include( locate_template( 'code_snippets/card_widget_home.php', false, false ) ); ?>
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