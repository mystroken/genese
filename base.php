<?php
/**
 * Theme Wrapper.
 *
 * The goal of the theme wrapper is to
 * remove any repeated markup from individual template.
 *
 * @see https://roots.io/sage/docs/theme-templates/
 *
 * @package Genese
 * @subpackage Base_Template
 * @since 1.0.0
 * @author Mystro Ken <mystroken@gmail.com>
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> role="document" itemscope itemtype="http://schema.org/WebPage">
<div id="page" class="site">

	<?php get_header(); ?>

	<div id="content" class="site__content">

		<main id="main" class="site__main" role="main" itemprop="mainContentOfPage">
		<?php

		/*
		 * Get the right WordPress template file.
		 */
		require genese_template_path();
		?>
		</main><!-- .site__main -->

		<?php

		/*
		 * Include the site sidebar.
		 * Even if you don't need a sidebar, do not remove this line.
		 */
		get_sidebar();
		?>

	</div><!-- .site__content -->

	<?php get_footer(); ?>

</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
