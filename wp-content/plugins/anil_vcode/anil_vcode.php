<?php 

/*
Plugin Name: anil_vcode
*/

define( 'ANIL_VCODE_VERSION', '3.1.10' );
define( 'ANIL_VCODE__MINIMUM_WP_VERSION', '3.2' );
define( 'ANIL_VCODE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

add_action( 'wp_head', 'anil_vcode');

register_activation_hook( __FILE__, array( 'anil_vcode', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'anil_vcode', 'plugin_deactivation' ) );

function anil_vcode() {

echo '<marquee>Hi there!  I\'m just a plugin, not much I can do when called directly.</marquee>';

}

add_action( 'wp_footer', 'anil_Footervcode');
function anil_Footervcode( ) {
    echo '<marquee>Hi there!  I\'m just a plugin, not much I can do when called directly.</marquee>';
}