<?php get_header(); ?>
	
<div id="main_body_wrap">


	<ul id="entry_list" data-page="<?php echo $page; ?>" data-count="<?php echo $posts_per_page; ?>" data-cats="<?php echo $cat; ?>">
	
	
		<li id="first_entry"><h2><?php tf_get_title(); ?></h2><div id="triangle"></div></li>
	
	
	</ul><!--end grid_list -->
	

</div><!-- main_body_wrap -->

<?php get_footer(); ?>




	
