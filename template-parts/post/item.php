<?php
/**
 * The template for displaying content for index/archive/search.
 *
 * @package WordPress
 * @subpackage Genese
 * @since 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemid="<?php echo esc_url( get_permalink() ); ?>" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="entry-header">

		<?php
		the_title(
			sprintf(
				'<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">',
				esc_url( get_permalink() )
			),
			'</a></h2>'
		);


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

	<div class="entry-content" itemprop="description">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

</article>
