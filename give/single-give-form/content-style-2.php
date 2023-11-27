<?php

$form_id = get_the_ID();

?>
<div class="single-give-forms-template-style2">
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
          <?php the_terms( $form_id, 'give_forms_category', '<li class="give-category">' . esc_html__('Project In: ', 'alone'), ',', '</li>' ); ?>
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
            <?php echo '<h2 class="give-form_title">' . esc_html__('Join Us', 'alone') . ' <span>' . esc_html__('We Need Your Help', 'alone') . '</span></h2>' ?>
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
          <?php the_terms( $form_id, 'give_forms_tag', '<div class="give-tag-links"><span>'. esc_html__('Tags: ', 'alone') .'</span>', '', '</div>' ); ?>

          <?php
            /**
             * Hook: alone_entry_share_socials
             *
             * @hooked alone_share_socials_wrapper_start - 10
             * @hooked alone_share_socials_content - 20
             * @hooked alone_share_socials_wrapper_end - 40
             */
            do_action( 'alone_entry_share_socials' );
          ?>
        </div>
      </div>

    </div>
  </div>

</article>
</div>