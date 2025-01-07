<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!--==============================
 Preloader
==============================-->
    <div class="preloader">
        <div class="preloader-inner">
            <span class="loader"></span>
        </div>
    </div>

    <div class="mobile-nav show">
        <!-- <div class="mobile-sub-menu">
            <div class="mobile-close-btn">
                <span>CLOSE</span>
            </div>
            <div class="best-sellers-nav">
                <ul class="sub-menu">
                    <?php $categories = get_terms(
                        array(
                            'taxonomy' => 'sellers-category',
                            'hide_empty' => false, // Set to true to hide empty terms
                        )
                    );
                    if (!empty($categories) && !is_wp_error($categories)) {
                        foreach ($categories as $category) { ?>
                            <li><a
                                    href="<?php echo home_url("best-sellers/") ?><?php echo $category->name ?>"><?php echo $category->name ?></a>
                            </li>

                        <?php }

                    } ?>


                </ul>
            </div>
            <div class="contacts-nav">
                <ul class="sub-menu">
                    <li>
                        <a href="<?php echo home_url('contact'); ?>">Contact Details</a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('contact'); ?>#information">Showroom Details</a>
                    </li>
                    <li>
                        <a href="<?php echo home_url('/contact'); ?>#enquiry">Make An Enquiry</a>
                    </li>
                </ul>
            </div>
        </div> -->
        <div class="nav-container">
            <ol class="container-ul">
                <li><a class="href-link" href="<?php echo esc_url(home_url('/')); ?>">home</a></li>
                <li><a class="href-link" href="<?php echo home_url("about-us"); ?>">why us?</a></li>
                <li><a class="href-link" href="<?php echo home_url("design-process"); ?>">process</a></li>
                <li class="menu-item-has-children open-menu-btn" id="sellers"><a>best sellers</a><i
                        class="fas fa-angle-right"></i></li>
                <li class="best-sellers-nav">
                    <ul class="sub-menu">
                      
                        <?php $categories = get_terms(
                            array(
                                'taxonomy' => 'sellers-category',
                                'hide_empty' => false, // Set to true to hide empty terms
                            )
                        );
                        if (!empty($categories) && !is_wp_error($categories)) {
                            foreach ($categories as $category) { ?>
                                <li><a
                                        href="<?php echo home_url("best-sellers/") ?><?php echo $category->name ?>"><?php echo $category->name ?></a>
                                </li>

                            <?php }

                        } ?>


                    </ul>
                </li>
                <li><a class="href-link" href="<?php echo home_url("/project-listings"); ?>">projects</a></li>
                <li><a class="href-link" href="<?php echo home_url("/professionals"); ?>">professionals</a></li>
                <li><a class="href-link" href="<?php echo home_url('/blog-listings'); ?>">advice</a></li>
                <li class="menu-item-has-children open-menu-btn" id="contact"><a>contact</a> <i
                        class="fas fa-angle-right"></i>
                </li>
                <li class="contacts-nav">
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo home_url('contact'); ?>">Contact Details</a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('contact'); ?>#information">Showroom Details</a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('/contact'); ?>#enquiry">Make An Enquiry</a>
                        </li>
                    </ul>
                </li>
            </ol>

            <div class="mobile-nav-btns display-flex flex-column">
                <span><a class="href-link" href="<?php echo home_url('/appointment') ?>">REQUEST APPOINTMENT</a></span>
                <span><a href="<?php echo home_url('/brochure') ?>">REQUEST BROCHURE</a></span>
            </div>
        </div>

    </div>

    <!--==============================
 Header Section
==============================-->
    <header class="header-wrapper">
        <div class="header-container">
            <div class="header-content display-flex flex-row">
                <div class="header-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                            alt="<?php bloginfo('name'); ?>" />
                    </a>
                </div>
                <div class="header-btns display-flex flex-row">
                    <a href="<?php echo home_url('/appointment') ?>">
                        <div class="btn"><button>REQUEST
                                APPOINTMENT</button></div>
                    </a>
                    <a href="<?php echo home_url('/brochure') ?>" class="btn"><button>REQUEST BROCHURE</button></a>
                </div>
                <div class="nav-toggle">
                    <div class="toggle-bars"></div>
                </div>
            </div>
        </div>
        <div class="header-nav display-flex flex-column">
            <nav class="header-nav-inner display-flex flex-row">
                <ul class="nav-ul">
                    <li><a class="href-link" href="<?php echo home_url(); ?>">home</a>
                    </li>
                    <li><a class="href-link" href="<?php echo home_url("about-us"); ?>">why us?</a>
                    </li>
                    <li><a class="href-link" href="<?php echo home_url("design-process"); ?>">process</a></li>
                    <li class="menu-item-has-children sellers"> <a href="<?php echo home_url("/best-sellers"); ?>">best
                            sellers <img class="nav-dropdown"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/dropdown.png"
                                alt="" /></a>
                        <ul class="sub-menu">
                            <?php $categories = get_terms(
                                array(
                                    'taxonomy' => 'sellers-category',
                                    'hide_empty' => false, // Set to true to hide empty terms
                                )
                            );
                            if ($categories) {
                                foreach ($categories as $category) { ?>
                                    <li><a
                                            href="<?php echo home_url("best-sellers/") ?><?php echo $category->name ?>"><?php echo $category->name ?></a>
                                    </li>

                                <?php }

                            } else {
                                echo 'No categories found.';
                            } ?>
                        </ul>
                    </li>
                    <li><a class=" href-link" href="<?php echo home_url("/project-listings"); ?>">projects &
                            inspiration</a></li>
                    <li><a class="href-link" href="<?php echo home_url("/professionals"); ?>">professionals</a>
                    </li>
                    <li><a class="href-link" href="<?php echo home_url('/blog-listings'); ?>">advice</a></li>
                    <li class="menu-item-has-children contact"><a href="<?php echo home_url('contact'); ?>">contact
                            <img class="nav-dropdown"
                                src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/dropdown.png"
                                alt="" /></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?php echo home_url('/contact'); ?>">Contact Details</a>
                            </li>
                            <li>
                                <a href="<?php echo home_url('/contact'); ?>#information">Showroom Details</a>
                            </li>
                            <li>
                                <a href="<?php echo home_url('/contact'); ?>#enquiry">Make An Enquiry</a>
                            </li>
                        </ul></span>
                </ul>

            </nav>
        </div>
    </header>