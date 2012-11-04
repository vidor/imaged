<?php

$options[] = array( "name" => "Slideshow",
					"type" => "heading");
					
$options[] = array( "name" => "Default Gallery",
					"desc" => "the gallery that will be used as a fullscreen slideshow on every page. Create a gallery by going to Galleries -> Add New",
					"id" => THEME_SLUG."default_gallery",
					"type" => "select_slideshow");
					
$options[] = array( "name" => "Overlay Color",
					"id" => THEME_SLUG."overlay_color",
					"std" => "#efefef",
					"type" => "colorpicker");
					
$options[] = array( "name" => "Overlay Opacity",
					"id" => THEME_SLUG."overlay_opacity",
					"min" => "0",
					"max" => "1",
					"step" => "0.1",
					"std" => "0.9",
					"type" => "range");
					

					
$options[] = array( "name" => "Slide Interval",
					"desc" => "specify the milliseconds between slides",
					"id" => THEME_SLUG."slide_interval",
					"min" => "2000",
					"max" => "10000",
					"step" => "1000",
					"unit" => "ms",
					"std" => "6000",
					"type" => "range"
					);
					
$options[] = array( "name" => "Transition Effect",
					"desc" => "specify the effect between slides",
					"id" => THEME_SLUG."slide_effect",
					"std" => "fade",
					"options" => array(
					"fade",
					"slide top",
					"slide right",
					"slide bottom",
					"slide left",
					"carousel right",
					"carousel left"
					),
					"type" => "select"); 

									
					
?>