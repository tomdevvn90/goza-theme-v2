<?php

/**
 * Load widgets
 */
require( __DIR__ . '/widget/loaded.php' );

/**
 * Register sidebars
 */
add_action( 'widgets_init', 'goza_widgets_init' );
function goza_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'News page', 'goza' ),
		'id'            => 'news-sidebar',
		'before_widget' => '<div class="wg-wrap">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="wg-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'goza' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<div class="wg-wrap">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="wg-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'goza' ),
		'id'            => 'shop-sidebar',
		'description'   => '',
		'before_widget' => '<div class="wg-wrap">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="wg-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Archive Give Sidebar', 'goza' ),
		'id'            => 'archive-give-sidebar',
		'description'   => '',
		'before_widget' => '<div class="wg-wrap">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="wg-title">',
		'after_title'   => '</h2>',
	) );
}

