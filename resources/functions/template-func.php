<?php

if (is_admin() || isset($_GET['home'])) {
	goza_generate_styles_theme();
}


if (!function_exists('goza_blog_hero_section_template')) {
	/**
	 * Blog hero section template
	 */
	function goza_blog_hero_section_template()
	{
		get_template_part('template-parts/blog/blog-hero-section');
	}
}

if (!function_exists('goza_single_template')) {
	/**
	 * Single template
	 */
	function goza_single_template()
	{
		get_template_part('template-parts/single/single');
	}
}

if (!function_exists('goza_single_comment_list_template')) {
	/**
	 * Single comment list template
	 */
	function goza_single_comment_list_template()
	{
		get_template_part('template-parts/single/comment-list');
	}
}
