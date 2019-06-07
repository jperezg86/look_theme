<?php /* Template Name: Page Impresa */ ?>

<?php get_header(); ?>

<section class="top_landing">
    <section class="inner">    	 
        <h1><?=the_title()?></h1>
        <h3><?= get_the_excerpt()?></h3>
    </section>
</section>

<section class="inner">
	

	<section class="ediciones">
	<?php 
			$printedEditions = getPrintedEditions(8,0);
			if($printedEditions->have_posts()){ 
				$i = 1;
 				while($printedEditions->have_posts()){  
 					$printedEditions->the_post();

 					$file = get_field('file_revista_impresa');
 				?>
 					<a href="<?= $file['url'] ?>">
						<figure>
                			<?= the_post_thumbnail('medium') ?>
                		</figure>
                		<strong>
                			<?= the_title() ?>
                		</strong>
                		<span class="btn block terciary">Descargar</span>
					</a>
 					
		<?php
					wp_reset_postdata();
				} 
			}
		?>
		<a href="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/000-PDFS-LOOK-MAYO.compressed.pdf">
						<figure>
                			<img src="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg" class="attachment-medium size-medium wp-post-image" alt="Look! by Liverpool mayo" srcset="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg 250w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-120x157.jpg 120w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo.jpg 563w" sizes="(max-width: 230px) 100vw, 230px">                		</figure>
                		<strong>
                			Look! mayo                		</strong>
                		<span class="btn block terciary">Descargar</span>
					</a><a href="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/000-PDFS-LOOK-MAYO.compressed.pdf">
						<figure>
                			<img src="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg" class="attachment-medium size-medium wp-post-image" alt="Look! by Liverpool mayo" srcset="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg 250w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-120x157.jpg 120w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo.jpg 563w" sizes="(max-width: 230px) 100vw, 230px">                		</figure>
                		<strong>
                			Look! mayo                		</strong>
                		<span class="btn block terciary">Descargar</span>
					</a><a href="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/000-PDFS-LOOK-MAYO.compressed.pdf">
						<figure>
                			<img src="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg" class="attachment-medium size-medium wp-post-image" alt="Look! by Liverpool mayo" srcset="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg 250w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-120x157.jpg 120w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo.jpg 563w" sizes="(max-width: 230px) 100vw, 230px">                		</figure>
                		<strong>
                			Look! mayo                		</strong>
                		<span class="btn block terciary">Descargar</span>
					</a><a href="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/000-PDFS-LOOK-MAYO.compressed.pdf">
						<figure>
                			<img src="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg" class="attachment-medium size-medium wp-post-image" alt="Look! by Liverpool mayo" srcset="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg 250w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-120x157.jpg 120w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo.jpg 563w" sizes="(max-width: 230px) 100vw, 230px">                		</figure>
                		<strong>
                			Look! mayo                		</strong>
                		<span class="btn block terciary">Descargar</span>
					</a><a href="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/000-PDFS-LOOK-MAYO.compressed.pdf">
						<figure>
                			<img src="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg" class="attachment-medium size-medium wp-post-image" alt="Look! by Liverpool mayo" srcset="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg 250w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-120x157.jpg 120w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo.jpg 563w" sizes="(max-width: 230px) 100vw, 230px">                		</figure>
                		<strong>
                			Look! mayo                		</strong>
                		<span class="btn block terciary">Descargar</span>
					</a><a href="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/000-PDFS-LOOK-MAYO.compressed.pdf">
						<figure>
                			<img src="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg" class="attachment-medium size-medium wp-post-image" alt="Look! by Liverpool mayo" srcset="https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-250x326.jpg 250w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo-120x157.jpg 120w, https://lookqa.liverpool.com.mx/wp-content/uploads/2019/05/portada_mayo.jpg 563w" sizes="(max-width: 230px) 100vw, 230px">                		</figure>
                		<strong>
                			Look! mayo                		</strong>
                		<span class="btn block terciary">Descargar</span>
					</a>
	</section>

	
</section>

<?php get_footer(); ?>