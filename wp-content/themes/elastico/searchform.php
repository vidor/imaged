<div class="search-wrapper">
	<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
		<input type="text" name="s" id="search-input" value="<?php _e('Type your search', 'si_theme') ?>" onfocus="if(this.value=='<?php _e('Type your search', 'si_theme') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Type your search', 'si_theme') ?>';" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="">
	</form>
</div>