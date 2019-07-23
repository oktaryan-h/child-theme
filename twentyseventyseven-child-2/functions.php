<?php

/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

function tssc2_custom_scripts() { ?>

	<script type="text/javascript">
		jQuery(document).ready(function() {

			jQuery('#limit-post-frontpage').click(function() {
				jQuery('#section-limit-post-frontpage-value').fadeToggle(400);
			});

			if (jQuery('#limit-post-frontpage:checked').val() === undefined) {
				jQuery('#section-limit-post-frontpage-value').hide();
			}

		});
	</script>

	<?php
}

function tssc2_theme_enqueue_styles() {

	$parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
}

add_action( 'optionsframework_custom_scripts', 'tssc2_custom_scripts' );
add_action( 'wp_enqueue_scripts', 'tssc2_theme_enqueue_styles' );