<?php
/**
 * Displays page titlebar in events default template
 *
 * @package WordPress
 * @subpackage goza
 * @since goza 7.0
 */
$icon_hero_bar = __get_field('goza_icon_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/icon-hero-default.png';
$bg_hero_bar   = __get_field('goza_bg_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/bg-img-hero-default.jpg';
?>

<?php if( is_post_type_archive( 'tribe_events' ) ) { ?>
	<div class="page-titlebar" style="background-image:url('<?= esc_url($bg_hero_bar) ?>')">
		<div class="page-titlebar--bg-overlay" style=""></div>
		<div class="container">
			<div class="page-titlebar-content">
				<?php if( !empty($icon_hero_bar) ): ?>
					<div class="page-icon"> <img src="<?= esc_url($icon_hero_bar) ?>" alt="icon" /> </div>
				<?php endif; ?>
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumbs">','</div>' );
					}
				?>
			</div>
		</div>
	</div>
<?php } ?>
