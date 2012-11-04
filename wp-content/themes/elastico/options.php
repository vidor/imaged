<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __('Select a page:','si_theme');
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => __('General Settings','si_theme'),
						"type" => "heading");
											
						
	$options[] = array( "name" => __('Custom Logo','si_theme'),
						"desc" => __('Upload your logo or specify the image address of your online logo. (http://example.com/logo.png)','si_theme'),
						"id" => "logo",
						"type" => "upload");

						
	$options[] = array( "name" => __('Custom Favicon','si_theme'),
						"desc" => __('Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.','si_theme'),
						"id" => "custom_favicon",
						"type" => "upload");					

	$options[] = array( "name" => __('Tracking Code','si_theme'),
						"desc" => __('Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.','si_theme'),
						"id" => "google_analytics",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => __('Enable/disable right click (for image protection)','si_theme'),
						"desc" => __('Check this to disable the right click.','si_theme'),
						"id" => "right_click",
						"std" => "0",
						"type" => "checkbox");	
						
	$options[] = array( "name" => __("Styling Options",'si_theme'),
						"type" => "heading");
						

	$options[] = array( "name" => __('Link Color','si_theme'),
						"desc" => __('Select the link hover color.','si_theme'),
						"id" => "link_color",
						"std" => "",
						"type" => "color"); 
						
	$options[] = array( "name" => __('Custom CSS','si_theme'),
						"desc" => __('Quickly add some CSS to your theme by adding it to this block.','si_theme'),
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea");		
		
	$options[] = array( "name" => __("Blog Settings",'si_theme'),
						"type" => "heading");
	
	$options[] = array( "name" => __('Read More Link','si_theme'),
						"desc" => __('If you want to display a "Read More" link enter the link text here','si_theme'),
						"id" => "blog_readmore",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __("Portfolio Settings",'si_theme'),
						"type" => "heading");
	
	$options[] = array( "name" => __('Portfolio Page','si_theme'),
						"desc" => __('Select the portfolio page. Used for highlighting the portfolio menu when viewing a single portfolio item and for the "Back to portfolio" link.','si_theme'),
						"id" => "portfolio_page",
						"type" => "select",
						"options" => $options_pages);
																

	$options[] = array( "name" => __('Portfolio Meta','si_theme'),
						"desc" => __("Select what information to display for each portfolio item on the portfolio page just under their title.",'si_theme'),
						"id" => "portfolio_meta",
						"std" => "categories",
						"type" => "select",
						"options" => array('categories' => 'Categories', 'excerpt'=> 'Excerpt'));	

	$options[] = array( "name" => __('Enable Portfolio Filter','si_theme'),
						"desc" => __('Check this to display the portfolio items filter.','si_theme'),
						"id" => "portfolio_filter",
						"std" => "1",
						"type" => "checkbox");	
						
	$options[] = array( "name" => __('Portfolio Ajax Load','si_theme'),
						"desc" => __('Choose if you wish to use a Load More button.','si_theme'),
						"id" => "portfolio_ajax",
						"std" => "none",
						"type" => "select",
						"options" => array('none' => 'None', 'ajax'=> 'Load More'));	
						
	$options[] = array( "name" => __('Number of portfolios per loading','si_theme'),
					"desc" => __('Enter the amount of portfolios items you wish to show per loading.','si_theme'),
					"id" => "portfolio_number",
					"std" => "18",
					"type" => "text");

	
					
	$options[] = array( "name" => __("Gallery Settings",'si_theme'),
						"type" => "heading");
	
	$options[] = array( "name" => __('Gallery Page','si_theme'),
						"desc" => __('Select the gallery page. Used for highlighting the gallery menu when viewing a single gallery item.','si_theme'),
						"id" => "gallery_page",
						"type" => "select",
						"options" => $options_pages);
																

	$options[] = array( "name" => __('Gallery Meta','si_theme'),
						"desc" => __("Select what information to display for each gallery item on the gallery listing page just under their title.",'si_theme'),
						"id" => "gallery_meta",
						"std" => "categories",
						"type" => "select",
						"options" => array('categories' => 'Categories', 'excerpt'=> 'Excerpt'));	

	$options[] = array( "name" => __('Enable Gallery Filter','si_theme'),
						"desc" => __('Check this to display the gallery items filter.','si_theme'),
						"id" => "gallery_filter",
						"std" => "1",
						"type" => "checkbox");
	
	$options[] = array( "name" => __('Gallery Ajax Load','si_theme'),
						"desc" => __('Choose if you wish to use a Load More button.','si_theme'),
						"id" => "gallery_ajax",
						"std" => "none",
						"type" => "select",
						"options" => array('none' => 'None', 'ajax'=> 'Load More'));	
						
	$options[] = array( "name" => __('Number of galleries per loading','si_theme'),
					"desc" => __('Enter the amount of gallery items you wish to show per loading','si_theme'),
					"id" => "gallery_number",
					"std" => "18",
					"type" => "text");
						
						
	$options[] = array( "name" => __('Contact Infos','si_theme'),
						"type" => "heading");      

	$options[] = array( "name" => __('Address','si_theme'),
						"desc" => __('Add your address here.','si_theme'),
						"id" => "info_address",
						"std" => "",
						"type" => "textarea");    

	$options[] = array( "name" => __('Phone number','si_theme'),
						"desc" => __('Add your phone number here.','si_theme'),
						"id" => "info_phone",
						"std" => "",
						"type" => "text");    
						
	$options[] = array( "name" => __('Fax number','si_theme'),
						"desc" => __('Add your fax number here.','si_theme'),
						"id" => "info_fax",
						"std" => "",
						"type" => "text");    

	$options[] = array( "name" => __('Email Address','si_theme'),
						"desc" => __('Add your email address here.','si_theme'),
						"id" => "info_email",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => __('Additional Infos','si_theme'),
						"desc" => __('If you have other infos to enter, type them here.','si_theme'),
						"id" => "info_additional",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array('name' => __('Google Map Settings', 'si_theme'),
						"desc" => '',
						'type' => 'info');
						
	$options[] = array( "name" => __('Google Map Latitude', 'si_theme'),
						"desc" => __('Enter the Latitude','si_theme'),
						"id" => "map_latitude",
						"std" => "",
						"type" => "text"); 	
						
	$options[] = array( "name" => __('Google Map Longitude', 'si_theme'),
						"desc" => __('Enter the Longitude','si_theme'),
						"id" => "map_longitude",
						"std" => "",
						"type" => "text"); 
						
	$options[] = array( "name" => __('Google Map Zoom', 'si_theme'),
						"desc" => __('Enter the Zoom','si_theme'),
						"id" => "map_zoom",
						"std" => "17",
						"type" => "text"); 
						
	$options[] = array( "name" => __('Google Map Type', 'si_theme'),
						"desc" => __('Select the type of the map','si_theme'),
						"id" => "map_type",
						"std" => "ROADMAP",
						"type" => "select",
						"options" => array('ROADMAP' => 'Roadmap', 'SATELLITE' => 'Satellite' ,'HYBRID' => 'Hybrid'));	
							
	$options[] = array( "name" => __('Google Map Custom Marker Icon', 'si_theme'),
						"desc" => __('Upload your custom Marker Icon','si_theme'),
						"id" => "map_icon",
						"type" => "upload"); 
						
	$options[] = array( "name" => __('Google Map Custom Icon Size', 'si_theme'),
						"desc" => __('Enter your Custom Icon Size: e.g. 32, 37','si_theme'),
						"id" => "map_iconsize",
						"std" => "",
						"type" => "text"); 
	
	$options[] = array( "name" => __('Google Map Custom Icon Anchor', 'si_theme'),
						"desc" => __('Enter the coordinates of your Icon Anchor: e.g 16, 37','si_theme'),
						"id" => "map_iconanchor",
						"std" => "",
						"type" => "text"); 
						
	$options[] = array( "name" => __('Map Replacement by an Image','si_theme'),
						"desc" => __('If you want to display an image instead of the map, upload it here.','si_theme'),
						"id" => "map_replacement_image",
						"type" => "upload");
			  
						
	$options[] = array( "name" => __('Sidebar Settings','si_theme'),
						"type" => "heading");

	$options[] = array( "name" => __('Enable Slideout Widgets Panel','si_theme'),
						"desc" => __('Check this to enable the slideout panel where you can add widgets.','si_theme'),
						"id" => "slideout_widgets",
						"std" => "0",
						"type" => "checkbox");	

	$options[] = array( "name" => __('Copyright','si_theme'),
						"desc" => __('Enter some text to display at the bottom of the sidebar.','si_theme'),
						"id" => "footer_copy",
						"std" => "",
						"type" => "textarea");      

	$options[] = array( "name" => __('Social Settings','si_theme'),
						"type" => "heading");
						
	$options[] = array( "name" =>  __('Facebook','si_theme'),
						"desc" => __('Add your Facebook URL here.','si_theme'),
						"id" => "facebook_url",
						"std" => "",
						"type" => "text");  	

	$options[] = array( "name" =>  __('Twitter','si_theme'),
						"desc" => __('Add your Twitter URL here.','si_theme'),
						"id" => "twitter_url",
						"std" => "",
						"type" => "text");  

	$options[] = array( "name" =>  __('Google +','si_theme'),
						"desc" => __('Add your Google + URL here.','si_theme'),
						"id" => "google_url",
						"std" => "",
						"type" => "text");  

	$options[] = array( "name" =>  __('Flickr','si_theme'),
						"desc" => __('Add your Flickr URL here.','si_theme'),
						"id" => "flickr_url",
						"std" => "",
						"type" => "text");			
						
	$options[] = array( "name" =>  __('LinkedIn','si_theme'),
						"desc" => __('Add your LinkedIn URL here.','si_theme'),
						"id" => "linkedin_url",
						"std" => "",
						"type" => "text"); 
	
	$options[] = array( "name" =>  __('Behance','si_theme'),
						"desc" => __('Add your Behance URL here.','si_theme'),
						"id" => "behance_url",
						"std" => "",
						"type" => "text"); 

	$options[] = array( "name" =>  __('Pinterest','si_theme'),
						"desc" => __('Add your Pinterest URL here.','si_theme'),
						"id" => "pinterest_url",
						"std" => "",
						"type" => "text");  
						
	$options[] = array( "name" =>  __('Dribbble','si_theme'),
						"desc" => __('Add your Dribbble URL here.','si_theme'),
						"id" => "dribbble_url",
						"std" => "",
						"type" => "text");   
						
	$options[] = array( "name" =>  __('Vimeo','si_theme'),
						"desc" => __('Add your Vimeo URL here.','si_theme'),
						"id" => "vimeo_url",
						"std" => "",
						"type" => "text");	

	$options[] = array( "name" =>  __('Youtube','si_theme'),
						"desc" => __('Add your Youtube URL here.','si_theme'),
						"id" => "youtube_url",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" =>  __('Tumblr','si_theme'),
						"desc" => __('Add your Tumblr URL here.','si_theme'),
						"id" => "tumblr_url",
						"std" => "",
						"type" => "text");	

	$options[] = array( "name" =>  __('Instagram','si_theme'),
						"desc" => __('Add your Instagram URL here.','si_theme'),
						"id" => "instagram_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('RSS','si_theme'),
						"desc" => __('Add your RSS URL here.','si_theme'),
						"id" => "rss_url",
						"std" => "",
						"type" => "text");			

	return $options;
}