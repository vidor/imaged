<?php
/*******************************************************************************************
	
	Add metaboxes to Gallery
	
********************************************************************************************/


/*-----------------------------------------------------------------------------------------*/
/*	Define Metabox Fields 
/*-----------------------------------------------------------------------------------------*/

$prefix = 'si_';

$meta_box_gallery = array(
	'id' => 'si-meta-box-gallery',
	'title' =>  __('Gallery Settings', 'si_theme'),
	'page' => 'gallery',
	'context' => 'normal', 
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Gallery Type','si_theme'),
				"desc" => __("Choose which type of gallery you want to display",'si_theme'),
				"id" => $prefix."gallery_script",				
				"type" => "select",
				'std' => 'infinite-scroll',
				'options' => array('infinite-scroll','fullscreen')
			),
		array(  "name" => __('Uploads/Manage Images','si_theme'),
				"desc" => __("Here's the list of the images",'si_theme'),
				"id" => $prefix."photos_manage",				
				"type" => "attachments",
				'std' => ''
			)
	)
);

$meta_box_gallery_fullscreen = array(
	'id' => 'si-meta-box-gallery-fullscreen',
	'title' =>  __('Fullscreen Gallery Settings', 'si_theme'),
	'page' => 'gallery',
	'context' => 'normal', 
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Autoplay Slideshow','si_theme'),
				"desc" => __("Choose whether you wish to autoplay the slideshow",'si_theme'),
				"id" => $prefix."slider_autoplay",				
				"type" => "select",
				'std' => __('no','si_theme'),
				'options' => array(__('yes','si_theme'), __('no','si_theme'))
		),
		array( "name" => __('Slide Title','si_theme'),
				"desc" => __("Choose whether to show the title on each slide",'si_theme'),
				"id" => $prefix."slider_title",				
				"type" => "select",
				'std' => __('yes','si_theme'),
				'options' => array(__('yes','si_theme'), __('no','si_theme'))
			)
	)
);

$meta_box_gallery_infinite = array(
	'id' => 'si-meta-box-gallery-infinite',
	'title' =>  __('Infinite Scroll Gallery Settings', 'si_theme'),
	'page' => 'gallery',
	'context' => 'normal', 
	'priority' => 'high',
	'fields' => array(
		array( "name" => __('Number of Images','si_theme'),
				"desc" => __('Enter the number of images to display per loading','si_theme'),
				"id" => $prefix."photos_number",
				'type' => 'text',
				'std' => ''
		),
		array( "name" => __('Photos Title','si_theme'),
				"desc" => __("Choose whether to show a title when the lightbox opens",'si_theme'),
				"id" => $prefix."photos_title",				
				"type" => "select",
				'std' => __('yes','si_theme'),
				'options' => array(__('yes','si_theme'), __('no','si_theme'))
			)		
	)
		
);

$meta_box_gallery_custom_url = array(
	'id' => 'si-meta-box-gallery-custom-url',
	'title' =>  __('Gallery Custom URL', 'si_theme'),
	'page' => 'gallery',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
    	   'name' => __('Custom URL', 'si_theme'),
    	   'desc' => __('If you want to link the gallery item to a custom url, enter the url here', 'si_theme'),
    	   'id' => $prefix.'gallery_custom_url',
    	   'type' => 'text',
    	   'std' => ''
    	)
	)
);



/*-----------------------------------------------------------------------------------------*/
/*	Add metabox 
/*-----------------------------------------------------------------------------------------*/
add_action('admin_menu', 'si_add_box_gallery');

function si_add_box_gallery() {
	global $meta_box_gallery, $meta_box_gallery_fullscreen, $meta_box_gallery_infinite, $meta_box_gallery_custom_url;
	add_meta_box($meta_box_gallery['id'], $meta_box_gallery['title'], 'si_show_box_gallery', $meta_box_gallery['page'], $meta_box_gallery['context'], $meta_box_gallery['priority']);
	add_meta_box($meta_box_gallery_fullscreen['id'], $meta_box_gallery_fullscreen['title'], 'si_show_box_gallery_fullscreen', $meta_box_gallery_fullscreen['page'], $meta_box_gallery_fullscreen['context'], $meta_box_gallery_fullscreen['priority']);
	add_meta_box($meta_box_gallery_infinite['id'], $meta_box_gallery_infinite['title'], 'si_show_box_gallery_infinite', $meta_box_gallery_infinite['page'], $meta_box_gallery_infinite['context'], $meta_box_gallery_infinite['priority']);
	add_meta_box($meta_box_gallery_custom_url['id'], $meta_box_gallery_custom_url['title'], 'si_show_box_gallery_custom_url', $meta_box_gallery_custom_url['page'], $meta_box_gallery_custom_url['context'], $meta_box_gallery_custom_url['priority']);
}


/*-----------------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------------*/

function si_show_box_gallery() {
	global $meta_box_gallery, $post;
	
	echo '<p style="padding:10px 0 0 0;">'.__('Select the type of gallery you want to display. Set a featured image (400px x 225px) that will be used as the gallery thumbnail.', 'si_theme').'</p>';
	
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_gallery['fields'] as $field) {
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
				
				
			//If Attachments
			case 'attachments':
				echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height: 18px;">'. $field['desc'].'</span></label></th>',
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


function si_show_box_gallery_fullscreen() {
	global $meta_box_gallery_fullscreen, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_gallery_fullscreen['fields'] as $field) {
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

function si_show_box_gallery_infinite() {
	global $meta_box_gallery_infinite, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_gallery_infinite['fields'] as $field) {
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

function si_show_box_gallery_custom_url() {
	global $meta_box_gallery_custom_url, $post;
 	
	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_gallery_custom_url['fields'] as $field) {
	
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

add_action('save_post', 'si_save_data_gallery');

function si_save_data_gallery($post_id) {
	global $meta_box_gallery, $meta_box_gallery_fullscreen, $meta_box_gallery_infinite, $meta_box_gallery_custom_url;
 
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
	 
		foreach ($meta_box_gallery['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		foreach ($meta_box_gallery_fullscreen['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		foreach ($meta_box_gallery_infinite['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		foreach ($meta_box_gallery_custom_url['fields'] as $field) {
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


?>