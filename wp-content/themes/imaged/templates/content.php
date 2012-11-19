<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php 
while (have_posts()) : the_post(); 
	if (is_search() && ($post->post_type=='page') ) continue;
  	else get_template_part('templates/loop');
endwhile; 
?>

<?php get_template_part('templates/loadmore');?>

