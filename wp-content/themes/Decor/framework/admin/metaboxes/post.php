<?php

global $options_post;

$options_post = array();


$options_post[] = array( "name" => "Select gallery",
						"class" => "pf pf_gallery",
                        "desc" => "the gallery that will be used for this post format",
						"id" => "pf_gallery",
						"type" => "select_slideshow"); 	
						
$options_post[] = array( "name" => "Quote text",
						"class" => "pf pf_quote",
                        "desc" => "type here the quotes text",
						"id" => "quotes_text",
						"type" => "textarea"); 	
						
					
$options_post[] = array( "name" => "Video Type",
						"class" => "pf pf_video",
                        "desc" => "select the type of the video",
						"id" => "pf_video_type",
						"options" => array("vimeo","youtube","html5"),
						"type" => "select"); 

	
$options_post[] = array( "name" => "Video ID",
						"class" => "pf pf_video",
						"desc" => "for youtube or vimeo videos",
						"id" => "pf_video_id",
						"type" => "text"); 		
						
$options_post[] = array( "name" => "MP4 source",
						"class" => "pf pf_video",
						"desc" => "for selfhosted html5 video",
						"id" => "pf_video_mp4",
						"type" => "text"); 	
						
$options_post[] = array( "name" => "Webm source",
						"class" => "pf pf_video",
						"desc" => "for selfhosted html5 video",
						"id" => "pf_video_webm",
						"type" => "text"); 	
						
$options_post[] = array( "name" => "Ogg source",
						"class" => "pf pf_video",
						"desc" => "for selfhosted html5 video",
						"id" => "pf_video_ogg",
						"type" => "text"); 

						
$options_post[] = array( "name" => "Select booklet",
						"class" => "pf pf_aside",
                        "desc" => "the booklet that will be used",
						"id" => "select_booklet",
						"type" => "select_booklet"); 	

$options_post[] = array( "name" => "Display Sidebar",
					"id" => "display_sidebar",
					"options" => array("no","yes"),
					"type" => "select_letters"); 						
						
$options_post[] = array( "name" => "Custom sidebar",
					"id" => "custom_sidebar",
					"class" => "display_sidebar display_sidebar_1",
					"type" => "select_sidebar"); 
					
$options_post[] = array( "name" => "Footer select",
					"id" => "custom_footer",
					"type" => "select_footer"); 
					
$options_post[] = array( "name" => "Hide main body",
					"id" => "hide_body",
					"options" => array("no","yes"),
					"type" => "select_letters"); 
					
$options_post[] = array( "name" => "Select another gallery to be displayed as a fullscreen slideshow on this page",
						"class" => "",
                        "desc" => "select another image gallery to be displayed on this page instead of the default",
						"id" => "back_slideshow",
						"type" => "select_slideshow"); 	


					


function create_meta_box_post() {
	global $theme_name;
	global $options_post;
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'aps', 'Post Settings', 'create_meta_options', 'post', 'advanced', 'high', array('var1' => $options_post) );
	}
}

function mytheme_save_data_post($post_id) {
    global $options_post;
	global $post;
	
	if(get_post_type( $post )=='post'){
    
		// verify nonce
		if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], 'global_functions.php')) {
			return $post_id;
		}
	
		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}
	
		// check permissions
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
		
		foreach ($options_post as $option) {
			$old = get_post_meta($post_id, $option['id']."_value", true);
			$new = $_POST[$option['id']];
			
			if ($new != '' && $new != $old) {
				update_post_meta($post_id, $option['id']."_value", $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $option['id']."_value", $old);
			}
		}
	}
}


add_action('admin_menu', 'create_meta_box_post');
add_action('save_post', 'mytheme_save_data_post');





?>