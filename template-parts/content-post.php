<?php

/**
 * Template part for displaying posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package goza
 */
?>
<div class="entry-content">
    <?php
    the_content();
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'goza'),
        'after'  => '</div>',
    ));
    ?>
</div><!-- .entry-content -->