<?php
/*
Template Name: Brochure
*/

get_header();
?>

<section class="appointment-section">
    <div class="container display-flex flex-row">
        <div class="row-1 display-flex flex-column">
            <?php
            $args = array(
                'post_type' => 'page',
                'name' => 'brochure',
                'posts_per_page' => 1,
            );

            $appointment_query = new WP_Query($args);

            if ($appointment_query->have_posts()):
                while ($appointment_query->have_posts()):
                    $appointment_query->the_post();

                    ?>

                    <h1><?php the_field('leader_text') ?></h1>
                    <p><?php the_field('body_text') ?></p>

                    <?php
                    // get_template_part('template-parts/content', 'about');
                endwhile;

                wp_reset_postdata();
            endif;

            ?>

            <div class="contact">
                <span>Call Us On</span><br />
                <?php
                $args = array(
                    'post_type' => 'contact-detail',
                    'posts_per_page' => 2,
                );
                $contacts_query = new WP_Query($args);

                if ($contacts_query->have_posts()):
                    while ($contacts_query->have_posts()):
                        $contacts_query->the_post();

                        ?>
                        <span><a class="href-link" style="color: #0a1e41;"
                        href="tel:<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a>
                        </span>
                        <?php
                    endwhile;

                endif;
                ?>

            </div>

            <div class="contact">
                <span>Or Complete Our <br />Appointment Form</span>
            </div>
        </div>
        <div class="row-2">
        <iframe id="" allowtransparency="true" allowfullscreen="true" allow="geolocation; microphone; camera" src="https://my.forms.app/form/6697cfd8dab6ee9960faed21" frameborder="0" style="width: 100%; min-width:100%; height:1400px; border:none;"></iframe>
        </div>

    </div>
    </div>
</section>

<?php get_footer() ?>