<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>


<?php get_template_part('templates/loop');?>


<?php $total_posts = $wp_query->found_posts; ?>
<div id="load-more">                
            <a data-total-posts="<?php echo $total_posts ; ?>" data-perpage="<?php echo get_option('posts_per_page');?>">
                  <span id="load-btn-icon"></span><?php _e('加载更多', 'si_theme'); ?>  
                    <span id="posts-count" data-loader="<?php echo get_template_directory_uri(); ?>/assets/img/ajax-loader.gif">
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

