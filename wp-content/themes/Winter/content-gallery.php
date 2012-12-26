
<article id="post-<?php the_ID(); ?>" <?php post_class('grid_6 cf'); ?>>

<div class="format-box">
<i class="icon-picture"></i>
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

	<div class="entry-content video-content ">
				<div class="media-box flexslider cf">
				 <ul class="slides">
				<?php	$args = array(
			    'order'          => 'ASC',
			    'post_type'      => 'attachment',
			    'post_parent'    => $post->ID,
			    'post_mime_type' => 'image',
			    'post_status'    => null,
			    'numberposts'    => -1,
			);
			$attachments = get_posts($args);
			if ($attachments) {
			    foreach ($attachments as $attachment) {
			    	echo "<li>";
			        echo wp_get_attachment_link($attachment->ID, 'large', false, false);
			        echo "</li>";
			    }
			} ?>
				 </ul>
				</div>
				<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '_s' ) ); ?>
				<div class="clear"></div>
	</div><!-- .entry-content -->

</div>	

</article><!-- #post-<?php the_ID(); ?> -->
