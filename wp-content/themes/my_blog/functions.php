<?php 

function learningWordPress_resources(){
	wp_enqueue_style('style',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','learningWordPress_resources');

// Navigation Menus

register_nav_menus(array(
	'primary' => __('Primary Menu'),
	'footer' => __('Footer Menu'),
	));



// Get top ancestor

function get_top_ancestor_id(){
	global $post;
	
	if($post->post_parent){

		$ancestors =array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];

	}

	return $post->ID;
}


// Does page have children 

function has_children(){
	global $post;

	$pages= get_pages('child_of=' .$post->ID);

	return count($pages);
}

// Customixe execrpt word count length

function custom_excerpt_lenght(){
	return 25;
}

add_filter('excerpt_length','custom_excerpt_lenght');


// Theme Setup
function learningWordPress_setup(){

	// Navigation Menus

register_nav_menus(array(
	'primary' => __('Primary Menu'),
	'footer' => __('Footer Menu'),
	));

	// Add feature image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('banner-image', 920, 210, array('left','top'));

}

add_action('after_setup_theme','learningWordPress_setup');


if ( ! function_exists( 'post_pagination' ) ) :
   function post_pagination() {
     global $wp_query;
     $pager = 999999999; // need an unlikely integer
 
        echo paginate_links( array(
             'base' => str_replace( $pager, '%#%', esc_url( get_pagenum_link( $pager ) ) ),
             'format' => '?paged=%#%',
             'current' => max( 1, get_query_var('paged') ),
             'total' => $wp_query->max_num_pages
        ) );
   }
endif;