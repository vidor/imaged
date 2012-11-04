<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="hentry-inner">
						<?php 	$format = get_post_format();   
								if( false === $format )  $format = 'standard'; 
								get_template_part( 'includes/postformats/'.$format );
						?>
				</div>
		</div>
<?php endwhile; endif; ?>