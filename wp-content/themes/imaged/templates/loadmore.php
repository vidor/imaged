<?php $total_posts = $wp_query->found_posts; ?>

<div id="load-more">                
  <a data-total-posts="<?php echo $total_posts ; ?>" data-perpage="<?php echo get_option('posts_per_page');?>">
     <span id="posts-count"> <?php echo get_option('posts_per_page').'/'. $total_posts; ?></span>                            
  </a>
</div>