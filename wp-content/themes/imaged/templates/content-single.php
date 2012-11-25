<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <div class="entry-header">
      <p class="entry-comment-number"><a class="comment-link"><?php comments_number( '0', '1', '%' ); ?></a></p>
      <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php //get_template_part('templates/entry-meta'); ?>
        <p class="entry-single-meta"><span>作者：</span><?php the_author_posts_link(); ?>, <span>日期：</span><?php the_date(); ?></p>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    <footer class="entry-footer">
      <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>

    </div>
<?php
   $args = array(
     'post_type' => 'attachment',
     'numberposts' => -1,
     'post_status' => null,
     'post_parent' => $post->ID
    );

  $attachments = get_posts( $args );
     if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
           echo '<div class="entry-image">';
             echo '<img src="' . wp_get_attachment_image_src( $attachment->ID, 'single-post')[0] . '" />';
             $img_desc = $attachment->post_content;
             if( $img_desc != null || $img_desc != '' ) echo '<p>' . $img_desc . '</p>';
           echo '</div>';
          }
     }

?>

    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
  $('.comment-link').click(function() {
    $("html, body").stop().animate({ scrollTop: $('.ds-thread').offset().top }, 1000, 'easeOutExpo');
  });
});
</script>
