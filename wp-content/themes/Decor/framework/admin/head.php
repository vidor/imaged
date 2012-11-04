<?php

function add_admin_scripts() {

	if(!is_admin()) return;
	
	wp_enqueue_style( 'admin-style', THEME_ADMIN_CSS.'/admin-style.css');
	wp_enqueue_style( 'farbtastic-css', THEME_ADMIN_CSS.'/farbtastic.css');
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('farbtastic');
		
	wp_enqueue_script('jqueryrange',THEME_ADMIN_JS.'/jquery.tools.min.js');

	if( of_is_post_page() ){

		wp_enqueue_script( 'metabox', THEME_ADMIN_JS.'/metabox.js');

	}
	
	if( of_is_attachment() ){
	
		//wp_enqueue_script( 'media_upload', THEME_ADMIN_JS.'/media_upload.js');
	
	}
	

	if( of_is_admin_panel() ){

		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script( 'ajaxupload', THEME_ADMIN_JS.'/ajaxupload.js');
		wp_enqueue_script( 'admin_js', THEME_ADMIN_JS.'/admin.js');

	}
		
}

add_action('admin_init', 'add_admin_scripts');

?>