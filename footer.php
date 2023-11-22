<?php

/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package goza
 */

echo "</div><!--End site wrap-->";

/**
 * goza_hook_footer hook.
 * @see goza_footer_template - 20
 */
do_action('goza_hook_footer');
do_action('goza_hook_preloader');
do_action('goza_hook_menu_mobile');
do_action('goza_hook_search');
do_action('goza_hook_donation_form');
wp_footer();
?>
</body>

</html>