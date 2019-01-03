<?php
/**
 * Genese Helper Functions
 *
 * Define here all your functions that will not be hooked to WordPress
 *
 * @package  WordPress
 * @subpackage Genese
 * @since 1.0
 */

/**
 * Returns the full path to the main template file.
 *
 * @package Genese
 * @since 1.0
 * @return string
 */
function genese_template_path() {
	return Genese_Wrapping::$main_template;
}
