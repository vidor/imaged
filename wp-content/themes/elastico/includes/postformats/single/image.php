<?php if (has_post_thumbnail()) : ?>
	<?php 	$lightbox = get_post_meta(get_the_ID(), 'si_image_lightbox', true); 
			$full = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),'full' ); ?>	
		
	<div class="post-image">		
		<?php the_post_thumbnail('full'); ?>
		<?php if ($lightbox == __('yes','si_theme')):?><a class="fullscreen" href="<?php echo $full;?>"><?php _e('fullscreen', 'si_theme') ?></a><?php endif;?>
	</div>				
<?php endif;?>		
	
<h1 class="entry-title"><?php the_title(); ?></h1>       
<div class="sep"></div>
<div class="entry-content">								
	<?php the_content('');?>		
</div>   