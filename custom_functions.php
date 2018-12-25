<?php 

/**
* trae el post mas reciente marcado como sticky
* @param $index el indice del sticky a devolver 1: el mas reciente 2, el segundo mas reciente, etc..
* @return el query de post encontrados como resultado
*
*/
function get_sticky_post_for_home($index){
	// $index--;
	$sticky = get_option( 'sticky_posts' );

	$itemsToFind = array_slice($sticky,($index * -1),1);
	if(!empty($itemsToFind)){
		$args = array(
			'posts_per_page' => 1,
			'post__in'  => array_slice($sticky,($index * -1),1),
			'orderby' => 'date',
            'order'   => 'DESC',
			'ignore_sticky_posts' => true
		);	
		return new WP_Query($args);
	}
	// $query = new WP_Query( $args );
	// if ( isset($sticky[$index]) ) {
	// 	return $query;
	// }
}

/**
* obtiene la primera categoría para un post.
*/
function getFirstCategory($fromPostId){
	$categories = get_the_category( $fromPostId);
    foreach($categories as $category){
    	if($category->category_parent == 0)
    		return $category->name;
    }
    return "";
}

/**
* obtiene N post por categoría
* @param $categorySlug el slug de las categorías a buscar
* @param $limit el tope de posts a devolver por la funcion
* @return $the_query el query para iterarlo en la view
**/ 
function getPostsByCategory($categorySlug, $numberOfPosts){
	$args = array(
		'post_status' => 'publish',
		'category_name' => $categorySlug,
		'post_type' => 'post',
		'ignore_sticky_posts' => true,
		'posts_per_page' => $numberOfPosts
	);

	return new WP_Query($args);
}
?>