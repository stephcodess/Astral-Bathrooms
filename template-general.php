<?php
/*
Template Name: General Page Template
*/

get_header();
?>

<section>
    <div class="container">
        <?php
        while (have_posts()):
            the_post();
        ?>
            <div class="page-content">
              <h1><?php the_title(); ?></h1>
                <?php
              		the_content();
                ?>
            </div>
        <?php
        endwhile;
        ?>
    </div>
</section>

<?php get_footer(); ?>
