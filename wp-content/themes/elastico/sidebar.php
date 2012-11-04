<?php if(is_page_template('template-portfolio.php')) : ?>	 
			
	<?php if (of_get_option('portfolio_filter') == '1') { ?>	
		<div id="portfolio-filter" class="widget">
			<h3 class="widget-title"><?php _e('Filter', 'si_theme') ?></h3>
			<div class="sep"></div>
			<?php $cats_arr = get_terms('portfolio-category', 'hide_empty=1&hierarchical=0&parent=0');										
				if(!empty($cats_arr)){ ?>
					<ul id="filter" class="clearfix"> 
						<li class="all"><a class="active" href="#" data-filter="*" ><?php _e('All', 'si_theme') ?></a></li>
						<?php foreach($cats_arr as $key => $cat_item){ ?>
							<?php $cats_child_arr = get_terms('portfolio-category','hide_empty=1&child_of='.$cat_item->term_id ); ?>
							<li class="cat-item <?php echo $cat_item->slug; ?>">
								<a href="#" data-filter=".<?php echo $cat_item->slug; ?>"><?php echo $cat_item->name; ?></a> 
							</li>
								<?php if(!empty($cats_child_arr)){ ?>
									<ul class="subfilters">
										<?php foreach($cats_child_arr as $key => $cat_child_item):?>
											<li class="cat-item <?php echo $cat_child_item->slug; ?>">
												<a href="#" data-filter=".<?php echo $cat_child_item->slug; ?>"><?php echo $cat_child_item->name; ?></a> 
											</li> 
										<?php endforeach ;?>
									</ul>
								 <?php }?>
						<?php } ?>
					</ul>
				<?php }  ?>
		</div>
	<?php } ?>
	
	
<?php elseif(is_page_template('template-portfolio-category.php')) : ?>	
	
		<?php if (get_post_meta(get_the_ID(), 'si_portfolio_filter', true) == __('yes','si_theme')){?>
			<div id="portfolio-filter" class="widget">
			<h3 class="widget-title"><?php _e('Filter', 'si_theme') ?></h3>
			<div class="sep"></div>
			<?php $cats_arr = get_post_meta( get_the_ID(), 'si_portfolio_categories', false); 
				if(!empty($cats_arr)){ ?>
					<ul id="filter" class="clearfix"> 
						<li class="all"><a class="active" href="#" data-filter="*" ><?php _e('All', 'si_theme') ?></a></li>
						<?php foreach($cats_arr as $cat_item){ ?>
							<li class="cat-item <?php echo $cat_item; ?>">
								<?php $catname = get_term_by('slug', $cat_item, 'portfolio-category'); ?>
								<a href="#" data-filter=".<?php echo $cat_item; ?>"><?php echo $catname->name; ?></a> 
							</li>	
						<?php } ?>
					</ul>
				<?php }  ?>
		</div>
		<?php } ?>
	
<?php elseif(is_page_template('template-gallery-listing.php')) : ?>	
	<?php if (of_get_option('gallery_filter') == '1') { ?>	
		<div id="portfolio-filter" class="widget">
			<h3 class="widget-title"><?php _e('Filter', 'si_theme') ?></h3>
			<div class="sep"></div>
			<?php $cats_arr = get_terms('gallery-category', 'hide_empty=1&hierarchical=0&parent=0');										
				if(!empty($cats_arr)){ ?>
					<ul id="filter" class="clearfix"> 
						<li class="all"><a class="active" href="#" data-filter="*" ><?php _e('All', 'si_theme') ?></a></li>
						<?php foreach($cats_arr as $key => $cat_item){ ?>
							<?php $cats_child_arr = get_terms('gallery-category','hide_empty=1&child_of='.$cat_item->term_id ); ?>
							<li class="cat-item <?php echo $cat_item->slug; ?>">
								<a href="#" data-filter=".<?php echo $cat_item->slug; ?>"><?php echo $cat_item->name; ?></a> 
							</li> 
							<?php if(!empty($cats_child_arr)){ ?>
									<ul class="subfilters">
										<?php foreach($cats_child_arr as $key => $cat_child_item):?>
											<li class="cat-item <?php echo $cat_child_item->slug; ?>">
												<a href="#" data-filter=".<?php echo $cat_child_item->slug; ?>"><?php echo $cat_child_item->name; ?></a> 
											</li> 
										<?php endforeach ;?>
									</ul>
								 <?php }?>
						<?php } ?>
					</ul>
				<?php } ?>
		</div>
	<?php } ?>
	
<?php elseif(is_page_template('template-gallery-listing-category.php')) : ?>	
	
		<?php if (get_post_meta(get_the_ID(), 'si_gallery_filter', true) == __('yes','si_theme')){?>
			<div id="portfolio-filter" class="widget">
			<h3 class="widget-title"><?php _e('Filter', 'si_theme') ?></h3>
			<div class="sep"></div>
			<?php $cats_arr = get_post_meta( get_the_ID(), 'si_gallery_categories', false); 
				if(!empty($cats_arr)){ ?>
					<ul id="filter" class="clearfix"> 
						<li class="all"><a class="active" href="#" data-filter="*" ><?php _e('All', 'si_theme') ?></a></li>
						<?php foreach($cats_arr as $cat_item){ ?>
							<li class="cat-item <?php echo $cat_item; ?>">
								<?php $catname = get_term_by('slug', $cat_item, 'gallery-category'); ?>
								<a href="#" data-filter=".<?php echo $cat_item; ?>"><?php echo $catname->name; ?></a> 
							</li>	
						<?php } ?>
					</ul>
				<?php }  ?>
		</div>
		<?php } ?>
		
<?php else: ?>
	<div id="widgets-section">			
		<?php if (get_post_type() == 'portfolio' || get_post_type() == 'gallery' || is_tax( 'portfolio-category' ) || is_tax( 'gallery-category' )) :?>
		<?php elseif (is_home() || is_archive() || is_single() || is_search() ) : ?>
			 <?php dynamic_sidebar( 'Blog Sidebar' ); ?>
		<?php else :?>
			  <?php dynamic_sidebar( 'Main Sidebar' ); ?> 
		 <?php endif; ?>
		 
	</div>
<?php endif;?>

<?php /*
<ul  class="ds-top-threads" data-range="weekly" data-num-items="5"></ul>
<!--多说js加载开始，一个页面只需要加载一次 -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"imaged"};
(function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = 'http://static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
<!--多说js加载结束，一个页面只需要加载一次 -->

*/?>