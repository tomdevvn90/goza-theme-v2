<?php
/**
 * Display custom style in customizer and on frontend.
 */
function goza_events_theme_custom_style() {
	// Not include custom style in admin.
	if ( is_admin() ) {
		return;
	}

	$theme_styles = '';

	// if ( 199 !== absint( goza_get_option('main_color') ) ) {
	// 	// Colors
	// 	require_once get_parent_theme_file_path( '/tribe-events/color-patterns.php' );
	// 	$theme_styles .= goza_events_custom_colors_css();

	// }

	/**
	 * Filters goza custom theme styles.
	 *
	 * @since goza 7.0
	 *
	 * @param string $theme_styles
	 */
	return apply_filters( 'goza_events_theme_custom_style', $theme_styles );
}

/**
* Hook: goza_tribe_events_page_titlebar_archive
*
* @hooked goza_tribe_events_page_titlebar_archive_template - 10
*/
add_action( 'goza_tribe_events_page_titlebar_archive', 'goza_tribe_events_page_titlebar_archive_template' );

function goza_tribe_events_page_titlebar_archive_template() {

  get_template_part( 'tribe-events/page-titlebar', 'archive' );

}
