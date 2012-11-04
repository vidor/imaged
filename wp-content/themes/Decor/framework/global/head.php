<?php 
function add_scripts() {
	
	if(is_admin()) return;
		
	//wp_deregister_script('jquery');
	//wp_register_script('jquery', THEME_JS . '/jquery-1.7.1.min.js');
	//wp_register_script('jquery', THEME_JS . '/jquery-1.5.min.js');
	
	wp_enqueue_script('jquery');
	
	
	//mimified javascript
	wp_enqueue_script('all', THEME_JS . '/all.js');


/*
	wp_enqueue_script('jquery_ui', THEME_JS . '/jquery-ui-1.8.17.custom.min.js');
	wp_enqueue_script('jquery-booklet', THEME_JS . '/jquery.booklet.1.2.0.min.js');
    wp_enqueue_script('cufon', THEME_JS . '/cufon-yui.js');
	wp_enqueue_script('jquery.tipTip.minified.js', THEME_JS . '/jquery.tipTip.minified.js');
	wp_enqueue_script('jquery-easing', THEME_JS . '/jquery.easing.1.3.js');
	wp_enqueue_script('jquery-validate', THEME_JS . '/jquery.validate.min.js');
	wp_enqueue_script('slides.min.jquery.js', THEME_JS . '/slides.min.jquery.js');	
	wp_enqueue_script('jquery.colorbox-min.js', THEME_JS . '/jquery.colorbox-min.js' );
	wp_enqueue_script('jquery.wipetouch', THEME_JS . '/jquery.wipetouch.js');
	wp_enqueue_script('jquery.columnizer.min', THEME_JS . '/jquery.columnizer.js' );
	wp_enqueue_script('jquery.tweet.js', THEME_JS . '/jquery.tweet.js' );
	wp_enqueue_script('tabs.js', THEME_JS . '/tabs.js' );
	wp_enqueue_script('supersized', THEME_JS . '/supersized.3.2.7.min.js');
	wp_enqueue_script('supersized.shutter.js', THEME_JS . '/supersized.shutter.js');
	wp_enqueue_script('video-js', THEME_JS . '/video.min.js');
	wp_enqueue_script('jquery.mousewheel.min.js', THEME_JS . '/jquery.mousewheel.min.js');
*/


/*
	global $decor_skin,$decor_font;
	$decor_font='bebas';
	if(isset($_SESSION['decor_font'])) $decor_font=$_SESSION['decor_font'];
	if(isset($_GET['font'])) $decor_font=$_GET['font'];
	$_SESSION['decor_font']=$decor_font;
	wp_enqueue_script('cufon-font', THEME_JS . '/fonts/'.$decor_font.'.js' );
*/	
	
	wp_enqueue_script('cufon-font', THEME_JS . '/fonts/'.get_theme_option('main_font').'.js' );

	if(is_single())  wp_enqueue_script('comment-reply');
	
	wp_enqueue_script('custom', THEME_JS . '/custom.js');
	
	wp_localize_script('custom', 'global_var', array(  
		'ajax' => admin_url('admin-ajax.php'),  
		'uri' => get_template_directory_uri(),  
		'nonce' => wp_create_nonce('ajax-nonce')  
	));  

	

	
}
add_action('wp_enqueue_scripts', 'add_scripts');

function add_styles(){

	if(is_admin()) return;
		
/*	
	global $decor_skin,$decor_font;	
	$decor_skin='light';
	if(isset($_SESSION['decor_skin'])) $decor_skin=$_SESSION['decor_skin'];
	if(isset($_GET['skin'])) $decor_skin=$_GET['skin'];
	$_SESSION['decor_skin']=$decor_skin;
	wp_enqueue_style('theme-skin', THEME_CSS.'/'.$decor_skin.'.css');
	wp_enqueue_style('cufon-font', THEME_CSS . '/fonts/'.$decor_font.'.css' );
*/
	
	wp_enqueue_style('theme-skin', THEME_CSS.'/'.get_theme_option('skin').'.css');
	wp_enqueue_style('cufon-font', THEME_CSS . '/fonts/'.get_theme_option('main_font').'.css' );

	wp_enqueue_style('video-js', THEME_CSS.'/video-js.css');

	
	

	
}
add_action('wp_print_styles', 'add_styles');



?>
