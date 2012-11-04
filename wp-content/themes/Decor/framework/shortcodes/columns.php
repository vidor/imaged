<?php
function add_shortcode_column($atts, $content = null, $code) {

	return '<div class="'.$code.'">' . wpautop(do_shortcode(trim($content))) . '</div>';
}
function add_shortcode_column_last($atts, $content = null, $code) {

	return '<div class="'.str_replace('_last','',$code).' last">' . wpautop(do_shortcode(trim($content))) . '</div><div class="clearboth"></div>';
}

add_shortcode('one_half', 'add_shortcode_column'); 
add_shortcode('one_third', 'add_shortcode_column');
add_shortcode('one_fourth', 'add_shortcode_column');
add_shortcode('two_third', 'add_shortcode_column');
add_shortcode('three_fourth', 'add_shortcode_column');
add_shortcode('one_half_last', 'add_shortcode_column_last');
add_shortcode('one_third_last', 'add_shortcode_column_last');
add_shortcode('one_fourth_last', 'add_shortcode_column_last');
add_shortcode('two_third_last', 'add_shortcode_column_last');
add_shortcode('three_fourth_last', 'add_shortcode_column_last');
