<?php

/**
 * Header Ngo Dark
 */

$classes = [
   'site-header',
   'site-header-ngo-dark'
];

$logo = goza_get_logo_header_site();
$header_btn = __get_field('goza_header_button', 'option');
$icon_cart = __get_field('goza_enable_cart', 'option');
$goza_phone_number = __get_field('goza_phone_number', 'option');
$goza_email = __get_field('goza_email', 'option');
$goza_openning = __get_field('goza_openning', 'option');
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
                  <div class="d-block d-lg-none goza-header-cart-icon">
                     <i class="fa fa-shopping-basket"></i>
                     <span class="goza-total-cart"><?= esc_attr(WC()->cart->cart_contents_count) ?></span>
                  </div>
               <?php   } ?>

               <?php if (isset($goza_phone_number) && $goza_phone_number) { ?>
                  <div class="d-none d-lg-block goza-header-info goza-header-phone">
                     <a href="tel:<?= esc_attr($goza_phone_number) ?>"><i class="fa fa-volume-control-phone"></i><span><?= esc_attr($goza_phone_number) ?><span><?= esc_attr($goza_openning) ?></span></span></a>
                  </div>
               <?php  } ?>

               <?php if (isset($goza_email) && $goza_email) { ?>
                  <div class="d-none d-lg-block goza-header-info goza-header-email">
                     <a href="mailto:<?= esc_attr($goza_email) ?>"><i class="fa fa-envelope-o"></i><span><?= esc_attr($goza_email) ?><span><?= esc_html__('online support', 'goza') ?></span></span></a>
                  </div>
               <?php  } ?>

               <div id="goza-hamberger" class="d-block d-lg-none"><i class="fa fa-reorder"></i></div>
            </div>
         </div>
      </div>
   </div>

</header> <!-- #site-header -->