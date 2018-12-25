<a href="<?=get_the_permalink(); ?> " class="card">
    <figure>    
        <?= the_post_thumbnail('medium'); ?>
    </figure>
    <div>
        <em>
        	<?= getFirstCategory(get_the_ID()); ?>
        	</em>
        <strong><?= get_the_title() ?> </strong>

        <?php if(has_excerpt()){ ?> 
        	<span> <?= get_the_excerpt();?></span>
    	<?php }else{
       			$excerpt = get_the_excerpt();
       			$excerpt = substr($excerpt, 0, 180). "...";
				$excerpt = preg_replace('/<a[^>]*(.*?)<\/a>/s', '', $excerpt);
				echo wp_strip_all_tags($excerpt);
			}
    	?> 
    <time>
        	<?= the_time("d F Y"); ?>
    	</time>
    </div>
</a>