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
    	<?php }else{ ?>
       			<span><?= stripExcerpt(get_the_excerpt(), 180); ?></span>
		<?php }	?> 
    <time>
        	<?= the_time("d F Y"); ?>
    	</time>
    </div>
</a>