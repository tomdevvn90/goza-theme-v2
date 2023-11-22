<?php

/**
 * Box Featured Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
   $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'goza-box-featured-grid-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$fbg_col          = __get_field('fbg_col') ?: 4;
$fbg_list_box     = __get_field('fbg_list_box') ?: [];
$fbg_title_color  = __get_field('fbg_title_color') ?: '#FFF';
$fbg_sum_color     = __get_field('fbg_sum_color') ?: '#FFF';
$fbg_button_color     = __get_field('fbg_button_color') ?: '#FFF';

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="--col: <?= esc_attr($fbg_col) ?>">
   <?php if (have_rows('fbg_list_box')) { ?>
      <div class="block-inner-grid">
         <?php
         while (have_rows('fbg_list_box')) : the_row();
            $box_icon = get_sub_field('box_icon');
            $box_title = get_sub_field('box_title');
            $box_content = get_sub_field('box_content');
            $box_button = get_sub_field('box_button');
            $bg_img = get_sub_field('bg_img');
            $bg_overlay = get_sub_field('bg_overlay');
         ?>
            <div class="block-inner-grid-box">
               <div class="block-inner-grid-box__bg">
                  <?php if ($bg_img) { ?>
                     <img src="<?= esc_url($bg_img['url']) ?>" alt="<?= esc_attr($bg_img['alt']) ?>" />
                  <?php } ?>
                  <span class="block-inner-grid-box__bg-color" style="background-color: <?= esc_attr($bg_overlay) ?>"></span>
               </div>
               <div class="block-inner-grid-box__content">
                  <?php if ($box_icon) { ?>
                     <img src="<?= esc_url($box_icon['url']) ?>" alt="<?= esc_attr($box_icon['alt']) ?>" />
                  <?php } ?>
                  <?php if ($box_title) { ?>
                     <h4 class="block-inner-grid-box__content-title" style="color: <?= esc_attr($fbg_title_color) ?>"><?= $box_title ?></h4>
                  <?php } ?>
                  <?php if ($box_content) { ?>
                     <div class="block-inner-grid-box__content-text" style="color: <?= esc_attr($fbg_sum_color) ?>"><?= $box_content ?></div>
                  <?php } ?>
                  <?php if ($box_button) { ?>
                     <a class="block-inner-grid-box__content-link"  style="color: <?= esc_attr($fbg_button_color) ?>" href="<?= esc_url($box_button['url']) ?>" target="<?= esc_attr($box_button['target']) ?>"><?= esc_attr($box_button['title']) ?> ›</a>
                  <?php } ?>
               </div>
            </div>
         <?php endwhile; ?>
      </div>
   <?php } else { ?>
      <div class="goza-box-featured-grid-notify">
         <?php echo esc_html_e('Opp! Please add a item to list!', 'goza') ?>
      </div>
   <?php } ?>
</div>