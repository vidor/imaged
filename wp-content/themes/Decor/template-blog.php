<?php get_header(); ?>
	
<div id="main_body_wrap">

<?php

	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if(is_front_page())  $page = (get_query_var('page')) ? get_query_var('page') : 1;
	$posts_per_page=get_meta_option('items_per_page'); 
	$cat=get_meta_option('post_categories'); 	
	if(!empty($cat)) $cat=implode(',',$cat);
	else $cat='';
	
	query_posts( array(
		"post_type" => "post",
		"paged" => $page,
		"posts_per_page" => $posts_per_page,
		"cat" => $cat
	));
	
	$blog_type=get_meta_option('blog_type');

?>

	<ul id="entry_list" class="" data-page="<?php echo $page; ?>" data-count="<?php echo $posts_per_page; ?>" data-cats="<?php echo $cat; ?>">
	
		<?php get_template_part('loop'); ?>
		
		<?php if($blog_type=='loaded via ajax'): ?>
		
		<span id="loaded_content"></span>
		<li class="more-posts"></li>
		
		<?php endif; ?>
	
	</ul><!--end grid_list -->
	
	<?php if($blog_type=='paginated'): ?>
	
	<div id="pagination_wrap">

		<?php echo pagination();  ?>
		 
		<?php wp_reset_query();  ?>
		<?php wp_reset_postdata(); ?>			
	
	</div><!--end pagination_wrap -->
	
	<?php endif; ?>



</div><!-- main_body_wrap -->

<?php get_footer(); ?>
