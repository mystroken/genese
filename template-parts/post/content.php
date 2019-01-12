<?php
/**
 * The template for displaying content for single.
 *
 * @package WordPress
 * @subpackage Genese
 * @since 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemprop="mainEntity" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="entry-header">

		<?php

		the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				genese_posted_on();
				genese_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php genese_post_thumbnail(); ?>

	<div class="entry-content" itemprop="articleBody">
		<?php
		the_content(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Continue reading %s', 'genese' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			)
		);

		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'genese' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'genese' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) :
		get_template_part( 'author-bio' );
	endif;
	?>

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'genese' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
