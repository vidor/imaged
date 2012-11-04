<?php if (has_post_thumbnail())  { ?>			
	<a href="<?php the_permalink(); ?>" rel="bookmark" class="post-image">
		<?php the_post_thumbnail('post-thumb',array('title' => '')); ?>
		<h2><?php the_title();?></h2>
	</a>
<?php } ?>
					
			
			
      		
