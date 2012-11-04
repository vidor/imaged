<?php if (has_post_thumbnail())  { ?>			
	<div class="post-image">
		<?php the_post_thumbnail('post-thumb'); ?>
	</div>				
<?php } ?>					
           	
			
<?php get_template_part('includes/postformats/post-meta'); ?>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'si_theme'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
<div class="sep"></div>
<div class="entry-content">								
	<?php $readmore = of_get_option('blog_readmore'); ?>
	<?php the_content($readmore);?>		
</div>