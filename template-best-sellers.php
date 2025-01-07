<?php
/*
Template Name: Best Sellers
*/

get_header();

// Page query
$args = array(
    'post_type' => 'page',
    'name' => 'best-sellers',
    'posts_per_page' => 1,
);

$sellers_query = new WP_Query($args);

if ($sellers_query->have_posts()):
    while ($sellers_query->have_posts()):
        $sellers_query->the_post();
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
        <section class="home-section-3 sellers-products">
            <div class="content-wrapper display-flex flex-column">
                <h2 class="section-title" data-aos="zoom-out-up-" data-aos-duration="2000">
                    <?php echo the_field('centred_title') ?>
                </h2>
                <!-- <h2 class="d-lg-none section-title" data-aos="zoom-out-up-" data-aos-duration="2000">A SNAPSHOT OF OUR
                    <br />RANGE OF SHOWERS
                </h2> -->

                <p data-aos="zoom-out-up" data-aos-duration="2000">
                    <?php the_field('centred_text') ?>
                </p>
            </div>

            <?php
    endwhile;
    wp_reset_postdata();
endif;

?>

    <div class="img-wrapper">
        <div class="container display-flex flex-row">
            <?php
            // Get the category slug from the URL
            $url = $_SERVER['REQUEST_URI'];
            $url_parts = explode('/', $url);
            $category_slug = '';

            foreach ($url_parts as $part) {
                if ($part === 'best-sellers') {
                    $key = array_search('best-sellers', $url_parts);

                    if (isset($url_parts[$key + 1])) {
                        $category_slug = $url_parts[$key + 1];
                        break;
                    }
                }
            }

            // Build query args
            $arg = array(
                'post_type' => 'best-seller',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );

            if ($category_slug) {
                $arg['tax_query'] = array(
                    array(
                        'taxonomy' => 'sellers-category',
                        'field' => 'slug',
                        'terms' => $category_slug,
                    ),
                );
            }

            $best_sellers = new WP_Query($arg);

            if ($best_sellers->have_posts()):
                ?>
                <div class="row1">
                    <?php
                    while ($best_sellers->have_posts()):
                        $best_sellers->the_post();

                        $display_order = get_field('display_order');

                        if ($display_order === '1' || $display_order === '2'):
                  			$image_url = $display_order === '1' ? get_field('image_long')['url'] : get_field('image_short')['url'];
                            ?>
                            <div class="each <?php echo $display_order === '1' ? 'long' : 'short' ?>" data-aos="zoom-out-up-"
                                data-aos-duration="2000">
                                <div class="image-title">
                                    <span><?php the_title() ?></span>
                                </div>
                                <img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <?php
                        endif;
                    endwhile;
                    ?>
                </div>
                <div class="row2">
                    <?php
                    while ($best_sellers->have_posts()):
                        $best_sellers->the_post();

                        $display_order = get_field('display_order');

                        if ($display_order === '3' || $display_order === '4'):
                  			$image_url = $display_order === '3' ? get_field('image_long')['url'] : get_field('image_short')['url'];
                            ?>
                            <div class="each <?php echo $display_order === '3' ? 'long' : 'short' ?>" data-aos="zoom-out-up-"
                                data-aos-duration="2000">
                                <div class="image-title">
                                    <span><?php the_title() ?></span>
                                </div>
                                <img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <?php
                        endif;
                    endwhile;
                    ?>
                </div>
                <?php
                wp_reset_postdata();
            else:
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
