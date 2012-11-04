<?php
/*
Template Name: Fullscreen Video
*/
?>

<?php get_header(); ?>			

	 <div class="fluid-video">
		<?php si_get_video_fullscreen(get_the_ID()); ?>
	</div>
<?php get_footer(); ?>