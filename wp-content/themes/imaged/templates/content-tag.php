<?php while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
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
  <!-- meta -->
      <div class="entry-meta">
         <p class="entry-month"><?php echo get_the_date('m'); ?></p>
         <p>·</p>
         <p class="entry-day"><?php echo get_the_date('d'); ?></p>
         <p class="entry-year"><?php echo get_the_date('Y'); ?></p>
         <p class="entry-comment-number"><?php comments_number( '0', '1', '%' ); ?></p>
      </div>
    </div>
</article>
  <?php endwhile; ?>