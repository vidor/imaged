<?php if ( have_posts() ) while ( have_posts() ) : the_post();   ?>

<li class="entry_item">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="clearfix">
	
		<div class="blog_date"><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><span><?php echo get_the_date('d'); ?></span><br/><?php echo get_the_date('M'); ?></a></div>
		
		<?php get_template_part( 'content', get_post_format() ); ?>
		
		<div class="grid_details">
		
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php the_title(); ?></h2></a>
			
			<div class="grid_excerpt">
			
				<?php the_excerpt(); ?>

			</div><!-- grid_excerpt -->
			
		
			<?php
			
			$vote_count = get_post_meta(get_the_id(), "votes_count", true);  
			$voted='';
			if(isset($_COOKIE["like_". get_the_id()])) $voted='voted';			
			if($vote_count==0 || $vote_count=='') { $title=__('be the first to like this','decor'); $vote_count=0; }
			elseif($vote_count==1) $title=__('one person likes this','decor');
			elseif($vote_count>1) $title=$vote_count.__(' people like this','decor');

			?>
	
			<ul class="meta_wrap">
						
				<li class="entry_likes"><a class="<?php echo $voted; ?>" data-id="<?php echo get_the_id(); ?>" title="<?php echo $title; ?>"><span><?php echo $vote_count; ?></span> likes</a></li>
				
				<li class="entry_comments"><?php comments_popup_link(__( '0 comments', 'decor' ), __( '1 comment', 'decor' ), __( '% comments', 'decor' )); ;?></li>
				
				<li><a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Continue reading &rarr;','decor'); ?></a></li>
				
			</ul>
			
		</div><!--end grid_details -->
		
	</article>

</li><!--end grid_item -->



<?php endwhile; ?>





