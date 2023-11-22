<?php
/**
 * The template for displaying form content in the single-give-form.php template
 *
 * Override this template by copying it to yourtheme/give/single-give-form/content-single-give-form.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$form_id = get_the_ID();
?>
<div class="single-give-forms-template">
<article id="post-<?php the_ID(); ?>" <?php post_class( 'give-form-wrap' ); ?>>

<div class="give-header-ss">

	<div class="container responsive">
			<div class="give-header-inner">
			<ul class="give-meta">
				<li class="give-published">
					<?php if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) { ?>
						<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
						<time class="updated" datetime="<?php echo esc_attr( get_the_modified_date( DATE_W3C ) ); ?>"><?php echo get_the_modified_date(); ?></time>
					<?php } else { ?>
						<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
						<time class="give-date published" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo get_the_date(); ?></time>
					<?php } ?>
				</li>
				<?php the_terms( $form_id, 'give_forms_category', '<li class="give-category">' . esc_html__('Project In: ', 'goza'), ',', '</li>' ); ?>
			</ul>

			<?php the_title( '<h1 class="give-title">', '</h1>' ); ?>

			<?php
				if ( give_is_setting_enabled( get_post_meta( $form_id, '_give_goal_option', true ) ) ) {
						$args = array(
							'show_bar' => false
						);

						give_show_goal_progress( $form_id, $args );
				}
			?>
		</div>
	</div>

</div>

<div class="give-meida-form-ss">
	<div class="container responsive">
		<div class="give-meida-form-content <?php echo has_post_thumbnail() ? 'has-thumbnail': ''; ?>">
			<?php if( has_post_thumbnail() ){ ?>
				<div class="give-meida-col">
					<div class="give-meida">
						<?php the_post_thumbnail('full'); ?>
					</div>
				</div>
			<?php } ?>

			<div class="give-form-col">
				<div class="give-form-box-wrap">
					<?php echo '<h2 class="give-form_title">' . esc_html__('Join Us', 'goza') . ' <span>' . esc_html__('We Need Your Help', 'goza') . '</span></h2>' ?>
					<?php
            $atts = array(
                'id' => $form_id,  // integer.
                'show_title' => false, // boolean.
                'show_goal' => false, // boolean.
                'show_content' => 'none', //above, below, or none
                'display_style' => 'modal', //modal, button, and reveal
                'continue_button_title' => '' //string

            );
            echo give_get_donation_form( $atts );
            ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="give-content-ss">
	<div class="container responsive">
		<div class="give-content-wrap">
			<?php give_form_display_content( $form_id, $args = array() ); ?>

			<div class="give-form-content-footer">
				<?php the_terms( $form_id, 'give_forms_tag', '<div class="give-tag-links"><span>'. esc_html__('Tags: ', 'goza') .'</span>', '', '</div>' ); ?>

				<div class="entry-social-share">
  				<span>Share: </span>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ) ?>" class="facebook" target="_blank"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
					<a href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url( get_permalink() ) ?>&amp;media=&amp;description=" class="pinterest" target="_blank"> <i class="fa fa-pinterest" aria-hidden="true"></i> </a>
					<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( get_permalink() ) ?>&amp;title=&amp;summary=&amp;source=' . get_the_permalink() . '" class="linkedin" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					<a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ) ?>" class="google" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>

	</div>
</div>

</article>
</div>
<?php

