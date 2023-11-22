<?php

/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package goza
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php $viewport_content = apply_filters('goza_gutenberg_viewport_content', 'width=device-width, initial-scale=1'); ?>
	<meta name="viewport" content="<?php echo esc_attr($viewport_content); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel='stylesheet' id='be-give-styles-css' href='<?php echo get_site_url() ?>/wp-content/plugins/give/assets/dist/css/give.css' media='all' />
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!--Start site wrap -->
	<div class="site-wrap">
		<?php do_action('goza_hook_header'); ?>