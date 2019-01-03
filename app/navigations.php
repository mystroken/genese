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

$nav_menus = array(
	'primary' => __( 'Primary Navigation', 'genese' ),
	'footer'  => __( 'Footer Navigation', 'genese' ),
);

return $nav_menus;
