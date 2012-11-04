<?php 
        $args = array(
            'orderby'		 => 'menu_order',
			'order' 		 => 'ASC',
            'post_type'      => 'attachment',
            'post_parent'    => get_the_ID(),
            'post_mime_type' => 'image',
            'post_status'    => null,
            'numberposts'    => -1,
        );
        $attachments = get_posts($args);        
		$lightbox = get_post_meta(get_the_ID(), 'si_gallery_lightbox', true);
 ?>
				
		<script type="text/javascript">
				jQuery(window).load(function(){
						jQuery('.slides li').first().find('img').css('opacity', 1);
						jQuery('.flexslider').css('background-image','none');
						jQuery('.flexslider').flexslider({
								animation: "fade",
								slideshow: false,
								smoothHeight : true
						});
				});
		</script>
		
		<div class="post-gallery">
				<?php if ($attachments) : ?>
							<div id="slider-<?php the_ID(); ?>" class="flexslider">	
								<ul class="slides">	
									<?php foreach ($attachments as $attachment) : ?>  
										<?php $slider_exclude = get_post_meta($attachment->ID, 'si-slider-exclude', true);
										if($slider_exclude != '1') { ?>	
											<?php 	$src =  wp_get_attachment_image_src( $attachment->ID, 'full'); 
													$attachmentcaption =  $attachment->post_excerpt; 
													$customSize = get_post_meta( $attachment->ID, 'si-attachment-percentage-size', true ); ?>	
											<li> 
												<img src="<?php echo $src[0]; ?>" alt="<?php echo apply_filters('the_title', $attachment->post_title); ?>" <?php if($customSize) echo 'style="width:'.$customSize.'%;"';?>/>
												<?php if (!empty($attachmentcaption)) :?>
														<p class="flex-caption"><?php echo $attachmentcaption;?></p>
												<?php endif;?>
												<?php if ($lightbox == __('yes','si_theme')): ?>
													<a href="<?php echo $src[0]; ?>" class="fullscreen" rel="post-<?php the_ID(); ?>"><?php _e('fullscreen', 'si_theme') ?></a>
												<?php endif; ?>
											</li>   
										<?php }?>
									<?php endforeach; ?>
								</ul>
							</div>
				<?php endif; ?>
		</div>
				
		<h1 class="entry-title"><?php the_title(); ?></h1> 
		<div class="sep"></div>
		<div class="entry-content">								
			<?php the_content('');?>	
		</div>
