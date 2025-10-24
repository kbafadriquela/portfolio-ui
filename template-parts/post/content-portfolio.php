<?php
/**
 * Template part for displaying portfolio posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PortfolioUI
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-page'); ?>>

	<header class="entry-header">
		<?php
		
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title featured-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title featured-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'portfolio' === get_post_type() ) :
			?>
			<div class="entry-meta featured-meta">
				<span class="post-date"><a href='<?php echo get_year_link(''); ?>'><?php the_date('Y'); ?></a></span>
				<span class="post-tags"><a href='<?php get_tag_link(the_tags(), the_ID() ); ?>'><?php the_tags('<ul><li>', '</li><li>', '</li></ul>' ); ?></a></span>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'portfolioui' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
