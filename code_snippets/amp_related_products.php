<article class="experiencia">
    <section class="inner">
        
        <?php

        	$prods = get_field('productos_relacionados');
        	$link = get_field('url_sin_articulos');

        	if( !empty($prods) ){  ?>

        		<h3 class="nice">Esta experiencia puede ser tuya</h3>

        		<amp-carousel width="340" height="370" layout="responsive" type="slides" controls loop>

        		<?php 


	        	$itemsProd = explode(", ", $prods);

	        	//print_r($itemsProd);

	        	foreach ($itemsProd as $item) {
				    $dataItem = file_get_contents('https://shoppapp.liverpool.com.mx/appclienteservices/services/v3/pdp?productId='.$item.'');
				    $response = json_decode($dataItem);



				 //    echo('<div class="JSON">');
					// print_r($dataItem);
				 //    echo('</div>');

				    $nombre = $response->productInfo->displayName;
				    $imagen = $response->productInfo->images->lg;

				    if( !empty($nombre) ){
				?>

					<!-- <a href="https://www.liverpool.com.mx/tienda/pdp/<?= $item  ?>?utm_source=Look&utm_medium=Menta" target="_blank"> -->
					<a href="https://look.liverpool.com.mx/redirection.php?name=<?= $nombre; ?>&sku=<?= $item; ?>" target="_blank">
						<figure>
							 <amp-img src="<?= $imagen ?>" alt="<?= $nombre ?>" width="3" height="2" class="amp-wp-enforced-sizes" layout="responsive"></amp-img>
						</figure>
						<figcaption><strong><?= $nombre ?></strong></figcaption>
						<span>Comprar</span>
					</a>

			<?php 
					}
				} 
			?>

				</amp-carousel>
					
		<?php }elseif( !empty($link) ) { 

			$linkUrl = $link['url'];
			$linkText = $link['title'];

		?>

			<h3 class="nice">Esta experiencia puede ser tuya</h3>
			<section class="no_carousel">
	        	<h5>Explora todas las posibilidades que Liverpool tiene para ti</h5>
	        	<a class="tienda_btn" href="<?= $linkUrl ?>" target="_blank"><?= $linkText ?></a>
	        </section>

		<?php }else{ ?>

			<h3 class="nice">Esta experiencia puede ser tuya</h3>
			<section class="no_carousel">
	        	<h5>Explora todas las posibilidades que Liverpool tiene para ti</h5>
	        	<a class="tienda_btn" href="https://www.liverpool.com.mx/" target="_blank">Ir a liverpool.com.mx</a>
	        </section>

		<?php } ?>

		
       
    </section>    
</article>