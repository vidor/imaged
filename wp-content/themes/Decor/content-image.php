<?php if(has_post_thumbnail()): ?>

<div class="post_format_wrap">

	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	
		<div class="hover_overlay"></div>

		<?php the_post_thumbnail('post_image'); ?>			

	</a>

</div><!-- post_format_wrap -->

<?php endif; ?>

