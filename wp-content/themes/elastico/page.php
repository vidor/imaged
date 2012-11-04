<?php get_header(); ?>

	<div id="full-page">
	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<div class="sep"></div>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"><strong>' . __( 'Pages:', 'si_theme' ) . '</strong>', 'after' => '</div>' ) ); ?>
					</div>
				</div>
				
			<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>