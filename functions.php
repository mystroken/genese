<?php
/**
 * Genese functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package  WordPress
 * @subpackage Genese
 * @since 1.0
 */

$includes = [
	'inc/setup.php',                 // Theme setup.
	'inc/class-genese-wrapping.php', // Theme wrapper class.
];

foreach ( $includes as $file ) {

	$filepath = locate_template( $file );

	if ( ! $filepath ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'genese' ), $file ), E_USER_ERROR );
	}

	require_once $filepath;
}

unset( $file, $filepath );
