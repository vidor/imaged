<?php
/*******************************************************************************************
	
	Add metaboxes to Page		
	
********************************************************************************************/


/*-----------------------------------------------------------------------------------------*/
/*	Define Metabox Fields 
/*-----------------------------------------------------------------------------------------*/

$prefix = 'si_';

$meta_box_page_portfolio = array(
	'id' => 'si-meta-box-page-portfolio',
	'title' =>  __('Portfolio Settings', 'si_theme'),
	'page' => 'page',
	'context' => 'normal', 
	'priority' => 'default',
	'fields' => array(
		array( "name" => __('Portfolio Categories','si_theme'),
				"desc" => __("Select which categories you want to include on this portfolio page",'si_theme'),
				"id" => $prefix."portfolio_categories",				
				"type" => "multicheck"
		),
		array( "name" => __('Portfolio Filter','si_theme'),
				"desc" => __("Choose whether you wish to display a filter",'si_theme'),
				"id" => $prefix."portfolio_filter",				
				"type" => "select",
				'std' => __('no','si_theme'),
				'options' => array(__('no','si_theme'), __('yes','si_theme'))
		)
	)	
);

$meta_box_page_gallery = array(
	'id' => 'si-meta-box-page-gallery',
	'title' =>  __('Gallery Settings', 'si_theme'),
	'page' => 'page',
	'context' => 'normal', 
	'priority' => 'default',
	'fields' => array(
		array( "name" => __('Gallery Categories','si_theme'),
				"desc" => __("Select which categories you want to include on this gallery page",'si_theme'),
				"id" => $prefix."gallery_categories",				
				"type" => "multicheck"
		),
		array( "name" => __('Gallery Filter','si_theme'),
				"desc" => __("Choose whether you wish to display a filter",'si_theme'),
				"id" => $prefix."gallery_filter",				
				"type" => "select",
				'std' => __('no','si_theme'),
				'options' => array(__('no','si_theme'), __('yes','si_theme'))
		)
	)	
);

$meta_box_page_photos = array(
	'id' => 'si-meta-box-page-photos',
	'title' =>  __('Gallery Settings', 'si_theme'),
	'page' => 'page',
	'context' => 'normal', 
	'priority' => 'default',
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
			),			
		array(  "name" => __('Uploads/Manage Images','si_theme'),
				"desc" => __("Here's the list of the images",'si_theme'),
				"type" => "attachments",
				'std' => ''
			)
	)
);

$meta_box_page_video = array(
	'id' => 'si-meta-box-page-video',
	'title' =>  __('Video Settings', 'si_theme'),
	'page' => 'page',
	'context' => 'normal', 
	'priority' => 'default',
	'fields' => array(
		array( "name" => __('Youtube or Vimeo URL','si_theme'),
				"desc" => __('Enter the Youtube or Vimeo URL here. <br/> http://www.youtube.com/watch?v=VIDEO_ID <br/>or<br/> http://vimeo.com/VIDEO_ID','si_theme'),
				"id" => $prefix."page_video",
				'type' => 'text',
				'std' => ''
			),
		array( "name" => __('Video autoplay','si_theme'),
				"desc" => __('Choose whether you wish to autoplay the video','si_theme'),
				"id" => $prefix."page_video_autoplay",
				"type" => "select",
				'std' => __('no','si_theme'),
				'options' => array(__('no','si_theme'), __('yes','si_theme'))
			)
	)
);

$meta_box_page_background = array(
	'id' => 'si-meta-box-page-background',
	'title' =>  __('Background Settings', 'si_theme'),
	'page' => 'page',
	'context' => 'normal', 
	'priority' => 'default',
	'fields' => array(
		array( "name" => __('Background Image','si_theme'),
				"desc" => __('Upload a custom background image for this page','si_theme'),
				"id" => $prefix."page_background",
				'type' => 'upload',
				'std' => ''
			)
	)
);

$meta_box_page_photos_slider = array(
	'id' => 'si-meta-box-page-photos-slider',
	'title' =>  __('Slider Settings', 'si_theme'),
	'page' => 'page',
	'context' => 'normal', 
	'priority' => 'default',
	'fields' => array(
		array( "name" => __('Autoplay Slideshow','si_theme'),
				"desc" => __("Choose whether you wish to autoplay the slideshow",'si_theme'),
				"id" => $prefix."slider_autoplay",				
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


/*-----------------------------------------------------------------------------------------*/
/*	Add metabox 
/*-----------------------------------------------------------------------------------------*/
add_action('admin_menu', 'si_add_box_page');

function si_add_box_page() {
	global $meta_box_page_portfolio,$meta_box_page_gallery,$meta_box_page_photos,$meta_box_page_video,$meta_box_page_background,$meta_box_page_photos_slider;
	add_meta_box($meta_box_page_portfolio['id'], $meta_box_page_portfolio['title'], 'si_show_box_page_portfolio', $meta_box_page_portfolio['page'], $meta_box_page_portfolio['context'], $meta_box_page_portfolio['priority']);
	add_meta_box($meta_box_page_gallery['id'], $meta_box_page_gallery['title'], 'si_show_box_page_gallery', $meta_box_page_gallery['page'], $meta_box_page_gallery['context'], $meta_box_page_gallery['priority']);
	add_meta_box($meta_box_page_photos['id'], $meta_box_page_photos['title'], 'si_show_box_page_photos', $meta_box_page_photos['page'], $meta_box_page_photos['context'], $meta_box_page_photos['priority']);
	add_meta_box($meta_box_page_video['id'], $meta_box_page_video['title'], 'si_show_box_page_video', $meta_box_page_video['page'], $meta_box_page_video['context'], $meta_box_page_video['priority']);
	add_meta_box($meta_box_page_background['id'], $meta_box_page_background['title'], 'si_show_box_page_background', $meta_box_page_background['page'], $meta_box_page_background['context'], $meta_box_page_background['priority']);
	add_meta_box($meta_box_page_photos_slider['id'], $meta_box_page_photos_slider['title'], 'si_show_box_page_slider', $meta_box_page_photos_slider['page'], $meta_box_page_photos_slider['context'], $meta_box_page_photos_slider['priority']);
	
	
}


/*-----------------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------------*/


function si_show_box_page_portfolio() {
	global $meta_box_page_portfolio, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_portfolio['fields'] as $field) {
	
		// get current post meta data
		if (isset ($field['id']))
			$meta = get_post_meta($post->ID, $field['id'], 'multicheck' != $field['type'] /* If multicheck this can be multiple values */);
			
		switch ($field['type']) {				
		
			case 'multicheck':
				
				$categories = array();
				$categories_obj = get_categories(array('taxonomy' => 'portfolio-category'));
				foreach ($categories_obj as $category) {
					$categories[$category->slug] = $category->cat_name;
				}
				
				echo '<tr>', 
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height:18px; ">'. $field['desc'].'</span></label></th>',
					'<td>';
					foreach ( $categories as $value => $name ) {				
						echo '<input type="checkbox" name="', $field['id'], '[]" id="', $field['id'], '" value="', $value, '"', in_array( $value, $meta ) ? ' checked="checked"' : '', ' /> ', $name, '<br/>';
					}
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


function si_show_box_page_gallery() {
	global $meta_box_page_gallery, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_gallery['fields'] as $field) {
	
		// get current post meta data
		if (isset ($field['id']))
			$meta = get_post_meta($post->ID, $field['id'], 'multicheck' != $field['type'] /* If multicheck this can be multiple values */);
			
		switch ($field['type']) {				
		
			case 'multicheck':
				
				$categories = array();
				$categories_obj = get_categories(array('taxonomy' => 'gallery-category'));
				foreach ($categories_obj as $category) {
					$categories[$category->slug] = $category->cat_name;
				}
				
				echo '<tr>', 
					'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="display:block; color:#666; margin:5px 0 0 0; line-height:18px; ">'. $field['desc'].'</span></label></th>',
					'<td>';
					foreach ( $categories as $value => $name ) {				
						echo '<input type="checkbox" name="', $field['id'], '[]" id="', $field['id'], '" value="', $value, '"', in_array( $value, $meta ) ? ' checked="checked"' : '', ' /> ', $name, '<br/>';
					}
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

function si_show_box_page_photos() {
	global $meta_box_page_photos, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_photos['fields'] as $field) {
		
		// get current post meta data
		if (isset ($field['id']))
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




function si_show_box_page_slider() {
	global $meta_box_page_photos_slider, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($meta_box_page_photos_slider['fields'] as $field) {
		
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




function si_show_box_page_video() {
	global $meta_box_page_video, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_page_video['fields'] as $field) {
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

function si_show_box_page_background() {
	global $meta_box_page_background, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="si_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table si-custom-table">';
 
	foreach ($meta_box_page_background['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			
			//If Upload		
			case 'upload':			
			echo '<tr>',
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

/*-------------------------------------------------------------------------------------*/
/*	Save data from meta box
/*-------------------------------------------------------------------------------------*/

add_action('save_post', 'si_save_data_page');

function si_save_data_page($post_id) {
	global $meta_box_page_portfolio, $meta_box_page_gallery, $meta_box_page_photos, $meta_box_page_video,$meta_box_page_background,$meta_box_page_photos_slider;
 
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
		
		foreach ($meta_box_page_portfolio['fields'] as $field) {
				$name = $field['id'];
				$old = get_post_meta($post_id, $name, 'multicheck' != $field['type'] /* If multicheck this can be multiple values */);
				$new = isset( $_POST[$field['id']] ) ? $_POST[$field['id']] : null;
				if ( 'multicheck' == $field['type'] ) {
					delete_post_meta( $post_id, $name );	
					if ( !empty( $new ) ) {
						foreach ( $new as $add_new ) {
							add_post_meta( $post_id, $name, $add_new, false );
						}
					}
				}
				else{
					if ($new && $new != $old) {
						update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
					} elseif ('' == $new && $old) {
						delete_post_meta($post_id, $field['id'], $old);
					}				
				}
		}
		
		foreach ($meta_box_page_gallery['fields'] as $field) {
				$name = $field['id'];
				$old = get_post_meta($post_id, $name, 'multicheck' != $field['type'] /* If multicheck this can be multiple values */);
				$new = isset( $_POST[$field['id']] ) ? $_POST[$field['id']] : null;
				if ( 'multicheck' == $field['type'] ) {
					delete_post_meta( $post_id, $name );	
					if ( !empty( $new ) ) {
						foreach ( $new as $add_new ) {
							add_post_meta( $post_id, $name, $add_new, false );
						}
					}
				}
				else{
					if ($new && $new != $old) {
						update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
					} elseif ('' == $new && $old) {
						delete_post_meta($post_id, $field['id'], $old);
					}				
				}
		}
	 
		foreach ($meta_box_page_photos['fields'] as $field) {
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
		
		foreach ($meta_box_page_photos_slider['fields'] as $field) {
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
		
		foreach ($meta_box_page_video['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
	 
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
		
		foreach ($meta_box_page_background['fields'] as $field) {
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
 
function si_admin_scripts_page() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('si-upload', get_template_directory_uri() . '/functions/js/upload-media.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('si-upload');
}
function si_admin_styles_page() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'si_admin_scripts_page');
add_action('admin_print_styles', 'si_admin_styles_page');

?>