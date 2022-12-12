<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package staby
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'staby'); ?></a>

        <header id="masthead" class="site-header">
            <!-- ========================= -->
            <!--         Nav Mobile        -->
            <!-- ========================= -->
            <div class="nav-mobile">
                <div class="container wrapper-mobile">
                    <a class="mobile-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img
                            src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] ?>"
                            alt="Logo"></a>
                    <?php if(!is_user_logged_in()):?><button class="btnPopUp btnPopUpLogin">Logga in</button><?php
                          elseif(is_user_logged_in()):?><a href="<?php echo esc_url(wp_logout_url( home_url() )); ?>" class="btnPopUp btnPopUpLogout">Logga ut</a><?php endif;?>
                    <button class="hamburger hamburger--spring" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <!-- ========================= -->
            <!--         Nav Desktop       -->
            <!-- ========================= -->
            <nav id="site-navigation" class="nav-menu">
                <div class="site-branding">
                    <a class="nav-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img
                            src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] ?>"
                            alt="Logo"></a>
                </div><!-- .site-branding -->

                <?php
				$walker = new Walker_Staby_Nav;
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'		 => '',
						'walker'		 => $walker
					)
				);
                
				?>
                <?php if(!is_user_logged_in()):?><button class="btnPopUp btnPopUpLogin">Logga in</button><?php
                      elseif(is_user_logged_in()):?><a href="<?php echo esc_url(wp_logout_url( home_url() )); ?>" class="btnPopUp btnPopUpLogout">Logga ut</a><?php endif;?>
                <?php get_search_form(); ?>
            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->
        <!-- popup login -->
        <?php echo do_shortcode('[staby_login_form]'); ?>