<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <!-- meta -->
  	<div class="entry-meta">
  		 <p class="entry-month"><?php echo get_the_date('m'); ?></p>
  		 <p>·</p>
  		 <p class="entry-day"><?php echo get_the_date('d'); ?></p>
  		 <p class="entry-year"><?php echo get_the_date('Y'); ?></p>
  		 <p class="entry-comment-number"><?php comments_number( '0', '1', '%' ); ?></p>
  	</div>
  	
  <!-- thumbnail -->
  	<div class="entry-thumbnail">
	<?php if (has_post_thumbnail())  { ?>			
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("post-thumbnail", array('title' => '', 'alt' => '')); ?></a>
	<?php } ?>
  	</div>
  	
  <!-- content -->
    <div class="entry-content">
  	    <header>
	      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    </header>
	      <?php the_excerpt(); ?>
	    <footer class="entry-footer">
	      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
	    </footer>
    </div>
    
  </article>
<?php endwhile; ?>

<?php $total_posts = $wp_query->found_posts; ?>
<div id="load-more">                
            <a data-total-posts="<?php echo $total_posts ; ?>" data-perpage="<?php echo get_option('posts_per_page');?>">
                  <span id="load-btn-icon"></span><?php _e('加载更多', 'si_theme'); ?>  
                    <span id="posts-count" data-loader="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif">
                            <?php echo get_option('posts_per_page').'/'. $total_posts; ?>
                    </span>                            
            </a>
</div>

<?php /* if ($wp_query->max_num_pages > 1) : ?>
  <nav id="post-nav" class="pager">
    <div class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></div>
    <div class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></div>
  </nav>
<?php endif; */ ?>

