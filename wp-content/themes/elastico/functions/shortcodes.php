<?php

/*-----------------------------------------------------------------------------------

	Theme Shortcodes

-----------------------------------------------------------------------------------*/
/* Shortcodes formatting */
add_filter('the_content', 'shortcode_empty_paragraph_fix');
    function shortcode_empty_paragraph_fix($content)
    {   
        $array = array (
            '<p>[' => '[', 
            ']</p>' => ']', 
            ']<br />' => ']'
        );

        $content = strtr($content, $array);

		return $content;
 }

 // Enable shortcodes in Text widget
add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------

	Shortcodes Functions

-----------------------------------------------------------------------------------*/

/* Column Shortcodes */

function si_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'si_one_half');

function si_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'si_one_half_last');

function si_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'si_one_third');

function si_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'si_one_third_last');

function si_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'si_two_third');

function si_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'si_two_third_last');

function si_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'si_one_fourth');

function si_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'si_one_fourth_last');

function si_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'si_three_fourth');

function si_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'si_three_fourth_last');

/* Button Shortcode */   

function si_button_black( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self'
		), $atts));
	
   return '<a class="button black" href="'.$url.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button_black', 'si_button_black');

function si_button_red( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self'
		), $atts));
	
   return '<a class="button red" href="'.$url.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button_red', 'si_button_red');

function si_button_blue( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self'
		), $atts));
	
   return '<a class="button blue" href="'.$url.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button_blue', 'si_button_blue');

function si_button_darkblue( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self'
		), $atts));
	
   return '<a class="button darkblue" href="'.$url.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button_darkblue', 'si_button_darkblue');


function si_button_green( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self'
		), $atts));
	
   return '<a class="button green" href="'.$url.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button_green', 'si_button_green');


function si_button_yellow( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self'
		), $atts));
	
   return '<a class="button yellow" href="'.$url.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button_yellow', 'si_button_yellow');


function si_button_orange( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self'
		), $atts));
	
   return '<a class="button orange" href="'.$url.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button_orange', 'si_button_orange');


function si_button_khaki( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self'
		), $atts));
	
   return '<a class="button khaki" href="'.$url.'" target="'.$target.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button_khaki', 'si_button_khaki');



/* Dropcap Shortcode */    
function si_dropcap( $atts, $content = null ) {
   return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'si_dropcap');

/* highlight  */
function si_highlight( $atts, $content = null ) {
   return '<span class="highlight">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight', 'si_highlight');



/* Toggle content shortcode */
function si_toggle_content( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title'      => '',
    ), $atts));
	
	return '<div class="toggle_container"><h4 class="toggle"><a href="#">' . $title . '</a></h4><div class="toggle_content"><div class="block">' . do_shortcode($content) . '</div></div></div>';
	
}
add_shortcode('toggle', 'si_toggle_content');

/* accordion shortcode */
function si_accordion($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false,
	), $atts));
	
	if (!preg_match_all("/(.?)\[(accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="acc_title"><h4>' . $matches[3][$i]['title'] . '</h4></div>';
			$output .= '<div class="acc_content">' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		
		return '<div class="accordion">' . $output . '</div>';
	}
}
add_shortcode('accordions', 'si_accordion');

/* Tabs Shortcode */
function si_tabs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false
	), $atts));
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '<ul class="'.$code.'">';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<li><a href="#">' . $matches[3][$i]['title'] . '</a></li>';
		}
		$output .= '</ul>';
		$output .= '<div class="panes">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div>' . do_shortcode(trim($matches[5][$i])) . '</div>';
		}
		$output .= '</div>';
		
		return '<div class="tabs_container">' . $output . '</div>';
	}
}
add_shortcode('tabs', 'si_tabs');


?>