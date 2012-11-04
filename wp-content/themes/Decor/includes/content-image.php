<?php if(has_post_thumbnail()): ?>

<div class="post_format_wrap">

	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">

		<?php the_post_thumbnail('single'); ?>			

	</a>

</div><!-- post_format_wrap -->

<?php endif; ?>

