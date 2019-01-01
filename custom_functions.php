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

function getMainCategoryWithDetails($fromPostId){
	$categories = get_the_category( $fromPostId);
	$categoryArr = array();
    foreach($categories as $category){
    	if($category->category_parent == 0){
			$categoryArr["name"] = $category->name;
			$categoryArr["permalink"] = get_category_link($category);   		
    	}
    }
   	return $categoryArr;

}

/**
* obtiene N post por categoría
* @param $categorySlug el slug de las categorías a buscar
* @param $limit el tope de posts a devolver por la funcion
* @return $the_query el query para iterarlo en la view
**/ 
function getPostsByCategory($categorySlug, $numberOfPosts, $ignore_sticky_posts = false){

	$args = array(
		'post_status' => 'publish',
		'category_name' => $categorySlug,
		'post_type' => 'post',
		'ignore_sticky_posts' => 1,
		'posts_per_page' => $numberOfPosts
	);

	if($ignore_sticky_posts){
		$post_to_ignore = get_option('sticky_posts');
		$args['post__not_in'] = $post_to_ignore;
		
	}

	return new WP_Query($args);
}


/**
* formatea el excerpt para remover los tags html que wordpress agrega por default
* util cuando un post no tiene excerpt y quieres pintarlo de modo custom en el view
*/
function stripExcerpt($naturalExcerpt, $limit){
	$excerpt = substr($naturalExcerpt, 0, $limit). "...";
    $excerpt = preg_replace('/<a[^>]*(.*?)<\/a>/s', '', $excerpt);
    return wp_strip_all_tags($excerpt);
}

/**
* obtiene los N posts mas recientes a partir de un offset
* que pertenecen a la categoría proporcionada por el parametro
* ordenador por fecha de edicion
* @param $byCategory el slug de la categoría a buscar
* @param $postQuantity (opcional) la cantidad de posts a devolver, por default 8
* @param $offset (opcional) el inicio desde donde empezará a contar los resultados, default no offset.
**/
function getPosts($byCategory, $postQuantity = 18, $offset=0){
	$args = array(
		"category_name" => $byCategory,
		"orderby" =>  "modified",
		"type" => "post",
		"post_status" => "publish",
		"posts_per_page" => $postQuantity
	);

	if($offset > 0){
		$args["offset"] = $offset;
	}
	return new WP_Query($args);
}


/**
* Obtiene los N articulos relacionados de un posts
* @param $post (Object) post del que se obtendran las relacionadas
* @param $numberOfPosts numero de post relacionados a devolver
* @return el query de los posts relacionados o null en su defecto (si no se encontraron relacionados por tags)
**/
function getRelatedPosts($post, $numberOfPosts){
	$tags = wp_get_post_tags($post->ID);
	if ($tags) {
		$first_tag = $tags[0]->term_id;
		$args=array(
			'tag__in' => array($first_tag),
			'post__not_in' => array($post->ID),
			'posts_per_page'=>$numberOfPosts,
			'caller_get_posts'=>1
		);

		return new WP_Query($args);
	}

	return null;
}


function get_post_gallery_images_with_info($postvar = NULL) {
    if(!isset($postvar)){
        global $post;
        $postvar = $post;//if the param wasnt sent
    }


    $post_content = $postvar->post_content;
    preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
    $images_id = explode(",", $ids[1]); //we get the list of IDs of the gallery as an Array


    $image_gallery_with_info = array();
    //we get the info for each ID
    foreach ($images_id as $image_id) {
        $attachment = get_post($image_id);
        array_push($image_gallery_with_info, array(
            'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink($attachment->ID),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
                )
        );
    }
    return $image_gallery_with_info;
}


function get_more_notes(){
	$data = ["id" => 1, "title" => "titulo", 'msg' => "algo_mas"];
	echo json_encode($data);
	wp_die();

}


add_action('wp_ajax_nopriv_get_more_notes', 'get_more_notes');
add_action('wp_ajax_get_more_notes', 'get_more_notes');


?>