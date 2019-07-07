<?php
/**
 * Setting up the theme.
 *
 * @package Genese
 * @subpackage Setup
 * @since 1.0.0
 * @author Mystro Ken <mystroken@gmail.com>
 */

if ( ! function_exists( 'genese_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function genese_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'genese', get_template_directory() . '/resources/lang' );

		/*
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable plugins to manage the document title.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Register menus
		 *
		 * Navigations should be mentioned into app/navigations.php
		 *
		 * We retrieve the array from this file and we pass it to
		 * wp_nav_menu() core functions
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus.
		 */
		$nav_menus = require get_stylesheet_directory() . '/app/navigations.php';
		if ( is_array( $nav_menus ) && ! empty( $nav_menus ) ) {
			register_nav_menus( $nav_menus );
		}

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'genese_thumbnail_avatar', 100, 100, true );
		add_image_size( 'genese_thumbnail_medium', 768, 0, false );
		add_image_size( 'genese_thumbnail_background', 2000, 9999, false );

		/*
		 * Switch default core markup to output valid HTML5.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5.
		 */
		add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );

		/*
		 * Enable support for Post Formats.
		 *
		 * @link http://codex.wordpress.org/Post_Formats.
		 */
		add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ] );

		add_post_type_support( 'page', 'excerpt' );

		// Format large.
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'genese_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function genese_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'genese_content_width', 640 );
}
add_action( 'after_setup_theme', 'genese_content_width', 0 );




if ( ! function_exists( 'genese_enqueue_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 *
	 * @return void
	 */
	function genese_enqueue_scripts() {

		$theme = wp_get_theme();

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_register_style(
			'genese/style/app',
			get_theme_file_uri( '/resources/assets/dist/css/app.css' ),
			false,
			$theme->get( 'Version' )
		);

		wp_enqueue_style( 'genese/style/app' );

		wp_enqueue_script(
			'genese/script/app',
			get_theme_file_uri( '/resources/assets/dist/js/app.js' ),
			array( 'jquery' ),
			$theme->get( 'Version' ),
			true
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'genese_enqueue_scripts', 100 );



/**
 * Register widget area.
 *
 *  Sidebars are filled at app/sidebars.php
 *
 * We retrieve the array from this file and we loop each sub-array to pass it to
 * register_sidebar() core functions
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function genese_widgets_init() {

	$sidebars = require get_stylesheet_directory() . '/app/sidebars.php';

	foreach ( $sidebars as $sidebar ) {

		if ( is_array( $sidebar ) && ! empty( $sidebar ) ) {
			register_sidebar( $sidebar );
		}
	}

	unset( $sidebar );
}
add_action( 'widgets_init', 'genese_widgets_init' );




/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function genese_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'genese_javascript_detection', 0 );
