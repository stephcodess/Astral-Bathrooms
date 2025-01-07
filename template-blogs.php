<?php
/*
Template Name: Blogs
*/

get_header();

// Fetch all categories
$terms = get_terms(
    array(
        'taxonomy' => 'category',
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
    'name' => 'blog-listings',
    'posts_per_page' => 2,
);
$blog_page_query = new WP_Query($args);

if ($blog_page_query->have_posts()):
    while ($blog_page_query->have_posts()):
        $blog_page_query->the_post();
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

        <!--==============================
     section one
==============================-->

        <section class="blog-section">
            <div class="container">
                <div class="blog-section-header">
                    <h2><?php the_field("below_banner_title"); ?></h2>
                    <div class="sub-header display-flex flex-row">
                        <a href="#" class="href-link category-link <?php echo !$current_term ? 'current-term' : ''; ?>"
                            data-term="" style="text-transform: uppercase; color: grey;">ALL</a>
                        <?php
                        if (!empty($terms) && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $class = ($term->slug === $current_term) ? 'current-term' : '';
                                echo '<a style="text-transform: uppercase; color: grey;" href="#" class="href-link category-link ' . $class . '" data-term="' . esc_attr($term->slug) . '" style="text-transform: uppercase;">' . esc_html($term->name) . '</a>';
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="blog-listing" id="posts-container">
                    <?php
    endwhile;
endif;

// Initial query to display all posts or filtered by the current term
$blog_args = array(
    'post_type' => 'manage-advice',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
);

if ($current_term) {
    $blog_args['category_name'] = $current_term;
}

$blog_list_query = new WP_Query($blog_args);

if ($blog_list_query->have_posts()):
    while ($blog_list_query->have_posts()):
        $blog_list_query->the_post();
        ?>
                    <div class="each-blog" data-aos="fade-up" data-aos-duration="1000">
                        <a href="<?php echo site_url('/blog-details/' . $post->post_name); ?>">
                            <img src="<?php echo get_field('listing_image')['url']; ?>" alt="" />
                        </a>
                        <div class="blog-details">
                            <h1><a href="<?php echo site_url('/blog-details/' . $post->post_name); ?>"><?php the_title(); ?></a></h1>
                            <p><?php the_field('short_description'); ?></p>
                            <a class="href-link" href="<?php echo site_url('/blog-details/' . $post->post_name); ?>">Read
                                more</a>
                        </div>
                    </div>
                    <?php
    endwhile;
    wp_reset_postdata();
else:
    echo 'No blog posts found.';
endif;
?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

<script>
    jQuery(document).ready(function ($) {
        $('.category-link').on('click', function (e) {
            e.preventDefault();
            var term = $(this).data('term');

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'fetch_posts_by_category',
                    category: term,
                },
                success: function (response) {
                    $('#posts-container').html(response);
                    AOS.refresh(); // Refresh AOS animations after loading new content
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });

            $('.category-link').removeClass('current-term');
            $(this).addClass('current-term');
        });
    });
</script>