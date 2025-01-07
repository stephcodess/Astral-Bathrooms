<?php
/*
Template Name: Project detail
*/

get_header();
?>

<section class="blog-detail-section">
    <div class="container">
        <div class="detail-wrapper">
            <?php

            $post_slug = get_query_var('post_slug');
            if ($post_slug) {
                // Set up a custom query to fetch the post by its slug
                $args = array(
                    'name' => $post_slug,
                    'post_type' => 'manage-project',
                    'posts_per_page' => 1,
                );

                $details_query = new WP_Query($args);

                if ($details_query->have_posts()):
                    while ($details_query->have_posts()):
                        $details_query->the_post();
                        ?>
                        <h1 class="header"><?php the_title(); ?></h1>
                        <div class="blog-img" data-aos="fade-up" data-aos-duration="3000">
                            <img src="<?php echo get_field('main_image'); ?>" alt="" />
                        </div>
                        <p data-aos="fade-up" data-aos-duration="2000">
                            <?php the_field('short_text') ?>
                        </p>
                        <div class="grid-container">
                            <div class="grid-item" data-aos="fade-up" data-aos-duration="1000"><img
                                    src="<?php echo get_field('gallery_image_1')['url']; ?>" alt="image 1"></div>
                            <div class="grid-item" data-aos="fade-up" data-aos-duration="2000"><img
                                    src="<?php echo get_field('gallery_image_2')['url']; ?>" alt=""></div>
                            <div class="grid-item" data-aos="fade-up" data-aos-duration="3000"><img
                                    src="<?php echo get_field('gallery_image_3')['url']; ?>" alt=""></div>
                        </div>
                        <div class="caption" data-aos="fade-up" data-aos-duration="2000">
                            <span><?php the_field('testimonial') ?></span>
                        </div>
                        <p data-aos="fade-up" data-aos-duration="2000">
                            <?php the_field('full_text') ?>
                        </p>

                        <?php
                    endwhile;

                    wp_reset_postdata();
                else:
                    echo '<p>No post found.</p>';
                endif;
            } else {
                echo '<p>No post slug provided.</p>';
            }

            ?>
        </div>
        <a href="<?php echo home_url("/project-listings"); ?>" class="btn">
            <button style="cursor:pointer;">view more projects</button>
        </a>
    </div>
</section>

<?php get_footer() ?>