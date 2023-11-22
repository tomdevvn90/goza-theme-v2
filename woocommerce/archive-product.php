<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( );

$icon_hero_bar = __get_field('goza_icon_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/icon-hero-default.png';
$bg_hero_bar   = __get_field('goza_bg_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/bg-img-hero-default.jpg';

$has_sidebar = goza_check_sidebars_widgets_exists('shop-sidebar');
$classes = $has_sidebar ? 'col-md-8 col-sm-12': 'col-sm-12';

?>
<section class="product-hero" style="background-image:url('<?= esc_url($bg_hero_bar) ?>')">
	<div class="container">
		<div class="wrapper">
			<?php if( !empty($icon_hero_bar) ): ?>
				<div class="page-icon"><img src="<?php echo $icon_hero_bar; ?>" ></div>
			<?php endif; ?>

			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>

			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs">','</div>' );
				}
			?>
		</div>
	</div>
</section>
<section class="main-woocommerce bt-section-space <?php echo $has_sidebar ? 'has-sidebar' : ''; ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
	<div class="container">
		<div class="row">
			<div class="bt-content-area <?php echo $classes; ?>">
				<div class="bt-col-inner">
					<?php
						/**
						 * woocommerce_before_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						 * @hooked woocommerce_breadcrumb - 20
						 */
						do_action( 'woocommerce_before_main_content' );
					?>

						<?php
							/**
							 * woocommerce_archive_description hook.
							 *
							 * @hooked woocommerce_taxonomy_archive_description - 10
							 * @hooked woocommerce_product_archive_description - 10
							 */
							do_action( 'woocommerce_archive_description' );
						?>

						<?php if ( have_posts() ) : ?>

						<?php
							/**
							 * woocommerce_before_shop_loop hook.
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
						?>

						<?php woocommerce_product_loop_start(); ?>
							<div class="woocommerce-product-subcategories-wrap">
							<?php woocommerce_product_subcategories(); ?>
							</div>
							<div class="product-row">
								<?php while ( have_posts() ) : the_post();?>
									<div class="product-item">
										<?php wc_get_template_part( 'content', 'product' ); ?>
									</div>	
								<?php endwhile; // end of the loop. ?>
							</div>
						<?php woocommerce_product_loop_end(); ?>

						<?php
							/**
							 * woocommerce_after_shop_loop hook.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>

					<?php
						/**
						 * woocommerce_after_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
					?>

				</div>
			</div><!-- /.bt-content-area-->
            <?php
                /**
                 * woocommerce_sidebar hook.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                do_action( 'woocommerce_sidebar' );
            ?>
		</div><!-- /.row-->
	</div><!-- /.container-->
</section>
<?php get_footer( ); ?>
