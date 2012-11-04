<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>


<div id="main_body_wrap">

<div id="page_content_wrap">

	<?php get_template_part( 'includes/content-'.get_post_format() ); ?>
		
	<h1><?php echo get_the_title(); ?></h1>
	<ul class="meta_wrap">
						
					
		<?php
		
			$vote_count = get_post_meta(get_the_id(), "votes_count", true);  
			$voted='';
			if(isset($_COOKIE["like_". get_the_id()])) $voted='voted';			
			if($vote_count==0 || $vote_count=='') { $title=__('be the first to like this','decor'); $vote_count=0; }
			elseif($vote_count==1) $title=__('one person likes this','decor');
			elseif($vote_count>1) $title=$vote_count.__(' people like this','decor');
		
		?>
		
		<li class="entry_likes"><a class="<?php echo $voted; ?>" data-id="<?php echo get_the_id(); ?>" title="<?php echo $title; ?>"><span><?php echo $vote_count; ?></span> likes</a></li>
		<li class="entry_comments"><?php comments_popup_link(__( '0 comments', 'decor' ), __( '1 comment', 'decor' ), __( '% comments', 'decor' )); ;?></li>
		<li class="entry_categories"><?php printf(get_the_category_list( '' )); ?></li>
		
	</ul><!--end meta_wrap -->

	<div id="content_wrap" class="clearfix">
	
		<div id="primary">
		
			<div id="the_content">
			
				<?php the_content(''); ?>
				<p><?php edit_post_link(__( 'Edit this Post', 'decor' ),'',''); ?></p>
			
			</div><!-- the_content -->
		
		</div><!-- primary -->
		
		
		<?php endwhile; ?>
	
	
		<div id="secondary">
		
			<?php get_sidebar(); ?>
		
		</div><!-- secondary -->
		
		<div class="clearboth"></div>
		
		<?php comments_template( '', false ); ?>
	
	
	</div><!--content_wrap -->
	
	
	
	<footer>
			
	<?php

					
	$footer=get_post_meta(get_the_id(),'custom_footer_value' ,true);

	if(!isset($footer) || $footer!=''){


	$footer=explode(',',$footer);	
	$footer_name=$footer[0];
	$layout=$footer[1];

	}

	else{


	$footer=get_theme_option("adm_custom_footers_name");
	$layout=get_theme_option("adm_custom_footers_layout");

	$footer=explode(',',$footer);	
	$layout=explode(',',$layout);

	$footer_name=$footer[0];
	$layout=$layout[0];

	}


	switch($layout):

	case 1: ?>

		<div><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>


	<?php
	break;

	case 2: ?>

		<div class="one_half"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="one_half last"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

	<?php
	break;

	case 3: ?>

		<div class="one_third"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="one_third"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
		<div class="one_third last"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>

	<?php
	break;

	case 4: ?>

		<div class="one_third"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="two_third last"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

	<?php
	break;

	case 5: ?>

		<div class="two_third"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="one_third last"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

	<?php
	break;

	case 6: ?>

		<div class="one_fourth"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="one_fourth"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
		<div class="one_fourth"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>
		<div class="one_fourth last"><?php dynamic_sidebar($footer_name.' 4 column'); ?></div>

	<?php
	break;

	case 7: ?>

		<div class="two_fourth"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="one_fourth"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
		<div class="one_fourth last"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>

	<?php
	break;

	case 8: ?>

		<div class="one_fourth"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="two_fourth"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
		<div class="one_fourth last"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>

	<?php
	break;

	case 9: ?>

		<div class="one_fourth"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="one_fourth"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>
		<div class="two_fourth last"><?php dynamic_sidebar($footer_name.' 3 column'); ?></div>

	<?php
	break;

	case 10: ?>

		<div class="three_fourth"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="one_fourth last"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

	<?php
	break;

	case 11: ?>

		<div class="one_fourth"><?php dynamic_sidebar($footer_name.' 1 column'); ?></div>
		<div class="three_fourth last"><?php dynamic_sidebar($footer_name.' 2 column'); ?></div>

	<?php
	break;

	endswitch;
	?>
			
			
			
	</footer><!-- end footer -->
	
	</div><!-- page_content_wrap -->

</div><!-- main_body_wrap -->


<?php get_footer(); ?>


