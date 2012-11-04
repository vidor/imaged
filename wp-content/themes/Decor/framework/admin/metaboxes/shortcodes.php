<?php

global $shortcode_options;


$shortcode_options = array(	
    

			
	array(
				"name" => "Contact Form",
				"id" => "contactform",
				"options" => array (
					array(
						"name" => "Email (optional)",
						"id" => "email",
						"type" => "text",
						"desc" => "leave empty if you want the admin email to be used"
					)
				)
			),
			
	 array(
				  "name" => "Gallery",
				  "id" => "gallery",
				  "options" => array(

					  array(
						  "name" => "Galleries",
						  "id" => "galleries",
						  "type" => "multiselect_galleries",
					  ),
		
					 
			
					
										array(
						"name" => "Size (optional)",
						"id" => "size",
						"options" => array('...','small','medium','large','fullwidth'),
						"type" => "select"
						
						
					),
					 
					 
		           ),
				   
	           ),
	
		
			   
	array(
		"name" => "Images",
		"id" => "images",
		"options" => array(
			
					array(
						"name" => "Image Atatchment ID",
						"desc" => "click browse and click the 'Insert ID' button",
						"id" => "id",
						"type" => "upload",
					),
					

					

									
		),
	),
			   
			   
	array(
		"name" => "Layout",
		"id" => "layout",
		"subtype" => "yes",
		"options" => array(
			array(
				"name" => "1/2 - 1/2",
				"id" => "1_2_1_2",
				"options" => array (
					array(
						"name" => "1/2 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/2 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/3 - 1/3 - 1/3",
				"id" => "1_3_1_3_1_3",
				"options" => array (
					array(
						"name" => "1/3 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/3 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/3 content last",
						"id" => "3",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/4 - 1/4 - 1/4 - 1/4",
				"id" => "1_4_1_4_1_4_1_4",
				"options" => array (
					array(
						"name" => "1/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content",
						"id" => "3",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content last",
						"id" => "4",
						"type" => "textarea"
					),
				)
			),

			array(
				"name" => "1/3 - 2/3",
				"id" => "1_3_2_3",
				"options" => array (
					array(
						"name" => "1/3 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "2/3 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "2/3 - 1/3",
				"id" => "2_3_1_3",
				"options" => array (
					array(
						"name" => "2/3 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/3 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/4 - 3/4",
				"id" => "1_4_3_4",
				"options" => array (
					array(
						"name" => "1/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "3/4 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "3/4 - 1/4",
				"id" => "3_4_1_4",
				"options" => array (
					array(
						"name" => "3/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content last",
						"id" => "2",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/4 - 1/4 - 1/2",
				"id" => "1_4_1_4_1_2",
				"options" => array (
					array(
						"name" => "1/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/2 content last",
						"id" => "3",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/4 - 1/2 - 1/4",
				"id" => "1_4_1_2_1_4",
				"options" => array (
					array(
						"name" => "1/4 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/2 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content last",
						"id" => "3",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "1/2 - 1/4 - 1/4",
				"id" => "1_2_1_4_1_4",
				"options" => array (
					array(
						"name" => "1/2 content",
						"id" => "1",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content",
						"id" => "2",
						"type" => "textarea"
					),
					array(
						"name" => "1/4 content last",
						"id" => "3",
						"type" => "textarea"
					),
				)
			),
			
		),
	),
	
			   	
	array(
		"name" => "Typography",
		"id" => "typography",
		"subtype" => "yes",
		"options" => array(
			
			array(
				"name" => "Block Quotes",
				"id" => "blockquote",
				"options" => array (
				
					array(
						"name" => "Content",
						"id" => "content",
						"type" => "textarea"
					),

				)
			),
			
			array(
				"name" => "Highlight",
				"id" => "highlight",
				"options" => array (
					array(
						"name" => "Content",
						"id" => "content",
						"type" => "textarea"
					),
					array(
						"name" => "Color (optional)",
						"id" => "color",
						"options" => array(
						    "...",
							"black",
							"gray",
							"red",
							"yellow",
							"blue",
							"pink",
							"green",
							"orange",
							"magenta",
						),
						"type" => "select",
					),
				)
				
			),
			
			array(
				"name" => "Dropcap",
				"id" => "dropcap",
				"options" => array (
					array(
						"name" => "Text",
						"id" => "text",
						"type" => "text"
					),
				)
			),
			
			
			
			
			
		),
	),
	
		array(
				"name" => "Tabs",
				"id" => "tabs",
				"options" => array (
					array(
						"name" => "Count",
						"id" => "count",
						"min" => 2,
						"max" => 8,
						"step" => "1",
						"type" => "range"
					),
					
					array(
						"name" => "Tab Title 1",
						"id" => "tab_title_1",
						"type" => "text"
					),
					
					array(
						"name" => "Tab Content 1",
						"id" => "tab_content_1",
						"type" => "textarea"
					),
					
					array(
						"name" => "Tab Title 2",
						"id" => "tab_title_2",
						"type" => "text"
					),
					
					array(
						"name" => "Tab Content 2",
						"id" => "tab_content_2",
						"type" => "textarea"
					),
					
										array(
						"name" => "Tab Title 3",
						"id" => "tab_title_3",
						"type" => "text"
					),
					
					array(
						"name" => "Tab Content 3",
						"id" => "tab_content_3",
						"type" => "textarea"
					),
					
										array(
						"name" => "Tab Title 4",
						"id" => "tab_title_4",
						"type" => "text"
					),
					
					array(
						"name" => "Tab Content 4",
						"id" => "tab_content_4",
						"type" => "textarea"
					),
					
										array(
						"name" => "Tab Title 5",
						"id" => "tab_title_5",
						"type" => "text"
					),
					
					array(
						"name" => "Tab Content 5",
						"id" => "tab_content_5",
						"type" => "textarea"
					),
					
										array(
						"name" => "Tab Title 6",
						"id" => "tab_title_6",
						"type" => "text"
					),
					
					array(
						"name" => "Tab Content 6",
						"id" => "tab_content_6",
						"type" => "textarea"
					),
					
										array(
						"name" => "Tab Title 7",
						"id" => "tab_title_7",
						"type" => "text"
					),
					
					array(
						"name" => "Tab Content 7",
						"id" => "tab_content_7",
						"type" => "textarea"
					),
					
										array(
						"name" => "Tab Title 8",
						"id" => "tab_title_8",
						"type" => "text"
					),
					
					array(
						"name" => "Tab Content 8",
						"id" => "tab_content_8",
						"type" => "textarea"
					),
					
										
					
					
					
					
				)
			),
	
	
	

	array(
		"name" => "Videos",
		"id" => "videos",
		"subtype" => "yes",
		"options" => array(
			array(
				"name" => "YouTube",
				"id" => "youtube",
				"options" => array(
					array(
						"name" => "Video ID",
						"desc" => "the id from the video's URL (http://www.youtube.com/watch?v=<span style='color:red'>d0vXxH1IEmQ</span>)",
						"id" => "id",
						"type" => "text",
					),
					
				),
			),
			array(
				"name" => "Vimeo",
				"id" => "vimeo",
				"options" => array(
					array(
						"name" => "Video ID",
						"desc" => "the id from the video's URL (http://vimeo.com/<span style='color:red'>123456</span>)",
						"id" => "id",
						"type" => "text",
					),
					
				),
			),

		),
	),
	
	
	
	

	
	
	
	
	
	
	
	
);				



function meta_options_shortcode($shortcode_options) {
	

	
	global $shortcode_options;
	
	echo '<div>
			<table class="metabox_table">
				<tr>
					<th><h4><label>Shortcode</label></h4></th>
					<td><select id="first_sc_select">
							<option value="none">select which shortcode to add</option>';
	
							foreach($shortcode_options as $shortcode) 
									echo '<option value="'.$shortcode['id'].'">'.$shortcode['name'].'</option>';
							
	
				echo '</select>
					</td>
				</tr>
			</table>
		</div>';
	
	foreach($shortcode_options as $shortcode):
	
			echo '<div class="first_sc_container first_sc_container_'.$shortcode['id'].'">';
			
			if(!isset($shortcode['subtype'])):
							
			    echo '<table class="metabox_table">';
				foreach($shortcode['options'] as $option):
					
					echo '<tr>';
					echo '<th><h4>'.$option['name'].'</h4></th>';
					
					echo '<td class="option">';
					$option['id']='sc_'.$shortcode['id'].'_'.$option['id'];
					
					renderHTML($option);
					
					echo '</td>';

					if(!isset($option['desc'])) $option['desc']='';

					echo '<td class="description">'.$option['desc'].'</td>';
					echo '</tr>';
					
				endforeach;
				echo '</table>';
				
			else:
			
				echo '<div>
						<table class="metabox_table">
							<tr><th><h4><label>Type</label></h4></th>
							<td><select class="secondary_sc_select secondary_sc_select_'.$shortcode['id'].'">
									<option value="none">...</option>';
									
									foreach($shortcode['options'] as $secondary_shortcode)
										echo '<option value="'.$secondary_shortcode['id'].'">'.$secondary_shortcode['name'].'</option>';
								
				
							echo '</select>
								 </td>
								</tr>
							</table>
						</div>';
				
				foreach($shortcode['options'] as $secondary_shortcode):
					echo '<div class="secondary_sc_container secondary_sc_container_'.$secondary_shortcode['id'].'">
							<table class="metabox_table">';
							
							foreach($secondary_shortcode['options'] as $option):
								
								echo '<tr>';
								echo '<th><h4>'.$option['name'].'</h4></th>';
								
								echo '<td class="option">';
								$option['id']='sc_'.$shortcode['id'].'_'.$secondary_shortcode['id'].'_'.$option['id'];
								
								renderHTML($option);
								
								echo '</td>';

								if(!isset($option['desc'])) $option['desc']='';

								echo '<td class="description">'.$option['desc'].'</td>';
								echo '</tr>';
							  
							endforeach;
					echo '</table>
						</div>';
				endforeach;
		
			endif;
			
			echo '</div>';
		endforeach;
		
		echo '<div id="sc_error" class="hidden">Please fill all the required fields:<br/> fill all the required fields fill all the required fields</div><br/>';
		echo '<input type="button" id="add_shortcode" class="button-primary hidden" value="Add Shortcode"/>';


}

function create_meta_box_shortcode() {

	if ( function_exists('add_meta_box') ) {
		
		add_meta_box( 'add_shortcode_metabox', 'Add Shortcode', 'meta_options_shortcode', 'post', 'normal', 'high' );
		add_meta_box( 'add_shortcode_metabox', 'Add Shortcode', 'meta_options_shortcode', 'page', 'normal', 'high' );
		add_meta_box( 'add_shortcode_metabox', 'Add Shortcode', 'meta_options_shortcode', 'portfolio', 'normal', 'high' );
	}
}

add_action('admin_menu', 'create_meta_box_shortcode');




function renderHTML($opt){
	
	    $output='';
	
		switch($opt['type']):
		case 'select':
		
			$output .= '<select id="'. $opt['id'] .'">';
		
			foreach ($opt['options'] as $option) {
				
				 $output .= '<option>';
				 $output .= $option;
				 $output .= '</option>';
			 
			 } 
			 $output .= '</select>';

			
		break;
		
		case 'text':

			$output .= '<input id="'. $opt['id'] .'" value="" />';
			
		break;
		case 'textarea':
			
			$output .= '<textarea id="'. $opt['id'] .'"></textarea>';
			
		break;
		
		
		
		case 'upload':
		
		    $output .= '<div class="op_upload_wrap" >';
			$output .= '<input id="'. $opt['id'] .'" value="" />';
			$output .= '<button class="button-primary">Browse</button>';
			$output .= '</div>';
		
		break;
		case "range":
			
			$output .= '<div class="range-input-container">';
			
			$output .= '<input id="'. $opt['id'].'" type="range" ';
			
			if (isset($opt['min'])) $output .= '" min="' . $opt['min'];
			if (isset($opt['max'])) $output .= '" max="' . $opt['max'];
			if (isset($opt['step'])) $output .= '" step="' . $opt['step'];
			$output .= '" />';
			
			if (isset($opt['unit'])) $output .= '<span>' . $opt['unit'] . '</span>';
			
			$output .= '</div>';
			
	    break;
		
		case 'multiselect_portfolio':

		   $args = array("hide_empty" => 1,"taxonomy" => "portfolio_category");  
		   
		   $of_categories_obj = get_categories($args);


		   
		   $output .='<select style="height:120px;" id="'. $opt['id'] .'" multiple="multiple">';
		   foreach ($of_categories_obj as $of_cat):
			  


				$output .= '<option value="'.$of_cat->cat_ID.'">'.$of_cat->cat_name.'</option>';
				 
		   endforeach;
		   $output .='</select>';
		   
		break;
		
		case 'multiselect_galleries':

		   $args = array("post_type" => "gallery", "numberposts" => "-1");           
		   
		   $of_categories_obj = get_posts($args);


		   
		   $output .='<select style="height:120px;" id="'.$opt['id'].'" multiple="multiple">';
		   foreach ($of_categories_obj as $of_cat):
			  


				$output .= '<option value="'.$of_cat->ID.'">'.$of_cat->post_title.'</option>';
				 
		   endforeach;
		   $output .='</select>';
		   
		break;
		
		case "select_gallery":

			$args = array("post_type" => "gallery", "numberposts" => "-1");                    

		  	$posts_obj = get_posts($args);
		   
			$output .= '<select id="'. $opt['id'] .'">';
				 
			foreach ($posts_obj  as $cat) {
				
				 $output .= '<option value="'.$cat->ID.'">';
				 $output .= $cat->post_title;
				 $output .= '</option>';
			 
			 } 
			 $output .= '</select>';
			
	    break;

	endswitch;
	
	echo $output;
}







?>