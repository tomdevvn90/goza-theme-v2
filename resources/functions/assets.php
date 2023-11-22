<?php

function goza_get_assets($name, $extension)
{
	$manifest = goza_get_manifest();
	$file = !empty($manifest['/' . $extension . '/' . $name . '.' . $extension]) ? $manifest['/' . $extension . '/' . $name . '.' . $extension] : false;
	if (!$file) {
		return false;
	}

	return THEME_URI_DIST . $file;
}

function goza_get_manifest()
{

	$dir = THEME_PATH . '/dist/';

	if (file_exists($dir . 'mix-manifest.json')) {
		$manifest = json_decode(file_get_contents($dir . 'mix-manifest.json'), true);
	} else {
		$manifest = false;
	}

	return $manifest;
}

add_action('wp_enqueue_scripts', function () {

	$upload_dir = wp_upload_dir();

	wp_enqueue_style('theme-font', THEME_URI . '/resources/assets/fonts/fonts.css', [], THEME_VERSION);
	//Global
	wp_enqueue_style('goza-theme-general-styles', $upload_dir['baseurl'] . '/styles_uploads/variable-css.css', [], THEME_VERSION);
	if (isset($_GET['home'])) {
		wp_enqueue_style('goza-theme-home-styles', goza_get_style_home($_GET['home']), [], THEME_VERSION);
	}
	wp_enqueue_style('app-styles', goza_get_assets('theme', 'css'), [], THEME_VERSION);
	wp_enqueue_script('manifest-scripts', goza_get_assets('manifest', 'js'), ['jquery'], THEME_VERSION, true);
	wp_enqueue_script('vendor-scripts', goza_get_assets('vendor', 'js'), ['jquery'], THEME_VERSION, true);
	wp_enqueue_script('app-scripts', goza_get_assets('theme', 'js'), ['jquery'], THEME_VERSION, true);

	wp_localize_script('app-scripts', 'php_data', [
		'admin_logged' => in_array('administrator', wp_get_current_user()->roles) ? 'yes' : 'no',
		'ajax_url'     => admin_url('admin-ajax.php')
	]);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
});

if (!function_exists('goza_load_css_editor')) {
	/**
	 * Load assets backend
	 */
	function goza_load_css_editor()
	{
		$upload_dir = wp_upload_dir();
		wp_enqueue_style('goza-theme-general-styles', $upload_dir['baseurl'] . '/styles_uploads/variable-css.css', [], THEME_VERSION);
		wp_enqueue_style('admin-font', THEME_URI . '/resources/assets/fonts/fonts.css', [], THEME_VERSION);
		wp_enqueue_style('theme-css', goza_get_assets('theme-editor', 'css'), [], THEME_VERSION);
		wp_enqueue_script('admin-theme-scripts', THEME_URI . '/resources/assets/js/editor/function.js', ['jquery'], THEME_VERSION, true);
	}
}

add_action('admin_enqueue_scripts', 'goza_load_css_editor');


if (!function_exists('goza_get_style_home')) {
	function goza_get_style_home($home_name)
	{
		return THEME_URI . '/dist/css/' . $home_name . '.css';
	}
}
