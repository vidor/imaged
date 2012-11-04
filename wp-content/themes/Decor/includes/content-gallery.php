<?php 

$gallery=get_meta_option('pf_gallery'); 
$atts=explode (',', get_meta_option('gallery_items', $gallery));


?>

<div class="post_format_wrap">

	<div id="slides_<?php echo get_the_id(); ?>" class="slider_wrap">
	
		<div class="slides_container">
		
			<?php foreach($atts as $att): ?>  
				
				<?php  $att=get_post($att);   ?>
									
				<div>
					
					<?php $url_adress=get_post_meta($att->ID,'url_adress_value',true); ?>
				
					<?php if($url_adress!=''): ?> <a href="<?php echo $url_adress; ?>">  <?php endif; ?>
				
					<?php echo wp_get_attachment_image( $att->ID, 'single'); ?>
										
					<?php if($url_adress!=''): ?> </a>  <?php endif; ?>

				</div>
				
			<?php endforeach;  ?>
		
		</div><!--slides_container -->

	</div><!-- slides -->



</div><!-- post_format_wrap -->

<script>

jQuery(document).ready(function($){

	$('#slides_<?php echo get_the_id(); ?>, #slides_<?php echo get_the_id(); ?> div').css({width: $('#slides_<?php echo get_the_id(); ?>').find('img').width(), height: $('#slides_<?php echo get_the_id(); ?>').find('img').height()});
	

	$('#slides_<?php echo get_the_id(); ?>').slides({
		paginationClass: 'slides-pagination',
		slideEasing: 'easeOutQuad',
		slideSpeed: 600,
		effect: 'fade',
		crossfade: true,
		preload: false
	});
		

	
	
});

</script>

