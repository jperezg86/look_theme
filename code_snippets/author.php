<div class="author">
	<?php
		$author_alternativo = get_field("autor_alternativo");
		$author= empty($author_alternativo) ? get_the_author() : $author_alternativo;
	 ?>	
	
	 Por: <span data-link="<?= get_author_posts_url( get_the_author_meta( $author ), get_the_author_meta( 'user_nicename' ) ); ?>"><?=$author;?></span>
</div>