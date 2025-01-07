<?php
/*
Template Name: Appointment
*/

get_header();
?>

<section class="appointment-section">
    <div class="container display-flex flex-row">
        <div class="row-1 display-flex flex-column">
            <?php
            $args = array(
                'post_type' => 'page',
                'name' => 'appointment',
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
                        <span><?php the_field('phone_number'); ?>
                        </span>
                        <?php
                    endwhile;

                endif;
                ?>

            </div>

            <div class="contact">
                <a href="<?php home_url('appointment') ?>#row-2"><span>Or Complete Our <br />Appointment Form</span></a>
            </div>
        </div>
        <div class="row-2">
            <iframe id="" allowtransparency="true" allowfullscreen="true" allow="geolocation; microphone; camera"
                src="https://my.forms.app/form/664debed033ee13f8f547a42" frameborder="0"
                style="width: 100%; min-width:100%; height:2250px; border:none;"></iframe>
        </div>
    </div>
</section>

<?php get_footer() ?>