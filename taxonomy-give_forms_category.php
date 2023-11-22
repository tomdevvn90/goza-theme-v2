<?php
/**
 * The template for displaying archive category give pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage goza
 * @since goza 
 */

get_header();

/**
* Hook: goza_page_titlebar_archive
*
* @hooked goza_page_titlebar_archive_template - 10
*/
do_action( 'goza_hook_blog_hero_section' );


?>

<div id="content" class="site-content">
	<div id="primary" class="content-area archive-donation-page-template has-sidebar right-sidebar">
		<div class="container responsive">
			<main id="main" class="site-main">

					<?php if ( have_posts() ) { ?>

						<section class="give-forms-list loadmore-button">
							<?php
							// Load posts loop.
							while ( have_posts() ) {
								the_post();
									get_template_part( 'give/content-give-form' );
							}
							?>
						</section> 

						<?php
							the_posts_pagination(
								array(
									'mid_size'  => 2,
									'prev_text' => __( 'Prev', 'goza' ),
									'next_text' => __( 'Next', 'goza' ) ,
								)
							);

					} else {

						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content/content', 'none' );

					}
					?>


			</main><!-- .site-main -->
			<aside class="widget-area give-sidebar" role="complementary" aria-label="Give Sidebar">
				<div class="sidebar-widget-wrap">
					<?php dynamic_sidebar( 'archive-give-sidebar' ); ?>
				</div>
			</aside>

		</div>
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
