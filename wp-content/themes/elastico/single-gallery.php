<?php get_header(); ?>
	

<?php if (post_password_required() ) : ?>
	<div class="password-protected">
		<div class="gallery-password-protected">
			<h1><?php echo the_title();?></h1>
			<div class="sep"></div>
			<?php the_content();?>
		</div>
	</div>
<?php else : ?>
		

	<?php $gallery_script = get_post_meta(get_the_ID(), 'si_gallery_script', true);	
			
			
			$autoplay = get_post_meta($post->ID, 'si_slider_autoplay',true);
			$play = 0;
			if ($autoplay == __('yes','si_theme')) 
				$play = 1;
				
			$showtitle = get_post_meta(get_the_ID(), 'si_slider_title', true);
			if ($showtitle == __('yes','si_theme')) 
				$showtitle = 'true';
			else $showtitle = 'false';
									
	?>	
		
	
	<?php if ($gallery_script == 'fullscreen') :?>
			
		
		<?php $args = array(
					'orderby'		 => 'menu_order',
					'order' 		 => 'ASC',
					'post_type'      => 'attachment',
					'post_parent'    => get_the_ID(),
					'post_mime_type' => 'image',
					'post_status'    => null,
					'numberposts'    => -1,
					'exclude'     => get_post_thumbnail_id()
				);
			$attachments = get_posts($args); 
	
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
							$slidecaption = '';
							if ($showtitle == 'true')
								$slidecaption = '<div class="caption-gallery-slide">'.apply_filters('the_title', $attachment->post_title).'</div>';							
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

	<?php else : ?>
							<?php 	$imageNumber = get_post_meta(get_the_ID(), 'si_photos_number', true);
									if(empty($imageNumber))  
										$imageNumber = 9;
									
									$showtitle = get_post_meta(get_the_ID(), 'si_photos_title', true);
									if ($showtitle == __('yes','si_theme')) 
										$showtitle = 'true';
									else $showtitle = 'false';
									  
									
										
							?>
								
							<?php 	$args = array(
											'orderby'		 => 'menu_order',
											'order' 		 => 'ASC',
											'post_type'      => 'attachment',
											'post_parent'    => get_the_ID(),
											'post_mime_type' => 'image',
											'post_status'    => null,
											'numberposts'    => $imageNumber,
											'exclude'     => get_post_thumbnail_id()
										);
									$attachments = get_posts($args);     

									$args2 = array(
											'post_type'      => 'attachment',
											'post_parent'    => get_the_ID(),
											'post_mime_type' => 'image',
											'post_status'    => null,
											'numberposts'    => -1,
											'exclude'     => get_post_thumbnail_id()
										);
									$attachments2 = get_posts($args2);  
							?>
								
								
							<?php if ($attachments) : ?>
							<div class="photos-gallery" id="gallery-<?php the_ID(); ?>" data-pageid="<?php echo the_ID();?>" data-total="<?php echo count($attachments2);?>" data-offset="<?php echo $imageNumber;?>" data-si-title="<?php echo $showtitle;?>">
												
									<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
											<?php if (get_the_content() != '') :?>							
												<div class="item-photo photo-header">
														<div class="photo-header-inner">									
															<h1><?php the_title();?></h1>
															<div class="sep"></div>
															<?php the_content(); ?>									
														</div>
												</div>
											<?php endif;?>
									<?php endwhile; endif; ?>	
													
									<?php foreach ($attachments as $attachment) : ?>                    
											<?php 	$bigsrc =  wp_get_attachment_image_src( $attachment->ID, 'full'); 
													$zoom = $bigsrc[0];
													$src = wp_get_attachment_image_src( $attachment->ID, 'post-thumb'); 
													$attachmenttitle = apply_filters('the_title', $attachment->post_title); 
													$videourl = get_post_meta( $attachment->ID, 'si-attachment-video-url', true );
													$class = "media-image";
													if( !empty( $videourl ) ){
														$zoom  = si_get_video_url_fancybox($videourl);
														$class = "media-video";
													}
											?>
													
													<div class="item-photo <?php echo $class;?>"> 
														<a href="<?php echo $zoom ;?>" rel="gallery" <?php if ($showtitle == 'true') echo 'title="'.$attachmenttitle.'"';?>>
															<span class="photo-overlay"></span>
															<img src="<?php echo $src[0]; ?>" width="<?php echo $src[1];?>" height="<?php echo $src[2];?>" alt="<?php echo $attachmenttitle; ?>"  />
														 </a>
													</div>    
														
									<?php endforeach; ?>
													
							</div>
							
							<div id="ajax-loading"></div>	
							<?php endif; ?>
	
	
	<?php endif; ?>
	
				
<?php endif; ?>
	
<?php get_footer(); ?>