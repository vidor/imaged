




<div id="subfooter_wrap">

		<div class="alignleft">
		
		<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => false,'theme_location' =>'footer_nav', 'menu_id' => 'footer_nav', 'menu_class' => '')); ?>
		
		</div>
	
		<div class="alignright">
		
			<div id="copyright"><?php echo get_theme_option('copyright_text'); ?></div>
			
			<ul id="social_icons" class="clearfix">
				
				<?php $social_icons=explode(',',get_theme_option("social_icons")); ?>

				<?php foreach($social_icons as $icon): ?>
				
					<li>
						<a target="_blank" href="<?php echo get_theme_option("social_icons_".$icon); ?>" title="<?php _e('follow us on','decor'); ?> <?php echo $icon; ?>">
						
							<img class="grayscale" src="<?php echo THEME_IMG; ?>/social_icons/<?php echo $icon; ?>_dark.png" />
							<img class="active" src="<?php echo THEME_IMG; ?>/social_icons/<?php echo $icon; ?>_active.png" />
							
						</a>
					</li>
							
				<?php endforeach; ?>

			</ul>
		
		</div>
		
		


	
</div><!-- end subfooter_wrap -->




<?php

wp_footer();
if(get_theme_option('google_analytics')!='')  echo '<div class="hidden">'.stripslashes(get_theme_option('google_analytics')).'</div>';

?>

</body>
</html>