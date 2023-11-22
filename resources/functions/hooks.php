<?php

/**
 * Hooks.
 */
function add_file_types_to_uploads($file_types)
{
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$new_filetypes['json'] = 'application/json';
	$file_types = array_merge($file_types, $new_filetypes);
	return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


/**
 * Header template
 * @return void
 */
add_action('goza_hook_header', 'goza_header_template');
function goza_header_template()
{
	$goza_layout_header = __get_field('goza_layout_header', 'option');
	$template_name = (isset($goza_layout_header) && !empty($goza_layout_header))  ? $goza_layout_header : 'general';
	if (isset($_GET['home'])) {
		switch ($_GET['home']) {
			case "ngo":
				$template_name = 'ngo';
				break;
			case "ngo-dark":
				$template_name = 'ngo-dark';
				break;
			case "organization":
				$template_name = 'organization';
				break;
			case "water-charity":
				$template_name = 'water-charity';
				break;
			case "water":
				$template_name = 'water';
				break;
			case "charity-organization":
				$template_name = 'charity-organization';
				break;
			case "charity-new":
				$template_name = 'charity-new';
				break;
			case "earthquake":
				$template_name = 'earthquake';
				break;
			default:
				$template_name = 'general';
		}
	}

	load_template(get_template_directory() . '/template-parts/headers/header-' . $template_name . '.php', false);
}

/**
 * Footer template
 * @return void
 */
add_action('goza_hook_footer', 'goza_footer_template');
function goza_footer_template()
{
	$goza_layout_footer = __get_field('goza_layout_footer', 'option');
	$template_name = (isset($goza_layout_footer) && !empty($goza_layout_header)) ? $goza_layout_footer : 'general';
	if (isset($_GET['home'])) {
		switch ($_GET['home']) {
			case "ngo":
				$template_name = 'ngo';
				break;
			case "ngo-dark":
				$template_name = 'ngo-dark';
				break;
			case "organization":
				$template_name = 'organization';
				break;
			case "water-charity":
				$template_name = 'water-charity';
				break;
			case "water":
				$template_name = 'water';
				break;
			case "charity-new":
				$template_name = 'charity-new';
				break;
			case "charity-organization":
				$template_name = 'charity-organization';
				break;
			case "earthquake":
				$template_name = 'earthquake';
				break;
			default:
				$template_name = 'general';
		}
	}

	load_template(get_template_directory() . '/template-parts/footers/footer-' . $template_name . '.php', false);
}


/**
 * Topbar template
 * @return void
 */
add_action('goza_hook_topbar', 'goza_topbar_template');
function goza_topbar_template()
{
	$goza_layout_topbar = __get_field('goza_topbar_options', 'option');
	$template_name = (isset($goza_layout_topbar['goza_layout_top_bar']) && !empty($goza_layout_topbar['goza_layout_top_bar'])) ? $goza_layout_topbar['goza_layout_top_bar'] : 'default';
	if (isset($_GET['home'])) {
		switch ($_GET['home']) {
			case "dream":
			case "organization":
				$template_name = 'layout-2';
				break;
			case "water-charity":
				$template_name = 'layout-3';
				break;
			case "earthquake":
				$template_name = 'layout-4';
				break;
			default:
				$template_name = 'default';
		}
	}
	load_template(get_template_directory() . '/template-parts/topbar/topbar-' . $template_name . '.php', false);
}

/**
 * Preloader template
 * @return void
 */
add_action('goza_hook_preloader', 'goza_preloader_template');
function goza_preloader_template()
{
	$goza_enable_preloader = __get_field('goza_enable_preloader', 'option');
	if (!isset($goza_enable_preloader) || !$goza_enable_preloader) return;
	load_template(get_template_directory() . '/template-parts/preloader.php', false);
}

/**
 * Search template
 * @return void
 */
add_action('goza_hook_search', 'goza_search_template');
function goza_search_template()
{
	$goza_header_search = __get_field('goza_header_search', 'option');
	if (!isset($goza_header_search) || !$goza_header_search) return;
	load_template(get_template_directory() . '/template-parts/modal-search.php', false);
}

/**
 * Search template
 * @return void
 */
add_action('goza_hook_donation_form', 'goza_donation_form_template');
function goza_donation_form_template()
{
	$goza_button_type = __get_field('goza_button_type', 'option');
	$goza_form_donation = __get_field('goza_form_donation', 'option');
	if (!isset($goza_form_donation) || !$goza_form_donation || $goza_button_type != 'form_popup') return;
	load_template(get_template_directory() . '/template-parts/modal-donation-form.php', false);
}

/**
 * Menu Mobile template
 * @return void
 */
add_action('goza_hook_menu_mobile', 'goza_menu_mobile_template');
function goza_menu_mobile_template()
{
	load_template(get_template_directory() . '/template-parts/menu-mobile.php', false);
}

/**
 * Post loop item template
 *
 * @param Int $post_id
 *
 * @return void
 */
add_action('goza_hook_post_loop_item', 'goza_post_loop_item_template', 20, 2);
function goza_post_loop_item_template($post_id, $index)
{
	set_query_var('post_id', $post_id);
	$v  = ($index) % 3;
	$vT = ceil($v);

	$anm = 'data-aos="fade-up" data-aos-duration="' . (($v !== 0 ? $vT : 3) * 400) . '"';
?>
	<article <?= $anm; ?> <?php post_class('item post-loop-item col-md-4') ?>>
		<?php goza_post_item() ?>
	</article>
<?php
}


function goza_child_deregister_styles()
{
	wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'goza_child_deregister_styles', 20);


/**
 * blog hero section template
 * @return void
 */
add_action('goza_hook_blog_hero_section', 'goza_blog_hero_section_template');

/**
 * navigation template
 * @return void
 */
add_action('goza_hook_blog_posts_navigation', 'goza_blog_posts_navigation');


add_filter('previous_posts_link_attributes', 'prev_posts_link_attributes_func');
function prev_posts_link_attributes_func()
{
	return 'class="prev page-button"';
}

add_filter('next_posts_link_attributes', 'next_posts_link_attributes_func');
function next_posts_link_attributes_func()
{
	return 'class="next page-button"';
}

// customize the archive title
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = get_the_author();
	} elseif (is_tax()) { //for custom post types
		$title = sprintf(__('%1$s'), single_term_title('', false));
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	return $title;
});

// single template
add_action('goza_hook_single', 'goza_single_template');

// single post navigation
add_action('goza_hook_single_post_navigation', 'goza_single_post_navigation');

// single post related
add_action('goza_hook_single_post_related', 'goza_single_post_related');

// single seo breadcrumb single link
add_filter('wpseo_breadcrumb_single_link', 'goza_wpseo_breadcrumb_single_link', 10, 2);
function goza_wpseo_breadcrumb_single_link($link_output, $link)
{

	if (!is_single()) {
		return $link_output;
	}

	$page_for_posts_id = get_option('page_for_posts');
	// remove blog link
	if ($link['id'] && $link['id'] == $page_for_posts_id) {

		$link_output = '';
	}

	return $link_output;
}

// Filter the comment list arguments
add_filter('wp_list_comments_args', 'goza_override_comment_list');
function goza_override_comment_list($args)
{
	$args['callback'] = 'goza_single_comment_list_template';
	return $args;
}

// woocommerce sidebar
add_action('wp', function () {
	remove_action('woocommerce_sidebar', 'generate_construct_sidebars');

	add_action('woocommerce_sidebar', function () {
		get_sidebar('woocommerce');
	});
});

// Single product
add_action('woocommerce_before_main_content', 'goza_woocommerce_before_main_content_single_product_func');
function goza_woocommerce_before_main_content_single_product_func()
{

	if (!is_single() && !is_product()) {
		return;
	}

	$icon_hero_bar = __get_field('goza_icon_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/icon-hero-default.png';
	$bg_hero_bar   = __get_field('goza_bg_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/bg-img-hero-default.jpg';

	$has_sidebar = goza_check_sidebars_widgets_exists('shop-sidebar');
	$classes = $has_sidebar ? 'col-md-8 col-sm-12' : 'col-sm-12';

?>
	<section class="product-hero" style="background-image:url('<?= esc_url($bg_hero_bar) ?>')">
		<div class="container">
			<div class="wrapper">
				<div class="page-icon">
					<img src="<?= esc_url($icon_hero_bar) ?>" alt="icon" />
				</div>

				<?php the_title('<h1 class="page-title">', '</h1>'); ?>

				<?php
				if (function_exists('yoast_breadcrumb')) {
					yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">', '</div>');
				}
				?>
			</div>
		</div>
	</section>
	<section class="main-woocommerce">
		<div class="container">
			<div class="row">
				<?php do_action('woocommerce_sidebar'); ?>
				<div class="product-content <?php echo $classes; ?>">
				<?php
			}

			add_action('woocommerce_after_main_content', 'goza_woocommerce_after_main_content_single_product_func');
			function goza_woocommerce_after_main_content_single_product_func()
			{

				if (!is_single() && !is_product()) {
					return;
				}

				?>
				</div>
			</div>
		</div>
	</section><!-- </section> product-main -->
<?php

			}

			add_action('wp_footer', 'goza_wp_footer_func');
			function goza_wp_footer_func()
			{

				$icon_cart = __get_field('goza_enable_cart', 'option');
?>
	<?php if ($icon_cart && class_exists('WooCommerce')) { ?>
		<div id="menu-mini-cart" class="menu-mini-cart__container">
			<div class="menu-mini-cart__main">
				<div class="menu-cart__close-button"></div>
				<div class="widget_shopping_cart_content">
					<?php woocommerce_mini_cart(); ?>
				</div>
			</div>
		</div>
	<?php } ?>
<?php
			}
