<?php
/*
Template Name: Fullscreen Slider
*/
?>

<?php get_header(); ?>

	<?php $args = array(
					'orderby'		 => 'menu_order',
					'order' 		 => 'ASC',
					'post_type'      => 'attachment',
					'post_parent'    => get_the_ID(),
					'post_mime_type' => 'image',
					'post_status'    => null,
					'numberposts'    => -1
				);
			$attachments = get_posts($args); 
			
			$autoplay = get_post_meta($post->ID, 'si_slider_autoplay',true);
			$play = 0;
			if ($autoplay == __('yes','si_theme')) 
				$play = 1;
	?>

		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slideshow               :   1,			// Slideshow on/off
					autoplay				:	<?php echo $play;?> ,		
					start_slide             :   1,			// Start slide (0 is random)
					stop_loop				:	0,			// Pauses slideshow on last slide
					random					: 	0,			// Randomize slide order (Ignores start slide)
					slide_interval          :   5000,		// Length between transitions
					transition              :   1, 			// 0-None, 1-Fade
					transition_speed		:	1000,		// Speed of transition
					new_window				:	0,			// Image links open in new window/tab
					pause_hover             :   0,			// Pause slideshow on hover
					keyboard_nav            :   1,			// Keyboard navigation on/off
					performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,			// Disables image dragging and right click with Javascript
															   
					// Size & Position						   
					min_width		        :   0,			// Min width allowed (in pixels)
					min_height		        :   0,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   1,			// Portrait images will not exceed browser height
					fit_landscape			:   0,			// Landscape images will not exceed browser width
															   
					// Components							
					slide_links				:	'num',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	0,			// Individual thumb links for each slide
					thumbnail_navigation    :   0,			// Thumbnail navigation
					slides 					:  	[			// Slideshow Images
					<?php 
						$slides = '';
						$count = 1;
						 foreach ($attachments as $attachment) :
							$imgslide =  wp_get_attachment_image_src( $attachment->ID, 'full');
							
							$display_caption = get_post_meta( $attachment->ID, 'si-caption-show', true );
							
							$slidecaption = '';
							if ($display_caption == '1') {
								$titleshow = get_post_meta( $attachment->ID, 'si-caption-title', true );
								$color = get_post_meta( $attachment->ID, 'si-caption-color', true );
								$bgcolor = get_post_meta( $attachment->ID, 'si-caption-bgcolor', true );
								$posX = get_post_meta( $attachment->ID, 'si-caption-xpos', true );
								$posY = get_post_meta( $attachment->ID, 'si-caption-ypos', true );
								$btntext = get_post_meta( $attachment->ID, 'si-caption-btn-text', true );
								$btnurl = get_post_meta( $attachment->ID, 'si-caption-btn-url', true );
								
														
							
								$slidecaption = '<div class="slidecaption-wrap '. $posX.'-'.$posY .' '.$color.' bg-'.$bgcolor.'">';
								if ($titleshow == '1')
									$slidecaption .= '<h1>'.apply_filters('the_title', $attachment->post_title).'</h1>';
								if ($titleshow == '1' && $attachment->post_excerpt !='')
									$slidecaption .= '<div class="sep"></div>';
								if ($attachment->post_excerpt !='') 
									$slidecaption .= '<div class="caption-text">'.addslashes($attachment->post_excerpt) .'</div>'; 
								if ($btnurl !='') 
									$slidecaption .= '<a href="'.$btnurl.'" class="caption-btn">'.addslashes($btntext).'</a>'; 
								$slidecaption .= '</div>';
							
							}
							
							$slides .= "{image :'". $imgslide[0] ."', title : '".$slidecaption."'}";
							if ($count < count($attachments))
								$slides .= ',';
							
							$count ++;
						
						endforeach; 
						echo $slides ;
					
					?>
												]
					
				});
		    });
		    
		</script>
		

	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
		
	<div id="slidecaption"></div>
	
	<ul id="slide-list"></ul>

	
<?php get_footer(); ?>