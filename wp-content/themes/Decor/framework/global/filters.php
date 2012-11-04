<?php

function new_excerpt_more($more) {

	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


function mysite_body_class( $classes ) {

	if(get_meta_option('theme_page_type')=='2' ||  get_meta_option('theme_page_type')=='3' || is_singular('portfolio') || is_singular('gallery') || is_archive() || is_search() ) $classes[] ="horizontal-page";
	if(get_meta_option('display_sidebar')=='no') $classes[] ="full-width";
	if(get_meta_option('hide_body')=='yes') $classes[] ="body-closed";
	
	return $classes;
}

add_filter( 'body_class', 'mysite_body_class', 10 );


function my_image_sizes($sizes) {
        $addsizes = array("booklet_image" => "Booklet Image", "full_width_image" => "Full Width Image");
        $newsizes = array_merge($sizes, $addsizes);
        return $newsizes;
}
add_filter('image_size_names_choose', 'my_image_sizes');


function post_like()  {  

	// Check for nonce security  
	$nonce = $_POST['nonce'];  
	

  
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )  
		die ( 'Busted!');  
  
	if(isset($_POST['post_like']))  {
	
	
		// Get votes count for the current post  
		$post_id = $_POST['post_id']; 	
		$meta_count = get_post_meta($post_id, "votes_count", true);  
  
		// User has already voted ?  
		if(!isset($_COOKIE["like_". $post_id]))  
		{  
		

  
			// Save cookie and increase votes count  
			setcookie('like_'.$post_id, $post_id, time()+60*60*24*30*12, '/' );
			update_post_meta($post_id, "votes_count", ++$meta_count);  
  
			// Display count (ie jQuery return value)  
			echo $meta_count;  
		}  
		else  
			echo "voted";  
	}  
	exit;  
}  

add_action('wp_ajax_nopriv_post-like', 'post_like');  
add_action('wp_ajax_post-like', 'post_like');  

?>