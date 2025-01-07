<?php
/*
Template Name: Project Listing
*/

get_header();

$taxonomy = 'project-category';

// Fetch all terms for the taxonomy
$terms = get_terms(
    array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    )
);

// Function to get the current term from the URL
function get_current_term()
{
    if (isset($_GET['term']) && !empty($_GET['term'])) {
        return sanitize_text_field($_GET['term']);
    }
    return false;
}

// Get the current term if selected
$current_term = get_current_term();

// Page query
$args = array(
    'post_type' => 'page',
    'name' => 'project-listings',
    'posts_per_page' => 1,
);

$contacts_query = new WP_Query($args);

if ($contacts_query->have_posts()):
    while ($contacts_query->have_posts()):
        $contacts_query->the_post();
        ?>

        <!--==============================
     landing Banner
==============================-->
        <section class="landing-banner home d-sm-none"
            style="background-image:url(<?php echo get_field('banner_image_desktop')['url']; ?>)">
            <div class="landing-banner-text display-flex flex-column" data-aos="fade-in-right" data-aos-duration="3000">
                <span><?php the_field('main_banner_text'); ?></span>
                <span><?php the_field('main_banner_title'); ?></span>
            </div>
        </section>
        <section class="landing-banner d-lg-none"
            style="background-image:url(<?php echo get_field('banner_image_mobile')['url']; ?>)">
            <div class="landing-banner-text display-flex flex-column" data-aos="fade-in-right" data-aos-duration="3000">
                <span><?php the_field('main_banner_text'); ?></span>
                <span><?php the_field('main_banner_title'); ?></span>
            </div>
        </section>
        <?php
    endwhile;
    wp_reset_postdata();
endif;
?>

<section class="project-listing-section">
    <div class="container">
        <h1 class="header section-title" data-aos="fade-up" data-aos-duration="2000">
            <?php the_field("below_banner_title"); ?>
        </h1>
        <div class="header-list display-flex flex-row" data-aos="fade-up" data-aos-duration="2000">
            <a href="#" class="href-link category-link <?php echo !$current_term ? 'current-term' : ''; ?>" data-term="" style="text-transform: uppercase;">ALL</a>
            <?php
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $class = ($term->slug === $current_term) ? 'current-term' : '';
                    echo '<a href="#" class="href-link category-link ' . $class . '" data-term="' . esc_attr($term->slug) . '" style="text-transform: uppercase;">' . esc_html($term->name) . '</a>';
                }
            }
            ?>
        </div>

        <div class="listing-wrapper" id="projects-container">
            <?php
            // Query to retrieve blog posts
            $project_args = array(
                'post_type' => 'manage-project',
                'posts_per_page' => 12,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );

            // If a term is selected, add it to the query arguments
            if ($current_term) {
                $project_args['tax_query'] = array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $current_term,
                    ),
                );
            }

            $project_list_query = new WP_Query($project_args);

            // Check if there are projects
            if ($project_list_query->have_posts()):
                while ($project_list_query->have_posts()):
                    $project_list_query->the_post();
                    ?>
                    <div class="each-list" data-aos="fade-up" data-aos-duration="1000">
                        <div class="list-img">
                            <a href="<?php echo site_url('/project-details/' . get_post_field('post_name')); ?>">
                                <img src="<?php echo get_field('listing_page_image'); ?>" alt="" />
                            </a>
                        </div>
                        <a href="<?php echo site_url('/project-details/' . get_post_field('post_name')); ?>">
                            <h1><?php the_title(); ?></h1>
                        </a>
                        <span><?php the_field('project_subtitle'); ?></span>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo 'No projects found.';
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
jQuery(document).ready(function($) {
    $('.category-link').on('click', function(e) {
        e.preventDefault();
        var term = $(this).data('term');

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'fetch_projects_by_category',
                category: term,
            },
            success: function(response) {
                $('#projects-container').html(response);
                AOS.refresh();
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });

        $('.category-link').removeClass('current-term');
        $(this).addClass('current-term');
    });
});
</script>
