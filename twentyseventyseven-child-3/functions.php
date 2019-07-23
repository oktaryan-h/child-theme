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

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

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

/*
 * This is an example of filtering menu parameters
 */

/*
function prefix_options_menu_filter( $menu ) {
	$menu['mode'] = 'menu';
	$menu['page_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_title'] = __( 'Hello Options', 'textdomain');
	$menu['menu_slug'] = 'hello-options';
	return $menu;
}

add_filter( 'optionsframework_menu', 'prefix_options_menu_filter' );
*/

function my_theme_enqueue_styles() {

	echo 'UX '.of_get_option('limit-post-frontpage', 1);

	$parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);
}

function tss_maintenance_mode() {

	if ( of_get_option( 'maintenance-mode', 0 ) ) {
		wp_die('<h1>Under Maintenance</h1><br />Website under planned maintenance. Please check back later.');
	}
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

add_action('get_header', 'tss_maintenance_mode');