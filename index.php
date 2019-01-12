<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Genese
 * @since 1.0
 */

?>

<?php if ( have_posts() ) : ?>

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header>
			<h1 class="page-title screen-reader-text">
				<?php single_post_title(); ?>
			</h1>
		</header>
	<?php endif; ?>

	<?php
	// Start the loop.
	while ( have_posts() ) :
		the_post();

		/*
		 * Include the Post-Format-specific template for the content if it's a post, otherwise include the Post-Type-specific template.
		 */
		get_template_part(
			'template-parts/post/item',
			get_post_type() !== 'post' ? get_post_type() : get_post_format()
		);

		// End the loop.
	endwhile;

	// Previous/next page navigation.
	the_posts_pagination(
		array(
			'prev_text'          => __( 'Previous page', 'genese' ),
			'next_text'          => __( 'Next page', 'genese' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'genese' ) . ' </span>',
		)
	);

	// If no content, include the "No posts found" template.
else :
	get_template_part( 'content', 'none' );

endif;
?>
