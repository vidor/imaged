<?php

function booklet_register(){
	
	$args = array(
		'labels' => array(
			'name' => 'Booklets', 
			'singular_name' => 'Booklet',
			'add_new' => 'Add New',
			'add_new_item' => 'Add New Booklet',
			'edit_item' => 'Edit Booklet',
			'new_item' => 'New Booklet',
			'view_item' => 'View Booklet', 
			'search_items' => 'Search Booklet', 
			'not_found' =>  'No Booklet found', 
			'not_found_in_trash' => 'No Booklet found in Trash', 
			'parent_item_colon' => ''
		),
		'singular_label' => 'booklet',
		'public' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'query_var' => false,
		'supports' => array('title','editor')
	);
		
	register_post_type( 'booklet' , $args );
		
	
}
add_action('init', 'booklet_register');




?>