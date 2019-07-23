<?php

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

// define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/inc/' );
// require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// // Loads options.php from child or parent theme
// $optionsfile = locate_template( 'options.php' );
// load_template( $optionsfile );

function tssc3_theme_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
}

function tssc3_maintenance_mode() {

	if ( of_get_option( 'maintenance-mode', 0 ) ) {
		wp_die('<h1>Under Maintenance</h1><br />Website under planned maintenance. Please check back later.');
	}
}

add_action( 'wp_enqueue_scripts', 'tssc3_theme_enqueue_styles' );
add_action('get_header', 'tssc3_maintenance_mode');