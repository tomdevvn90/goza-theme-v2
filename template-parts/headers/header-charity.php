<?php

/**
 * Header template transparent
 */

$classes = [
   'site-header',
   'site-header-charity'
];

$logo = goza_get_logo_header_site();
$header_btn = __get_field('goza_header_button', 'option');
$icon_cart = __get_field('goza_enable_cart', 'option');
$goza_phone_number = __get_field('goza_phone_number', 'option');
$goza_button_type = __get_field('goza_button_type', 'option');
$goza_form_donation = __get_field('goza_form_donation', 'option');
?>
<header class="<?php echo implode(' ', $classes) ?>">
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
            <div class="d-none d-xl-block goza-header-main--menu">
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
                  <div class="d-block d-xl-none goza-header-cart-icon">
                     <i class="fa fa-shopping-basket"></i>
                     <span class="goza-total-cart"><?= WC()->cart->cart_contents_count ?></span>
                  </div>
               <?php } ?>

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

               <?php if (isset($goza_phone_number) && $goza_phone_number) { ?>
                  <div class="d-none d-xl-block goza-header-phone">
                     <a href="tel:<?= esc_attr($goza_phone_number) ?>"><i class="fa fa-phone" aria-hidden="true"></i><?= esc_attr($goza_phone_number) ?></a>
                  </div>
               <?php  } ?>

               <div id="goza-hamberger" class="d-block d-xl-none"><i class="fa fa-reorder"></i></div>
            </div>
         </div>
      </div>
   </div>

</header> <!-- #site-header -->