<?php

/*-------------------------------------------------------------------------------------*/
/*	Load Translation Text Domain
/*-------------------------------------------------------------------------------------*/

if (function_exists('load_theme_textdomain')) {
    load_theme_textdomain('si_theme', get_template_directory().'/languages');
}


/*-------------------------------------------------------------------------------------*/
/*	Post Formats
/*-------------------------------------------------------------------------------------*/

add_theme_support('post-formats', array('image','gallery','video','audio','link','quote','status'));
add_post_type_support( 'post', 'post-formats' );


/*-------------------------------------------------------------------------------------*/
/*	Register WP3.0+ Menus
/*-------------------------------------------------------------------------------------*/

if( !function_exists( 'si_register_menu' ) ) {
    function si_register_menu() {
	    register_nav_menu('primary-menu', __('Primary Menu','si_theme'));
    }
    add_action('init', 'si_register_menu');
}


/*-------------------------------------------------------------------------------------*/
/*	Configure Thumbnails
/*-------------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 115, true ); // default  
}

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'archive-thumb', 180,135, true ); // Archive Thumb
	add_image_size( 'post-thumb', 400, '', true ); // Thumb for Post & Photo Gallery
	add_image_size( 'portfolio-thumb',400,225, true ); // Thumb for Portfolio
	add_image_size( 'gallery-format-thumb',380,285, true ); // Gallery Format
}


/*-------------------------------------------------------------------------------------*/
/*	Configure Excerpt
/*-------------------------------------------------------------------------------------*/
function si_excerpt_length($length) {
  if ( is_page_template('template-archives.php') ) 
    return 20;  
  else 
    return 55;  
}
add_filter('excerpt_length', 'si_excerpt_length');

function si_excerpt_more($more) {
	return '';
}
add_filter('excerpt_more', 'si_excerpt_more');


/*-------------------------------------------------------------------------------------*/
/*	Register Sidebars
/*-------------------------------------------------------------------------------------*/

if ( function_exists('register_sidebar') ) {
	
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="sep"></div>',
	));
	
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="sep"></div>',
	));		
	
	register_sidebar(array(
		'name' => 'Slideout',
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name' => 'Single Blog Post',
		'id' => 'single-blog-post',
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="sep"></div>',
	));

}


/*-------------------------------------------------------------------------------------*/
/*	Set the content width based on the theme's design and stylesheet.
/*-------------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) 
	$content_width = 800;
	
	
/*-------------------------------------------------------------------------------------*/
/*	Add default posts and comments RSS feed links to <head>.
/*-------------------------------------------------------------------------------------*/ 
add_theme_support('automatic-feed-links');
	
/*-------------------------------------------------------------------------------------*/
/*	Remove Gallery Shortcode Style
/*-------------------------------------------------------------------------------------*/
add_filter( 'use_default_gallery_style', '__return_false' );
	
	
/*-------------------------------------------------------------------------------------*/
/*	Customize Protected Gallery
/*-------------------------------------------------------------------------------------*/
function si_custom_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$output = '<form class="protected-post-form" action="' . get_option( 'siteurl' ) . '/wp-login.php?action=postpass" method="post">	
    <p>' . __( "This gallery is protected. To view it, enter the password below:",'si_theme' ) . '</p>
	<input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" /></form>';
    return $output;
}
add_filter( 'the_password_form', 'si_custom_password_form' );

function si_prefix_private_title_format( $format ) {
    return '%s';
}
add_filter( 'protected_title_format', 'si_prefix_private_title_format' );
 
 
/*-------------------------------------------------------------------------------------*/
/*	Get Attachement ID from URL 
/*-------------------------------------------------------------------------------------*/

function si_get_attachment_id( $url ) {

    $dir = wp_upload_dir();
    $dir = trailingslashit($dir['baseurl']);

    if( false === strpos( $url, $dir ) )
        return false;

    $file = basename($url);

    $query = array(
        'post_type' => 'attachment',
        'fields' => 'ids',
        'meta_query' => array(
            array(
                'value' => $file,
                'compare' => 'LIKE',
            )
        )
    );

    $query['meta_query'][0]['key'] = '_wp_attached_file';
    $ids = get_posts( $query );

    foreach( $ids as $id )
        if( $url == array_shift( wp_get_attachment_image_src($id, 'full') ) )
            return $id;

    $query['meta_query'][0]['key'] = '_wp_attachment_metadata';
    $ids = get_posts( $query );

    foreach( $ids as $id ) {

        $meta = wp_get_attachment_metadata($id);

        foreach( $meta['sizes'] as $size => $values )
            if( $values['file'] == $file && $url == array_shift( wp_get_attachment_image_src($id, $size) ) ) {
				return $id;
            }
    }

    return false;
}


/*-----------------------------------------------------------------------------------*/
/*	Truncate Text
/*-----------------------------------------------------------------------------------*/

function si_truncate_phrase($text,$amount=45,$more='...') {
	$getlength = strlen($text);
	if ($getlength < $amount) return $text;	
	$truncate = substr( $text, 0, strrpos( substr( $text, 0, $amount), ' ' ) );	
	if ($getlength > $amount) $truncate  .= $more;	
	return $truncate ;
}

function si_get_the_title_truncated($id,$amount=50) {
	$title = get_the_title($id);
	return si_truncate_phrase($title,$amount,'...');
}


/*-----------------------------------------------------------------------------------*/
/*	Get Image Percentage Size
/*-----------------------------------------------------------------------------------*/

function si_get_image_size_percentage($width,$height){
	$percent= 100;
	$ratio =  $width / $height ;
	
	if($ratio < 0.75) $percent = 37.5;
	else if ($ratio < 0.92) $percent = 47;
	else if ($ratio < 1.17) $percent = 56.3;
	else if ($ratio < 1.42) $percent = 75;
	else if ($ratio < 1.64) $percent = 84.5;
	else $percent = 100;
		
	return $percent;
}


/*-----------------------------------------------------------------------------------*/
/*	Lightweight detector of mobile devices, OSs & browsers
 *  Copyright 2012  Túbal Martín  - License: GPL2
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists('mobile_detector') )
{
    // Global vars
    $is_mobile = false;
    $is_iphone = $is_ipad = $is_kindle = false;
    $is_ios = $is_android = $is_webos = $is_palmos = $is_windows = $is_symbian = $is_bbos = $is_bada = false;
    $is_opera_mobile = $is_webkit_mobile = $is_firefox_mobile = $is_ie_mobile = $is_netfront = $is_uc_browser = false;


    function mobile_detector($debug = false)
    {
        global $is_mobile;

        // Check user agent string
        $agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

        if (empty($agent)) {
            return;
        }

        $mobile_devices = array(
            'is_iphone' => 'iphone',
            'is_ipad' => 'ipad',
            'is_kindle' => 'kindle'
        );
        
        $mobile_oss = array(
            'is_ios' => 'ip(hone|ad|od)',
            'is_android' => 'android',
            'is_webos' => '(web|hpw)os',
            'is_palmos' => 'palm(\s?os|source)',
            'is_windows' => 'windows (phone|ce)',
            'is_symbian' => 'symbian(\s?os|)|symbos',
            'is_bbos' => 'blackberry(.*?version\/\d+|\d+\/\d+)',
            'is_bada' => 'bada'
        );
        
        $mobile_browsers = array(
            'is_opera_mobile' => 'opera (mobi|mini)', // Opera Mobile or Mini
            'is_webkit_mobile' => '(android|nokia|webos|hpwos|blackberry).*?webkit|webkit.*?(mobile|kindle|bolt|skyfire|dolfin|iris)', // Webkit mobile
            'is_firefox_mobile' => 'fennec', // Firefox mobile
            'is_ie_mobile' => 'iemobile|windows ce', // IE mobile
            'is_netfront' => 'netfront|kindle|psp|blazer|jasmine', // Netfront
            'is_uc_browser' => 'ucweb' // UC browser
        );
        
        $groups = array($mobile_devices, $mobile_oss, $mobile_browsers);
        
        foreach ($groups as $group) {
            foreach ($group as $name => $regex) {
                if (preg_match('/'.$regex.'/i', $agent)) {
                    global $$name;
                    $is_mobile = $$name = true;
                    break;
                }
            }
        }
        
        // Fallbacks
        if ($is_mobile === false) {
            $regex = 'nokia|motorola|sony|ericsson|lge?(-|;|\/|\s)|htc|samsung|asus|mobile|phone|tablet|pocket|wap|wireless|up\.browser|up\.link|j2me|midp|cldc|kddi|mmp|obigo|novarra|teleca|openwave|uzardweb|pre\/|hiptop|avantgo|plucker|xiino|elaine|vodafone|sprint|o2';
            $accept = isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '';

            if (false !== strpos($accept,'text/vnd.wap.wml')
                || false !== strpos($accept,'application/vnd.wap.xhtml+xml')
                || isset($_SERVER['HTTP_X_WAP_PROFILE'])
                || isset($_SERVER['HTTP_PROFILE'])
                || preg_match('/'.$regex.'/i', $agent)
            ) {
                $is_mobile = true;
            }
        }

        // DEBUGGER OUTPUT
        if ($debug === true) {
            echo '<strong>User Agent: '.$agent.'</strong><br>';
            foreach ($GLOBALS as $k => $v) {
                if (strpos($k, 'is_') !== false) {
                    echo '<span style="color:'.($v ? 'green':'red').';">$'.$k.'</span><br>';
                }
            }
        }

    }

    // execute inmmediatly
    mobile_detector();

}

/*--------------------------------------------------------------------------------------*/
/*	Add Browser Detection Body Class
/*--------------------------------------------------------------------------------------*/
add_filter('body_class','si_browser_body_class');
function si_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone,$is_mobile;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	if($is_mobile) $classes[] = 'mobile';
	return $classes;
}



/*-------------------------------------------------------------------------------------*/
/*	Get All Posts for Archives
/*--------------------------------------------------------------------------------------*/
function si_get_posts_archives() {
	$rawposts = get_posts(array('numberposts' => -1));			
	foreach( $rawposts as $post ) {
		$posts[ mysql2date( 'Y.m', $post->post_date ) ][] = $post;
	}
	$rawposts = null; 
	return $posts;			
}		


/*--------------------------------------------------------------------------------------*/
/*	Highlight Portfolio Menu when Single Custom Post Type
/*--------------------------------------------------------------------------------------*/

function si_fix_portfolio_parent($classes, $item){	
	$pageportfolio = of_get_option('portfolio_page');	
	if ( 'portfolio' == get_post_type() || is_tax( 'portfolio-category' ) ){
		 	$classes = str_replace( 'current_page_parent', '', $classes ); 
			if ($item->object_id == $pageportfolio) {
				$classes[]= 'current_page_parent';
			}	
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'si_fix_portfolio_parent', 10, 2 );


function si_fix_gallery_parent($classes, $item){	
	$pageportfolio = of_get_option('gallery_page');	
	if ( 'gallery' == get_post_type() || is_tax( 'gallery-category' ) ){
		 	$classes = str_replace( 'current_page_parent', '', $classes ); 
			if ($item->object_id == $pageportfolio) {
				$classes[]= 'current_page_parent';
			}	
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'si_fix_gallery_parent', 10, 2 );

/*------------------------------------------------------------------------------------*/
/*	Ajaxify Gallery
/*------------------------------------------------------------------------------------*/
function si_ajax_gallery(){

	$offset = $_POST['offset'];	
	$numberposts = $_POST['numberposts'];	
	$pageid = $_POST['pageid'];
	$nonce = $_POST['nonce'];		
	
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Forbidden!');
		
	$args = array(
            'orderby'		 => 'menu_order',
			'order' 		 => 'ASC',
            'post_type'      => 'attachment',
            'post_parent'    => $pageid,
            'post_mime_type' => 'image',
            'post_status'    => null,
            'numberposts'    => $numberposts,
	    'offset'         => $offset,
	    'exclude'        => get_post_thumbnail_id($pageid)
        );
        $attachments = get_posts($args); 
	
		$showtitle = get_post_meta($pageid, 'si_photos_title', true);
		
		if ($attachments) :
			foreach ($attachments as $attachment) :         
				$bigsrc =  wp_get_attachment_image_src( $attachment->ID, 'full'); 
				$zoom  = $bigsrc[0];
				$src = wp_get_attachment_image_src( $attachment->ID, 'post-thumb'); 
				$attachmenttitle = apply_filters('the_title', $attachment->post_title); 				
				$videourl = get_post_meta( $attachment->ID, 'si-attachment-video-url', true );
				$class = "media-image";
				if( !empty( $videourl ) ){
					$zoom  = si_get_video_url_fancybox($videourl);
					$class = "media-video";
				}
				?>
				
				<div class="item-photo <?php echo $class;?>"> 
					<a href="<?php echo $zoom ;?>" rel="gallery" <?php if ($showtitle == __('yes','si_theme'))  echo 'title="'.$attachmenttitle.'"';?>>
						<span class="photo-overlay"></span>
						<img src="<?php echo $src[0]; ?>" width="<?php echo $src[1];?>" height="<?php echo $src[2];?>" alt="<?php echo $attachmenttitle; ?>"  />
					</a>
				</div>   							
			
			<?php endforeach; 
		endif;

	exit;
}

add_action( 'wp_ajax_nopriv_si_ajax_gallery', 'si_ajax_gallery');
add_action( 'wp_ajax_si_ajax_gallery', 'si_ajax_gallery');


/*--------------------------------------------------------------------------------------*/
/*  Ajaxify Gallery Load
/*--------------------------------------------------------------------------------------*/

function si_ajax_gallery_list(){
   
	$posts_per_page  = of_get_option('gallery_number');
	$nonce = $_POST['nonce'];	
	$offset = $_POST['offset'];	
	
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Forbidden!');		
		
	$args= array('post_type' => 'gallery','posts_per_page'=> $posts_per_page ,'offset' => $offset, 'post_status' => 'publish');
	query_posts($args);	 
		
	get_template_part( 'loop', 'gallery');
  
    exit;
}

add_action('wp_ajax_si_ajax_gallery_list', 'si_ajax_gallery_list');          
add_action('wp_ajax_nopriv_si_agallery_list', 'si_ajax_gallery_list'); 



/*--------------------------------------------------------------------------------------*/
/*  Ajaxify Blog
/*--------------------------------------------------------------------------------------*/

function si_ajax_blog(){
   
	$posts_per_page  = get_option('posts_per_page');
	$nonce = $_POST['nonce'];		
	$author = $_POST['author'];
	$category = $_POST['category'];
	$tag = $_POST['tag'];
	$datemonth 	= $_POST['datemonth'];
	$dateyear = $_POST['dateyear'];
	$search = $_POST['search'];
	$offset = $_POST['offset'];	
	
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Forbidden!');		

    query_posts(array(
					'offset' => $offset,
					'posts_per_page' => $posts_per_page,
					'post_status' => 'publish', 
					'author' => $author,					
					'cat' => $category,
					'tag' => $tag,
					'monthnum' => $datemonth,
					'dateyear' => $dateyear,
					's' => $search));
   	
    if (!empty($search))
		get_template_part('loop-search');
	else
		get_template_part('loop');
  
	wp_reset_query();
  
    exit;
}

add_action('wp_ajax_si_ajax_blog', 'si_ajax_blog');          
add_action('wp_ajax_nopriv_si_ajax_blog', 'si_ajax_blog');   


/*--------------------------------------------------------------------------------------*/
/*  Ajaxify Portfolio
/*--------------------------------------------------------------------------------------*/

function si_ajax_portfolio(){
   
	$posts_per_page  = of_get_option('portfolio_number');
	$nonce = $_POST['nonce'];	
	$offset = $_POST['offset'];	
	
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Forbidden!');		
		
	$args= array('post_type' => 'portfolio','posts_per_page'=> $posts_per_page ,'offset' => $offset, 'post_status' => 'publish');
	query_posts($args);			
	get_template_part( 'loop', 'portfolio');
  
    exit;
}

add_action('wp_ajax_si_ajax_portfolio', 'si_ajax_portfolio');          
add_action('wp_ajax_nopriv_si_ajax_portfolio', 'si_ajax_portfolio'); 



/*--------------------------------------------------------------------------------------*/
/*	Include only posts in WordPress Search Results
/*--------------------------------------------------------------------------------------*/
function si_search_filter($query) {
	if ($query->is_search) {
	$query->set('post_type', 'post');
	}
	return $query;
}

//add_filter('pre_get_posts','si_search_filter');


/*--------------------------------------------------------------------------------------*/
/* YOUTUBE / VIMEO Functions
/*--------------------------------------------------------------------------------------*/

/***********************  Get Vimeo & Youtube Thumbnail **************************/

function si_get_video_image($url){
	if(preg_match('/youtube/', $url)) {			
		if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches)) {
			return "http://img.youtube.com/vi/".$matches[1]."/default.jpg";  
		}
	}
	elseif(preg_match('/vimeo/', $url)) {			
		if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $url, $matches))	{
				$id = $matches[1];	
				if (!function_exists('curl_init')) die('CURL is not installed!');
				$url = "http://vimeo.com/api/v2/video/".$id.".php";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				$output = unserialize(curl_exec($ch));
				$output = $output[0]["thumbnail_medium"]; 
				curl_close($ch);
				return $output;
		}
	}		
}

/***********   Retrieve Youtube/Vimeo Iframe code from Url  **********************/

function si_get_video($postid,$width = 620,$height=360) {	
	$video_url = get_post_meta($postid, 'si_youtube_vimeo_url', true);	
	if(preg_match('/youtube/', $video_url)) {			
		if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches)) {
			$output = '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$matches[1].'?wmode=transparent&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe> ';
		}
		else {
			$output = __('Sorry that seems to be an invalid YouTube URL.', 'si_theme');
		}			
	}
	elseif(preg_match('/vimeo/', $video_url)) {			
		if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $matches))	{				
			$output = '<iframe src="http://player.vimeo.com/video/'.$matches[1].'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';         	
		}
		else {
			$output = __('Sorry that seems to be an invalid Vimeo URL.', 'si_theme');
		}			
	}
	else {
		$output = __('Sorry that seems to be an invalid YouTube or Vimeo URL.', 'si_theme');
	}	
	echo $output;	
}


function si_get_video_fullscreen($postid,$width = 1200,$height=675) {
	$video_url = get_post_meta($postid, 'si_page_video', true);		
	$autoplay = get_post_meta($postid, 'si_page_video_autoplay',true);
	$play = 0;
	if ($autoplay == __('yes','si_theme')) 
		$play = 1;
		
	if(preg_match('/youtube/', $video_url)) {			
		if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches)) {
			$output = '<iframe class="video-fullpage" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$matches[1].'?wmode=transparent&showinfo=0&rel=0&autoplay='.$play.'" frameborder="0" allowfullscreen></iframe> ';
		}		
		else {
			$output = __('Sorry that seems to be an invalid YouTube URL.', 'si_theme');
		}
	}
	elseif(preg_match('/vimeo/', $video_url)) {			
		if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $matches))	{				
			$output = '<iframe class="video-fullpage" src="http://player.vimeo.com/video/'.$matches[1].'?title=0&amp;byline=0&amp;portrait=0&amp;autoplay='.$play.'" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>';         	
		}	
		else {
			$output = __('Sorry that seems to be an invalid Vimeo URL.', 'si_theme');
		}	
	}
	else {
		$output = __('Sorry that seems to be an invalid YouTube or Vimeo URL.', 'si_theme');
	}	
	echo $output;	
}


/***********   Retrieve Youtube/Vimeo Url Link for Fancybox  ************************/

function si_get_video_url_fancybox($video_url) {	
	if(preg_match('/youtube/', $video_url)) {			
		if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches)) {
			$output = 'http://www.youtube.com/embed/'.$matches[1].'?wmode=transparent&showinfo=0&rel=0';
		}
	}
	elseif(preg_match('/vimeo/', $video_url)) {			
		if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video_url, $matches))	{				
			$output = 'http://player.vimeo.com/video/'.$matches[1].'?title=0&ampbyline=0&amp;portrait=0';
		}
	}	
	return $output;	
}


/*-----------------------------------------------------------------------------------*/
/*	Test if a post is a certain custom post type
/*-----------------------------------------------------------------------------------*/

function is_post_type($type){
    if (is_single()){
		global $wp_query;
		if($type == get_post_type($wp_query->post->ID)) return true;
    }
    return false;
}


/*-----------------------------------------------------------------------------------*/
/*	Register and load common JS
/*-----------------------------------------------------------------------------------*/

function si_enqueue_scripts() {
		wp_register_script('fancybox', get_template_directory_uri().'/js/jquery.fancybox-1.3.4.pack.js','jquery','1.3.4');
		wp_register_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', 'jquery','1.3');	
		wp_register_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js','jquery','2.0');		
		wp_register_script('jquery-tools', get_template_directory_uri() . '/js/jquery.tools.min.js','jquery','1.2.5');		
		wp_register_script('jplayer', get_template_directory_uri() . '/js/jquery.jplayer.min.js', 'jquery','2.1.0');			
		wp_register_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', 'jquery','1.5.19'); 
		wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery','1.0');	
		wp_register_script('debouncedresize', get_template_directory_uri() . '/js/jquery.debouncedresize.js', 'jquery');	
		wp_register_script('mobilemenu', get_template_directory_uri().'/js/jquery.mobilemenu.js','jquery','1.0');	
		wp_register_script('gmap', get_template_directory_uri().'/js/jquery.gmap.min.js','jquery','2.1.2');	
		wp_register_script('si_custom', get_template_directory_uri() . '/js/jquery.custom.js', 'jquery','1.0', true);
		wp_register_script('si_portfolio', get_template_directory_uri() . '/js/jquery.portfolio.js', 'jquery','1.0', true);
		wp_localize_script('si_portfolio', 'siAjax', array('ajaxurl'=>admin_url('admin-ajax.php'),'nonce' => wp_create_nonce('ajax-nonce')));		
		wp_register_script('si_archive', get_template_directory_uri() . '/js/jquery.archive.js', 'jquery','1.0', true);
		wp_register_script('si_blog', get_template_directory_uri() . '/js/jquery.blog.js', 'jquery','1.0', true);
		wp_localize_script('si_blog', 'siAjax', array('ajaxurl'=>admin_url('admin-ajax.php'),'nonce' => wp_create_nonce('ajax-nonce')));
		wp_register_script('si_gallery', get_template_directory_uri() . '/js/jquery.gallery.js', 'jquery','1.0', true);
		wp_localize_script('si_gallery', 'siAjax', array('ajaxurl'=>admin_url('admin-ajax.php'),'nonce' => wp_create_nonce('ajax-nonce')));
		wp_register_script('si_infinitegallery', get_template_directory_uri() . '/js/jquery.infinitegallery.js', 'jquery','1.0', true);
		wp_localize_script('si_infinitegallery', 'siAjax', array('ajaxurl'=>admin_url('admin-ajax.php'),'nonce' => wp_create_nonce('ajax-nonce')));	

		wp_register_script('supersized', get_template_directory_uri().'/js/supersized.3.2.7.min.js','jquery','3.2.7');	
		wp_register_script('supersizedshutter', get_template_directory_uri().'/js/supersized.shutter.js','jquery','3.2.7');	
		
		
		wp_enqueue_script('jquery');	
		wp_enqueue_script('fitvids');		
		wp_enqueue_script('fancybox');
		wp_enqueue_script('easing');		
		wp_enqueue_script('jquery-tools');
		wp_enqueue_script('mobilemenu');		
		wp_enqueue_script('flexslider');
		wp_enqueue_script('jplayer');
		wp_enqueue_script('debouncedresize');		
		wp_enqueue_script('si_custom');
		
		if(is_singular()) 	
			wp_enqueue_script( 'comment-reply' );
				
		if( is_page_template( 'template-portfolio.php' ) || is_page_template('template-portfolio-category.php') || is_tax( 'portfolio-category' ) ) {
			wp_enqueue_script('isotope');
			wp_enqueue_script('si_portfolio');	
		}
		
		if( is_page_template( 'template-gallery-listing.php' ) || is_page_template('template-gallery-listing-category.php') || is_tax( 'gallery-category' ) ) {
			wp_enqueue_script('isotope');
			wp_enqueue_script('si_gallery');	
		}
		
		if( is_home() || is_archive() || is_search()) {
			wp_enqueue_script('isotope');
			wp_enqueue_script('si_blog');
		}
		
		if (is_page_template('template-gallery.php')){
			wp_enqueue_script('isotope');
			wp_enqueue_script('si_infinitegallery');
		}
		
		if (is_page_template('template-archives.php')){
			wp_enqueue_script('isotope');
			wp_enqueue_script('si_archive');
		}
		
		if (is_page_template('template-contact.php')){
			wp_enqueue_script('gmap');
		}
		
		if (is_page_template('template-slider.php') ){
			wp_enqueue_script('supersized');
			wp_enqueue_script('supersizedshutter');
		}
		
		if (is_post_type('gallery')){
			$gallery_script = get_post_meta(get_the_ID(), 'si_gallery_script', true);
			if ( $gallery_script == 'fullscreen' ){
				wp_enqueue_script('supersized');
				wp_enqueue_script('supersizedshutter');
			}
			else {
				wp_enqueue_script('isotope');
				wp_enqueue_script('si_infinitegallery');
			}
		
		}
		
}
add_action('wp_enqueue_scripts', 'si_enqueue_scripts');



/*-----------------------------------------------------------------------------------*/
/*	Register and load admin script
/*-----------------------------------------------------------------------------------*/

function si_admin_scripts() {
	wp_register_script('si_admin_custom', get_template_directory_uri() . '/functions/js/jquery.admin.custom.js', 'jquery', '1.0');
	wp_enqueue_script('si_admin_custom');
}

add_action( 'admin_enqueue_scripts', 'si_admin_scripts' );

/*-----------------------------------------------------------------------------------*/
/*	Register and load admin style
/*-----------------------------------------------------------------------------------*/

function si_admin_styles() {
	wp_register_style('si_admin_custom', get_template_directory_uri() . '/functions/css/si-admin.css');
	wp_enqueue_style('si_admin_custom');
}

add_action( 'admin_print_styles', 'si_admin_styles' );

/*-----------------------------------------------------------------------------------*/
/*	Load stylesheets 
/*-----------------------------------------------------------------------------------*/

function si_register_css() {	
	if ( !is_admin() ) {
		wp_register_style( 'fancybox', get_template_directory_uri() . '/css/fancybox/jquery.fancybox-1.3.4.css' );
		wp_enqueue_style('fancybox');	
	}
}
add_action('wp_print_styles', 'si_register_css');


/*-----------------------------------------------------------------------------------*/
/* Custom comments callback
/*-----------------------------------------------------------------------------------*/

function si_comments($comment, $args, $depth) {	
	$GLOBALS['comment'] = $comment; 
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' : 
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'si_theme' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('[Edit]','si_theme'),' ','') ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     
			<div id="comment-<?php comment_ID(); ?>"  class="comment-wrap clearfix">
					<?php 
					$avatar_size = 60;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 40;

					echo get_avatar( $comment, $avatar_size );
					?>
			   
					<div class="comment-author vcard"><?php echo get_comment_author_link(); ?></div>
					<div class="comment-meta">			 
						<?php printf(__('%1$s at %2$s','si_theme'), get_comment_date(),  get_comment_time()) ?>
						<span class="entry-sep">&middot;</span>
						<?php comment_reply_link( array_merge( array( 'reply_text' => __('Reply','si_theme')), array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						<?php edit_comment_link(__('[Edit]','si_theme'),' ','') ?> 
					</div>			   
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="moderation"><?php _e('Your comment is awaiting moderation.','si_theme') ?></em>
					<?php endif; ?>
				  
					<div class="comment-body">
						<?php comment_text() ?>
					</div>           
			</div>
	<?php
			break;
	endswitch;
}


/*-----------------------------------------------------------------------------------*/
/*	Load Shortcodes  
/*-----------------------------------------------------------------------------------*/

include("functions/shortcodes.php"); // Add the Theme Shortcodes
include("functions/tinymce/tinymce.php"); // Add the Tinymce Button

/*-----------------------------------------------------------------------------------*/
/*	Load Widgets
/*-----------------------------------------------------------------------------------*/

include("functions/widget-flickr.php"); // Add the Flickr Custom Widget
include("functions/widget-twitter.php");// Add the Twitter Custom Widget


/*-----------------------------------------------------------------------------------*/
/*	Add Custom Types and Custom Meta Box
/*-----------------------------------------------------------------------------------*/
include("functions/meta-functions.php"); // Add meta functions
include("functions/post-types.php"); // Add post types
include("functions/post-type-gallery.php"); // Add gallery post type
include("functions/post-meta.php"); // Add post meta
include("functions/portfolio-meta.php"); // Add portfolio meta
include("functions/gallery-meta.php"); // Add gallery meta
include("functions/page-meta.php"); // Add page meta


/*-----------------------------------------------------------------------------------*/
/* Loads the Options Panel
/* If you're loading from a child theme use stylesheet_directory
/* instead of template_directory
/*-----------------------------------------------------------------------------------*/
 
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/' );
	require_once dirname( __FILE__ ) . '/admin/options-framework.php';
}

require_once (TEMPLATEPATH . '/functions/theme-functions.php');


?>