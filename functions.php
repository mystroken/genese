<?php

add_action( 'wp_enqueue_scripts', 'assets', 100 );
function assets() {

	wp_enqueue_script(
		'genese/vendors-js',
		get_theme_file_uri('/assets/dist/js/vendors.app.js'),
		[
			'jquery',
		],
		filemtime( get_stylesheet_directory() . '/assets/dist/js/vendors.app.js' ),
		true
	);

	wp_enqueue_script(
		'genese/app-js',
		get_theme_file_uri('/assets/dist/js/app.js'),
		[
			'jquery',
		],
		filemtime( get_stylesheet_directory() . '/assets/dist/js/app.js' ),
		true
	);

	wp_enqueue_script(
		'genese/main-js',
		get_theme_file_uri('/assets/dist/js/main.app.js'),
		[
			'jquery',
		],
		filemtime( get_stylesheet_directory() . '/assets/dist/js/main.app.js' ),
		true
	);
}
