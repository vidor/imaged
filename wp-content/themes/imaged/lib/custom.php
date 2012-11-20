<?php

// Custom functions
function imaged_ajax_loadmore(){
   
	$posts_per_page  = get_option('posts_per_page');
	$nonce = $_POST['nonce'];	
	$offset = $_POST['offset'];	
	
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Forbidden!');		
		
	$args= array('posts_per_page'=> $posts_per_page ,'offset' => $offset, 'post_status' => 'publish');
	query_posts($args);			

	while (have_posts()) : the_post();
	  get_template_part('templates/loop');
	endwhile; 
  
    exit;
}

add_action('wp_ajax_imaged_ajax_loadmore', 'imaged_ajax_loadmore'); 
add_action('wp_ajax_nopriv_imaged_ajax_loadmore', 'imaged_ajax_loadmore'); 


/*-------------------------------------------------------------------------------------*/
/*	Get All Posts for Archives
/*--------------------------------------------------------------------------------------*/
function get_posts_archives() {
	$rawposts = get_posts(array('numberposts' => -1));			
	foreach( $rawposts as $post ) {
		$posts[ mysql2date( 'Y.m', $post->post_date ) ][] = $post;
	}
	$rawposts = null; 
	return $posts;			
}
/*-------------------------------------------------------------------------------------*/
/*	Add meta to user
/*--------------------------------------------------------------------------------------*/

function extra_contact_info($contactmethods) {
	 unset($contactmethods['aim']);
	 unset($contactmethods['yim']);
	 unset($contactmethods['jabber']);
	 $contactmethods['weibo'] = '微博';
	 $contactmethods['imaged_url'] = '本站地址';
	 return $contactmethods;
 }
 add_filter('user_contactmethods', 'extra_contact_info');