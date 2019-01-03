<?php
/**
 * Theme Wrapper
 *
 * @link https://roots.io/sage/docs/theme-wrapper/
 * @link http://scribu.net/wordpress/theme-wrappers.html
 *
 * @package  Genese
 * @subpackage Theme_Wrapper
 * @since 1.0
 */

add_filter( 'template_include', array( 'Genese_Wrapping', 'wrap' ), 109 );
/**
 * Theme Wrapper
 */
class Genese_Wrapping {


	/**
	 * Stores the full path to the main template file.
	 *
	 * @var string $main_template
	 */
	public static $main_template;

	/**
	 * Basename of template file.
	 *
	 * @var string
	 */
	public $slug;

	/**
	 * Array of templates.
	 *
	 * @var array $templates
	 */
	public $templates;

	/**
	 * Stores the base name of the template file; e.g: 'page' for 'page.php' etc.
	 *
	 * @var string $base
	 */
	public static $base;




	/**
	 * Wrapping constructor
	 *
	 * @param  string $template the template to load.
	 */
	public function __construct( $template = 'base.php' ) {

		$this->slug      = basename( $template, '.php' );
		$this->templates = [ $template ];

		if ( self::$base ) {
			$str = substr( $template, 0, -4 );
			array_unshift( $this->templates, sprintf( $str . '-%s.php', self::$base ) );
		}
	}




	/**
	 * Returns the templates.
	 *
	 * @return  string
	 */
	public function __toString() {
		$this->templates = apply_filters( 'genese_wrap_' . $this->slug, $this->templates );
		return locate_template( $this->templates );
	}




	/**
	 * Set the correct template to load.
	 *
	 * @param  string $main the template file expected to be loaded.
	 *
	 * @return  Genese_Wrapping
	 */
	public static function wrap( $main ) {

		// Check for other filters returning null.
		if ( ! is_string( $main ) ) {
			return $main;
		}

		self::$main_template = $main;
		self::$base          = basename( self::$main_template, '.php' );

		if ( 'index' === self::$base ) {
			self::$base = false;
		}

		return new Genese_Wrapping();

	}
}
