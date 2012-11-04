<?php

/* These are functions specific to the included option settings and this theme */


/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/

function si_favicon() {
	if (of_get_option('custom_favicon') != '') {
		echo '<link rel="shortcut icon" href="'.  of_get_option('custom_favicon')  .'"/>'."\n";
	}
	else { ?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/admin/images/favicon.ico" />
	<?php }
}

add_action('wp_head', 'si_favicon');

/*-----------------------------------------------------------------------------------*/
/* Output custom css 
/*-----------------------------------------------------------------------------------*/
add_action('wp_head', 'si_head_css');

function si_head_css() {
	$link_color = of_get_option('link_color');	
	$custom_css = of_get_option('custom_css');	
	$bg_image = '';
	if (is_page_template('template-bg.php')){
		$bg_image = get_post_meta( get_the_ID(), 'si_page_background', true ) ;
	}
?>

	
<style type="text/css">
<?php if ($link_color !='') : ?>a:hover,.entry-title a:hover,.entry-meta-single .post-meta a:hover,#contact-infos a:hover,#slideout-container a:hover,#slideout-container ul.twitter_update_list span a:hover{color:<?php echo $link_color; ?>;}
.wpcf7-form input.wpcf7-submit:hover,#commentform #submit:hover{background-color:<?php echo $link_color; ?>;}
<?php endif; ?>
<?php if ($bg_image !='') : ?>html{height:100%;}body.page-template-template-bg-php{background-image: url(<?php echo $bg_image;?>);} <?php endif; ?>
<?php if (is_page_template('template-slider.php')){ ?>
	html,body,#container,#content{height:100%;}
	#content{overflow:hidden;}
<?php } ?>
<?php if (is_post_type('gallery')){
	$gallery_script = get_post_meta(get_the_ID(), 'si_gallery_script', true);
	if ( $gallery_script == 'fullscreen' ){?>
	html,body,#container,#content{height:100%;}
	#content{overflow:hidden;}
	<?php }
	else{ ?>
		body{overflow-y: scroll;}
	<?php }
}?>
<?php if (!empty($custom_css)) { echo $custom_css; } ?>
</style>
<?php  }


/*-----------------------------------------------------------------------------------*/
/* Output custom javascript
/*-----------------------------------------------------------------------------------*/
function of_head_js(){ 
	$right_click = of_get_option('right_click');
	$right_click_text = of_get_option('right_click_text');
	
	if($right_click == '1'){ ?>
		<script type="text/javascript" language="javascript">
			jQuery(this).bind("contextmenu", function(e) {
				e.preventDefault();
			});		
		</script>
	<?php }
}
add_action('wp_head', 'of_head_js');



/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/

function si_analytics(){
	$output = of_get_option('google_analytics');
	if ( $output <> "" ) 
		echo stripslashes($output) . "\n";
}
add_action('wp_footer','si_analytics');


?>
