<?php
/**
 * The Template for displaying all single Give Forms.
 *
 * Override this template by copying it to yourtheme/give/single-give-forms.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

/**
 * Fires in single form template, before the main content.
 *
 * Allows you to add elements before the main content.
 *
 * @since 1.0
 */
//do_action( 'give_before_main_content' );

while ( have_posts() ) :
	the_post();

	give_get_template_part( 'single-give-form/content', 'single-give-form' );
	?>
	<div class="be-give-navi">
	<div class="container responsive">
							<?php
							// Previous/next post navigation.
							the_post_navigation(
								array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'alone' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Next post:', 'alone' ) . '</span> <br/>' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'alone' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous post:', 'alone' ) . '</span> <br/>' .
										'<span class="post-title">%title</span>',
								)
							);
							?>
						</div>
						</div>
						<?php
endwhile; // end of the loop.

/**
 * Fires in single form template, after the main content.
 *
 * Allows you to add elements after the main content.
 *
 * @since 1.0
 */
//do_action( 'give_after_main_content' );

/**
 * Fires in single form template, on the sidebar.
 *
 * Allows you to add elements to the sidebar.
 *
 * @since 1.0
 */
do_action( 'give_sidebar' );

get_footer();
