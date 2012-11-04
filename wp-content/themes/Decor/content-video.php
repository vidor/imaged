<div class="post_format_wrap video_format">

<?php if(get_meta_option('pf_video_type')==1) :?>

	<iframe src="http://player.vimeo.com/video/<?php echo get_meta_option('pf_video_id'); ?>?title=0&amp;byline=0&amp;portrait=0"  frameborder="0" width="711" height="400" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>


<?php elseif(get_meta_option('pf_video_type')==2): ?>	

	<iframe class="video" src="http://www.youtube.com/embed/<?php echo get_meta_option('pf_video_id'); ?>?wmode=transparent" frameborder="0" width="711" height="400" allowfullscreen></iframe>


<?php else: ?>

	<?php $image_wp=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'poster_image' ); ?>

	<video id="example_video_<?php echo get_the_id(); ?>" class="video-js vjs-default-skin" controls preload="none" width="711" height="400"
	poster="<?php echo $image_wp[0]; ?>"
	data-setup="{}">
		<source src="<?php echo get_meta_option('pf_video_mp4'); ?>" type='video/mp4' />
		<source src="<?php echo get_meta_option('pf_video_webm'); ?>" type='video/webm' />
		<source src="<?php echo get_meta_option('pf_video_ogg'); ?>" type='video/ogg' />
	</video>

		
	<script>

	jQuery(document).ready(function($){

		_V_("example_video_<?php echo get_the_id(); ?>");
		
	});

	</script>


<?php endif; ?>

</div><!-- post_format_wrap -->
	
	


