		 <footer>
		    	<section class="inner">
		            <section class="social_links">
		               <!--  <a href="https://www.facebook.com/lookbyliverpool/" target="_blank"><i class="fab fa-facebook-f"></i></a>
		                <a href="https://www.instagram.com/liverpool_mexico/" target="_blank"><i class="fab fa-instagram"></i></a>
		                <a href="https://www.pinterest.com.mx/liverpoolmexico/" target="_blank"><i class="fab fa-pinterest"></i></a>
		                <a href="https://twitter.com/LiverpoolMexico" target="_blank"><i class="fab fa-twitter"></i></a> -->
		            </section>



		            <section class="logo">

		                <a href="#">
		                		<img src="<?= get_template_directory_uri() ?>/img/liverpool.svg" alt="Liverpool"/>
		                </a>

		                <?php
		                	$magPost = getLatestPublishedMagazine();
		                	if($magPost -> have_posts()){ 
								while($magPost -> have_posts()){
									$magPost->the_post(); 
									$file = get_field('file_revista_impresa');
									?>
									<section class="mag_pdf">
					                	<a href="<?= $file['url'] ?>" target="_blank" rel="noreferrer">
					                		<figure>
					                			<?= the_post_thumbnail('medium') ?>
					                		</figure>
					                		<span class="btn block">Descargar</span>
					                	</a>
					                	<a href="<?= get_site_url(); ?>/ediciones-impresas/" class="ediciones_ateriores">Ediciones anteriores</a>
		                			</section>
						<?php	}
								wp_reset_postdata();
							}  ?>
		            </section>

		           

		            <section class="legal">
		                <a href="https://assets.liverpool.com.mx/ayuda/?_ga=2.240192835.1145771125.1548771617-267814312.1546458703&_gac=1.149331268.1547834706.Cj0KCQiAj4biBRC-ARIsAA4WaFgYS8WSeHPEhHDbrf7YvCmt-h9SIJ51phUxidLUVHcRo1ztXdt-4bgaAhhHEALw_wcB#/sec/otros-temas/terminos-y-condiciones/aviso-de-privacidad-integral">Términos y condiciones</a>
		                <a href="https://assets.liverpool.com.mx/ayuda/?_ga=2.240192835.1145771125.1548771617-267814312.1546458703&_gac=1.149331268.1547834706.Cj0KCQiAj4biBRC-ARIsAA4WaFgYS8WSeHPEhHDbrf7YvCmt-h9SIJ51phUxidLUVHcRo1ztXdt-4bgaAhhHEALw_wcB#/sec/otros-temas/terminos-y-condiciones/aviso-de-privacidad-integral">Aviso de privacidad</a>
		            </section>
		        </section>
		        <section class="copyright">
		            2019 Liverpool / Todos los derechos reservados D.R. ®
		        </section>
		    </footer>
		</main>

		<?php wp_footer(); ?>

		<?php
			$isAMP = ( array_key_exists("amp", $_GET) );
			if(!$isAMP){
		?>
			<!-- analytics google -->
	       <!--  <script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
			
			  ga('create', 'UA-133903684-1', 'auto');
			  ga('send', 'pageview');
			
		</script> -->
		<?php } ?>


		<article class="lightbox_news animated fadeIn" style="display: none;">
			<a href="#" class="close"><span></span></a>
			<div class="envelope"></div>
			<section class=" animated fadeInUp">
				<figure>
					<img src="<?= get_template_directory_uri(); ?>/img/lightimg_news.jpg" alt="Suscríbete">
				</figure>
				<div>
					<!-- <img src="<?= get_template_directory_uri(); ?>/img/logo.svg" alt="Logo"> -->
					<p>
						Historias increíbles directo a tu <strong>e-mail</strong>
					</p>
					<?php 
		                echo do_shortcode( '[email-subscribers namefield="NO" desc="" group="Public"]');
		            ?>
	            </div>
			</section>	
		</article>
	</body>
</html>
