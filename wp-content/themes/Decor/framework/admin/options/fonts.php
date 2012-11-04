<?php

$options[] = array( "name" => "Fonts",
					"type" => "heading");
					
$options[] = array( "name" => "Select main font",
					"desc" => "select the main font",
					"id" => THEME_SLUG."main_font",
					"options" => array('bebas_neue','alte_haas_grotesk','arvo','league_gothic','nevis','prociono'),
					"type" => "select_letters"
					);
					
$options[] = array( "name" => "Font size customization",
					"desc" => "select 'no' if you want the font sizes to keep their original values or 'yes' so you can select your own values from below",
					"id" => THEME_SLUG."font_sizes",
					"options" => array('no','yes'),
					"type" => "select_letters"
					);
		
$options[] =array(
			"name" => "H1 font size (the page title)",
			"id" => THEME_SLUG."font_size_1",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);	

$options[] =array(
			"name" => "H2 font size",
			"id" => THEME_SLUG."font_size_2",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);					
		
		$options[] =array(
			"name" => "H3 font size (the widgets title)",
			"id" => THEME_SLUG."font_size_3",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);	

$options[] =array(
				"name" => "H4 font size",
			"id" => THEME_SLUG."font_size_4",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);		

		$options[] =array(
				"name" => "H5 font size",
			"id" => THEME_SLUG."font_size_5",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);	

$options[] =array(
					"name" => "H6 font size",
			"id" => THEME_SLUG."font_size_6",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);					
		
		$options[] =array(
					"name" => "Blog post title and portfolio title font size",
			"id" => THEME_SLUG."font_size_7",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);	

$options[] =array(
					"name" => "Main Navigation item font size",
			"id" => THEME_SLUG."font_size_8",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);	

$options[] =array(
					"name" => "Main Navigation dropdown font size",
			"id" => THEME_SLUG."font_size_9",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);	

$options[] =array(
					"name" => "Lightbox title font size",
			"id" => THEME_SLUG."font_size_10",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);					
		
		$options[] =array(
					"name" => "Dropcaps font size",
			"id" => THEME_SLUG."font_size_11",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);	

$options[] =array(
					"name" => "Blog post date font size (the month)",
			"id" => THEME_SLUG."font_size_12",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);		

		$options[] =array(
					"name" => "Blog post date font size (the day)",
			"id" => THEME_SLUG."font_size_13",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);	

$options[] =array(
				"name" => "Pagination buttons font size",
			"id" => THEME_SLUG."font_size_14",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);					
		
		$options[] =array(
				"name" => "The title for Archives and Search pages font size",
			"id" => THEME_SLUG."font_size_15",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);	

$options[] =array(
				"name" => "Bottom Navigation font size",
			"id" => THEME_SLUG."font_size_16",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);				

		$options[] =array(
					"name" => "Copyright text font size",
			"id" => THEME_SLUG."font_size_17",
			"min" => "10",
			"max" => "100",
			"step" => "1",
			"std" => "0",
			"type" => "range",
			"unit" => "px"
		);		
									
					
?>