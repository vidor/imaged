<form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url('/'); ?>">
  <label class="hide" for="s"><?php _e('Search for:', 'roots'); ?></label>
  <input type="text" value="" name="s" id="s" class="search-query" placeholder="<?php _e('', 'roots'); ?>">
  <input type="submit" id="searchsubmit" value="<?php _e('搜索', 'roots'); ?>" class="btn">
</form>