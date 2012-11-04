<div class="entry-meta-single clearfix">
		<div class="post-meta">
			<span class="entry-date"><strong><?php _e('日期', 'si_theme') ?>:</strong> <?php the_time( get_option('date_format') ); ?></span> 				
			<?php /*<span class="author"><strong><?php _e('Author', 'si_theme') ?>:</strong> <?php the_author_posts_link();?></span> */ ?>
			<span class="comments-link"><strong><?php _e('评论', 'si_theme') ?>:</strong> <?php comments_popup_link('0','1','%'); ?></span>	
			<span class="entry-categories"><strong><?php _e('分类', 'si_theme') ?>:</strong> <?php the_category(' - ') ?></span>
			<?php if (has_tag()) { ?><span class="entry-tags"><?php the_tags(__('<strong>标签:</strong> ','si_theme'),' - '); ?> </span> <?php }?>
			<?php edit_post_link( __('Edit', 'si_theme'), '<span class="edit-post">[', ']</span>' ); ?>
		</div>	
		<div class="separator"></div>
		<div class="blog-navigation">
			<?php if( get_previous_post() ) : ?>
				<span class="btn-prev"><?php previous_post_link('<strong>%link</strong>') ?></span>
			<?php endif; ?>
			  <?php if( get_next_post() ) : ?>
				<span class="btn-next"><?php next_post_link('<strong>%link</strong>') ?></span>
			<?php endif; ?>
		</div>
		
		<?php if( is_active_sidebar('single-blog-post') ) { ?>
			<div class="separator"></div>
			<div id="blog-sidebar">
				<?php dynamic_sidebar( 'Single Blog Post' ); ?> 
			</div>
		<?php } ?>
</div>
