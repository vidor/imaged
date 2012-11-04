<form method="get" id="searchform" action="<?php echo home_url(); ?>">

	<input type="text" class="text_input" value="<?php _e('Search', 'decor');?>" name="s" id="s" onfocus="if(this.value == '<?php _e('Search', 'decor');?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search', 'decor');?>';}" />
	<button type="submit" class="button"><span><?php _e('Search', 'decor');?></span></button>
</form>