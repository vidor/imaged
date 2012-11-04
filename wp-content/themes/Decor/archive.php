<?php get_header(); ?>
	
<div id="main_body_wrap">


	<ul id="entry_list" data-page="<?php echo $page; ?>" data-count="<?php echo $posts_per_page; ?>" data-cats="<?php echo $cat; ?>">
	
	
		<li id="first_entry"><h2><?php tf_get_title(); ?></h2><div id="triangle"></div></li>
	
		<?php get_template_part('loop'); ?>
		

	
	</ul><!--end grid_list -->
	
	<div id="pagination_wrap">

		<?php echo pagination();  ?>
		 
		<?php wp_reset_query();  ?>
		<?php wp_reset_postdata(); ?>			
	
	</div><!--end pagination_wrap -->
	

</div><!-- main_body_wrap -->

<?php get_footer(); ?>




