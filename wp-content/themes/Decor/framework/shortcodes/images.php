<?php

function add_shortcode_image($atts) {

	extract(shortcode_atts(array(
		'id' => ''
	), $atts));
	


	$output='';
	

	$output .= '<div class="image_wrap">';
	
		$output .= wp_get_attachment_image( $id, 'full_width', '', array('class'=>'scale_with_grid') ); 
				
	$output .= '</div>';
	
	return do_shortcode($output);
	
}

add_shortcode('image', 'add_shortcode_image');

