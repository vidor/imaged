<?php
/*-----------------------------------------------------------------------------------

	Add Gallery Post Type

-----------------------------------------------------------------------------------*/

function si_create_post_type_gallery() 
{
	$labels = array(
		'name' => __( 'Galleries','si_theme'),
		'singular_name' => __( 'Gallery','si_theme' ),
		'add_new' => __('Add New','si_theme'),
		'add_new_item' => __('Add New Gallery','si_theme'),
		'edit_item' => __('Edit Gallery','si_theme'),
		'new_item' => __('New Gallery','si_theme'),
		'view_item' => __('View Gallery','si_theme'),
		'search_items' => __('Search Gallery','si_theme'),
		'not_found' =>  __('No gallery found','si_theme'),
		'not_found_in_trash' => __('No gallery found in Trash','si_theme'), 
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
	  
	 register_post_type('gallery',$args);
}


function si_build_gallery_taxonomies(){
	register_taxonomy("gallery-category", array("gallery"), array("hierarchical" => true, "label" => __( "Gallery Categories",'si_theme' ), "singular_label" => __( "Gallery Category",'si_theme' ), "rewrite" => array('slug' => 'gallery-category'))); 
}

/**
 * Add Columns to Gallery Edit Screen
 */
function si_gallery_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => __( 'Title','si_theme' ),
			'gallery_thumbnail' => __( 'Thumbnail', 'si_theme'),
            "gallery_category" => __( 'Categories','si_theme' )
        );    
        return $columns;  
}  
  
function si_gallery_custom_columns($column){  
        global $post;  
        switch ($column)  
        {    
            case 'gallery_category':  
                echo get_the_term_list($post->ID, 'gallery-category', '', ', ','');  
                break;
			 
			case 'gallery_thumbnail':
				$thumbnail = get_the_post_thumbnail($post->ID, array(150, 85));
				if( isset($thumbnail) ) {
					echo $thumbnail;
				} 
	        break;
        }  
}  

add_action('init','si_create_post_type_gallery' );
add_action('init','si_build_gallery_taxonomies', 0 );
add_filter('manage_edit-gallery_columns', 'si_gallery_edit_columns');  
add_action('manage_posts_custom_column', 'si_gallery_custom_columns');  


/**
 * Displays the custom post type icon in the dashboard
 */

function si_gallery_icons() { ?>
    <style type="text/css" media="screen">
        #menu-posts-gallery .wp-menu-image {
            background:  url(<?php echo get_template_directory_uri(); ?>/functions/images/gallery-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-gallery:hover .wp-menu-image, #menu-posts-gallery.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
		#icon-edit.icon32-posts-gallery {background:  url(<?php echo get_template_directory_uri(); ?>/functions/images/gallery-32x32.png) no-repeat;}
    </style>
<?php }

add_action( 'admin_head', 'si_gallery_icons' );

?>