<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'neve_child_load_css' ) ):
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css() {
		wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style' ), NEVE_VERSION );
	}
endif;
add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );

/**
 * Add image sizes.
 */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'crae-post-image', 684, 684, false );
	add_image_size( 'crae-threecol-featured-image', 313, 313, false );
}
/**
 * Select image sizes from admin.
 */
add_filter( 'image_size_names_choose', 'crae_custom_sizes' );
function crae_custom_sizes( $sizes ) {
	 return array_merge( $sizes, array(
			 'crae-post-image' => __( 'Post image' ),
			 'crae-threecol-featured-image' => __( 'Featured image in three columns layout' ),
	 ) );
}
