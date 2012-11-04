<?php
/*******************************************************************************************

	Add metaboxes to Portfolio 

********************************************************************************************/



/*-----------------------------------------------------------------------------------------*/
/*	Define Metabox Fields 
/*-----------------------------------------------------------------------------------------*/

$prefix = 'si_';

$meta_box_portfolio = array(
	'id' => 'si-meta-box-portfolio',
	'title' =>  __('Portfolio Settings', 'si_theme'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
    	   'name' => __('Portfolio Client', 'si_theme'),
    	   'desc' => __("Enter the client's name", 'si_theme'),
    	   'id' => $prefix.'portfolio_client',
    	   'type' => 'text',
    	   'std' => ''
    	),
    	array(
    	   'name' => __('Portfolio Date', 'si_theme'),
    	   'desc' => __('Enter the date of the project achievement', 'si_theme'),
    	   'id' => $prefix.'portfolio_date',
    	   'type' => 'text',
    	   'std' => ''
    	),    	
    	array(
    	   'name' => __('Portfolio URL', 'si_theme'),
    	   'desc' => __('Enter the url of the project', 'si_theme'),
    	   'id' => $prefix.'portfolio_url',
    	   'type' => 'text',
    	   'std' => ''
    	),
		array(
			'name' =>  __('Portfolio Type', 'si_theme'),
			'desc' => __("Select the portfolio's type", 'si_theme'),
			'id' => $prefix.'portfolio_type',
			"type" => "select",
			'std' => __('Images','si_theme'),
			'options' => array('Images', 'Video', 'Audio')
		)
	)
);
 
$meta_box_portfolio_images = array(
	'id' => 'si-meta-box-portfolio-images',
	'title' =>  __('Images Settings', 'si_theme'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(  "name" => __('Uploads/Manage Images','si_theme'),
				"desc" => __("Here's the list of the images",'si_theme'),
				"type" => "attachments",
				'std' => ''
			)		
	)	
);


$meta_box_portfolio_video = array(
	'id' => 'si-meta-box-portfolio-video',
	'title' => __('Video Settings', 'si_theme'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 	"desc" => __('Self Hosted Video:','si_theme'),
				"type" => "info"
			),	
		array( 	"name" => __('M4V File URL','si_theme'),
				"desc" => __('Enter the URL of the .m4v video file','si_theme'),
				"id" => $prefix . "video_m4v",
				"type" => "text",
				'std' => ''
			),
		array( 	"name" => __('OGV File URL','si_theme'),
				"desc" => __('Enter the URL of the .ogv video file','si_theme'),
				"id" => $prefix . "video_ogv",
				"type" => "text",
				'std' => ''
			),
		array( 	"name" => __('Poster Image','si_theme'),
				"desc" => __('Upload the preview image for the video','si_theme'),
				"id" => $prefix . "video_poster",
				"type" => "upload",
				'std' => ''
			),
		array(	"desc" => __('Video sharing website:','si_theme'),
				"type" => "info"
		),
		array(
			'name' => __('Youtube or Vimeo URL','si_theme'),
			'desc' => __('Enter the Youtube or Vimeo URL here. <br/> http://www.youtube.com/watch?v=VIDEO_ID <br/>or<br/> http://vimeo.com/VIDEO_ID', 'si_theme'),
			'id' => $prefix.'youtube_vimeo_url',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Embed Code', 'si_theme'),
			'desc' => __('If you are using other video sharing website, paste the embed code here.', 'si_theme'),
			'id' => $prefix . 'video_embed_code',
			'type' => 'textarea',
			'std' => ''
		),
		array(	"desc" => __('Aspect Ratio (default 16:9):','si_theme'),
				"type" => "info"
		),
		array(
			'name' => __('Video Width', 'si_theme'),
			'desc' => __("Enter the video's width", 'si_theme'),
			'id' => $prefix . 'video_ratio_width',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Video Height', 'si_theme'),
			'desc' => __("Enter the video's height", 'si_theme'),
			'id' => $prefix . 'video_ratio_height',
			'type' => 'text',
			'std' => ''
		)
		
	)
);


$meta_box_portfolio_audio = array(
	'id' => 'si-meta-box-portfolio-audio',
	'title' =>  __('Audio Settings', 'si_theme'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 
		    "name" => __('MP3 File URL','si_theme'),
				"desc" => __('Enter the URL of the .mp3 audio file','si_theme'),
				"id" => $prefix."audio_mp3",
				"type" => "text",
				'std' => ''
		),
		array( 
		    "name" => __('OGA File URL','si_theme'),
				"desc" => __('Enter the URL of the .oga or .ogg audio file','si_theme'),
				"id" => $prefix."audio_ogg",
				"type" => "text",
				'std' => ''
		),
		array( "name" => __('Poster Image','si_theme'),
				"desc" => __('Upload the poster image for the track','si_theme'),
				"id" => $prefix . "audio_poster",
				"type" => "upload",
				'std' => ''
			),
		array(
				'name' => __('Embed Code', 'si_theme'),
				'desc' => __('If you are using an audio sharing service like SoundCloud, paste the embed code here', 'si_theme'),
				'id' => $prefix . 'audio_embed_code',
				'type' => 'textarea',
				'std' => ''
		)	
	)
);

$meta_box_portfolio_custom_url = array(
	'id' => 'si-meta-box-portfolio-custom-url',
	'title' =>  __('Portfolio Custom URL', 'si_theme'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
    	   'name' => __('Custom URL', 'si_theme'),
    	   'desc' => __('If you want to link the portfolio item to a custom url, enter the url here', 'si_theme'),
    	   'id' => $prefix.'portfolio_custom_url',
    	   'type' => 'text',
    	   'std' => ''
    	)
	)
);





/*-----------------------------------------------------------------------------------------*/
/*	Add metabox 
/*-----------------------------------------------------------------------------------------*/
 add_action('admin_menu', 'si_add_boxes_portfolio');
 
function si_add_boxes_portfolio() {
	global $meta_box_portfolio, $meta_box_portfolio_images, $meta_box_portfolio_video, $meta_box_portfolio_audio, $meta_box_portfolio_custom_url;
	add_meta_box($meta_box_portfolio['id'], $meta_box_portfolio['title'], 'si_show_box_portfolio', $meta_box_portfolio['page'], $meta_box_portfolio['context'], $meta_box_portfolio['priority']);
	add_meta_box($meta_box_portfolio_images['id'], $meta_box_portfolio_images['title'], 'si_show_box_portfolio_images', $meta_box_portfolio_images['page'], $meta_box_portfolio_images['context'], $meta_box_portfolio_images['priority']);
	add_meta_box($meta_box_portfolio_video['id'], $meta_box_portfolio_video['title'], 'si_show_box_portfolio_video', $meta_box_portfolio_video['page'], $meta_box_portfolio_video['context'], $meta_box_portfolio_video['priority']);
	add_meta_box($meta_box_portfolio_audio['id'], $meta_box_portfolio_audio['title'], 'si_show_box_portfolio_audio', $meta_box_portfolio_audio['page'], $meta_box_portfolio_audio['context'], $meta_box_portfolio_audio['priority']);
	add_meta_box($meta_box_portfolio_custom_url['id'], $meta_box_portfolio_custom_url['title'], 'si_show_box_portfolio_custom_url', $meta_box_portfolio_custom_url['page'], $meta_box_portfolio_custom_url['context'], $meta_box_portfolio_custom_url['priority']);
}


/*-----------------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------------*/

function si_show_box_portfolio() {
	global $meta_box_portfolio, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('Fill in the project details and select the type of portfolio. Set a featured image (400px x 225px) that will be used as the portfolio thumbnail.', 'si_theme').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_portfolio['fields'] as $field) {
	
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) { 
			
			//If Text		
			case 'text':			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height:18px; ">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:90%; margin-right: 20px; float:left;" />';
				echo '</td>',
				'</tr>';
			break;
 
			//If Select	
			case 'select':			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<select id="' . $field['id'] . '" name="'.$field['id'].'">';			
				foreach ($field['options'] as $option) {	
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';	
				} 
				echo'</select>';
				echo '</td>',
				'</tr>';			
			break;
		}

	}
 
	echo '</table>';
}




function si_show_box_portfolio_images() {
	global $meta_box_portfolio_images, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to manage the images displayed in the portfolio. Upload your images and use "Manage Images" to edit, reorder and delete images.', 'si_theme').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_portfolio_images['fields'] as $field) {
	
		// get current post meta data
		if (isset ($field['id']))
			$meta = get_post_meta($post->ID, $field['id'], true);
			
		switch ($field['type']) { 
			
				//If Attachments
			case 'attachments':
				echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
				
				$args = array(
					'post_type' => 'attachment',
					'post_status' => 'inherit',
					'post_parent' => $post->ID,
					'post_mime_type' => 'image',
					'posts_per_page' => '-1',
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'exclude'     => get_post_thumbnail_id()
				);
				
				$intro = '<p><a href="media-upload.php?post_id=' . $post->ID .'&amp;type=image&amp;TB_iframe=1&amp;width=640&amp;height=715" id="add_images" class="thickbox" title="' . __( 'Upload Images', 'si_theme' ) . '">' . __( 'Upload Images', 'si_theme' ) . '</a> | <a href="media-upload.php?post_id=' . $post->ID .'&amp;type=image&amp;tab=gallery&amp;TB_iframe=1&amp;width=640&amp;height=715" id="manage_images" class="thickbox" title="' . __( 'Manage Images', 'si_theme' ) . '">' . __( 'Manage Images', 'si_theme' ) . '</a></p>';
				echo $intro;
				
				$return = '';
				$attachments = get_posts( $args );
				
					$return .= '<div class="si_attachments">';
						if( empty( $attachments ) )
							$return .= '<p>'. __('No images.','si_theme'). '</p>';
						else {
							foreach( $attachments as $image ):
								$thumbnail = wp_get_attachment_image_src( $image->ID, 'thumbnail');
								$return .= '<img style="margin-right:5px;" width="100" height="100" src="' . $thumbnail[0] . '" alt="' . apply_filters('the_title', $image->post_title). '"/>';
							endforeach;
						}
					$return .= '</div>';
				echo $return;
				
				echo 	'</td>',
				'</tr>';				
			break;
			
		}

	}
 
	echo '</table>';
}


function si_show_box_portfolio_video() {
	global $meta_box_portfolio_video, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to add video to your portfolio. You have the choice between Self Hosted Video, Youtube, Vimeo or any other Video Sharing Websites.', 'si_theme').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_portfolio_video['fields'] as $field) {
	
		// get current post meta data
		if (isset ($field['id']))
			$meta = get_post_meta($post->ID, $field['id'], true);
			
		switch ($field['type']) {
			
			//If Info
			case 'info':
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%;"><span style="display:inline-block;margin:5px 0;font-weight:bold;text-transform:uppercase;border-bottom:1px solid #666;">'. $field['desc'].'<strong></th>',
					'<td></td></tr>';
			break;
			
			//If Text		
			case 'text':			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height:18px; ">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:90%; margin-right: 20px; float:left;" />';
				echo '</td>',
				'</tr>';
			break;
			
			//If textarea		
			case 'textarea':
			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" rows="8" cols="5" style="width:90%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
				echo '</td>',
				'</tr>';
			break;
			
			//If Upload		
			case 'upload':			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			echo '<input style="float: left;" type="button" class="button" name="'. $field['id']. '" id="'. $field['id']. '_button" value="' .  __( 'Browse', 'si_theme' )  .'" />';
			echo 	'</td>',
			'</tr>';			
			break;		
			
 
		}

	}
 
	echo '</table>';
}
 
 
function si_show_box_portfolio_audio() {
	global $meta_box_portfolio_audio, $post;
 	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to add audio to your portfolio.', 'si_theme').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_portfolio_audio['fields'] as $field) {
	
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 
			
			//If Text		
			case 'text':			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height:18px; ">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:90%; margin-right: 20px; float:left;" />';
				echo '</td>',
				'</tr>';
			break;
			
			//If textarea		
			case 'textarea':
			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" rows="8" cols="5" style="width:90%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
				echo '</td>',
				'</tr>';
			break;
			
			//If Upload		
			case 'upload':			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			echo '<input style="float: left;" type="button" class="button" name="'. $field['id']. '" id="'. $field['id']. '_button" value="' .  __( 'Browse', 'si_theme' )  .'" />';
			echo 	'</td>',
			'</tr>';			
			break;	
		}

	}
 
	echo '</table>';
} 

 
function si_show_box_portfolio_custom_url() {
	global $meta_box_portfolio_custom_url, $post;
 	
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_portfolio_custom_url['fields'] as $field) {
	
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) { 
			
			//If Text		
			case 'text':			
				echo '<tr>',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height:18px; ">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" size="30" style="width:90%; margin-right: 20px; float:left;" />';
				echo '</td>',
				'</tr>';
			break;
			
		}

	}
 
	echo '</table>';
}
  
 

/*--------------------------------------------------------------------------------------*/
/*	Save data from meta box
/*--------------------------------------------------------------------------------------*/

add_action('save_post', 'si_save_data_portfolio');
 
function si_save_data_portfolio($post_id) {
	global $meta_box_portfolio, $meta_box_portfolio_video, $meta_box_portfolio_audio, $meta_box_portfolio_custom_url;
 
	if ( isset($_POST['si_meta_box_nonce'])) {
		// verify nonce
		if (!wp_verify_nonce($_POST['si_meta_box_nonce'], basename(__FILE__))) {
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
		
				
		foreach ($meta_box_portfolio['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	 
		foreach ($meta_box_portfolio_video['fields'] as $field) {
			if(isset($field['id'])){
				$old = get_post_meta($post_id, $field['id'], true);
				$new = $_POST[$field['id']];
		 
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
				} elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old);
				}
			}
		}
		
		foreach ($meta_box_portfolio_audio['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		foreach ($meta_box_portfolio_custom_url['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		
	}
}


/*-----------------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------------*/
 
function si_admin_scripts_portfolio() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('si-upload', get_template_directory_uri() . '/functions/js/upload-media.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('si-upload');
}
function si_admin_styles_portfolio() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'si_admin_scripts_portfolio');
add_action('admin_print_styles', 'si_admin_styles_portfolio');
?>