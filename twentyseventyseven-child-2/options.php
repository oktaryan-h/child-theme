<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
		// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
	//return 'twentyseventyseven-child-2';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();

	$options[] = array(
		'name' => __( 'Basic Settings', 'twentyseventyseven-child-2' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Upload Logo', 'twentyseventyseven-child-2' ),
		'desc' => __( 'This creates a full size uploader that previews the image.', 'twentyseventyseven-child-2' ),
		'id' => 'upload-logo',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Limit Post to show on Front Page', 'twentyseventyseven-child-2' ),
		'desc' => __( 'Limit Post', 'twentyseventyseven-child-2' ),
		'id' => 'limit-post-frontpage',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Posts to limit', 'twentyseventyseven-child-2' ),
		'desc' => __( 'Posts.', 'twentyseventyseven-child-2' ),
		'id' => 'limit-post-frontpage-value',
		'std' => '0',
		'class' => 'mini',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Show Sidebar on Front Page', 'twentyseventyseven-child-2' ),
		'desc' => __( 'Show Sidebar', 'twentyseventyseven-child-2' ),
		'id' => 'show-sidebar-frontpage',
		'std' => '1',
		'type' => 'checkbox'
	);

	return $options;
}