 <article class="top_section">
     <section class="inner">
        <a href="<?=get_the_permalink(); ?>" class="card">
            <figure>
                  <?= the_post_thumbnail('large'); ?>
            </figure>
            <figcaption>
            <div>
                <em><?= getFirstCategory(get_the_ID()); ?></em>
                <strong><?= get_the_title();?></strong>
                <?php if(has_excerpt()){ ?> 
                    <span> <?= get_the_excerpt();?></span>
                <?php }else{ ?>
                    <span><?= stripExcerpt(get_the_excerpt(), 180); ?></span>
                <?php }  ?> 
            </div>
            </figcaption>
        </a>
    </section>
</article>