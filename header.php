<?php
/**
 * The header template file
 *
 * This is the content displayed on top of your content.
 * It is included on all the template files.
 *
 * @package WordPress
 * @subpackage Genese
 * @since 1.0
 */

?>
<header id="header" class="site__header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<hgroup>
		<h1 itemprop="name">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<p itemprop="description">
			<?php bloginfo( 'description' ); ?>
		</p>
	</hgroup>
</header><!-- .site__header -->
