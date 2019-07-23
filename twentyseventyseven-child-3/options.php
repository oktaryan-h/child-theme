<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'twentyseventyseven-child-3';
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
		'name' => __( 'Basic Settings', 'twentyseventyseven-child-3' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Upload Logo', 'twentyseventyseven-child-3' ),
		'desc' => __( 'This creates a full size uploader that previews the image.', 'twentyseventyseven-child-3' ),
		'id' => 'upload-logo',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Maintenance Mode', 'twentyseventyseven-child-3' ),
		'desc' => __( 'Shows Maintenance Mode to the visitor.', 'twentyseventyseven-child-3' ),
		'id' => 'maintenance-mode',
		'std' => '0',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Text Editor', 'twentyseventyseven-child-3' ),
		'type' => 'heading'
	);

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress,wplink' )
	);

	$options[] = array(
		'name' => __( 'Default Text Editor', 'twentyseventyseven-child-3' ),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'twentyseventyseven-child-3' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);

	return $options;
}