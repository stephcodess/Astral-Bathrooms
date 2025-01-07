<?php
/*
Template Name: Design Process Page
*/

get_header();

$args = array(
    'post_type' => 'page',
    'name' => 'design-process',
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
        <section class="internal-page-section-1">
            <div class="inner display-flex flex-row container">
                <div class="left display-flex flex-column" data-aos="zoom-out-right" data-aos-duration="2000">
                    <span>
                        <?php the_field('below_banner_leader_text') ?>
                    </span>
                </div>

                <div class="right display-flex flex-column" data-aos="zoom-out-left" data-aos-duration="3000">
                    <?php the_field('below_banner_text') ?>

                </div>
            </div>
        </section>

        <section class="design-process">
            <div class="container-1 container display-flex flex-row">
                <div class="image_block">
                    <img style="width: 100%;height: 110%; margin-top: -7rem; "
                        src="<?php echo get_field('first_process_image')['url'] ?>">
                </div>
                <div class="text-block">
                    <div style="width: 20%;">
                        <span class="number">01</span>
                    </div>
                    <div class="right-section">
                        <h4 style="text-transform: uppercase;"><?php the_field('first_process_title') ?></h4>
                        <?php the_field('first_process_description') ?>
                    </div>
                </div>

            </div>
            <div class="container container-2 display-flex flex-row">
                <div class="text-block">

                    <div class="right-section">
                        <h4 style="text-transform: uppercase;"><?php the_field('second_process_title') ?></h4>
                        <?php the_field('second_process_description') ?>
                    </div>
                    <div style="width: 20%;">
                        <span class="number-right">02</span>
                    </div>
                </div>
                <div class="image_block">
                    <img style="width: 100%;height: 110%; margin-top: -7rem; "
                        src="<?php echo get_field('second_process_image')['url'] ?>" />
                </div>
            </div>
            <div class="container-1 container display-flex flex-row">
                <div class="image_block">
                    <img style="width: 100%;height: 110%; margin-top: -7rem; "
                        src="<?php echo get_field('third_process_image')['url'] ?>">
                </div>
                <div class="text-block">
                    <div style="width: 20%;">
                        <span class="number">03</span>
                    </div>
                    <div class="right-section">
                        <h4 style="text-transform: uppercase;"><?php the_field('third_process_title') ?></h4>
                        <?php the_field('third_process_description') ?>
                    </div>
                </div>

            </div>
            <div class="container container-2 display-flex flex-row">
                <div class="text-block">

                    <div class="right-section">
                        <h4 style="text-transform: uppercase;"><?php the_field('fourth_process_title') ?></h4>
                        <?php the_field('fourth_process_description') ?>
                    </div>
                    <div style="width: 20%;">
                        <span class="number-right">04</span>
                    </div>
                </div>
                <div class="image_block">
                    <img style="width: 100%;height: 110%; margin-top: -7rem; "
                        src="<?php echo get_field('fourth_process_image')['url'] ?>" />
                </div>
            </div>
            <div class="container-1 container display-flex flex-row">
                <div class="image_block">
                    <img style="width: 100%;height: 110%; margin-top: -7rem; "
                        src="<?php echo get_field('fifth_process_image')['url'] ?>">
                </div>
                <div class="text-block">
                    <div style="width: 20%;">
                        
                        <span class="number">05</span>
                    </div>
                    <div class="right-section">
                        <h4 style="text-transform: uppercase;"><?php the_field('fifth_process_title') ?></h4>
                        <?php the_field('fifth_process_description') ?>
                    </div>
                </div>

            </div>
        </section>
        <?php
    endwhile;
    wp_reset_postdata();
endif;

?>





<?php

get_footer();
?>