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
 */

$includes = array(
	'app/inc/class-genese-wrapping.php', // Theme wrapper class.
	'app/inc/helpers.php',               // Helper functions.
	'app/inc/setup.php',                 // Theme setup.
);

foreach ( $includes as $file ) {

	$filepath = locate_template( $file );

	if ( ! $filepath ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'genese' ), $file ), E_USER_ERROR );
	}

	require_once $filepath;
}

unset( $file, $filepath );
