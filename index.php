<?php get_header(); ?>

<?php
/*
Template Name: Front Page
*/

get_header();
$args = array(
    'post_type' => 'page',
    'name' => 'home',
    'posts_per_page' => 1,
);

$contacts_query = new WP_Query($args);

if ($contacts_query->have_posts()):
    while ($contacts_query->have_posts()):
        $contacts_query->the_post();
        // get_template_part('template-parts/content', 'about');
        ?>
        <!--==============================
        landing Banner
        ==============================-->
        <section class="landing-banner home d-sm-none"
            style="background-image:url(<?php echo get_field('banner_image_desktop')['url'] ?>)">
            <div class="landing-banner-text display-flex flex-column" data-aos="fade-in-right" data-aos-duration="3000">
                <span><?php the_field('main_banner_text') ?></span>
                <span><?php the_field('main_banner_title') ?></span>

            </div>
        </section>
        <section class="landing-banner d-lg-none"
            style="background-image:url(<?php echo get_field('banner_image_mobile')['url'] ?>)">
            <div class="landing-banner-text display-flex flex-column" data-aos="fade-in-right" data-aos-duration="3000">
                <span><?php the_field('main_banner_text') ?></span>
                <span><?php the_field('main_banner_title') ?></span>

            </div>
        </section>

        <!--==============================
     section one
    ==============================-->
        <section class="home-section-1">
            <div class="inner display-flex flex-row container">
                <div class="left display-flex flex-column">
                    <span>
                        <?php the_field('below_banner_leader_text') ?>

                    </span>
                    <p data-aos="zoom-out-right" data-aos-duration="3000">
                        <?php the_field('below_banner_text') ?>
                    </p>
                    <div class="dual-btn-wrapper" data-aos="zoom-out-up-" data-aos-duration="3000">
                        <a href="<?php echo esc_url(home_url('project-listings')); ?>" data-aos="zoom-out-up-" data-aos-duration="2000">
                            <div class="primary"> <button>Discover More</button></div>
                        </a>
                    </div>
                </div>
                <div class="right" style="background-image: url(<?php echo get_field('below_banner_image')['url'] ?>)"
                    data-aos="zoom-out-left" data-aos-duration="3000"></div>
            </div>
        </section>

        <!--==============================
     section two
    ==============================-->

        <section class="home-products">
            <h2 class="section-title" data-aos="zoom-out" data-aos-duration="3000">product inspiration</h2>
            <div class="product-wrapper">
                <div class="each-product" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="img-wrapper">
                        <img src="<?php echo get_field('product_inspiration_image_1')['url']; ?>" alt="" />
                    </div>
                    <div class="overlay">
                        <span><?php the_field('product_inspiration_title_1') ?></span>
                        <a href="<?php the_field('product_inspiration_url_1') ?>">
                            <div class="btn"><button><?php the_field('product_inspiration_button_text_1') ?></button></div>
                        </a>
                    </div>
                </div>
                <div class="each-product" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="img-wrapper">
                        <img src="<?php echo get_field('product_inspiration_image_2')['url']; ?>" alt="" />
                    </div>
                    <div class="overlay">
                        <span><?php the_field('product_inspiration_title_2') ?></span>
                        <a href="<?php the_field('product_inspiration_url_2') ?>">
                            <div class="btn"><button><?php the_field('product_inspiration_button_text_2') ?></button></div>
                        </a>
                    </div>
                </div>
                <div class="each-product" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="img-wrapper">
                        <img src="<?php echo get_field('product_inspiration_image_3')['url']; ?>" alt="" />
                    </div>
                    <div class="overlay">
                        <span><?php the_field('product_inspiration_title_3') ?></span>
                        <a href="<?php the_field('product_inspiration_url_3') ?>">
                            <div class="btn"><button><?php the_field('product_inspiration_button_text_3') ?></button></div>
                        </a>
                    </div>
                </div>
                <div class="each-product" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="img-wrapper">
                        <img src="<?php echo get_field('product_inspiration_image_4')['url']; ?>" alt="" />
                    </div>
                    <div class="overlay">
                        <span><?php the_field('product_inspiration_title_4') ?></span>
                        <a href="<?php the_field('product_inspiration_url_4') ?>">
                            <div class="btn"><button><?php the_field('product_inspiration_button_text_4') ?></button></div>
                        </a>
                    </div>
                </div>
                <?php if (get_field('product_inspiration_image_5')) { ?>
                    <div class="each-product" data-aos="zoom-in-right" data-aos-duration="1000">
                        <div class="img-wrapper">
                            <img src="<?php echo get_field('product_inspiration_image_5')['url']; ?>" alt="" />
                        </div>
                        <div class="overlay">
                            <span><?php the_field('product_inspiration_title_5') ?></span>
                            <a href="<?php the_field('product_inspiration_url_5') ?>">
                                <div class="btn"><button><?php the_field('product_inspiration_button_text_5') ?></button></div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <?php if (get_field('product_inspiration_image_6')) { ?>
                    <div class="each-product" data-aos="zoom-in-right" data-aos-duration="1000">
                        <div class="img-wrapper">
                            <img src="<?php echo get_field('product_inspiration_image_6')['url']; ?>" alt="" />
                        </div>
                        <div class="overlay">
                            <span><?php the_field('product_inspiration_title_6') ?></span>
                            <a href="<?php the_field('product_inspiration_url_6') ?>">
                                <div class="btn"><button><?php the_field('product_inspiration_button_text_6') ?></button></div>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </section>

        <section class="home-section-3">
            <div class="content-wrapper display-flex flex-column">
                <h2 class="d-sm-none section-title" data-aos="zoom-out-up-" data-aos-duration="2000">
                    <?php the_field('centered_title') ?>
                </h2>
                <h2 class="d-lg-none"><?php the_field('centered_title') ?></h2>
                <p data-aos="zoom-out-up" data-aos-duration="2000">
                    <?php the_field('centered_text') ?>
                </p>
                <div class="dual-btn-wrapper" data-aos="zoom-out-up-" data-aos-duration="3000">
                    <a href="<?php echo home_url('/contact'); ?>" data-aos="zoom-out-up-" data-aos-duration="2000">
                        <div class="primary"> <button>CONTACT US</button></div>
                    </a>
                    <a href="" data-aos="zoom-out-up-" data-aos-duration="2000">
                        <div class="primary"> <button>Discover More</button></div>
                    </a>
                </div>
            </div>
            <div class="img-wrapper">
                <div class="content active" class="each-blog" data-aos="zoom-in-right" data-aos-duration="2000"
                    style="background-image:url(<?php echo get_field('design_process_image')['url'] ?>)">
                    <div class="overlay display-flex flex-column">
                        <div class="overlay-text">
                            <span><?php the_field('design_process_title') ?></span>
                            <p>
                                <?php the_field('design_process_text') ?>
                            </p>
                            <a href="<?php the_field('design_process_button_url') ?>">
                                <div class="btn"><button
                                        style="text-transform: uppercase;"><?php the_field('design_process_button_text') ?></button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content" class="each-blog" data-aos="zoom-in-right" data-aos-duration="3000"
                    style="background-image:url(<?php echo get_field('professionals_image')['url'] ?>)">
                    <div class="overlay display-flex flex-column">
                        <div class="overlay-text">
                            <span><?php the_field('professionals_title') ?></span>
                            <p>
                                <?php the_field('professionals_text') ?>
                            </p>
                            <a href="<?php the_field('professionals_button_url') ?>">
                                <div class="btn"><button
                                        style="text-transform: uppercase;"><?php the_field('professionals_button_text') ?></button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-dots display-flex flex-row">
                    <div class="carousel-dot active"></div>
                    <div class="carousel-dot"></div>
                </div>
            </div>

        </section>
        <?php
    endwhile;
    wp_reset_postdata();
endif;

?>

<section class="advice-section">
    <h1 class="section-title" data-aos="zoom-out">advice & inspiration from our blog</h1>
    <div class="blog-wrapper container">

        <?php
        $blog_args = array(
            'post_type' => 'manage-advice',
            'posts_per_page' => 3,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'feature_on_home_page',
                    'value' => 'true',
                    'compare' => 'LIKE'
                )
            )
        );
        $blog_list_query = new WP_Query($blog_args);

        if ($blog_list_query->have_posts()):
            while ($blog_list_query->have_posts()):
                $blog_list_query->the_post();
                ?>
                <div class="each-blog" data-aos="zoom-out-up" data-aos-duration="3000">
                    <div class="blog-img">
                        <img src="<?php echo get_field('listing_image')['url'] ?>" alt="" />
                    </div>
                    <div class="blog-text">
                        <h1><?php the_title() ?></h1>
                        <p>
                            <?php the_field('short_description') ?>
                        </p>
                        <a href="<?php echo site_url('/blog-details/' . $post->post_name); ?>">
                            <div class="primary"><button>Read more</button></div>
                        </a>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else:
            echo '<div style="margin: auto;">No blog posts found.</div>';
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>