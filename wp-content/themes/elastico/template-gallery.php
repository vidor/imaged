<?php
/*
Template Name: Gallery
*/
?>

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
		
	<?php 	$imageNumber = get_post_meta($post->ID, 'si_photos_number', true);
			if(empty($imageNumber))  
				$imageNumber = 9;
			  
			$showtitle = get_post_meta($post->ID, 'si_photos_title', true);
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
					'numberposts'    => $imageNumber
				);
			$attachments = get_posts($args);     

			$args2 = array(
					'post_type'      => 'attachment',
					'post_parent'    => get_the_ID(),
					'post_mime_type' => 'image',
					'post_status'    => null,
					'numberposts'    => -1
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
								<a href="<?php echo $zoom ;?>" rel="gallery" <?php if ($showtitle =='true') echo 'title="'.$attachmenttitle.'"';?>>
									<span class="photo-overlay"></span>
									<img src="<?php echo $src[0]; ?>" width="<?php echo $src[1];?>" height="<?php echo $src[2];?>" alt="<?php echo $attachmenttitle; ?>"  />
								 </a>
							</div>    
								
			<?php endforeach; ?>
							
	</div>
	
	<div id="ajax-loading"></div>	
	<?php endif; ?>
				
<?php endif; ?>
	
<?php get_footer(); ?>