<?php
/**
 * Template part for displaying blog posts
 * 
 * Template Name: Blog Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PortfolioUI
 */
get_header();
?>
<main id="primary" class="site-main">
<div class="container blog-page">
    <div class="page-title"><?php echo single_post_title(); ?></div>
    <?php
    $blogpost = new WP_Query([
        'post_per_page' => '-1',
        'post_type' => 'post',
    ]);
    if ($blogpost->have_posts()) {
        while ($blogpost->have_posts()):
            $blogpost->the_post();
            if ($blogpost) {
                ?>
                <ul class="list-group list-group-flush mx-0">
                <article id="post-<?php the_ID(); ?>" <?php post_class('list-group-item'); ?>>

                    <header class="entry-header">
                        <?php
                        if (is_singular()):
                            the_title('<h1 class="entry-title recent-post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>');
                        else:
                            the_title('<h2 class="entry-title recent-post-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                        endif;

                        if ('post' === get_post_type()):
                            ?>
                            <div class="recent-post-meta">
                                <div class="recent-post-date my-1">
                                    <span class="entry-date"><?php echo get_the_date('d M Y'); ?></span>
                                </div>
                                <div class="sep"></div>
                                <div class="recent-post-tags post-category my-1">
                                    <?php
                                    $tags = get_the_category();

                                    if (is_array($tags) && !empty($tags)) {
                                        $html = '<ul>';
                                        foreach ($tags as $tag) {
                                            $tag_link = get_tag_link($tag->term_id);
                                            $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
                                            $html .= "{$tag->name}</a></li>";
                                        }
                                        echo $html .= '</ul>';
                                    }
                                    ?>
                                </div><!-- .post-meta -->
                            <?php endif; ?>
                    </header><!-- .entry-header -->

                    <?php //portfolioui_post_thumbnail(); ?>

                    <div class="entry-content">
                        <?php
                        the_content(
                            sprintf(
                                wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'portfolioui'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post(get_the_title())
                            )
                        );

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'portfolioui'),
                                'after' => '</div>',
                            )
                        );
                        ?>
                    </div><!-- .entry-content -->

                </article><!-- #post-<?php the_ID(); ?> -->
                </ul>
            <?php }
        endwhile;
        wp_reset_postdata();
    }
    ?>
</div>
</main>
<?php
get_sidebar();
get_footer();
?>