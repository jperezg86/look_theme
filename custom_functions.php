<?php 

/**
* trae el post mas reciente marcado como sticky
* @param $index el indice del sticky a devolver 1: el mas reciente 2, el segundo mas reciente, etc..
* @return el query de post encontrados como resultado
*
*/
function get_sticky_post_for_home($index, $exclude=null){
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

		// if(!is_null($exclude)){
		// 	$args['post__not_in'] = $exclude;
		// }


		return new WP_Query($args);
	}
	
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
function getPostsByCategory($categorySlug, $numberOfPosts, 
		 $ignore_sticky_posts = false,$ignoredIds = null){

	$args = array(
		'post_status' => 'publish',
		'category_name' => $categorySlug,
		'post_type' => 'post',
		'ignore_sticky_posts' => 1,
		'posts_per_page' => $numberOfPosts
	);

	if($ignore_sticky_posts){
		$post_to_ignore = get_option('sticky_posts');
		if(!is_null($ignoredIds)){
			$post_to_ignore = array_merge($post_to_ignore,$ignoredIds);
		}
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
function getPosts($byCategory = "", $postQuantity = 18, $offset=0){
	$args = array(
		// "category_name" => $byCategory,
		"orderby" =>  "modified",
		"type" => "post",
		"post_status" => "publish",
		"ignore_sticky_posts" => 1,
		"posts_per_page" => $postQuantity
	);

	if(!empty($byCategory)){
		$args['category_name'] = $byCategory;
	}

	if($offset > 0){
		$args["offset"] = $offset;
	}
	return new WP_Query($args);
}

/**
* obtiene los N posts mas recientes a partir de un offset
* que pertenecen a la categoría proporcionada por el parametro
* ordenador por fecha de publicación
* @param $byCategory el slug de la categoría a buscar
* @param $postQuantity (opcional) la cantidad de posts a devolver, por default 8
* @param $offset (opcional) el inicio desde donde empezará a contar los resultados, default no offset.
**/
function getPostsByPublished($byCategory, $postQuantity = 18, $offset=0){
	$args = array(
		"category_name" => $byCategory,
		"orderby" =>  "date",
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
	$tagsArray = [];
	foreach($tags as $tag) {
		array_push($tagsArray, $tag->term_id);
	}
	if ($tags) {
		// $first_tag = $tags[0]->term_id;
		$args=array(
			// 'tag__in' => array($tagsArray),
			'post__not_in' => array($post->ID),
			'posts_per_page'=>$numberOfPosts,
			'caller_get_posts'=>1,
			'ignore_sticky_posts' => 1,
			'orderby' => 'rand',
			'tax_query' => [
		        [
		            'taxonomy' => 'post_tag',
		            'terms'    => $tagsArray
		        ]
		    ]
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
	$categoryId = absint($_REQUEST['categoryId']);
	$currentPage =absint($_REQUEST['page']);
	$postsPerPage = 8;
	$newOffset = (($currentPage -1 ) * $postsPerPage) + 18;

	$args = array(
		'post_status' => 'publish',
		'cat' => $categoryId,
		'post_type' => 'post',
		'posts_per_page' => $postsPerPage,
		'offset' => $newOffset
	);

	$response = array();
	$query = new WP_Query($args);
	if($query->have_posts()){
		while($query->have_posts()){
			$query->the_post();
			$excerpt = (has_excerpt()) ? get_the_excerpt() : stripExcerpt(get_the_excerpt(), 100);
			$tmpArray = array(
				"id" => get_the_ID(),
				"title" => get_the_title(),
				"url" => get_the_permalink(),
				"excerpt" => htmlentities($excerpt),
				"mainCategory" => getFirstCategory(get_the_ID()),
				"time" => get_the_time("d F Y"),
				"thumbnail" => get_the_post_thumbnail(get_the_ID(),'large')
			);

			array_push($response,$tmpArray);
		}
		wp_reset_postdata();
	}
	echo json_encode($response);
	wp_die();
}


function get_info_product(){
	$productId = $_REQUEST['productId'];
	// $baseURL = "https://shopappst.liverpool.com.mx/appclienteservices/services/v3/pdp?productId=".$productId;
	$baseURL = "https://shoppapp.liverpool.com.mx/appclienteservices/services/v3/pdp?productId=".$productId;
	// echo $baseURL;
	$content = file_get_contents($baseURL);
	$array = json_decode($content,true);
	$array['longDescription'] = htmlentities($array['longDescription']);
	echo json_encode($array);
	// $response=array("name" => "Juanito Johns", "title" => "my title");
	// echo json_encode($response);
	wp_die();
}

remove_shortcode('gallery');
add_shortcode('gallery', 'gallery_shortcode_lo');

function gallery_shortcode_lo($attr) {

}

/**
* Trackea los post mas vistos 
*/

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}



function getPopularPosts($limit){
	add_filter("post_limits","returnlimit");
	$query = new WP_Query( 
		array(
			'posts_per_page' => $limit, 
			'post_type' => 'post',
			'post_status' => 'publish',
			'ignore_sticky_posts'=>1,
			'nopaging' => true,
			'meta_key' => 'wpb_post_views_count', 
			'orderby' => 'meta_value_num', 
			'order' => 'DESC'));

	remove_filter("post_limits","returnlimit");
	return $query;

}


function returnlimit() {
	return 'LIMIT 4';
}



add_action('wp_ajax_nopriv_get_more_notes', 'get_more_notes');
add_action('wp_ajax_get_more_notes', 'get_more_notes');
add_action('wp_ajax_nopriv_get_info_product','get_info_product');
add_action('wp_ajax_get_info_product', 'get_info_product');
add_action( 'wp_head', 'wpb_track_post_views');


?>