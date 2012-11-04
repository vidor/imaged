	</div><!-- end #content -->	
	
</div> <!-- end #container -->	

	<?php if (of_get_option('slideout_widgets') == '1') { ?> 
		<div id="slideout-wrap">   
			<div id="slideout-container">
					<?php dynamic_sidebar('Slideout'); ?>        
			</div>  
			<div id="slideout-button"><a href="#"><?php _e('open', 'si_theme'); ?></a></div>           	
		</div>
	<?php } ?>
	
<?php wp_footer(); ?>

</body>
</html>