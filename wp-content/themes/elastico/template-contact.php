<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

	<?php
			$info_address = of_get_option('info_address');
			$info_phone = of_get_option('info_phone');
			$info_fax= of_get_option('info_fax');
			$info_email= of_get_option('info_email');
			$info_additional= of_get_option('info_additional');				
			$map_latitude = of_get_option('map_latitude');
			$map_longitude = of_get_option('map_longitude');
			$map_zoom = of_get_option('map_zoom');
			$map_type = of_get_option('map_type');
			$map_icon = of_get_option('map_icon');
			$map_iconsize = of_get_option('map_iconsize');
			$map_iconanchor = of_get_option('map_iconanchor');
			if ($map_zoom == '') $map_zoom = 17;
			
			$map_replacement_image = of_get_option('map_replacement_image');
	?>
						
						
	<?php if($map_latitude != '') : ?>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
			<script type="text/javascript">
					jQuery(document).ready(function(){
						var $map = jQuery('#map');
				
						if( $map.length ) {
								$map.gMap({
									controls: {
										panControl: false,
										zoomControl: true,
										zoomControlOptions: {
											style: google.maps.ZoomControlStyle.SMALL
										},
										mapTypeControl: true,
										streetViewControl: true,
										overviewMapControl: false
									},
									maptype: '<?php echo $map_type;?>',
									zoom: <?php echo $map_zoom;?> ,
									latitude: <?php echo $map_latitude;?>,
									longitude: <?php echo $map_longitude;?>,
									markers: [
										{ 	latitude: <?php echo $map_latitude;?>, 
											longitude: <?php echo $map_longitude;?>,											
											<?php if ($map_icon) :?> icon: {image: "<?php echo $map_icon;?>",iconsize: [<?php echo $map_iconsize;?>],iconanchor: [<?php echo $map_iconanchor;?>]} <?php endif;?>
										}
										]
								});
						}
					});
			</script>
								
			<div id="map"></div>
	<?php elseif ($map_replacement_image != '') : ?>
			<img src="<?php echo $map_replacement_image;?>" width="100%" alt="<?php the_title();?>"/>	
	
	<?php endif; ?>
						
						
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="contact-content">
			<div id="contact-form">
				<?php the_content(); ?>
			</div>
			
			<div id="contact-infos">
			
				<h2><?php _e('Contact Info','si_theme');?></h2>
						<div id="contact-details">
							<?php if($info_address != '') : ?>
								<span><strong><?php _e('Address','si_theme');?>:</strong> <?php echo stripslashes($info_address);?></span>
							<?php endif; ?>
							<?php if($info_phone != '') : ?>
								<span><strong><?php _e('Phone','si_theme');?>: </strong> <?php echo $info_phone ?></span>
							<?php endif; ?>
							<?php if($info_fax != '') : ?>
								<span><strong><?php _e('Fax','si_theme');?>: </strong> <?php echo $info_fax?></span>
							<?php endif; ?>
							<?php if($info_email != '') : ?>
								<span><strong><?php _e('Email','si_theme');?>: </strong> <a href="mailto:<?php echo $info_email;?>"><?php echo $info_email;?></a></span>
							<?php endif; ?>
						</div>   
						
						<?php if($info_additional != '') : ?>
								<?php echo stripslashes($info_additional);?>
						<?php endif; ?>
			</div>							
	</div>			
	<?php endwhile; endif; ?>
			

<?php get_footer(); ?>