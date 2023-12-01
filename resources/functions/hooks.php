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
	if( is_product() ){
		return $args;
	}

	$args['callback'] = 'goza_single_comment_list_template';
	return $args;
}

// woocommerce sidebar
add_action('wp', function () {
	remove_action('woocommerce_sidebar', 'generate_construct_sidebars');

	if( !is_product() ){
		add_action('woocommerce_sidebar', function () {
			get_sidebar('woocommerce');
		});
	}

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

// Display plus button after Add to Cart button.
add_action( 'woocommerce_after_quantity_input_field', 'goza_display_quantity_plus_func' );
function goza_display_quantity_plus_func() {
	echo '<button type="button" class="plus">+</button>';
}

// Display minus button before Add to Cart button.
add_action( 'woocommerce_before_quantity_input_field', 'goza_display_quantity_minus_func' );
function goza_display_quantity_minus_func() {
	echo '<button type="button" class="minus">-</button>';
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
	<script type="text/javascript">
		(function($){ 

			$( document.body ).on( 
				'added_to_cart',
				function ( e, fragments, cart_hash, $button  ) {
					var menu_mini_cart = $('#menu-mini-cart');
					menu_mini_cart.addClass('active');
				}
			);

		})(jQuery);
	</script>
<?php
	if ( is_product() || is_cart() ) {
		wc_enqueue_js(
			"$(document).on( 'click', 'button.plus, button.minus', function() {
				var qty = $( this ).parent( '.quantity' ).find( '.qty' );
				var val = parseFloat(qty.val());
				var max = parseFloat(qty.attr( 'max' ));
				var min = parseFloat(qty.attr( 'min' ));
				var step = parseFloat(qty.attr( 'step' ));
				if ( $( this ).is( '.plus' ) ) {
					if ( max && ( max <= val ) ) {
					qty.val( max ).change();
					} else {
					qty.val( val + step ).change();
					}
				} else {
					if ( min && ( min >= val ) ) {
					qty.val( min ).change();
					} else if ( val > 1 ) {
					qty.val( val - step ).change();
					}
				}
			});"
		);
	}

}

// Remove the default content product part
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Add the default content product part
add_action( 'woocommerce_before_shop_loop_item', 'goza_woocommerce_before_shop_loop_item_func', 9 );
function goza_woocommerce_before_shop_loop_item_func() {
	global $product;
	$product_id = $product->get_id();
	?>
	<div class="woocommerce-loop-product__header" data-product-id="<?php echo $product_id; ?>">
		<div class="woocommerce-loop-product__overlay"></div>
	<?php
		the_post_thumbnail();
		woocommerce_template_loop_add_to_cart();
	?>
	</div>
	<?php
}
add_action( 'woocommerce_after_shop_loop_item', 'goza_woocommerce_after_shop_loop_item_func', 20 );
function goza_woocommerce_after_shop_loop_item_func() {
	?>
	<div class="woocommerce-loop-product__bottom">
	<?php
		woocommerce_template_loop_rating();
		woocommerce_template_loop_price();
	?>
	</div>
	<?php
}

// woocommerce loop add to cart link
add_filter( 'woocommerce_loop_add_to_cart_link', 'goza_woocommerce_loop_add_to_cart_link_func', 10, 3 );
function goza_woocommerce_loop_add_to_cart_link_func( $add_to_cart_html, $product, $args ){

	$icon = '<span class="icon">
		<svg class="svg-icon" width="16" height="16" fill="#FFFFFF" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="-35 0 512 512.00102">
			<path d="m443.054688 495.171875-38.914063-370.574219c-.816406-7.757812-7.355469-13.648437-15.15625-13.648437h-73.140625v-16.675781c0-51.980469-42.292969-94.273438-94.273438-94.273438-51.984374 0-94.277343 42.292969-94.277343 94.273438v16.675781h-73.140625c-7.800782 0-14.339844 5.890625-15.15625 13.648437l-38.9140628 370.574219c-.4492192 4.292969.9453128 8.578125 3.8320308 11.789063 2.890626 3.207031 7.007813 5.039062 11.324219 5.039062h412.65625c4.320313 0 8.4375-1.832031 11.324219-5.039062 2.894531-3.210938 4.285156-7.496094 3.835938-11.789063zm-285.285157-400.898437c0-35.175782 28.621094-63.796876 63.800781-63.796876 35.175782 0 63.796876 28.621094 63.796876 63.796876v16.675781h-127.597657zm-125.609375 387.25 35.714844-340.097657h59.417969v33.582031c0 8.414063 6.824219 15.238282 15.238281 15.238282s15.238281-6.824219 15.238281-15.238282v-33.582031h127.597657v33.582031c0 8.414063 6.824218 15.238282 15.238281 15.238282 8.414062 0 15.238281-6.824219 15.238281-15.238282v-33.582031h59.417969l35.714843 340.097657zm0 0"></path>
		</svg>
	</span>';

	$icon_readmore = '<span class="icon">
		<svg class="svg-icon" width="16" height="16" fill="#FFFFFF" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve">
			<path d="M234.672,181.399V42.668c0-4.309-2.603-8.213-6.592-9.835c-3.989-1.685-8.576-0.747-11.627,2.304L3.12,248.471    c-4.16,4.16-4.16,10.923,0,15.083l213.333,213.333c2.048,2.027,4.779,3.115,7.552,3.115c1.365,0,2.752-0.256,4.075-0.811    c3.989-1.643,6.592-5.547,6.592-9.856V331.052c46.208,2.304,226.496,17.835,256.427,119.957c1.515,5.077,6.549,8.363,11.755,7.552    c5.248-0.768,9.152-5.248,9.152-10.56C512.005,203.287,284.635,182.913,234.672,181.399z M224.091,309.335    c-3.243,0.427-5.568,1.088-7.595,3.093c-2.027,2.005-3.157,4.736-3.157,7.573v123.584L25.755,256.001L213.339,68.418v123.584    c0,2.901,1.173,5.653,3.264,7.68c2.069,2.005,4.736,3.328,7.765,2.987l3.349-0.043c40.661,0,231.488,10.133,259.499,197.099    C414.619,312.236,232.923,309.42,224.091,309.335z"></path>
			</svg>
	</span>';

	$button_text = '<span class="text">'.$product->add_to_cart_text().'</span>';
	$button = ( ( ! $product->is_in_stock() )? $icon_readmore : $icon ) . $button_text;
	return sprintf(
		'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		__( $button, 'goza' )
	);
}

// woocommerce add to cart fragments
add_filter( 'woocommerce_add_to_cart_fragments', 'goza_woocommerce_add_to_cart_fragments_func');
function goza_woocommerce_add_to_cart_fragments_func( $fragments ) {
    ob_start();
    ?>
    <span class="goza-total-cart">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
    $fragments['.goza-total-cart'] = ob_get_clean();
    return $fragments;
}

//  woocommerce cart item remove link
add_action( 'woocommerce_cart_item_remove_link', 'goza_woocommerce_cart_item_remove_link_func', 10, 2 );
function goza_woocommerce_cart_item_remove_link_func( $sprintf, $cart_item_key ) {
	
	$remove_icon = '<svg xmlns="http://www.w3.org/2000/svg" height="427pt" viewBox="-40 0 427 427.00131" width="427pt"><path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/></svg>';

	$sprintf = str_replace('</a>', '<span class="remove-icon">'.$remove_icon.'</span></a>', $sprintf);

	return $sprintf;
}


