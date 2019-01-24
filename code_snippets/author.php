<p class="author">
	<?php
		$author_alternativo = get_field("autor_alternativo");
		$author= empty($author_alternativo) ? get_the_author() : $author_alternativo;
	 ?>	
	 Por: <span><?=$author;?></span>
</p>