<?php
/*
Template Name: Contacts Page
*/

get_header();
$args = array(
    'post_type'      => 'page',
    'name'           => 'about-us',
    'posts_per_page' => 1,
);

$contacts_query = new WP_Query($args);

if ($contacts_query->have_posts()):
    while ($contacts_query->have_posts()):
        $contacts_query->the_post();
        get_template_part('template-parts/content', 'about');
    endwhile;
    wp_reset_postdata();
endif;

get_footer();
