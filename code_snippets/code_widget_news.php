<?php
    $isAMP = ( array_key_exists("amp", $_GET) );
    if( $isAMP ){
    }
    else{
?>
<section class="newsletter">
    <section class="inner">
        <article>
            <h3 class="nice">Suscríbete</h3>
            <p>Recibe actualizaciones y noticias de nuestras publicaciones</p> 
            <?php 
                echo do_shortcode( '[email-subscribers namefield="NO" desc="" group="Public"]');
            ?>
            <!-- <form>
                <label>
                    <input type="text" name="" placeholder="Ingresa tu correo electrónico">
                    <button><i class="fas fa-long-arrow-alt-right"></i></button>
                </label>
            </form> -->
        </article>            
    </section>
</section>
<?php } ?>