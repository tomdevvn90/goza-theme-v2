<?php
add_action('acf/init', 'goza_acf_init');
function goza_acf_init()
{
	if (function_exists('acf_add_options_page')) {

		acf_add_options_page(array(
			'page_title'    => 'Theme Options',
			'menu_title'    => 'Theme Options',
			'menu_slug'     => 'theme-options',
			'capability'    => 'edit_posts',
			'redirect'      => false
		));
	}
}

add_filter('acf/settings/save_json', 'goza_acf_json_save_point');
function goza_acf_json_save_point($path)
{
	// update path
	$path = get_stylesheet_directory() . '/resources/functions/acf-options';

	// return
	return $path;
}

add_filter('acf/settings/load_json', 'goza_acf_json_load_point');
function goza_acf_json_load_point($paths)
{
	// remove original path (optional)
	unset($paths[0]);
	// append path
	$paths[] = get_stylesheet_directory() . '/resources/functions/acf-options';

	// return
	return $paths;
}
