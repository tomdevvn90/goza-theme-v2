<?php

/**
 * Header template
 */

$classes = [
    'site-header',
    'site-header-earthquake',
];
$logo = goza_get_logo_header_site();
$header_btn         = __get_field('goza_header_button', 'option');
$icon_cart          = __get_field('goza_enable_cart', 'option');
$goza_enable_topbar = __get_field('goza_enable_topbar', 'option');
$goza_button_type   = __get_field('goza_button_type', 'option');
$goza_form_donation = __get_field('goza_form_donation', 'option');

?>
<header class="<?php echo implode(' ', $classes) ?>">
    <!-- Topbar -->
    <?php if ($goza_enable_topbar) do_action('goza_hook_topbar'); ?>

    <div class="site-header-inner">
        <div class="container">
            <div class="goza-header-main">
                <div class="goza-header-main--logo">
                    <?php
                    if ($logo) {
                        echo '<a href="/"><img src="' . esc_url($logo) . '" alt="' . get_bloginfo('name') . '"></a>';
                    } else {
                        echo '<h1><a href="' . get_site_url() . '">' . get_bloginfo('name') . '</a></h1>';
                    }
                    ?>
                </div>
                <div class="goza-header-main--menus">
                    <div class="d-none d-lg-block goza-header-main--menu">
                        <?php
                        if (has_nav_menu('main-menu')) {
                            wp_nav_menu([
                                'theme_location' => 'main-menu',
                                'menu_class' => 'main-menu',
                                'container_class' => 'menu-container',
                                'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                'bootstrap' => false
                            ]);
                        }
                        ?>
                    </div>
                    <div class="goza-header-main--cta">
                        <?php if ($icon_cart && class_exists('WooCommerce')) { ?>
                            <div class="goza-header-cart-icon">

                                <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.5703 17.4286H1.42969L1 21.2712C0.975446 21.4922 1.04911 21.7132 1.19643 21.885C1.34375 22.0446 1.56473 22.1429 1.78571 22.1429H22.2143C22.4353 22.1429 22.6563 22.0446 22.8036 21.885C22.9509 21.7132 23.0246 21.4922 23 21.2712L22.5703 17.4286ZM21.4286 7.12835C21.3795 6.73549 21.048 6.42857 20.6429 6.42857H17.5V8C17.5 8.87165 16.8002 9.57143 15.9286 9.57143C15.0569 9.57143 14.3571 8.87165 14.3571 8V6.42857H9.64286V8C9.64286 8.87165 8.94308 9.57143 8.07143 9.57143C7.19978 9.57143 6.5 8.87165 6.5 8V6.42857H3.35714C2.95201 6.42857 2.62054 6.73549 2.57143 7.12835L1.51563 16.6429H22.4844L21.4286 7.12835ZM16.7143 4.85714C16.7143 2.25446 14.6027 0.142856 12 0.142856C9.39732 0.142856 7.28571 2.25446 7.28571 4.85714V8C7.28571 8.42969 7.64174 8.78571 8.07143 8.78571C8.50112 8.78571 8.85714 8.42969 8.85714 8V4.85714C8.85714 3.12612 10.269 1.71428 12 1.71428C13.731 1.71428 15.1429 3.12612 15.1429 4.85714V8C15.1429 8.42969 15.4989 8.78571 15.9286 8.78571C16.3583 8.78571 16.7143 8.42969 16.7143 8V4.85714Z" fill="#222222" />
                                </svg>

                                <span class="goza-total-cart"><?= WC()->cart->cart_contents_count ?></span>
                            </div>
                        <?php   } ?>
                        <div id="goza-hamberger" class="d-block d-lg-none"><i class="fa fa-reorder"></i></div>
                    </div>

                    <div class="goza-header-button-donate">
                        <?php if ($goza_button_type == 'df_link') { ?>
                            <a class="d-none d-lg-block goza-header-button btn btn-general" href="<?= esc_attr($header_btn['url']) ?>" target="<?= ($header_btn['target']) ? $header_btn['target'] : '' ?>"><?= esc_attr($header_btn['title']) ?></a>
                        <?php } else {
                            $atts = array(
                                'id' => $goza_form_donation->ID,  // integer.
                                'show_title' => false, // boolean.
                                'show_goal' => false, // boolean.
                                'show_content' => 'none', //above, below, or none
                                'display_style' => 'button', //modal, button, and reveal
                                'continue_button_title' => '' //string

                            );
                            if (function_exists('give_get_donation_form')) {
                                echo give_get_donation_form($atts);
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>