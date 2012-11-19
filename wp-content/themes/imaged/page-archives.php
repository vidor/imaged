<?php
/*
Template Name: Archives Template
*/
?>

						
<?php 	global $wp_locale; $posts = get_posts_archives(); ?>

<?php 	foreach( $posts as $yearmonth => $postentry ) : list( $year, $month ) = explode( '.', $yearmonth );	$firstpost = true; global $post; ?>
	<div class="archives-month">

			<?php foreach( $postentry as $post  ) :  setup_postdata($post); ?>
				
				<?php if ( true == $firstpost ) : ?>					
					<h2><?php echo $month . '月 ' . $year; ?><span class="count"><?php echo '（' . count($postentry) . '）';?></span></h2>
					
				<?php $firstpost = false; endif;?>	

				<div class="archives-thumbnail">
				<?php if (has_post_thumbnail())  { ?>			
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("archives", array('title' => '', 'alt' => '')); ?><h3><?php the_title();?></h3></a>
				<?php } ?>
			  	</div>

			<?php endforeach;wp_reset_postdata();?>
	</div><!-- /archives-month -->
<?php   endforeach;  ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
	if( !$('html').hasClass('lt-ie9') ) {
		$('.archives-thumbnail a').mouseenter(function() {
			$(this).find('h3').fadeIn();
		}).mouseleave(function() {
			$(this).find('h3').stop().fadeOut();
		});
	}
});
</script>