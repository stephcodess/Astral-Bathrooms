<?php
// Query to retrieve blog posts
$blog_args = array(
    'post_type' => 'contact-detail',
    'posts_per_page' => 1,
);
$blog_list_query = new WP_Query($blog_args);

if ($blog_list_query->have_posts()):
    while ($blog_list_query->have_posts()):
        $blog_list_query->the_post();
        ?>
        <section class="contact-section" data-aos="zoom-out" data-aos-duration="3000">
            <div class="content">
                <h2>Talk to us today about creating your dream bathroom</h2>
                <div class="book display-flex flex-row">
                    <span><span class="d-sm-none">Call</span> <span style="color: #fff;"> <span class="sub-menu"><a
                                    style="color: #fff;"
                                    href="tel:<?php the_field('phone_number'); ?>"><?php the_field('phone_number'); ?></a></span>

                        </span><span class="d-sm-none">or</span> </span>
                    <a href="<?php echo esc_url(home_url('/appointment')); ?>">
                        <div class="btn"><button>book an appointment</button></div>
                    </a>
                </div>
            </div>

        </section>
        <!-- Footer Mobile Navigation -->
        <section class="footer-mobile-nav" data-aos="zoom-out">
            <div class="dropdowns">
                <div class="dropdown-item">
                    <div class="dropdown-header">
                        <h2>ABOUT US</h2><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/plus.png"
                            alt="" />
                    </div>
                    <div class="dropdown-link">
                        <div class="links">
                            <span><a class="href-link" href="<?php echo esc_url(home_url('/about-us')); ?>">Why Us?</a></span>
                            <span><a class="href-link" href="<?php echo esc_url(home_url('/design-process')); ?>">Design
                                    Process</a></span>
                            <span><a class="href-link"
                                    href="<?php echo esc_url(home_url('/professionals')); ?>">Professionals</a></span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="dropdown-header">
                        <h2>Design Inspirations</h2><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/plus.png" alt="" />
                    </div>
                    <div class="dropdown-link">
                        <div class="links">
                            <span><a class="href-link" href="<?php echo esc_url(home_url('/project-listings')); ?>">Projects
                                    & Inspiration</a></span>
                            <span><a class="href-link" href="<?php echo esc_url(home_url('/best-sellers')); ?>">Best
                                    Sellers</a></span>
                            <span><a class="href-link"
                                    href="<?php echo esc_url(home_url('/professionals')); ?>">Professionals</a></span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="dropdown-header">
                        <h2>CUSTOMER SERVICE</h2><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/plus.png" alt="" />
                    </div>
                    <div class="dropdown-link">
                        <div class="links">
                            <span><a class="href-link" href="<?php echo esc_url(home_url('/blog-listings')); ?>">Advice</a></span>
                            <span><a class="href-link" href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="dropdown-header">
                        <h2>LEGAL</h2><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/plus.png"
                            alt="" />
                    </div>
                    <div class="dropdown-link">
                        <div class="links">
                            <span><a class="href-link" href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy
                                    Policy</a></span>
                            <span><a class="href-link" href="<?php echo esc_url(home_url('/gdpr-policy')); ?>">GDPR
                                    Policy</a></span>
                            <span><a class="href-link" href="<?php echo esc_url(home_url('/website-disclaimer')); ?>">Website
                                    Disclaimer</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-contact-section">
                <span class="phone" style="color: #fff;"><?php the_field('phone_number') ?></span>
                <div class="logo-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo" />
                </div>
                <div class="social-icons">
                    <?php if (get_field('instagram_url')): ?>
                        <a href="<?php echo esc_url(get_field('instagram_url')); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (get_field('facebook_url')): ?>
                        <a href="<?php echo esc_url(get_field('facebook_url')); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (get_field('linkedin_url')): ?>
                        <a href="<?php echo esc_url(get_field('linkedin_url')); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <span class="bathroom-bliss">#bathroomBliss</span>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="footer-section display-flex flex-column">
            <div class="section1 display-flex flex-row">
                <span>#bathroomBliss</span>
                <div class="social-icons display-flex flex-row">
                    <?php if (get_field('instagram_url')): ?>
                        <a href="<?php echo esc_url(get_field('instagram_url')); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (get_field('facebook_url')): ?>
                        <a href="<?php echo esc_url(get_field('facebook_url')); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (get_field('linkedin_url')): ?>
                        <a href="<?php echo esc_url(get_field('linkedin_url')); ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    <?php endif; ?>
                </div>

            </div>
            <div class="footer-nav display-flex flex-column">
                <div class="footer-nav-inner display-flex flex-row">
                    <span><a class="href-link" href="<?php echo home_url(); ?>">home</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/about-us'); ?>">why us?</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/design-process'); ?>">process</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/best-sellers'); ?>">best sellers</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/project-listing'); ?>">projects</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/professionals'); ?>">professionals</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/blog-listings'); ?>">advice</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/contact'); ?>">contact</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/privacy-policy'); ?>">privacy policy</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/gdpr-policy'); ?>">GDPR policy</a></span>
                    <span><a class="href-link" href="<?php echo home_url('/website-disalcimer'); ?>">website
                            disclaimer</a></span>
                </div>
            </div>
            <div class="section3">
                <p>
                    Astral Bathrooms Trading As Astral Agencies ltd. <br />
                    <?php the_field('address'); ?>
                </p>
                <span><a href="https://futuraservices.co.uk/luxury-webdesign-branding" target="_blank">Luxury Web Design by
                        Futura.</a></span>
            </div>
        </footer>
        <?php
    endwhile;
    wp_reset_postdata();
else:
    echo 'No blog posts found.';
endif;
?>




<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>

<?php wp_footer(); ?>

</body>

</html>