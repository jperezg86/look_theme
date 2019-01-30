<?php 
	get_header(); 
	
	$isAMP = ( array_key_exists("amp", $_GET) );
?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<section class="inner note">
		<section class="share_container">
		    <span class="share_opener"><i class="fas fa-share-alt"></i></span>
		    <div class="share">
		        
		        <?php
		   			//$isAMP = ( array_key_exists("amp", $_GET) );
					// if( $isAMP ){

					// }
					// else{
						get_template_part("code_snippets/share_articles");
					//}
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

		     <h1><?= get_the_title(); ?></h1>
		     <?php if(has_excerpt()) {  ?> 
				      <h2 class="introtext">
				      	<?= get_the_excerpt(); ?>
				      </h2>
			  <?php } ?>



			<section class="info_note">
	        	<?php get_template_part("code_snippets/author"); ?> 
	            <div><?= the_time("d F Y"); ?></div>
	        </section>


	    	<figure class="main_img">
	        	<?= the_post_thumbnail('full'); ?>
	        </figure> 


	        <!-- <p class="author">
	        	<?php
	        		$author_alternativo = get_field("autor_alternativo");
	        		$author= empty($author_alternativo) ? get_the_author() : $author_alternativo;
	        	 ?>	
	        	 Por: <span><?=$author;?></span>
	        </p> -->

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


	<?php
		if( $isAMP ){
			get_template_part("code_snippets/amp_related_products");

		}
		else{

			$compare_date = strtotime( "2018-12-31" );
			$post_date    = strtotime( $post->post_date );

			if (   $post_date < $compare_date ){
				get_template_part("code_snippets/link_old_posts");
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

<?php 
		get_template_part("code_snippets/code_widget_news");
	
?> 

<?php 
$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
$image_width = $image_data[1];
$image_height = $image_data[2];
?>
<script type="application/ld+json">

  {

    "@context": "http://schema.org",

    "@type": "Article",

    "mainEntityOfPage":{

      "@type":"WebPage",

      "@id":"<?= get_permalink() ?>"

    },

    "headline": "<?= the_title() ?>",

    "image": {

      "@type": "ImageObject",

      "url": "<?= get_the_post_thumbnail_url(); ?>",

      "height": "<?= $image_height ?>",

      "width": "<?= $image_width ?>"

    },

    "datePublished": "<?= get_post_time('c'); ?>",

    "dateModified": "<?= the_modified_time('c'); ?>",

    "author": {

      "@type": "Person",

      "name": "<?= get_the_author(); ?>"

    },

    "publisher": {

      "@type": "Organization",

      "name": "Liverpool",

      "logo": {

        "@type": "ImageObject",

        "url": "http://devlook.grazia.es/wp-content/themes/looklliverpool/img/look_amp.png",

        "width": 250,

        "height": 60

      }

    },

    "description": "<?= get_the_excerpt(); ?>",

    "articleSection": "<?= $categoryArr['name']; ?>"


  }

</script>

<?php 
	/*testAPI
	$productId = '1034771576';
	$get_product_data = file_get_contents('https://shoppapp.liverpool.com.mx/appclienteservices/services/v3/pdp?productId='.$productId.'');
	// $dataProd = json_decode($get_product_data);
	print_r($get_product_data);*/
?> 


<?php endwhile; ?>

<?php else: ?>
	<!-- article -->
	<article>
		<h1><?php _e( 'Sorry, nothing to display.', 'lookliverpool' ); ?></h1>
	</article>
	<!-- /article -->
<?php endif; ?>

<!-- </section> -->

<?php get_footer(); ?>
