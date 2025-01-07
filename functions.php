<?php
function your_theme_enqueue_assets()
{
    // Enqueue local stylesheets
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('theme-setup-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('aos', get_template_directory_uri() . '/assets/css/aos.css');

    // Enqueue stylesheet from CDN
    wp_enqueue_style('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('circe-font', 'https://use.typekit.net/col4zqg.css');
    wp_enqueue_style('the-seasons-font', 'https://use.typekit.net/col4zqg.css');

    // Enqueue JavaScript files
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery-3.6.0.min.js', array(), null, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos.js', array(), null, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);

    // Initialize AOS in a custom script
    wp_add_inline_script('aos', 'AOS.init({ once: true });');

}
add_action('wp_enqueue_scripts', 'your_theme_enqueue_assets');

function enqueue_custom_admin_script()
{
    // Enqueue script only on the edit screen of your custom post type
    $screen = get_current_screen();
    if ($screen->post_type == 'contact-detail' && $screen->base == 'post') {
        wp_enqueue_script('custom-admin-script', get_template_directory_uri() . '/assets/js/custom-admin.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_script');


function set_permalink_structure()
{
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules();
}
add_action('init', 'set_permalink_structure');

function create_custom_page($page_title, $page_template = '')
{
    $page_check = get_page_by_title($page_title);
    $new_page_id = '';

    if (!isset($page_check->ID)) {
        $new_page = array(
            'post_type' => 'page',
            'post_title' => $page_title,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $new_page_id = wp_insert_post($new_page);

        if (!empty($page_template)) {
            update_post_meta($new_page_id, '_wp_page_template', $page_template);
        }
    }
}

function fetch_projects_by_category() {
    if (isset($_POST['category'])) {
        $category_slug = sanitize_text_field($_POST['category']);

        $args = array(
            'post_type' => 'manage-project',
            'posts_per_page' => 12,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );

        if (!empty($category_slug)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'project-category',
                    'field' => 'slug',
                    'terms' => $category_slug,
                ),
            );
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
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
        else :
            echo 'No projects found.';
        endif;
    }
    wp_die();
}

add_action('wp_ajax_fetch_projects_by_category', 'fetch_projects_by_category');
add_action('wp_ajax_nopriv_fetch_projects_by_category', 'fetch_projects_by_category');


function fetch_posts_by_category() {
    if (isset($_POST['category'])) {
        $category_slug = sanitize_text_field($_POST['category']);

        $args = array(
            'post_type' => 'manage-advice',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );

        if (!empty($category_slug)) {
            $args['category_name'] = $category_slug;
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                ?>
                <div class="each-blog" data-aos="fade-up" data-aos-duration="1000">
                    <a href="<?php echo site_url('/blog-details/' . $post->post_name); ?>">
                    <img src="<?php echo get_field('listing_image')['url']; ?>" alt="" />
                    </a>
                    <div class="blog-details">
                        <h1><?php the_title(); ?></h1>
                        <p><?php the_field('short_description'); ?></p>
                        <a class="href-link" href="<?php echo site_url('/blog-details/' . $post->post_name); ?>">Read more</a>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'No blog posts found.';
        endif;
    }
    wp_die();
}

add_action('wp_ajax_fetch_posts_by_category', 'fetch_posts_by_category');
add_action('wp_ajax_nopriv_fetch_posts_by_category', 'fetch_posts_by_category');




function create_all_pages()
{
    create_custom_page('Contact', 'template-contacts.php');
    create_custom_page('About Us', 'template-about.php');
    create_custom_page('Home', 'index.php');
    create_custom_page('Make An Appointment', 'template-appointment.php');
    create_custom_page('Best Sellers', 'template-best-sellers.php');
    create_custom_page('Design Process', 'template-process.php');
    create_custom_page('Blog Details', 'template-blog-details.php');
    create_custom_page('Blog Listings', 'template-blogs.php');
    create_custom_page('Professionals', 'template-professionals.php');
    create_custom_page('Project Details', 'template-project-detail.php');
    create_custom_page('Project Listings', 'template-project-listing.php');
    create_custom_page('Request A Brochure', 'template-brochure.php');
    create_custom_page('GDPR policy', 'template-general.php');
    create_custom_page('Privacy Policy', 'template-general.php');
    create_custom_page('Website disclaimer', 'template-general.php');
}

function create_and_set_pages()
{
    create_all_pages();
    $home_page = get_page_by_title('Home');
    if ($home_page != null) {
        update_option('page_on_front', $home_page->ID);
        update_option('show_on_front', 'page');
    }
}
add_action('after_setup_theme', 'create_and_set_pages');

function add_custom_rewrite_rules()
{
    add_rewrite_rule('^blog-details/([^/]*)/?', 'index.php?pagename=blog-details&post_slug=$matches[1]', 'top');
    add_rewrite_rule('^project-details/([^/]*)/?', 'index.php?pagename=project-details&post_slug=$matches[1]', 'top');
    add_rewrite_rule('^best-sellers/([^/]*)/?', 'index.php?pagename=best-sellers&post_slug=$matches[1]', 'top');
}
add_action('init', 'add_custom_rewrite_rules');

function add_query_vars($vars)
{
    $vars[] = 'post_slug';
    return $vars;
}
add_filter('query_vars', 'add_query_vars');

// Function to display a notice recommending required plugins
function theme_recommend_plugins_notice()
{
    $required_plugins = array(
        'wordpress-seo' => array(
            'name' => 'Yoast SEO',
            'slug' => 'wp-seo',
            'url' => 'https://wordpress.org/plugins/wordpress-seo/',
        ),
        'advanced-custom-fields' => array(
            'name' => 'Advanced Custom Fields',
            'slug' => 'acf',
            'url' => 'https://www.advancedcustomfields.com/pro/',
        ),
        'simple-page-ordering' => array(
            'name' => 'Simple Page Ordering',
            'slug' => 'simple-page-ordering',
            'url' => 'https://wordpress.org/plugins/simple-page-ordering/',
        ),
        'admin-menu-editor' => array(
            'name' => 'Admin Menu Editor',
            'slug' => 'menu-editor',
            'url' => 'https://adminmenueditor.com/',
        ),
        // Add more plugins as needed
    );

    $missing_plugins = array();

    foreach ($required_plugins as $plugin_key => $plugin_info) {
        if (!is_plugin_active($plugin_key . '/' . $plugin_info['slug'] . '.php')) {
            $missing_plugins[] = '<a href="' . esc_url($plugin_info['url']) . '" target="_blank">' . esc_html($plugin_info['name']) . '</a>';
        }
    }

    if (!empty($missing_plugins)) {
        echo '<div class="notice notice-warning is-dismissible">
            <p>This theme recommends the following plugins for full functionality: ' . implode(', ', $missing_plugins) . '. Please install and activate them.</p>
        </div>';
    }
}
add_action('admin_notices', 'theme_recommend_plugins_notice');

function create_single_custom_post()
{
    $post_type = 'contact-detail';
    $post_title = 'Contact Details';

    // Check if the post already exists
    $existing_post = get_posts(
        array(
            'post_type' => $post_type,
            'post_status' => 'any',
            'title' => $post_title,
            'numberposts' => 1,
        )
    );

    if (!empty($existing_post)) {
        // Update the existing post
        $post_id = $existing_post[0]->ID;
        $updated_post = array(
            'ID' => $post_id,
            'post_title' => $post_title,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        wp_update_post($updated_post);
    } else {
        // Create the post
        $new_post = array(
            'post_type' => $post_type,
            'post_title' => $post_title,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        wp_insert_post($new_post);
    }
}

add_action('after_setup_theme', 'create_single_custom_post');

function customize_admin_menu_link()
{
    $post_type = 'contact-detail';
    $post_title = 'Contact Details';

    $single_post = get_posts(
        array(
            'post_type' => $post_type,
            'post_status' => 'any',
            'title' => $post_title,
            'numberposts' => 1,
        )
    );

    if (!empty($single_post)) {
        $post_id = $single_post[0]->ID;

        remove_menu_page('edit.php?post_type=' . $post_type);

        add_menu_page(
            'Contact Details',
            'Contact Details',
            'manage_options',
            'post.php?post=' . $post_id . '&action=edit',
            '',
            'dashicons-admin-post',
            20
        );
    }
}
add_action('admin_menu', 'customize_admin_menu_link', 999);
