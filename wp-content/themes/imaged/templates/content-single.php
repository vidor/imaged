<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <div class="entry-header">
      <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php //get_template_part('templates/entry-meta'); ?>
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
           echo wp_get_attachment_image( $attachment->ID, 'single-post' );
           echo '<p>';
           echo apply_filters( 'the_title', $attachment->post_title );
           echo '</p></div>';
          }
     }

?>

    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
