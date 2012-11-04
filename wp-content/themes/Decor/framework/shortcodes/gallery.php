<?php

function add_shortcode_gallery($atts) {

	extract(shortcode_atts(array(
		'categories' => '',
		'size' => 'small'
	), $atts));
	

	switch ($size):
	
		case 'small';
			$image_type='gallery_small';
		break;

		case 'medium';
			$image_type='gallery_medium';
		break;

		case 'large';
			$image_type='gallery_large';
		break;
		
		case 'fullwidth';
			$image_type='full_width_image';
		break;
	
	endswitch;
		
		

		
	

	$output=''; 
	
	
	$args = array("post_type" => "gallery", "numberposts" => -1,  "include" => $categories);                    
	$obj_cat = get_posts($args);
		   
		   


	$output.='<ul class="gallery_list">';
		

	$categories=explode(',',$categories);
	$atts_array=array();

	foreach($categories as $g):

		$atts= get_meta_option('gallery_items', $g);
		$atts=explode(',',$atts);
		$atts_array=array_merge($atts_array , $atts);

	endforeach;




	$args= array(
		"posts_per_page" => -1,
		"post_status" => "any",
		"post_type" => "attachment",
		"post__in" => $atts_array,
	);
	
	query_posts($args);
	
	
	
	$rid=rand(1,100);
	

	
	while(have_posts()) : the_post();

	
		$output.='<li>';  
		
			$image_wp=wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
		
			$output.='<a class="lightbox" href="'.$image_wp[0].'" title="'.get_the_title().'">';
		
			$image_wp=wp_get_attachment_image_src( get_post_thumbnail_id(), $image_type ); 

			$output.='<img src="'.$image_wp[0].'"/>';
			
			$output.='<div class="hover_overlay"></div>';
			
			$output.='</a>';
					
		$output.='</li>';

	endwhile;
		
	$output.='</ul>';



	wp_reset_query();
	wp_reset_postdata();
	
	//return $output;
	return do_shortcode('[raw]'.$output.'[/raw]');

	
	
	
}
add_shortcode('gallery', 'add_shortcode_gallery');

