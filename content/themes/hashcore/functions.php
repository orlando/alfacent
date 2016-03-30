<?php
/**
 * Hashcore includes
 *
 * The $hashcore_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @package Hashcore
 */

$hashcore_includes = [
	'/inc/setup.php',						// All setup of theme.
	'/inc/custom-header.php',		// Implement the Custom Header feature.
	'/inc/template-tags.php',		// Custom template tags for this theme.
	'/inc/extras.php',					// Custom functions that act independently of the theme templates.
	'/inc/customizer.php',			// Customizer additions
	'/inc/jetpack.php',					// Load Jetpack compatibility file.
	'/inc/config-tgm.php',			// Config TGM plugins installer.
	'/inc/admin/menus-register.php', // Custom menu of Theme.
	'/inc/widgets-register.php',		 // Widgets path register.
];

foreach ( $hashcore_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'hashcore' ), $file ), E_USER_ERROR );
	}

	require_once $filepath;
}
unset( $file, $filepath );
