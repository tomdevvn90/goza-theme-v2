<?php

/**
 * Header template
 */

$classes = [
   'site-header',
   'site-header-menu-center',
   'site-header-organization',
];

$logo                = goza_get_logo_header_site();
$goza_enable_topbar  = __get_field('goza_enable_topbar', 'option');
$header_btn          = __get_field('goza_header_button', 'option');
$icon_cart           = __get_field('goza_enable_cart', 'option');
$goza_header_search  = __get_field('goza_header_search', 'option');
$goza_topbar_options = __get_field('goza_topbar_options', 'option');
if ($goza_topbar_options) {
   $goza_topbar_btn = $goza_topbar_options['goza_topbar_btn'];
}
$goza_button_type = __get_field('goza_button_type', 'option');
$goza_form_donation = __get_field('goza_form_donation', 'option');
?>
<header class="<?php echo implode(' ', $classes) ?>">
   <!-- Topbar -->
   <?php if ($goza_enable_topbar) do_action('goza_hook_topbar'); ?>

   <div class="goza-header-main">
      <div class="container">
         <div class="d-flex align-items-center justify-content-between goza-wrap-logo">
            <div class="goza-header-main--logo">
               <?php
               if ($logo) {
                  echo '<a href="/"><img src="' . esc_url($logo) . '" alt="' . get_bloginfo('name') . '"></a>';
               } else {
                  echo '<h1><a href="' . get_site_url() . '">' . get_bloginfo('name') . '</a></h1>';
               }
               ?>
            </div>

            <div class="d-flex align-items-center goza-header-main--cta">
               <?php if ($icon_cart && class_exists('WooCommerce')) { ?>
                  <div class="d-block d-lg-none goza-header-cart-icon">
                     <i class="fa fa-shopping-basket"></i>
                     <span class="goza-total-cart"><?= WC()->cart->cart_contents_count ?></span>
                  </div>
               <?php   } ?>

               <?php if (isset($goza_topbar_btn) && $goza_topbar_btn) { ?>
                  <a class="d-none d-lg-block goza-header-link" href="<?= esc_url($goza_topbar_btn['url']) ?>" target="<?= esc_attr($goza_topbar_btn['target']) ?>"><i class="fa fa-heart"></i><?= esc_attr($goza_topbar_btn['title']) ?></a>
               <?php } ?>

               <?php if (isset($goza_header_search) && $goza_header_search) { ?>
                  <a class="d-none d-lg-block goza-header-search" href="javascript:void(0)"><i class="fa fa-search"></i></a>
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
               <div id="goza-hamberger" class="d-block d-lg-none"><i class="fa fa-reorder"></i></div>
            </div>
         </div>
      </div>
   </div>
   <div class="d-none d-lg-block goza-header-menus">
      <div class="container">
         <div class="goza-header-main--menu">
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
      </div>
   </div>
</header> <!-- #site-header -->