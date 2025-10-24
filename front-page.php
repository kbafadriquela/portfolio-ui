<?php
/**
 * Template Name: Homepage
 *
 * @package PortfolioUI
 */

get_header();
?>

<main id="main" class="site-main">
    <section id="about">
        <div class="container">
            <div class="hero-container">
                <div class="about-container">
                    <div class="about-title">
                        <h1>Hi, I am <?php echo esc_html(get_field('about_name')); ?>,<br>
                            <?php echo esc_html(get_field('about_profession')); ?>
                        </h1>
                    </div>
                    <div class="about-text">
                        <p><?php echo wp_kses_post(get_field('about_description')); ?></p>
                    </div>
                    <div class="about-link">
                        <a href="<?php echo esc_html(get_field('about_link')); ?>">Download Resume</a>
                    </div>
                </div>
                <div class="about-image-container">
                    <div class="about-image">
                        <svg width="243" height="243">
                            <clipPath id="circle-mask">
                                <circle cx="121.5" cy="121.5" r="121.5" />
                            </clipPath>
                            <?php
                            $img = get_field('about_image');
                            if (!empty($img)): ?>
                                <image class="profile-img" clip-path="url(#circle-mask)" height="100%" width="100%"
                                    xlink:href="<?php echo esc_url($img['url']); ?>" />
                            <?php endif; ?>
                        </svg>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog">
        <div class="blog-container">
            <div class="container">
                <div class="post-header-container">
                    <div class="recent-posts title">
                        <h3>Recent Posts</h3>
                    </div>
                    <div class="all-posts d-none d-lg-block">
                        <a class="link-opacity-10 link-opacity-100-hover" href="<?php echo '/blog'; ?>">View all</a>
                    </div>
                </div>
                <div class="recent-post-container">
                    <div class="post-block">
                        <?php
                        // Display the Post Title with Hyperlink
                        $recent_posts = get_posts(array(
                            'posts_per_page' => 2,
                        ));
                        if ($recent_posts) {
                            foreach ($recent_posts as $recent_post) {
                                ?>

                                <div class="recent-post-widget">
                                    <div class="recent-post-title">
                                        <a
                                            href="<?php the_permalink($recent_post->ID) ?>"><?php echo get_the_title($recent_post->ID); ?></a>
                                    </div>
                                    <div class="recent-post-meta">
                                        <div class="recent-post-date">
                                            <span class="entry-date"><?php echo get_the_date('d M Y', $post->ID); ?></span>
                                        </div>
                                        <div class="sep"></div>
                                        <div class="recent-post-tags">
                                            <?php
                                            $tags = get_the_tags($recent_post->ID);

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
                                        </div>
                                    </div>
                                    <div class="recent-post-summary">
                                        <?php
                                        echo get_the_excerpt($recent_post->ID); ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        // Repeat the process and reset once it hits the limit
                        // wp_reset_postdata(); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="works">
        <div class="featured-works-container">
            <div class="container">
                <div class="featured-works title">
                    <h3>Featured Works</h3>
                </div>
                <div class="featured-works">
                    <ul class="list-group list-group-flush ft-group">
                        <?php
                        $posts = get_posts(array(
                            'posts_per_page' => 3,
                            'post_type' => 'portfolio',
                            'meta_query' => array(
                                array(
                                    'key' => 'is_featured',
                                    'value' => '1',
                                )
                            )
                        ));

                        if ($posts) {
                            foreach ($posts as $post) {
                                echo '<li class="list-group-item"><div class="featured-container">';
                                $html = '<div class="featured-image">';
                                $title = get_the_title($post->ID);
                                $excerpt = get_the_excerpt($post->ID);
                                $postdate = get_the_date('Y', $post->ID);
                                $tags = get_the_tags();
                                $post_link = get_permalink();
                                $post_year = get_year_link($postdate);
                                $thumbnail = get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-responsive'));

                                if (has_post_thumbnail($post)):
                                    $html .= $thumbnail;
                                endif;
                                echo $html;
                                $featured_details = '</div>
                            <div class="featured-details">
                            <div class="featured-title title">
                            <a href="' . $post_link . '"><h2>' . $title . '</h2></a>
                            </div>
                            <div class="featured-meta">
                            <span class="post-date"><a href="' . $post_year . '">' . $postdate . '</a></span>
                            <span class="post-tags">' ?>
                                <?php
                                if (is_array($tags) && !empty($tags)) {
                                    $ul = '<ul>';
                                    $i = 0;
                                    foreach ($tags as $tag) {
                                        $i++;
                                        if ($i == 1) {
                                            $tag_link = get_tag_link($tag->term_id);
                                            $ul .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
                                            $ul .= "{$tag->name}</a></li>";
                                        }
                                    }
                                    $ul .= '</ul>';
                                }
                                $featured_details .= $ul . '</span></div>
                            <div class="featured-excerpt">
                            <p>' . $excerpt . '</p>
                            </div>
                            </li>';

                                echo $featured_details;
                            }
                        }
                        ?>
                    </ul>
                </div> <!-- .featured-works -->
            </div>
        </div>
    </section>
</main>

<?php
get_sidebar();
get_footer();