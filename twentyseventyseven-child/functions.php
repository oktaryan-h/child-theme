<?php

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

function tssc_theme_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
}

// function tssc_custom_logo_setup() {
// 	$defaults = array(
// 		'height'      => 50,
// 		'width'       => 150,
// 		'flex-height' => true,
// 		'flex-width'  => true,
// 		'header-text' => array( 'site-title', 'site-description' ),
// 	);
// 	add_theme_support( 'custom-logo', $defaults );
// }

// add_action( 'after_setup_theme', 'tssc_custom_logo_setup' );

add_action( 'wp_enqueue_scripts', 'tssc_theme_enqueue_styles' );