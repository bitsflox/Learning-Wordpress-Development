<?php 
/*
Plugin Name: My First Plugin
Plugin URI: http://snopytricks.com
Description: This is my first wordpress plugin
Author: Anil Rawat
Version: 1.0
*/

/*************************
	global variable
*************************/

$mfwp_prefix = 'mfwp_';
$mfwp_plugin_name = 'My First Wordpress Plugin';

// retrieve our plugin settings 
$mfwp_options=get_option('mfwp_settings');

/*************************
	Includes
*************************/

include('includes/scripts.php'); // this control all JS / CSS
include('includes/data-processing.php'); // this control all saving of data
include('includes/display-functions.php'); // display content functions
include('includes/admin-page.php'); // this is admin page setting

?>