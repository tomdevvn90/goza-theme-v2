<?php

/**
 * Helpers
 */

function dump($data)
{
	print "<pre style=' background: rgba(0, 0, 0, 0.1); margin-bottom: 1.618em; padding: 1.618em; overflow: auto; max-width: 100%; '>==========================\n";
	if (is_array($data)) {
		print_r($data);
	} elseif (is_object($data)) {
		var_dump($data);
	} else {
		var_dump($data);
	}
	print "===========================</pre>";
}

if (!function_exists('export_acf_from_local_field')) {
	function export_acf_from_local_field()
	{
		$groups = acf_get_local_field_groups();
		$json   = [];

		foreach ($groups as $group) {
			// Fetch the fields for the given group key
			$fields = acf_get_local_fields($group['key']);

			// Remove unecessary key value pair with key "ID"
			unset($group['ID']);

			// Add the fields as an array to the group
			$group['fields'] = $fields;

			// Add this group to the main array
			$json[] = $group;
		}

		$json = json_encode($json, JSON_PRETTY_PRINT);

		// Write output to file for easy import into ACF.
		// The file must be writable by the server process. In this case, the file is located in
		// the current theme directory.
		$file = get_template_directory() . '/acf-import.json';
		file_put_contents($file, $json);

		return true;
	}
}

if (!function_exists('goza_svg_icon')) {

	/**
	 * @param $icon
	 *
	 * @return mixed|string
	 */
	function goza_svg_icon($icon)
	{
		$icons = require(__DIR__ . '/svg.php');

		return $icons[$icon] ? $icons[$icon] : 'Icon not support!';
	}
}


if (!function_exists('goza_the_posts_navigation')) {
	function goza_the_posts_navigation($args = array(), $base = false, $query = false)
	{
		$args = wp_parse_args($args, array(
			'prev_text'          => __('Older posts'),
			'next_text'          => __('Newer posts'),
			'screen_reader_text' => __('Posts navigation'),
			'aria_label'         => __('Posts'),
			'class'              => 'posts-navigation',
		));

		$wp_query = $query ? $query : $GLOBALS['wp_query'];

		// Don't print empty markup if there's only one page.
		if ($wp_query->max_num_pages < 2) {
			return;
		}
		$paged        = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
		$pagenum_link = html_entity_decode(get_pagenum_link());
		if ($base) {
			$orig_req_uri           = $_SERVER['REQUEST_URI'];
			$_SERVER['REQUEST_URI'] = $base;
			$pagenum_link           = get_pagenum_link($paged - 1);
			$_SERVER['REQUEST_URI'] = $orig_req_uri;
		}

		$query_args = array();
		$url_parts  = explode('?', $pagenum_link);
		if (isset($url_parts[1])) {
			wp_parse_str($url_parts[1], $query_args);
		}

		$pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
		$pagenum_link = trailingslashit($pagenum_link) . '%_%';
		$format       = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
		$format       .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links(array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'add_args'  => array_map('urlencode', $query_args),
			'prev_text' => $args['prev_text'],
			'next_text' => $args['next_text'],
		));

		if ($links) : ?>
			<nav class="navigation paging-navigation">
				<span class="screen-reader-text"><?= $args['screen_reader_text']; ?></span>
				<?php echo '<div class="pagination loop-pagination">' . $links . '</div><!-- .pagination -->' ?>
			</nav><!-- .navigation -->
		<?php
		endif;
	}
}

if (!function_exists('__get_field')) {
	function __get_field($selector, $post_id = false, $format_value = true)
	{
		if (function_exists('get_field') && get_field($selector, $post_id, $format_value)) {
			return get_field($selector, $post_id, $format_value);
		}

		return false;
	}
}
if (!function_exists('__get_fields')) {
	function __get_fields($post_id = false, $format_value = true)
	{
		if (function_exists('get_fields') && get_fields($post_id, $format_value)) {
			return get_fields($post_id, $format_value);
		}

		return [];
	}
}


// the blog posts navigation
if (!function_exists('goza_blog_posts_navigation')) {
	function goza_blog_posts_navigation()
	{
		global $wp_query;

		if ($wp_query->max_num_pages > 1) {
		?>
			<div class="navigation paging-navigation">
				<?php

				$animation = 'data-aos="fade-up" data-aos-duration="1000"';

				$pre_text = '<i class="fa fa-angle-left"></i> <strong>Newer</strong>';
				$next_text = '<strong>Older</strong> <i class="fa fa-angle-right"></i>';

				$args = array(
					'format' => 'page/%#%',
					'current' => max(1, get_query_var('paged')),
					'total' => $wp_query->max_num_pages,
					'prev_next'          => false,
				);

				$pre_button = '<a href="javascript:void(0)" class="prev page-button disabled">' . __($pre_text, 'goza') . '</a>';
				$next_button = '<a href="javascript:void(0)" class="next page-button disabled">' . __($next_text, 'goza') . '</a>';

				$html = get_previous_posts_link($pre_text);
				$html .= '<div class="pagination-numbers-wrap">' . paginate_links($args) . '</div>';
				$html .= get_next_posts_link($next_text);

				$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

				if (1 === $paged) {
					$html = $pre_button . $html;
				}

				if ($wp_query->max_num_pages ==  $paged) {
					$html = $html . $next_button;
				}

				echo '<div class="pagination loop-pagination" ' . $animation . '>';
				echo    $html;
				echo '</div>';

				?>
			</div>
		<?php

		}
	}
}

// the single posts navigation
if (!function_exists('goza_single_post_navigation')) {
	function goza_single_post_navigation()
	{
		// previous single post
		$prev_post = get_previous_post();
		$prev_id = $prev_post->ID;
		$permalink_prev = get_permalink($prev_id);

		// next single post
		$next_post = get_next_post();
		$next_id = $next_post->ID;
		$permalink_next = get_permalink($next_id);

		?>
		<div class="single-post-navigation post-navigation-skin--<?php echo get_post_type(); ?>">
			<div class="previous-next-link flex-sm-nowrap flex-wrap">
				<div class="previous">
				<?php if (!empty($prev_post)) : ?>
					<a href="<?php echo esc_url($permalink_prev); ?>" class="post-nav-link" rel="prev">
						<div class="post-nav-thumbnail">
							<?php echo get_the_post_thumbnail($prev_id, 'thumbnail'); ?>
						</div>
						<div class="post-nav-title-box">
							<span class="meta-nav" aria-hidden="true">Previous Post</span>
							<div class="post-title">
								<?php echo get_the_title($prev_id); ?>
							</div>
						</div>
					</a>
					<?php endif; ?>
				</div>

				<div class="next">
				<?php if (!empty($next_post)) : ?>
					<a href="<?php echo esc_url($permalink_next); ?>" class="post-nav-link" rel="next">
						<div class="post-nav-title-box">
							<span class="meta-nav" aria-hidden="true">Next Post</span>
							<div class="post-title">
								<?php echo get_the_title($next_id); ?>
							</div>
						</div>
						<div class="post-nav-thumbnail">
							<?php echo get_the_post_thumbnail($next_id, 'thumbnail'); ?>
						</div>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}
}

// the single posts related
if (!function_exists('goza_single_post_related')) {
	function goza_single_post_related()
	{
		global $post;
		$post_type = get_post_type($post);

		$taxonomies = get_object_taxonomies($post_type);
		$taxs_query = array();
		$taxs_query['relation'] = 'OR';
		if (!empty($taxonomies)) {
			foreach ($taxonomies as $key => $taxonomy) {
				$terms = get_the_terms($post->ID, $taxonomy);
				if (!empty($terms)) {
					$term_ids = array();
					foreach ($terms as $i => $term) {
						array_push($term_ids, $term->term_id);
					}
					$item = array(
						'taxonomy' => $taxonomy,
						'field' => 'term_id',
						'terms' => $term_ids,
					);
					array_push($taxs_query, $item);
				}
			}
		}

		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => 3,
			'post_status' => 'publish',
			'post__not_in' => array($post->ID),
			'tax_query' => $taxs_query,
		);

		$article_query = new WP_Query($args);

		if ($article_query->have_posts()) {
		?>
			<div class="single-post-related">
				<div class="post-related-wrapper">
					<h3 class="post-related-title"><?php echo __('Related Articles', 'goza'); ?></h3>
					<div class="post-related-list">
						<?php
						while ($article_query->have_posts()) {
							$article_query->the_post();

						?>
							<div class="post-related-item">
								<a href="<?php echo esc_url(get_the_permalink()); ?>" class="post-related-item__thumbnail">
									<?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
								</a>
								<a href="<?php echo esc_url(get_the_permalink()); ?>" class="post-related-item__title-link">
									<h3 class="post-related-item__title"><?php echo get_the_title(); ?></h3>
								</a>
							</div>
						<?php

						}

						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		<?php
		}
	}
}

if (!function_exists('goza_expandable_excerpt')) {
	function goza_expandable_excerpt($excerpt)
	{
		$split = explode(" ", $excerpt); //convert string to array
		$len = count($split); //get number of words
		$words_to_show_first = 29; //Word to be dsiplayed first
		if ($len > $words_to_show_first) { //check if it's longer the than first part

			$firsthalf = array_slice($split, 0, $words_to_show_first);
			$output = '<p class="event-excerpt" >';
			$output .= implode(' ', $firsthalf) . '...';
			$output .= '</p>';
		} else {
			$output = '<p class="event-excerpt">'  .   $excerpt . '</p>';
		}
		return $output;
	}
}

/**
 * Gets the SVG code for a given icon.
 */
if (!function_exists('goza_get_icon_svg')) {
	function goza_get_icon_svg($icon, $size = 24)
	{
		return Goza_SVG_Icons::get_svg('ui', $icon, $size);
	}
}

/**
 * Gets the SVG code for a given social icon.
 */
if (!function_exists('goza_get_social_icon_svg')) {
	function goza_get_social_icon_svg($icon, $size = 24)
	{
		return Goza_SVG_Icons::get_svg('social', $icon, $size);
	}
}

/**
 * Gets the logo for header.
 */
if (!function_exists('goza_get_logo_header_site')) {
	function goza_get_logo_header_site()
	{
		$logos = require(__DIR__ . '/logo-header.php');
		if (isset($_GET['home'])) {
			foreach ($logos as $key => $logo) {
				if ($key == $_GET['home']) {
					return $logo;
				}
			}
		} else {
			if (has_custom_logo()) {
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo_custom = wp_get_attachment_image_src($custom_logo_id, 'full');
				return $logo_custom[0];
			}
		}

		return null;
	}
}

/**
 * Gets the logo for footer.
 */
if (!function_exists('goza_get_logo_footer_site')) {
	function goza_get_logo_footer_site()
	{
		$logos = require(__DIR__ . '/logo-footer.php');
		if (isset($_GET['home'])) {
			foreach ($logos as $key => $logo) {
				if ($key == 'ft-' . $_GET['home']) {
					return $logo;
				}
			}
		}
		return null;
	}
}


/**
 * Render Button Template
 */
if (!function_exists('goza_button_render')) {
	function goza_button_render($button, $style_button = 'btn-default')
	{
		ob_start();
		?>
		<a href="<?= esc_url($button['url']) ?>" target="<?= esc_attr($button['target']) ?>" class="btn <?= esc_attr($style_button) ?>">
			<?= esc_attr($button['title']) ?>
			<?php if ($style_button == 'btn-water') { ?>
				<svg class="wgl-dashes inner-dashed-border animated-dashes">
					<rect rx="0%" ry="0%"> </rect>
				</svg>
			<?php } ?>
		</a>
<?php
		echo ob_get_clean();
	}
}

/**
 * Check sidebar exists
 */
if (!function_exists('goza_check_sidebars_widgets_exists')) {
	function goza_check_sidebars_widgets_exists( $name = '' ){

		$sidebars_widgets = wp_get_sidebars_widgets();

		if( isset( $sidebars_widgets[$name] ) && !empty( $sidebars_widgets[$name] ) ){
			return true;
		}

		return false;
	}
}

/**
 * woocommerce product hero
 */
if( !function_exists('goza_woocommerce_product_hero_func') ){
	function goza_woocommerce_product_hero_func() {
		$icon_hero_bar = __get_field('goza_icon_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/icon-hero-default.png';
		$bg_hero_bar   = __get_field('goza_bg_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/bg-img-hero-default.jpg';
	?>
		<section class="product-hero" style="background-image:url('<?= esc_url($bg_hero_bar) ?>')">
			<div class="container">
				<div class="wrapper">
					<?php if( !empty($icon_hero_bar) ): ?>
						<div class="page-icon"> <img src="<?= esc_url($icon_hero_bar) ?>" alt="icon" /> </div>
					<?php endif; ?>
					<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs">','</div>' );
						}
					?>
				</div>
			</div>
		</section>
	<?php }
}


