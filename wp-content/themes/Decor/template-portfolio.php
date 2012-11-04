<?php get_header(); ?>
	
	
<?php 

	$cats=get_meta_option('portfolio_categories');  
	$cats=get_categories( array("hide_empty" => 1,"taxonomy" => "portfolio_category", "include" => $cats ) );
	

	
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if(is_front_page())  $page = (get_query_var('page')) ? get_query_var('page') : 1;
	$posts_per_page=get_meta_option('items_per_page'); 
	$cat=get_meta_option('portfolio_categories'); 
	if($portfolio_type=="filterable") $posts_per_page=-1;
	if(!empty($cat)) $cat=implode(',',$cat);
	else $cat='';
	$cat=explode(',',$cat);

	query_posts( array(
		"posts_per_page" => $posts_per_page,
		"post_type" => "portfolio",
		"paged" => $page,
		"tax_query" => array(
			array(
			"taxonomy" => "portfolio_category",
			"field" => "id",
			"terms" => $cat
			)
		)
	));


	

?>

<div id="main_body_wrap">

	<ul id="entry_list" class="clearfix">
	
		<?php get_template_part('loop-portfolio'); ?>
		
	</ul><!--end grid_list -->
	
	<div id="pagination_wrap">

		<?php echo pagination();  ?>
		 
		<?php wp_reset_query();  ?>
		<?php wp_reset_postdata(); ?>			
	
	</div><!--end pagination_wrap -->

</div><!-- main_body_wrap -->


<?php get_footer(); ?>


