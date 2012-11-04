<?php

/*-----------------------------------------------------------------------------------------*/
/*	Metabox Attachments AJAX Update
/*-----------------------------------------------------------------------------------------*/

function si_gallery_metabox_ajax_update() {
	if ( !empty( $_POST['post_id'] ) )  {
			$args = array(
					'post_type' => 'attachment',
					'post_status' => 'inherit',
					'post_parent' => $_POST['post_id'],
					'post_mime_type' => 'image',
					'posts_per_page' => '-1',
					'order' => 'ASC',
					'orderby' => 'menu_order',
					'exclude'     => get_post_thumbnail_id($_POST['post_id'])
				);				
				
			$attachments = get_posts( $args );
			$return = '';						
			if( empty( $attachments ) )
				$return .= '<p>'. __('No images.','si_theme'). '</p>';	
			else {	
					foreach( $attachments as $image ):
						$thumbnail = wp_get_attachment_image_src( $image->ID, 'thumbnail');
						$return .= '<img style="margin-right:5px;" width="100" height="100" src="' . $thumbnail[0] . '" alt="' . apply_filters('the_title', $image->post_title). '"/>';
					endforeach;
			}			
			echo $return;
			exit();
	}
}

add_action( 'wp_ajax_refresh_metabox', 'si_gallery_metabox_ajax_update' );


/*-------------------------------------------------------------------------------------------*/
/*	Add Custom Fields to Media Uploader
/*  - Video URL field for Gallery Template
/*  - Image Size % field for Portfolio & Gallery Post Format
/*-------------------------------------------------------------------------------------------*/

function si_attachment_field_custom( $form_fields, $post ) {
	
	// Only show on the in-page media uploader
	$screen = get_current_screen();
	if( 'media-upload' !== $screen->base )
		return $form_fields;
	
	// Only show when gallery template selected
	$current_template = get_post_meta( $post->post_parent, '_wp_page_template', true );
	if( 'template-gallery.php' == $current_template || 'gallery' == get_post_type( $post->post_parent ) ){
		$form_fields['si-attachment-video-url'] = array(
			'label' => __('Video Link URL','si_theme'),
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'si-attachment-video-url', true ),
			'helps' => __('Enter the url of a youtube or vimeo video that will open in the lightbox','si_theme'),
		);
	}
		
	// Only show when custom post type is portfolio or post format is gallery
	if( 'portfolio' == get_post_type( $post->post_parent ) || 'gallery' == get_post_format( $post->post_parent) ){
		$form_fields['si-attachment-percentage-size'] = array(
			'label' => __('Image Size %','si_theme'),
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'si-attachment-percentage-size', true ),
			'helps' => __('Enter the percentage that you want to apply to the image (from 1 to 100)','si_theme'),
		);
		
		$options_slider = array( '0' => 'No','1' => 'Yes' );
		$selected = get_post_meta( $post->ID, 'si-slider-exclude', true );
		if( !isset( $selected ) || empty($selected) )
			$selected = '0';

		foreach ( $options_slider as $value => $label ) {
			$checked = '';
			$css_id = 'slider-exclude-option-' . $value;
			if ( $selected == $value ) 
				$checked = " checked='checked'";
			$html = "<input type='radio' name='attachments[$post->ID][si-slider-exclude]' id='{$css_id}' value='{$value}'$checked />";
			$html .= "<label for='{$css_id}'>$label</label>";
			$out[] = $html;
		}

		$form_fields['si-slider-exclude'] = array(
			'label' => __('Exclude from slider','si_theme'),
			'input' => 'html',
			'html'  => join("\n", $out),
		);
	}
	
	// Only show when slider template selected
	if( 'template-slider.php' == $current_template ){
	
		/* Slider Caption Heading */
		$form_fields['si-caption-parameters'] = array(
			'label' => '',
			'input' => 'html',
			'html'  => __('Fill the above title & caption inputs and set the parameters below.','si_theme')
		);
	
		/* Show Caption Options */
		$options_caption_show = array( '0' => 'No', '1' => 'Yes' );
		$selected_caption = get_post_meta( $post->ID, 'si-caption-show', true );

		if( !isset( $selected_caption ) || empty($selected_caption)) 
			$selected_caption = '0';

		foreach ( $options_caption_show as $value => $label ) {
			$checked = '';
			$css_id = 'caption-show-option-' . $value;
			if ( $selected_caption == $value ) 
				$checked = " checked='checked'";
			$html = "<input type='radio' name='attachments[$post->ID][si-caption-show]' id='{$css_id}' value='{$value}'$checked />";
			$html .= "<label for='{$css_id}'>$label</label>";
			$out_caption[] = $html;
		}

		$form_fields['si-caption-show'] = array(
			'label' => __('Display a caption on the slide','si_theme'),
			'input' => 'html',
			'html'  => join("\n", $out_caption),
		);
		
		/* Show Title on the caption */
		$options_caption_title = array( '0' => 'No', '1' => 'Yes' );
		$selected_title = get_post_meta( $post->ID, 'si-caption-title', true );

		if( !isset( $selected_title ) || empty($selected_title)) 
			$selected_title = '1';

		foreach ( $options_caption_title as $value => $label ) {
			$checked = '';
			$css_id = 'caption-title-option-' . $value;
			if ( $selected_title == $value ) 
				$checked = " checked='checked'";
			$html = "<input type='radio' name='attachments[$post->ID][si-caption-title]' id='{$css_id}' value='{$value}'$checked />";
			$html .= "<label for='{$css_id}'>$label</label>";
			$out_title[] = $html;
		}

		$form_fields['si-caption-title'] = array(
			'label' => __("Include the title on the slide's caption",'si_theme'),
			'input' => 'html',
			'html'  => join("\n", $out_title),
		);
			
		/* Caption Color */
		$options_caption_color = array( 'white' => 'White', 'black' => 'Black' );
		$selected_color = get_post_meta( $post->ID, 'si-caption-color', true );
		
		if( !isset( $selected_color ) || empty($selected_color) ) 
			$selected_color = 'white';

		foreach ( $options_caption_color as $value => $label ) {
			$checked = '';
			$css_id = 'caption-color-option-' . $value;
			if ( $selected_color == $value ) 
				$checked = " checked='checked'";
			$html = "<input type='radio' name='attachments[$post->ID][si-caption-color]' id='{$css_id}' value='{$value}'$checked />";
			$html .= "<label for='{$css_id}'>$label</label>";
			$out_color[] = $html;
		}

		$form_fields['si-caption-color'] = array(
			'label' => __('Caption Color','si_theme'),
			'input' => 'html',
			'html'  => join("\n", $out_color),
		);	
		
		/* Caption Background Color */
		$options_caption_bgcolor = array( 'none' => 'None','light' => 'Light', 'dark' => 'Dark' );
		$selected_bgcolor = get_post_meta( $post->ID, 'si-caption-bgcolor', true );

		if( !isset( $selected_bgcolor ) || empty($selected_bgcolor) ) 
			$selected_bgcolor = 'none';

		foreach ( $options_caption_bgcolor as $value => $label ) {
			$checked = '';
			$css_id = 'caption-bgcolor-option-' . $value;
			if ( $selected_bgcolor == $value ) 
				$checked = " checked='checked'";
			$html = "<input class='{$selected_bgcolor}' type='radio' name='attachments[$post->ID][si-caption-bgcolor]' id='{$css_id}' value='{$value}'$checked />";
			$html .= "<label for='{$css_id}'>$label</label>";
			$out_bgcolor[] = $html;
		}

		$form_fields['si-caption-bgcolor'] = array(
			'label' => __('Caption Background','si_theme'),
			'input' => 'html',
			'html'  => join("\n", $out_bgcolor),
		);		
		
		/* Caption Y Position */
		$options_caption_posy = array( 'top' => 'Top', 'center' => 'Center','bottom' => 'Bottom' );
		$selected_ypos = get_post_meta( $post->ID, 'si-caption-ypos', true );

		if( !isset( $selected_ypos ) || empty($selected_ypos)  ) 
			$selected_ypos = 'top';

		foreach ( $options_caption_posy as $value => $label ) {
			$checked = '';
			$css_id = 'caption-ypos-option-' . $value;
			if ( $selected_ypos == $value ) 
				$checked = " checked='checked'";
			$html = "<input type='radio' name='attachments[$post->ID][si-caption-ypos]' id='{$css_id}' value='{$value}'$checked />";
			$html .= "<label for='{$css_id}'>$label</label>";
			$out_posy[] = $html;
		}

		$form_fields['si-caption-ypos'] = array(
			'label' => __('Caption Y Position','si_theme'),
			'input' => 'html',
			'html'  => join("\n", $out_posy),
		);
		
		/* Caption X Position */
		$options_caption_posx = array( 'left' => 'Left', 'center' => 'Center','right' => 'Right' );
		$selected_posx = get_post_meta( $post->ID, 'si-caption-xpos', true );

		if( !isset( $selected_posx )  || empty($selected_posx) ) 
			$selected_posx = 'left';

		foreach ( $options_caption_posx as $value => $label ) {
			$checked = '';
			$css_id = 'caption-xpos-option-' . $value;
			if ( $selected_posx == $value ) 
				$checked = " checked='checked'";
			$html = "<input type='radio' name='attachments[$post->ID][si-caption-xpos]' id='{$css_id}' value='{$value}'$checked />";
			$html .= "<label for='{$css_id}'>$label</label>";
			$out_posx[] = $html;
		}

		$form_fields['si-caption-xpos'] = array(
			'label' => __('Caption X Position','si_theme'),
			'input' => 'html',
			'html'  => join("\n", $out_posx),
		);
				
		/* Btn Text */	
		$form_fields['si-caption-btn-text'] = array(
			'label' => __('Link Button Text','si_theme'),
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'si-caption-btn-text', true ),
			'helps' => __('Enter the text for the button','si_theme'),
		);
		
		/* Btn URL */	
		$form_fields['si-caption-btn-url'] = array(
			'label' => __('Link Button URL','si_theme'),
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'si-caption-btn-url', true ),
			'helps' => __('Enter the url for the button','si_theme'),
		);
	
	}
	
		
	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'si_attachment_field_custom', 10, 2 );


/*-----------------------------------------------------------------------------------------*/
/*	Save Custom Values in media uploader
/*-----------------------------------------------------------------------------------------*/

function si_attachment_field_custom_save( $post, $attachment ) {
	if( isset( $attachment['si-attachment-video-url'] ) )
		update_post_meta( $post['ID'], 'si-attachment-video-url', $attachment['si-attachment-video-url'] );
	
	if( isset( $attachment['si-attachment-percentage-size'] ) )
		update_post_meta( $post['ID'], 'si-attachment-percentage-size', $attachment['si-attachment-percentage-size'] );
		
	if( isset( $attachment['si-slider-exclude'] ) )
		update_post_meta( $post['ID'], 'si-slider-exclude', $attachment['si-slider-exclude'] );
	
	if( isset( $attachment['si-caption-show'] ) )
		update_post_meta( $post['ID'], 'si-caption-show', $attachment['si-caption-show'] );
	
	if( isset( $attachment['si-caption-title'] ) )
		update_post_meta( $post['ID'], 'si-caption-title', $attachment['si-caption-title'] );
		
	if( isset( $attachment['si-caption-color'] ) )
		update_post_meta( $post['ID'], 'si-caption-color', $attachment['si-caption-color'] );
	
	if( isset( $attachment['si-caption-bgcolor'] ) )
		update_post_meta( $post['ID'], 'si-caption-bgcolor', $attachment['si-caption-bgcolor'] );
		
	if( isset( $attachment['si-caption-xpos'] ) ) 
		update_post_meta( $post['ID'], 'si-caption-xpos', $attachment['si-caption-xpos'] );
		
	if( isset( $attachment['si-caption-ypos'] ) ) 
		update_post_meta( $post['ID'], 'si-caption-ypos', $attachment['si-caption-ypos'] );
		
	if( isset( $attachment['si-caption-btn-text'] ) ) 
		update_post_meta( $post['ID'], 'si-caption-btn-text', $attachment['si-caption-btn-text'] );
		
	if( isset( $attachment['si-caption-btn-url'] ) ) 
		update_post_meta( $post['ID'], 'si-caption-btn-url', $attachment['si-caption-btn-url'] );
		
		
	
	return $post;
}

add_filter( 'attachment_fields_to_save', 'si_attachment_field_custom_save', 10, 2 );

?>