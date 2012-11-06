<?php

// Custom functions

function imaged_enqueue_scripts() {
	wp_localize_script('imaged', 'ajax', array('ajaxurl'=>admin_url('admin-ajax.php'),'nonce' => wp_create_nonce('ajax-nonce')));
	echo "Hello";
}

add_action('wp_enqueue_scripts', 'imaged_enqueue_scripts');

