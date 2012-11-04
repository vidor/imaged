<?php
/*******************************************************************************************

	Add metaboxes to Post

********************************************************************************************/


/*-----------------------------------------------------------------------------------------*/
/*	Define Metabox Fields 
/*-----------------------------------------------------------------------------------------*/

$prefix = 'si_';

$meta_box_post_image = array(
	'id' => 'si-meta-box-post-image',
	'title' =>  __('Image Settings', 'si_theme'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 	"name" => __('Enable Lightbox','si_theme'),
				"desc" => __('Choose whether you wish to enable the lightbox on the single post','si_theme'),
				"id" => $prefix."image_lightbox",
				"type" => "select",
				'std' => __('yes','si_theme'),
				'options' => array(__('yes','si_theme'), __('no','si_theme'))
			)
	)
);



$meta_box_post_gallery = array(
	'id' => 'si-meta-box-post-gallery',
	'title' =>  __('Gallery Settings', 'si_theme'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 	"name" => __('Enable Lightbox','si_theme'),
				"desc" => __('Choose whether you wish to enable the lightbox on the single post','si_theme'),
				"id" => $prefix."gallery_lightbox",
				"type" => "select",
				'std' => __('yes','si_theme'),
				'options' => array(__('yes','si_theme'), __('no','si_theme'))
		),
		array(  "name" => __('Uploads/Manage Images','si_theme'),
				"desc" => __("Here's the list of the images",'si_theme'),
				"type" => "attachments",
				'std' => ''
			)		
	)
);

$meta_box_post_video = array(
	'id' => 'si-meta-box-post-video',
	'title' =>  __('Video Settings', 'si_theme'),
	'page' => 'post',
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
		array( 	"desc" => __('Video sharing website:','si_theme'),
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
				'desc' => __('If you are using other video sharing website, paste the embed code here', 'si_theme'),
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
		),
	)	
);

$meta_box_post_audio = array(
	'id' => 'si-meta-box-post-audio',
	'title' =>  __('Audio Settings', 'si_theme'),
	'page' => 'post',
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

$meta_box_post_quote = array(
	'id' => 'si-meta-box-post-quote',
	'title' =>  __('Quote Settings', 'si_theme'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 	"name" => __('The Quote','si_theme'),
				"desc" => __('Insert your quote','si_theme'),
				"id" => $prefix."quote",
				"type" => "textarea",
				"std" => ""
		),
		array( 	"name" => __('The Quote Source','si_theme'),
				"desc" => __('Insert the source of your quote','si_theme'),
				"id" => $prefix."quote_source",
				"type" => "text",
				"std" => ""
		)
	)
);

$meta_box_post_link = array(
	'id' => 'si-meta-box-post-link',
	'title' =>  __('Link Settings', 'si_theme'),
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(	"name" => __('The URL','si_theme'),
				"desc" => __('Insert the URL you wish to link to','si_theme'),
				"id" => $prefix."link_url",
				"type" => "text",
				"std" => ""
		)
	)
);
 



/*-----------------------------------------------------------------------------------------*/
/*	Add metabox 
/*-----------------------------------------------------------------------------------------*/

add_action('admin_menu', 'si_add_box_post');

function si_add_box_post() {
	global  $meta_box_post_video,$meta_box_post_audio,$meta_box_post_link,$meta_box_post_quote,$meta_box_post_image,$meta_box_post_gallery;
	add_meta_box($meta_box_post_image['id'], $meta_box_post_image['title'], 'si_show_box_post_image', $meta_box_post_image['page'], $meta_box_post_image['context'], $meta_box_post_image['priority']);
	add_meta_box($meta_box_post_gallery['id'], $meta_box_post_gallery['title'], 'si_show_box_post_gallery', $meta_box_post_gallery['page'], $meta_box_post_gallery['context'], $meta_box_post_gallery['priority']);
	add_meta_box($meta_box_post_video['id'], $meta_box_post_video['title'], 'si_show_box_post_video', $meta_box_post_video['page'], $meta_box_post_video['context'], $meta_box_post_video['priority']);
	add_meta_box($meta_box_post_audio['id'], $meta_box_post_audio['title'], 'si_show_box_post_audio', $meta_box_post_audio['page'], $meta_box_post_audio['context'], $meta_box_post_audio['priority']);
	add_meta_box($meta_box_post_link['id'], $meta_box_post_link['title'], 'si_show_box_post_link', $meta_box_post_link['page'], $meta_box_post_link['context'], $meta_box_post_link['priority']);
	add_meta_box($meta_box_post_quote['id'], $meta_box_post_quote['title'], 'si_show_box_post_quote', $meta_box_post_quote['page'], $meta_box_post_quote['context'], $meta_box_post_quote['priority']);
	
}


/*-----------------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------------*/

function si_show_box_post_image() {
	global $meta_box_post_image, $post;
	
	echo '<p style="padding:10px 0 0 0;">'.__('Set a Featured Image, then choose if you want to enable the lightbox.', 'si_theme').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />'; 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_post_image['fields'] as $field) {
		
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		switch ($field['type']) {
			
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


function si_show_box_post_gallery() {
	global $meta_box_post_gallery, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />'; 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_post_gallery['fields'] as $field) {
		
		// get current post meta data
		if (isset ($field['id']))
			$meta = get_post_meta($post->ID, $field['id'], true);
		
		switch ($field['type']) {
			
			//If Select	
			case 'select':			
				echo '<tr>',
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
				
				$intro = '<p><a href="media-upload.php?post_id=' . $post->ID .'&amp;type=image&amp;TB_iframe=1&amp;width=640&amp;height=715" id="add_image" class="thickbox" title="' . __( 'Upload Images', 'si_theme' ) . '">' . __( 'Upload Images', 'si_theme' ) . '</a> | <a href="media-upload.php?post_id=' . $post->ID .'&amp;type=image&amp;tab=gallery&amp;TB_iframe=1&amp;width=640&amp;height=715" id="manage_gallery" class="thickbox" title="' . __( 'Manage Images', 'si_theme' ) . '">' . __( 'Manage Images', 'si_theme' ) . '</a></p>';
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

function si_show_box_post_video() {
	global $meta_box_post_video, $post;
	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to add video to your post. You have the choice between Self Hosted Video, Youtube or Vimeo, or any other Video Sharing Websites.', 'si_theme').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_post_video['fields'] as $field) {
	
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

function si_show_box_post_audio() {
	global $meta_box_post_audio, $post;
	
	echo '<p style="padding:10px 0 0 0;">'.__('These settings enable you to add audio to your post.', 'si_theme').'</p>';

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_post_audio['fields'] as $field) {
	
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
			
			//If textarea		
			case 'textarea':
			
				echo '<tr style="border-top:1px solid #eeeeee;">',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" rows="8" cols="5" style="width:90%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
				echo '</td>',
				'</tr>';
			break;
			

		}

	}
 
	echo '</table>';
}


function si_show_box_post_quote() {
	global $meta_box_post_quote, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_post_quote['fields'] as $field) {
	
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
 			
			//If textarea		
			case 'textarea':
			
				echo '<tr>',
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
					'<td>';
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'],'" rows="8" cols="5" style="width:90%; margin-right: 20px; float:left;">', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '</textarea>';
				echo '</td>',
				'</tr>';
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

		}

	}
 
	echo '</table>';
}

function si_show_box_post_link() {
	global $meta_box_post_link, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_post_link['fields'] as $field) {
	
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





/*-------------------------------------------------------------------------------------*/
/*	Save data from meta box
/*-------------------------------------------------------------------------------------*/
add_action('save_post', 'si_save_data_post');
 
function si_save_data_post($post_id) {
	global $meta_box_post_image,$meta_box_post_gallery,$meta_box_post_video,$meta_box_post_audio,$meta_box_post_quote,$meta_box_post_link;
 
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
	 
		foreach ($meta_box_post_image['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		foreach ($meta_box_post_gallery['fields'] as $field) {
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
		
		foreach ($meta_box_post_video['fields'] as $field) {
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
		
		foreach ($meta_box_post_audio['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		foreach ($meta_box_post_link['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		foreach ($meta_box_post_quote['fields'] as $field) {
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
 
function si_admin_scripts_post() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('si-upload', get_template_directory_uri() . '/functions/js/upload-media.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('si-upload');
}
function si_admin_styles_post() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'si_admin_scripts_post');
add_action('admin_print_styles', 'si_admin_styles_post');

?>