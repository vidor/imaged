
<article id="post-<?php the_ID(); ?>" <?php post_class('grid_6'); ?>>

<div class="format-box">
<i class="icon-camera"></i>
</div>

<div class="post-cover">

	<div class="entry-meta">
		<span class="clock"> <i class="icon-time"></i> <?php days_ago(); ?></span> 
		<span class="comments-link"> <i class="icon-comment"></i>  <?php comments_popup_link( __( 'Leave a comment', '_s' ), __( '1 Comment', '_s' ), __( '% Comments', '_s' ) ); ?></span>
		<span class="perml"> <i class="icon-bolt"></i> <a href="<?php the_permalink(); ?>" rel="bookmark">Permalink</a></span>
	</div><!-- #entry-meta -->
	
	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<div class="media-box">
				<?php
					
					$img_url = get_post_meta( $post->ID, '_cmb_tumblog_image', true );
					$image = aq_resize( $img_url, 720, 405, true ); //resize & crop the image
				?>
				
				<?php if($image) : ?>
					<a class="fancybox" title= "<?php the_title(); ?>" href="<?php echo $img_url ?>"><img src="<?php echo $image ?>"/></a>
				<?php endif; ?>
	</div>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '_s' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</div>	

</article><!-- #post-<?php the_ID(); ?> -->
