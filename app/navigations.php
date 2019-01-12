<?php
/**
 * Navigation Menus
 *
 * The $nav_menus array will be passed to wp_nav_menu() WordPress core function in order to create menus of the theme.
 *
 * You should just fill the array (or leave an empty array) and genese will do the rest.
 * Note: It is important that this file returns an array.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus.
 *
 * @package  Genese
 * @subpackage Navigation_Menus
 * @since 1.0
 */

/*
 * Edit this array to fit your needs.
 */
$nav_menus = array(
	// Primary Navigation.
	'primary' => __( 'Primary Navigation', 'genese' ),
	// Footer Navigation.
	'footer'  => __( 'Footer Navigation', 'genese' ),
);

// Don't touch this line.
return $nav_menus;
