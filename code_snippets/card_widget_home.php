<a href="<?=get_the_permalink(); ?> " class="card">
    <figure>    
        <?= the_post_thumbnail('large'); ?>
    </figure>
    <div>

        <em>
        	<?= getFirstCategory(get_the_ID()); ?>
        </em>
        <?php isset($titleElement) ? print ("<".$titleElement.">") : ""; ?>
             <strong><?= get_the_title(); ?></strong>
        <?php isset($titleElement) ? print ("</".$titleElement.">") : ""; ?>
        <?php if(has_excerpt()){ ?> 
        	<span> <?= get_the_excerpt();?></span>
    	<?php }else{ ?>
       		<span><?= stripExcerpt(get_the_excerpt(), 100); ?></span>
		<?php }	?> 
        <time>
        	<?= the_time("d F Y"); ?>
    	</time>
    </div>
</a>