<?php
/**
 * Import pack data package demo
 *
 * @package Import Pack
 * @author BePlus
 */
$plugin_includes = array(
  array(
    'name'     => 'Smart Slider 3 - Pro',
    'slug'     => 'smart-slider-3-pro',
    'source'   => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'smartslider3.zip',
  ),
  array(
    'name'          => 'Advanced Custom Fields PRO',
    'slug'          => 'advanced-custom-fields-pro',
    'source'        => IMPORT_REMOTE_SERVER_PLUGIN_DOWNLOAD . 'advanced-custom-fields-pro.zip',
  ),
  array(
    'name'          => 'GiveWP – Donation Plugin and Fundraising Platform',
    'slug'          => 'give',
  ),
  array(
    'name'          => 'Advanced Custom Fields: Font Awesome',
    'slug'          => 'advanced-custom-fields-font-awesome',
  ),
  array(
    'name'          => 'The Events Calendar',
    'slug'          => 'the-events-calendar',
  ),
  array(
    'name'          => 'Yoast SEO',
    'slug'          => 'wordpress-seo',
  ),
  array(
    'name'          => 'WooCommerce',
    'slug'          => 'woocommerce',
  ),
  array(
    'name'          => 'Smash Balloon Instagram Feed',
    'slug'          => 'instagram-feed',
  ),
  array(
    'name'          => 'Max Mega Menu',
    'slug'          => 'megamenu',
  ),
  array(
    'name'          => 'Newsletter – Send awesome emails from WordPress',
    'slug'          => 'newsletter',
  ),
  array(
    'name'          => 'Contact Form 7',
    'slug'          => 'contact-form-7',
  )


);

return apply_filters( 'beplus/import_pack/package_demo', [
    [
        'package_name' => 'goza-main',
        'preview' => IMPORT_URI . '/images/goza-main-preview.png', // image size 680x475
        'url_demo' => 'https://gozashop.beplusthemes.com/',
        'title' => __( 'goza Main', 'beplus' ),
        'description' => __( 'goza main demo, include home demos & full inner page (Contact, About, Company, blog, etc.).' ),
        'plugins' => $plugin_includes,
    ],
] );
