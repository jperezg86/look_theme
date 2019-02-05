<?php get_header(); ?>

	<section class="top_landing">
        <section class="inner">
        	<?php $category = get_category(get_queried_object()->term_id); ?> 
            <h1><?= single_cat_title(); ?> </h1>
            <h2><?= $category->description; ?></h2>
        </section>
    </section>	

    <?php
    	$mainPost = getPosts($category->slug,1);
    	if($mainPost->have_posts()){
    		while ($mainPost -> have_posts() ) {
    			$mainPost->the_post();
    			get_template_part("code_snippets/top_note_widget_category");
    		}
    		wp_reset_postdata();
    	}
    ?> 

<?php 
    	$firstSectionPosts = getPosts($category->slug,8,1); 
    	if($firstSectionPosts -> have_posts()){  ?>
    		<section class="news_home">
			    <section class="inner">
			       	<section class="grid_section">
						  <?php while($firstSectionPosts -> have_posts()){
			    					$firstSectionPosts -> the_post(); 
			    					get_template_part("code_snippets/card_widget_home");
			            		}
								wp_reset_postdata(); ?> 
					</section>
			    </section>
			</section>
<?php
 		} 
?> 

<?php
	$destacadoPost = getPosts($category->slug,1,9);
	if($destacadoPost->have_posts()){ 
		while($destacadoPost -> have_posts()){
			$destacadoPost->the_post();
			get_template_part("code_snippets/destacado_widget_category");
		}
		wp_reset_postdata();
	}
?> 

<?php 
    	$secondSectionPosts = getPosts($category->slug,8,10); 
    	if($secondSectionPosts -> have_posts()){  ?>
    		<section class="news_home">
			    <section class="inner">
			       	<section class="grid_section">
						  <?php while($secondSectionPosts -> have_posts()){
			    					$secondSectionPosts -> the_post(); 
			    					get_template_part("code_snippets/card_widget_home");
			            		}
								wp_reset_postdata(); ?> 
					</section>
			    </section>
			</section>
		
<?php }  ?>

		<section class="inner last">
			<a href="#" class="ver_mas">Ver más <i class="far fa-plus-square"></i></a>
		</section>
<?php
 		get_template_part("code_snippets/code_widget_news");
?> 

	

<?php get_footer(); ?>
