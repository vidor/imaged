<?php

global $options_page;

$options_page = array();




$options_page[] = array( "name" => "Select gallery",
						"class" => "pf pf_gallery",
                        "desc" => "the gallery that will be used for this post format",
						"id" => "pf_gallery",
						"type" => "select_slideshow"); 	
						
$options_page[] = array( "name" => "Quote text",
						"class" => "pf pf_quote",
                        "desc" => "type here the quotes text",
						"id" => "quotes_text",
						"type" => "textarea"); 	
						
					
$options_page[] = array( "name" => "Video Type",
						"class" => "pf pf_video",
                        "desc" => "select the type of the video",
						"id" => "pf_video_type",
						"options" => array("vimeo","youtube","html5"),
						"type" => "select"); 

	
$options_page[]= array( "name" => "Video ID",
						"class" => "pf pf_video",
						"desc" => "for youtube or vimeo videos",
						"id" => "pf_video_id",
						"type" => "text"); 		
						
$options_page[] = array( "name" => "MP4 source",
						"class" => "pf pf_video",
						"desc" => "for selfhosted html5 video",
						"id" => "pf_video_mp4",
						"type" => "text"); 	
						
$options_page[] = array( "name" => "Webm source",
						"class" => "pf pf_video",
						"desc" => "for selfhosted html5 video",
						"id" => "pf_video_webm",
						"type" => "text"); 	
						
$options_page[] = array( "name" => "Ogg source",
						"class" => "pf pf_video",
						"desc" => "for selfhosted html5 video",
						"id" => "pf_video_ogg",
						"type" => "text"); 

						
$options_page[] = array( "name" => "Select booklet",
						"class" => "pf pf_aside",
                        "desc" => "the booklet that will be used",
						"id" => "select_booklet",
						"type" => "select_booklet"); 	

$options_page[] = array( "name" => "Page Type",
					"id" => "theme_page_type",
					"class" => "theme_page_type_i",
					"std" => "normal page",
					"options" => array("normal page","blog page","portfolio page"),
					"type" => "select"); 
					
$options_page[] = array( "name" => "Post categories",
					"id" => "post_categories",
					"class" => "theme_page_type theme_page_type_2",
					"type" => "multiselect_post_categories"); 
					
$options_page[] = array( "name" => "Portfolio categories",
					"id" => "portfolio_categories",
					"class" => "theme_page_type theme_page_type_3",
					"type" => "multiselect_portfolio_categories"); 
					
$options_page[] = array( "name" => "Blog Type",
					"id" => "blog_type",
					"class" => "theme_page_type theme_page_type_2",
					"options" => array("paginated","loaded via ajax"),
					"type" => "select_letters"); 	
								
$options_page[] = array( "name" => "Items per page",
						"class" => "theme_page_type theme_page_type_2 theme_page_type_3",
                        "desc" => "the number of items per page",
						"id" => "items_per_page",
						"std" => "10",
						"min" => "1",
						"max" => "100",
						"step" => "1",
						"unit" => 'items',
						"type" => "range"); 
						
						
$options_page[] = array( "name" => "Display Sidebar",
					"id" => "display_sidebar",
					"class" => "theme_page_type theme_page_type_1",
					"options" => array("no","yes"),
					"type" => "select_letters"); 						
							
$options_page[] = array( "name" => "Custom sidebar",
					"id" => "custom_sidebar",
					"class" => "display_sidebar display_sidebar_1 theme_page_type theme_page_type_1",
					"type" => "select_sidebar"); 
					
$options_page[] = array( "name" => "Footer select",
					"id" => "custom_footer",
					"class" => "theme_page_type theme_page_type_1",
					"type" => "select_footer"); 
					
$options_page[] = array( "name" => "Hide main body",
					"id" => "hide_body",
					"options" => array("no","yes"),
					"type" => "select_letters"); 
					
$options_page[] = array( "name" => "Select another gallery to be displayed as a fullscreen slideshow on this page",
						"class" => "",
                        "desc" => "select another image gallery to be displayed on this page instead of the default",
						"id" => "back_slideshow",
						"type" => "select_slideshow"); 	
					

				

function create_meta_box_page() {
	global $theme_name;
	global $options_page;
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'aps', 'Page Settings', 'create_meta_options', 'page', 'advanced', 'high', array('var1' => $options_page) );
	}
}





function mytheme_save_data_page($post_id) {
    global $options_page;
	global $post;
	
	if(get_post_type( $post )=='page'){
    
	
	
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
		
		
		foreach ($options_page as $option) {
			$old = get_post_meta($post_id, $option['id']."_value", true);
			$new = $_POST[$option['id']];
			
			if ($new !='' && $new != $old) {
				update_post_meta($post_id, $option['id']."_value", $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $option['id']."_value", $old);
			}
		}
	}
}



add_action('admin_menu', 'create_meta_box_page');
add_action('save_post', 'mytheme_save_data_page');






?>