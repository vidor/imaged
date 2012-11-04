<?php get_header(); ?>

	<div id="single-blog">
            
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
					<?php 	$format = get_post_format();   
							if( false === $format )  $format = 'standard'; 
							get_template_part( 'includes/postformats/single/'.$format );					
					?>
			<?php comments_template('', true); ?>	
			</div>
					
			<?php get_template_part('includes/postformats/single/post-meta'); ?>				
				
					
					
			<?php endwhile; else: ?>
			
			<div id="post-0" <?php post_class() ?>>				
					<h1 class="page-title"><?php _e('Page Not Found', 'si_theme'); ?></h1>
					<div class="entry-content">
						<p><?php _e("Sorry, but you are looking for something that isn't here.", "si_theme"); ?></p>
					</div>				
			</div>
			
			<?php endif; ?>

	</div>

<?php get_footer(); ?>