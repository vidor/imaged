<?php

//constants
define('THEME_NAME', 'Decor');
define('THEME_SLUG', 'decor');
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());
define('THEME_IMG', THEME_URI . '/img');
define('THEME_CSS', THEME_URI . '/css');
define('THEME_JS', THEME_URI . '/js');
define('THEME_INCLUDES', THEME_URI . '/includes');

define('THEME_FRAMEWORK', THEME_DIR . '/framework');
define('THEME_GLOBAL', THEME_FRAMEWORK . '/global');
define('THEME_CUSTOM_TYPES', THEME_FRAMEWORK . '/custom_post_types');
define('THEME_WIDGETS', THEME_FRAMEWORK . '/widgets');
define('THEME_SHORTCODES', THEME_FRAMEWORK . '/shortcodes');

define('THEME_ADMIN', THEME_FRAMEWORK . '/admin');
define('THEME_ADMIN_URI', THEME_URI . '/framework/admin');
define('THEME_ADMIN_CSS', THEME_ADMIN_URI . '/css');
define('THEME_ADMIN_JS', THEME_ADMIN_URI . '/js');
define('THEME_ADMIN_IMG', THEME_ADMIN_URI . '/img');
define('THEME_ADMIN_OPTIONS', THEME_ADMIN . '/options');
define('THEME_ADMIN_METABOXES', THEME_ADMIN . '/metaboxes');



load_theme_textdomain( 'decor', TEMPLATEPATH . '/languages' ); 

//supports
function theme_setup() {

	add_image_size( 'thumb', 40, 40, true ); 
	add_image_size( 'post_image', 0, 400, true ); 
	add_image_size( 'booklet_image', 320, 400, true ); 
	add_image_size( 'single', 640, 0, true ); 
	add_image_size( 'poster_image', 711, 400, true ); 
	add_image_size( 'full_width_image', 580, 0, true ); 
	
	add_image_size( 'gallery_small', 122, 122, true ); 
	add_image_size( 'gallery_medium', 173, 173, true ); 
	add_image_size( 'gallery_large', 275, 275, true ); 
	

	
	register_nav_menu('main_nav', THEME_NAME . ' Navigation');
	register_nav_menu('footer_nav', THEME_NAME . ' SubFooter Navigation');
	
	add_theme_support('post-thumbnails', array('post', 'page', 'portfolio','gallery'));
	add_theme_support('automatic-feed-links');
	add_theme_support( 'post-formats', array( 'gallery', 'image','video','quote','aside'));
	add_post_type_support( 'page', 'post-formats' );
	add_post_type_support( 'portfolio', 'post-formats' );
	
	add_filter('wp_default_editor', create_function('', 'return "html";'));
	if ( ! isset( $content_width ) ) $content_width = 960;

	
}
add_action( 'after_setup_theme', 'theme_setup' );




//global functions
require_once (THEME_GLOBAL . '/head.php');
require_once (THEME_GLOBAL . '/theme_functions.php');
require_once (THEME_GLOBAL . '/getoption.php');
require_once (THEME_GLOBAL . '/filters.php');
require_once (THEME_GLOBAL . '/pagination.php');


//custom post types
require_once (THEME_CUSTOM_TYPES . '/gallery.php');
require_once (THEME_CUSTOM_TYPES . '/portfolio.php');
require_once (THEME_CUSTOM_TYPES . '/booklet.php');

//admin
require_once (THEME_ADMIN_METABOXES . '/post.php');
require_once (THEME_ADMIN_METABOXES . '/page.php');
require_once (THEME_ADMIN_METABOXES . '/portfolio.php');
require_once (THEME_ADMIN_METABOXES . '/gallery.php');
require_once (THEME_ADMIN_METABOXES . '/shortcodes.php');
require_once (THEME_ADMIN_METABOXES . '/attachment.php');

// Custom functions and plugins
require_once (THEME_ADMIN . '/admin-functions.php');

// Admin Interfaces (options,framework, seo)		
require_once (THEME_ADMIN . '/admin-interface.php');		

// Options panel settings and custom settings
require_once (THEME_ADMIN . '/theme-options.php'); 
require_once (THEME_ADMIN . '/global_functions.php');
require_once (THEME_ADMIN . '/head.php');

//shortcodes
require_once (THEME_SHORTCODES . '/raw.php');
require_once (THEME_SHORTCODES . '/columns.php');
require_once (THEME_SHORTCODES . '/contactform.php');
require_once (THEME_SHORTCODES . '/gallery.php');
require_once (THEME_SHORTCODES . '/images.php');
require_once (THEME_SHORTCODES . '/tabs.php');
require_once (THEME_SHORTCODES . '/typography.php');
require_once (THEME_SHORTCODES . '/videos.php');


//widgets
require_once (THEME_WIDGETS . '/flickr.php');
require_once (THEME_WIDGETS . '/popular.php');
require_once (THEME_WIDGETS . '/recent.php');
require_once (THEME_WIDGETS . '/related.php');
require_once (THEME_WIDGETS . '/twitter.php');
require_once (THEME_WIDGETS . '/portfolio.php');
?>