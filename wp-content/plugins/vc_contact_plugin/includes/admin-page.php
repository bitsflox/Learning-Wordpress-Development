<?php 
/*************************
	Constant
*************************/
//echo plugin_dir_path( __FILE__ ); 
//echo plugins_url();die;
define("PLUGIN_DIR_PATH",plugin_dir_path( __FILE__ ));
define("PLUGIN_URL",plugins_url());

function cfwp_contact_page(){

	//
	//include_once PLUGIN_DIR_PATH."/views/add-new.php";

}


function cfwp_add_contact_form(){

	add_menu_page(
		'ContactFormPlugin', // page title
		'Contact Form', //menu title
		'manage_options', // admin level
		'cfwp_contact', // page slug
		'cfwp_contact_page', // callback function
		'dashicons-email', //icon url
		21 //position
		);

	add_submenu_page(
		'cfwp_contact', // Parent slug
		'AddNew', // page Title
		'Add New', // menu title
		'manage_options', // admin level
		'cfwp_contact', // Menu slug
		'cfwp_contact_page'  // callback function
		);

	add_submenu_page(
		'cfwp_contact', // Parent slug
		'All Pages', // page Title
		'All Pages', // menu title
		'manage_options', // admin level
		'cfwp_allpages', // Menu slug
		'cfwp_allpages_function'  // callback function
		);
}

add_action('admin_menu','cfwp_add_contact_form');

function cfwp_allpages_function(){
	//include_once PLUGIN_DIR_PATH. 'views/all-page.php';
}
