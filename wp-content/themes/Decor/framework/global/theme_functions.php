<?php

function tf_title(){

	$title = wp_title( '|', false, 'right' );
	$title.=get_bloginfo('name');

	if ( is_front_page() ) $title= get_bloginfo('name')." | ".get_bloginfo( 'description' );

	echo $title;

}




function tf_get_title(){

	if(is_archive()){
							
			if(is_category())  $page_title = __('Archives: ','decor').sprintf('<span>%s</span>',single_cat_title('',false));  
			elseif(is_tag())  $page_title = __('Tag Archives: ','decor'). sprintf('<span>%s</span>',single_tag_title('',false));  
			elseif(is_day())  $page_title = __('Archives: ','decor'). sprintf('<span>%s</span>',get_the_time('F jS, Y'));  
			elseif(is_month())  $page_title = __('Archives: ','decor'). sprintf('<span>%s</span>',get_the_time('F, Y'));  
			elseif(is_year())  $page_title = __('Archives: ','decor'). sprintf('<span>%s</span>',get_the_time('Y'));  
			elseif(is_author()){
			
				if(get_query_var('author_name')) $author = get_user_by('slug', get_query_var('author_name'));
				else $author = get_userdata(get_query_var('author'));
				$page_title = __('Author Archives:','decor'). sprintf('<span>%s</span>:',$author->nickname);

			}
			
		}
		elseif (is_404()) $page_title = __('404 - Not Found','decor'); 
		elseif (is_search()) $page_title = __('Search results','decor'). sprintf('<span>%s</span>',stripslashes( strip_tags( get_search_query() ) )); 
		
	if(is_tax( 'portfolio_category' )) $page_title = sprintf('%s',single_cat_title('',false));   
		

	echo $page_title; 

		
		

}



function tf_the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}

	} else {
		echo $excerpt;
	}
}

function tf_get_excerpt($post_id){
	global $wpdb;
	$query = 'SELECT post_excerpt FROM '. $wpdb->posts .' WHERE ID = '. $post_id .' LIMIT 1';
	$result = $wpdb->get_results($query, ARRAY_A);
	$post_excerpt=$result[0]['post_excerpt'];
	return $post_excerpt;
}


function tf_get_gallery_images(){



	$category=get_theme_option('default_gallery');
	if(get_meta_option('back_slideshow')=='off') return;
	if(get_meta_option('back_slideshow')!='default' && is_numeric(get_meta_option('back_slideshow'))) $category=get_meta_option('back_slideshow');
	
	$category=get_meta_option('gallery_items', $category);
	$atts=explode(',', $category);
	
	foreach( $atts as $att ):
	
		$att=get_post($att);
		
		$images[] = array(
			'src' => get_image_url($att->ID),
			'url'  => get_meta_option('url_adress', $att->ID),
			);

	endforeach;

	return $images;

}


function tf_supersized(){


$images=tf_get_gallery_images();
if(count($images)==0) return;	


if(count($images)>1): ?>

<div id="prevslide" class="load-item"></div>
<div id="nextslide" class="load-item"></div>

<?php endif; ?>

<script>
	
	
	jQuery(function($){
		
		$.supersized({
		
			// Functionality
			slide_interval          :   <?php echo get_theme_option('slide_interval'); ?>,		// Length between transitions
			transition              :   <?php echo get_theme_option('slide_effect'); ?>, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
			transition_speed		:	700,		// Speed of transition
			keyboard_nav            :   1,			// Keyboard navigation on/off
			performance				:	0,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
								   
								   
			// Components							
			slide_links				:	'blank',	// Individual links for each slide (Options: false, 'number', 'name', 'blank')

			slides 					:  	[			// Slideshow Images
			
			
			<?php $i=0; foreach( $images as $image ):  ?>
		{image : '<?php echo $image['src']; ?>', url:'<?php echo $image['url']; ?>' }
			<?php 
				$i++;
				if($i!=count($images)) echo ',';
				endforeach;  ?>

										],

			
		});
		
		
	});
	
</script>

<?php

}




add_action('widgets_init', 'tf_register_sidebars');


$tf_sidebars = array('Post Sidebar','Page Sidebar');
$tf_footer_sidebars_number = 0;

function tf_register_sidebars(){

	global $tf_sidebars, $tf_footer_sidebars;

	foreach ($tf_sidebars as $sidebar){
	
		$name=explode(' ',$sidebar);
	
		register_sidebar(array(
			'name' => $sidebar,
			'description' => 'will be displayed on a created '.$name[0],
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget_title"><span>',
			'after_title' => '</span></h3>',
		));
		
	}
		

		
	//register footer sidebars
	$custom_footers_names=get_theme_option("adm_custom_footers_name");
	$custom_footers_layout=get_theme_option("adm_custom_footers_layout");


	if($custom_footers_names!=''){
	
		$custom_footers_names = explode(',',$custom_footers_names);
		$custom_footers_layout = explode(',',$custom_footers_layout);
		
		for($i=0; $i<count($custom_footers_names)-1; $i++){
		
			$layout=$custom_footers_layout[$i];
			
			switch ($layout):
				case 1:  $nr_columns=1;  break;
				case 2:  $nr_columns=2;  break;
				case 3:  $nr_columns=3;   break;
				case 4:  $nr_columns=2;   break;
				case 5:  $nr_columns=2;   break;
				case 6:  $nr_columns=4;   break;
				case 7:  $nr_columns=3;   break;
				case 8:  $nr_columns=3;   break;
				case 9:  $nr_columns=3;   break;
				case 10:  $nr_columns=2;   break;
				case 11:  $nr_columns=2;   break;
			endswitch;
			
			for($j=1; $j<=$nr_columns; $j++){
			
				register_sidebar(array(
					'name' =>  $custom_footers_names[$i].' '.$j.' column',
					'description' => 'column number '.$j.' of the footer with the name: '.$custom_footers_names[$i],
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div>',
					'before_title' => '<h3 class="widget_title">',
					'after_title' => '</h3>',
				));
			
			}
		
		}
			
	}
	
	//register custom sidebars
	$custom_sidebars=get_theme_option('custom_sidebars');
	if(!empty($custom_sidebars)) $custom_sidebars_array = explode(',',$custom_sidebars);
	
	if(!empty($custom_sidebars)){

		for($i=0; $i<count($custom_sidebars_array)-1; $i++){
		
			register_sidebar(array(
				'name' =>  $custom_sidebars_array[$i].' - Custom Sidebar',
				'description' => '',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget_title"><span>',
				'after_title' => '</span></h3>',
			));
		
		}
		
	}
	
}

function tf_get_sidebar(){

	$page_type= get_meta_option('theme_page_type');

	$post_type=get_post_type();
	
	global $tf_sidebars,$post;
				 
	if($post_type=='post' || $page_type==2)	$sidebar = $tf_sidebars[0];		 
	elseif($post_type=='portfolio' || $page_type==3) $sidebar = $tf_sidebars[2];	
	elseif($post_type=='page') $sidebar = $tf_sidebars[1];
	
	$custom = get_post_meta($post->ID, 'custom_sidebar_value', true);
	
	if( $custom && $custom!='off') $sidebar = $custom.' - Custom Sidebar';
	
	dynamic_sidebar($sidebar);
	
}



function custom_css() {

	$logo_left=get_theme_option('logo_left');
	$logo_top=get_theme_option('logo_top');
	
	$overlay_color=get_theme_option('overlay_color');
	$overlay_opacity=get_theme_option('overlay_opacity');
	
	$custom_css=get_theme_option('custom_css');
	
	$font_size_1=get_theme_option('font_size_1');
	$font_size_2=get_theme_option('font_size_2');


    ?>
<style>

#logo img{

left:<?php echo $logo_left; ?>px;
top:<?php echo $logo_top; ?>px;

}

#main_overlay{

background-color:<?php echo $overlay_color; ?>;
opacity:<?php echo $overlay_opacity; ?>;

}

<?php if(get_theme_option('font_sizes')=='yes'): ?>

h1 {
font-size:<?php echo get_theme_option('font_size_1');?>px;
}

h2 {
font-size: <?php echo get_theme_option('font_size_2');?>px;
}
h3 {
font-size:<?php echo get_theme_option('font_size_3');?>px;
}
h4 {
font-size:<?php echo get_theme_option('font_size_4');?>px;
}
h5 {
font-size:<?php echo get_theme_option('font_size_5');?>px;
}
h6 {
font-size:<?php echo get_theme_option('font_size_6');?>px;
}

.entry_item h2 {

font-size:<?php echo get_theme_option('font_size_7');?>px;

}

#nav > li > a {

font-size:<?php echo get_theme_option('font_size_8');?>px;


}

#nav .sub-menu a {


font-size:<?php echo get_theme_option('font_size_9');?>px;



}

#cboxTitle{

font-size:<?php echo get_theme_option('font_size_10');?>px;


}

.dropcap{

font-size:<?php echo get_theme_option('font_size_11');?>px;

}

.entry_item .blog_date{

font-size:<?php echo get_theme_option('font_size_12');?>px;

}

.entry_item .blog_date span{

font-size:<?php echo get_theme_option('font_size_13');?>px;

}

#pagination_wrap a{

font-size:<?php echo get_theme_option('font_size_14');?>px;

}

#entry_list li#first_entry h2{


font-size:<?php echo get_theme_option('font_size_15');?>px;


}

#subfooter_wrap #footer_nav li a{

font-size:<?php echo get_theme_option('font_size_16');?>px;



}

#subfooter_wrap #copyright{

font-size:<?php echo get_theme_option('font_size_17');?>px;


}

<?php endif; ?>

<?php echo $custom_css; ?>


</style>
<?php
}
add_action( 'wp_head', 'custom_css' );





?>
