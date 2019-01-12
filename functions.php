<?php
/**
 * Genese files includes
 *
 * The $includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @package  WordPress
 * @subpackage Genese
 * @since 1.0
 * @author Mystro Ken <mystroken@gmail.com>
 */

$includes = array(
	'app/inc/class-genese-wrapping.php', // Theme wrapper class.
	'app/inc/helpers.php',               // Helper functions.
	'app/inc/setup.php',                 // Theme setup.
	'app/inc/template-tags.php',         // Custom template tags functions.
);

foreach ( $includes as $file ) {

	$filepath = locate_template( $file );

	if ( ! $filepath ) {
		/* translators: %s: Failed included file. */
		trigger_error( sprintf( esc_html_x( 'Error locating %s for inclusion', 'genese' ), $file ), E_USER_ERROR );
	}

	require_once $filepath;
}

unset( $file, $filepath );
