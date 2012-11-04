<?php get_header(); ?>
	
<div id="main_body_wrap">

<?php

	global $query_string;

	$query_args = explode("&", $query_string);
	$search_query = array();

	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} 

	$search_query['post_type']=array('post');
	query_posts($search_query);		

?>

	<ul id="entry_list" class="" data-page="<?php echo $page; ?>" data-count="<?php echo $posts_per_page; ?>" data-cats="<?php echo $cat; ?>">
	
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



