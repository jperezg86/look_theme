<?php /* Template Name: Page Impresa */ ?>

<?php get_header(); ?>

<section class="inner note">
	<section class="share_container">
		 <span class="share_opener"><i class="fas fa-share-alt"></i></span>
		    <div class="share">
		        <?php
						get_template_part("code_snippets/share_articles");
				?>
		    </div>
	</section>

	<article class="text">
		<h1><?=the_title()?></h1>
		<?php 
			$printedEditions = getPrintedEditions(8,0);
			if($printedEditions->have_posts()){ 
				$i = 1;
 				while($printedEditions->have_posts()){  
 					$printedEditions->the_post();
 				?>
 					<section class="edicion-impresa">
 						<?php
							$file = get_field('file_revista_impresa');
 						?>
 						<a href="<?= $file['url'] ?>">
 							<figure>
	                			<?= the_post_thumbnail('medium') ?>
	                		</figure>
	                		<span class="btn block">Descargar</span>
 						</a>
 					</section>
<?php
					wp_reset_postdata();
				} 
			}
?>





	</article>
</section>

<?php get_footer(); ?>