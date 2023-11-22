<?php

function be_item_give($block){
  $is_style     = isset($block['className']) ? $block['className'] : "is-style-default";
    ?>
    <div class="item-inner give-forms-grid" data-aos="fade-up" data-aos-duration="1000">
    <?php     
      switch ($is_style) {
        case "is-style-2":
          be_template_give_grid_style_2();
        break; 
        
        case "is-style-3":
          be_template_give_grid_style_3();
        break; 

        case "is-style-4":
          be_template_give_grid_style_4();
        break;

        default:
          be_template_give_grid_default();
        break; 
      } ?>
        
    </div>
    <?php
}

function be_template_give_grid_style_4(){ 
  $form_id = get_the_ID() ;
    
    $goal_option = get_post_meta( $form_id, '_give_goal_option', true );
    $form        = new Give_Donate_Form( $form_id );
    $goal        = $form->goal;
    $goal_format = get_post_meta( $form_id, '_give_goal_format', true );
    $income      = $form->get_earnings();
    $color       = get_post_meta( $form_id, '_give_goal_color', true );
    $give_forms_category = (wp_get_post_terms( $form_id, 'give_forms_category'));
    if( $give_forms_category && ! is_wp_error( $give_forms_category ) ) {
      foreach($give_forms_category as $give_forms_category1) {
        $give_forms_category_name = $give_forms_category1->name; //do something here
        $give_forms_category_link = get_term_link($give_forms_category1->slug, 'give_forms_category'); //do something here
        //var_dump($give_forms_category_link );
        }
    }
        if (empty($give_forms_category_name)) {
          $give_forms_category_name = '';
          $give_forms_category_link = '';
        }
      // set color if empty
      if(empty($color)) $color = '#01FFCC';
      $progress = ($goal === 0) ? 0 : round( ( $income / $goal ) * 100, 2 );

      if ( $income >= $goal ) { $progress = 100; }
      $class_none = '';
      if ( $goal_option == 'disabled' ) { $class_none = 'class-none'; }
      // Get formatted amount.
      $income = give_human_format_large_amount( give_format_amount( $income ) );
      $goal = give_human_format_large_amount( give_format_amount( $goal ) );

      //var_dump($progress);
      $button_donate = implode('', array(
        '<div class="give-button-donate">',
          do_shortcode('[give_form id="'. $form_id .'" show_title="true" show_goal="false" show_content="none" display_style="button"]'),
        '</div>',
      ));

    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
  ?>

    <div class="featured-image">
      <a href="<?php echo get_permalink($form_id) ?>">
        <img src="<?php echo esc_url($post_img_url) ?>" alt="#">
      </a>
      <?php if ($give_forms_category_name) { ?>
        <div class="form-category form-category-style1"><a style="color:<?php echo $color ?>" href="<?php echo $give_forms_category_link ?>"><?php echo $give_forms_category_name ?></a></div>
      <?php } ?>
    </div>
    <div class="give-goal-progress-wrap">
        <div class="progress"><div class="bar" style="background-color:<?php echo $color ?>;width: <?php echo $progress ?>%;" ><span><?php echo $progress ?>%</span></div></div>
    </div>
    <div class="entry-content ">
      <div class="entry-content-inner">
			  <div class="extra-meta">
          <div class="meta-item meta-date" style="color:<?php echo $color ?>"><?php echo get_the_date('d M, Y',$form_id) ?></div>
        </div>
			  <a href="<?php echo get_permalink($form_id) ?>" class="title-link"><h4 class="title"><?php echo get_the_title($form_id) ?></h4></a>
        <div class="entry-bot">
          <div class="bt-com"><?php echo __('Collected', 'goza'); ?> </div>
          <div class="give-price-goal" style="color:<?php echo $color ?>"><span>$</span><?php echo $goal ?></div>
        </div>
      </div>
    </div>

<?php }

function be_template_give_grid_style_3(){ 
  $form_id = get_the_ID() ;
    
    $goal_option = get_post_meta( $form_id, '_give_goal_option', true );
    $form        = new Give_Donate_Form( $form_id );
    $goal        = $form->goal;
    $goal_format = get_post_meta( $form_id, '_give_goal_format', true );
    $income      = $form->get_earnings();
    $color       = get_post_meta( $form_id, '_give_goal_color', true );
    $give_forms_category = (wp_get_post_terms( $form_id, 'give_forms_category'));
    if( $give_forms_category && ! is_wp_error( $give_forms_category ) ) {
      foreach($give_forms_category as $give_forms_category1) {
        $give_forms_category_name = $give_forms_category1->name; //do something here
        $give_forms_category_link = get_term_link($give_forms_category1->slug, 'give_forms_category'); //do something here
        //var_dump($give_forms_category_link );
        }
      }
        if (empty($give_forms_category_name)) {
          $give_forms_category_name = '';
          $give_forms_category_link = '';
        }
      // set color if empty
      if(empty($color)) $color = '#01FFCC';
      $progress = ($goal === 0) ? 0 : round( ( $income / $goal ) * 100, 2 );

      if ( $income >= $goal ) { $progress = 100; }
      $class_none = '';
      if ( $goal_option == 'disabled' ) { $class_none = 'class-none'; }
      // Get formatted amount.
      $income = give_human_format_large_amount( give_format_amount( $income ) );
      $goal = give_human_format_large_amount( give_format_amount( $goal ) );

      //var_dump($progress);
      $button_donate = implode('', array(
        '<div class="give-button-donate">',
          do_shortcode('[give_form id="'. $form_id .'" show_title="true" show_goal="false" show_content="none" display_style="button"]'),
        '</div>',
      ));

    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
  ?>

    <div class="featured-image">
      <a href="<?php echo get_permalink($form_id) ?>">
        <img src="<?php echo esc_url($post_img_url) ?>" alt="#">
      </a>
    </div>
    <div class="entry-content ">
      <div class="entry-content-inner">
			  <div class="extra-meta">
          <div class="meta-item meta-date"><span class="ion-android-calendar"></span><?php echo get_the_date('d M, Y',$form_id) ?></div>
        </div>
			  <a href="<?php echo get_permalink($form_id) ?>" class="title-link"><h4 class="title"><?php echo get_the_title($form_id) ?></h4></a>
        <div class="give-goal-progress-wrap">
          <div class="progress"><div class="bar" style="background-color:<?php echo $color ?>;width: <?php echo $progress ?>%;" ></div></div>
            <div class="bt-com"><?php echo __('Donation Completed', 'goza'); ?></div>
        </div>
        <div class="entry-bot">
          <div class="give-price-raised"><span><?php echo __('Raised', 'goza'); ?></span><strong>$</strong><?php echo $income ?></div>
          <div class="give-price-goal"><span><?php echo __('Group Goal', 'goza'); ?></span><strong>$</strong><?php echo $goal ?></div>
        </div>
      </div>
    </div>

<?php }

function be_template_give_grid_style_2(){ 
  $form_id = get_the_ID() ;
    
    $goal_option = get_post_meta( $form_id, '_give_goal_option', true );
    $form        = new Give_Donate_Form( $form_id );
    $goal        = $form->goal;
    $goal_format = get_post_meta( $form_id, '_give_goal_format', true );
    $income      = $form->get_earnings();
    $color       = get_post_meta( $form_id, '_give_goal_color', true );
    $give_forms_category = (wp_get_post_terms( $form_id, 'give_forms_category'));
    if( $give_forms_category && ! is_wp_error( $give_forms_category ) ) {
      foreach($give_forms_category as $give_forms_category1) {
        $give_forms_category_name = $give_forms_category1->name; //do something here
        $give_forms_category_link = get_term_link($give_forms_category1->slug, 'give_forms_category'); //do something here
        //var_dump($give_forms_category_link );
        }
      }
        if (empty($give_forms_category_name)) {
          $give_forms_category_name = '';
          $give_forms_category_link = '';
        }
      // set color if empty
      if(empty($color)) $color = '#01FFCC';
      $progress = ($goal === 0) ? 0 : round( ( $income / $goal ) * 100, 2 );

      if ( $income >= $goal ) { $progress = 100; }
      $class_none = '';
      if ( $goal_option == 'disabled' ) { $class_none = 'class-none'; }
      // Get formatted amount.
      $income = give_human_format_large_amount( give_format_amount( $income ) );
      $goal = give_human_format_large_amount( give_format_amount( $goal ) );

      //var_dump($progress);
      $button_donate = implode('', array(
        '<div class="give-button-donate">',
          do_shortcode('[give_form id="'. $form_id .'" show_title="true" show_goal="false" show_content="none" display_style="button"]'),
        '</div>',
      ));

    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
  ?>

    <div class="featured-image" style="background-image: url(<?php echo esc_url($post_img_url) ?>);background-position: center center;background-repeat: no-repeat;background-size: cover;">
      <?php if ($give_forms_category_name) { ?>
        <div class="form-category form-category-style1"><a style="background-color:<?php echo $color ?>" href="<?php echo $give_forms_category_link ?>"><?php echo $give_forms_category_name ?></a></div>
      <?php } ?>
    </div>
    <div class="entry-content">
      <a href="<?php echo get_permalink($form_id) ?>" class="title-link"><h4 class="title bt-title-style1"><?php echo get_the_title($form_id) ?></h4></a>
      <div class="extra-meta bt-extra-meta-style1">
        <div class="give-price-wrap">
          <p style="color:<?php echo $color ?>"> <sup>$</sup><?php echo $goal ?> <span><?php echo __('Collected', 'goza'); ?></span> </p>
        </div>
      </div>
        <div class="give-goal-progress-wrap">
          <div class="bar" style="background-color:<?php echo $color ?>;width: <?php echo $progress ?>%;" ></div>
          <div class="form-percent" style="background:<?php echo $color ?>;right: calc(100% - <?php echo $progress ?>%);"><span class="bt-arrow" style="background:<?php echo $color ?>"></span><?php echo $progress ?>%</div>
        </div>
    </div>

<?php }

function be_template_give_grid_default(){ 
  $form_id = get_the_ID() ;
    
    $goal_option = get_post_meta( $form_id, '_give_goal_option', true );
    $form        = new Give_Donate_Form( $form_id );
    $goal        = $form->goal;
    $goal_format = get_post_meta( $form_id, '_give_goal_format', true );
    $income      = $form->get_earnings();
    $color       = get_post_meta( $form_id, '_give_goal_color', true );
    $give_forms_category = (wp_get_post_terms( $form_id, 'give_forms_category'));
    if( $give_forms_category && ! is_wp_error( $give_forms_category ) ) {
    foreach($give_forms_category as $give_forms_category1) {
        $give_forms_category_name = $give_forms_category1->name; //do something here
        $give_forms_category_link = get_term_link($give_forms_category1->slug, 'give_forms_category'); //do something here
        //var_dump($give_forms_category_link );
        }
      }
        if (empty($give_forms_category_name)) {
          $give_forms_category_name = '';
          $give_forms_category_link = '';
        }
      // set color if empty
      if(empty($color)) $color = '#01FFCC';
      $progress = ($goal === 0) ? 0 : round( ( $income / $goal ) * 100, 2 );

      $progress_css = ($goal === 0) ? 0 : round( ( $income / $goal ) * 100, 2 );
      if ( $income >= $goal ) { $progress_css = 100; }

      if ( $income >= $goal ) { $progress = 100; }
      $class_none = '';
      if ( $goal_option == 'disabled' ) { $class_none = 'class-none'; }
      // Get formatted amount.
      $income = give_human_format_large_amount( give_format_amount( $income ) );
      $goal = give_human_format_large_amount( give_format_amount( $goal ) );

      //var_dump($progress);
      $button_donate = implode('', array(
        '<div class="give-button-donate">',
          do_shortcode('[give_form id="'. $form_id .'" show_title="true" show_goal="false" show_content="none" display_style="button"]'),
        '</div>',
      ));

    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
  ?>

    <div class="featured-image">
      <img src="<?php echo esc_url($post_img_url) ?>" alt="<?php the_title() ?>"/>
    </div>
    <div class="entry-content">
      <?php if ($give_forms_category_name) { ?>
        <div class="form-category"><a style="color:<?php echo $color ?>" href="<?php echo $give_forms_category_link ?>"><?php echo $give_forms_category_name ?></a></div>
      <?php } ?>
      <a href="<?php echo get_permalink($form_id) ?>" class="title-link"><h4 class="title"><?php echo get_the_title($form_id) ?></h4></a>
      <div class="extra-meta">
        <div class="meta-item meta-author">By <?php echo get_the_author($form_id) ?></div>
        <div class="give-price-wrap"><sup>$</sup><?php echo $goal ?> <span><?php echo __('Collected', 'goza'); ?></span></div>
      </div>
    </div>
    <div class="progress">
      <div class="bar" style="background-color:<?php echo $color ?>;width: <?php echo round($progress) ?>%;" ></div>
      <?php if ( $progress_css == 100 ) { ?>
        <div class="form-percent c2" style="background:<?php echo $color ?>;left: calc(<?php echo round($progress) ?>% - 38px);"><span class="bt-arrow" style="background:<?php echo $color ?>"></span><?php echo round($progress) ?>%</div>
      <?php } else { ?> 
        <div class="form-percent c1" style="background:<?php echo $color ?>;left: calc(<?php echo round($progress) ?>%);"><span class="bt-arrow" style="background:<?php echo $color ?>"></span><?php echo round($progress) ?>%</div>
      <?php } ?>
      </div>

<?php } 