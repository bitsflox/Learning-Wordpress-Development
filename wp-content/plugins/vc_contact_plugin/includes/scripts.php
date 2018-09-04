<?php
/*************************
	Scripts
*************************/
function cfwp_load_scripts(){

	wp_enqueue_style('cfwp-styles',plugin_dir_url(__FILE__) . 'css/plugin_styles.css');
	
}

add_action('wp_enqueue_scripts','cfwp_load_scripts');