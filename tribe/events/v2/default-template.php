<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

get_header();

/**
* Hook: goza_tribe_events_page_titlebar_archive
*
* @hooked goza_tribe_events_page_titlebar_archive_template - 10
*/
do_action( 'goza_tribe_events_page_titlebar_archive' );

$classes = 'archive-tribe-events-template';
if( is_singular( 'tribe_events' ) ) {
	$classes = 'single-tribe-events-template';
}

?>

<div id="content" class="site-content">
	<div id="primary" class="content-area <?php echo esc_attr($classes); ?>">
		<div class="container responsive">
			<main id="main" class="site-main">
				<section class="goza-section-space">
					<div class="list-tab-event">
						<ul class="nav nav-tabs d-flex align-items-center">
							<li class="active">
								<a class="tab-item" href="#tab-happening" data-toggle="tab" aria-expanded="true"><?php esc_html_e( 'Happening', 'goza' );?></a>
							</li>
							<li>
								<a class="tab-item" href="#tab-upcoming" data-toggle="tab" aria-expanded="true"><?php esc_html_e( 'Upcoming', 'goza' );?></a>
							</li>
							<li>
								<a class="tab-item" href="#tab-expired" data-toggle="tab" aria-expanded="true"><?php esc_html_e( 'Expired', 'goza' );?></a>
							</li>
						</ul>
						<div class="tab-content bt-list-event">
							<div role="tabpanel" class="tab-panel fade active in" id="tab-happening" tabindex="-1" data-event_type="happening">
								<?php 
								$event_type = 'happening';
								tribe_event_list( $event_type ); 
								?>
							</div>
							<div role="tabpanel" class="tab-panel fade" id="tab-upcoming" tabindex="-1" data-event_type="upcoming">
								<?php 
								$event_type = 'upcoming';
								tribe_event_list( $event_type ); 
								?>
							</div>
							<div role="tabpanel" class="tab-panel fade" id="tab-expired" tabindex="-1" data-event_type="expired">
								<?php 
								$event_type = 'expired';
								tribe_event_list( $event_type ); 
								?>
							</div>
						</div>
					</div>
				</section>

			</main><!-- .site-main -->
		</div>
	</div><!-- #primary -->
</div><!-- #content -->

<?php

get_footer();
