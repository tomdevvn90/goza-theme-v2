<?php

/**
 * Template part for displaying page content in page.php
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package goza
 */
?>
<div class="entry-content">
    <?php
    if (class_exists('WooCommerce')) {
        if (is_cart() || is_checkout() || is_account_page()) {
            goza_woocommerce_product_hero_func();
        }
    }

    the_content();
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'goza'),
        'after'  => '</div>',
    ));
    ?>
</div><!-- .entry-content -->