<?php
/*-----------------------------------------------------------------------------------

	Add Portfolio Post Type

-----------------------------------------------------------------------------------*/

function si_create_post_type_portfolio() 
{
	$labels = array(
		'name' => __( 'Portfolios','si_theme'),
		'singular_name' => __( 'Portfolio','si_theme' ),
		'add_new' => __('Add New','si_theme'),
		'add_new_item' => __('Add New Portfolio','si_theme'),
		'edit_item' => __('Edit Portfolio','si_theme'),
		'new_item' => __('New Portfolio','si_theme'),
		'view_item' => __('View Portfolio','si_theme'),
		'search_items' => __('Search Portfolio','si_theme'),
		'not_found' =>  __('No portfolio found','si_theme'),
		'not_found_in_trash' => __('No portfolio found in Trash','si_theme'), 
		'parent_item_colon' => ''
	  );
	  
	  $args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','excerpt','thumbnail','custom-fields')
	  ); 
	  
	 register_post_type('portfolio',$args);
}


function si_build_taxonomies(){
	register_taxonomy("portfolio-category", array("portfolio"), array("hierarchical" => true, "label" => __( "Portfolio Categories",'si_theme' ), "singular_label" => __( "Portfolio Category",'si_theme' ), "rewrite" => array('slug' => 'portfolio-category'))); 
}

/**
 * Add Columns to Portfolio Edit Screen
 */
function si_portfolio_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Title','si_theme' ),
			'thumbnail' => __( 'Thumbnail', 'si_theme'),
            "category" => __( 'Categories','si_theme' )
        );    
        return $columns;  
}  
  
function si_portfolio_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case 'category':  
                echo get_the_term_list($post->ID, 'portfolio-category', '', ', ','');  
                break;
			 
			case 'thumbnail':
				$thumbnail = get_the_post_thumbnail($post->ID, array(150, 85));
				if( isset($thumbnail) ) {
					echo $thumbnail;
				} 
	        break;
        }  
}  

add_action('init','si_create_post_type_portfolio' );
add_action('init','si_build_taxonomies', 0 );
add_filter('manage_edit-portfolio_columns', 'si_portfolio_edit_columns');  
add_action('manage_posts_custom_column', 'si_portfolio_custom_columns');  


/**
 * Displays the custom post type icon in the dashboard
 */

function si_portfolio_icons() { ?>
    <style type="text/css" media="screen">
        #menu-posts-portfolio .wp-menu-image {
            background:  url(<?php echo get_template_directory_uri(); ?>/functions/images/portfolio-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-portfolio:hover .wp-menu-image, #menu-posts-portfolio.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
		#icon-edit.icon32-posts-portfolio {background:  url(<?php echo get_template_directory_uri(); ?>/functions/images/portfolio-32x32.png) no-repeat;}
    </style>
<?php }

add_action( 'admin_head', 'si_portfolio_icons' );

?>