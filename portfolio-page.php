<?php
/**
 * Template part for displaying blog posts
 * 
 * Template Name: Portfolio Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PortfolioUI
 */
get_header();
?>
<main id="primary" class="site-main">
    <div class="container portfolio-page">
        <div class="page-title"><?php echo single_post_title(); ?></div>
        <div class="featured-works-container">
            <div class="featured-works">
                <ul class="list-group list-group-flush ft-group">
                    <?php
                    $posts = get_posts(array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => -1,
                        'field' => 'slug',
                        // 'meta_query' => array(
                        //     array(
                        //         'key' => 'is_featured',
                        //         'value' => '1',
                        //     )
                        // )
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
                                    if($i==1){
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
    </div>
</main>
<?php
get_sidebar();
get_footer();
?>