
<article id="post-<?php the_ID(); ?>" <?php post_class('grid_6'); ?>>

<div class="format-box">
<i class="icon-user"></i>
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

	<div class="entry-content quote-content">
			
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '_s' ) ); ?>
				<?php
				global $post;
				$quoter = get_post_meta( $post->ID, '_cmb_tumblog_quote', true );
				?>
				<h3><?php echo $quoter; ?></h3>
	</div><!-- .entry-content -->

</div>	

</article><!-- #post-<?php the_ID(); ?> -->
