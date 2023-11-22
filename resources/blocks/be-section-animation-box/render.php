<?php

/**
 * Section Animation Box Template.
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
$class_name = 'be-section-anim-box';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $class_name .= ' align' . $block['align'];
}


// Load values and assign defaults.
$sab_heading          = __get_field('sab_heading') ?: '';
$sab_list_box        = __get_field('sab_list_box') ?: [];
$sab_bg_image            = __get_field('sab_bg_image') ?: 'https://picsum.photos/1920/700';
$sab_heading_color     = __get_field('sab_heading_color') ?: '#FFF';
$sab_bg_box_color     = __get_field('sab_bg_box_color') ?: '#0f869f';
$sab_box_color_number     = __get_field('sab_box_color_number') ?: '#0f869f';
$sab_box_color_text     = __get_field('sab_box_color_text') ?: '#FFF';
$sab_bg_color= __get_field('sab_bg_color') ?: '#f1f1f1';

// Build a valid style attribute for background and text colors.
$styles = array('background-color: ' . $sab_bg_color);
if ($sab_bg_image) {
   $styles[] = 'background-image: url(' . esc_url($sab_bg_image) . ')';
}
$style  = implode('; ', $styles);
?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?= esc_attr($style) ?>">
   <div class="container">
      <div class="be-section-wrap">
         <?php if ($sab_heading) { ?>
            <h2 class="be-section-wrap__heading" style="color: <?= esc_attr($sab_heading_color) ?>"><?= esc_attr($sab_heading) ?></h2>
         <?php } ?>
         <?php
         if ($sab_list_box) {
            echo '<div class="be-section-wrap__list">';
            foreach ($sab_list_box as $item) {
               $box_number = $item['box_number'];
               $box_text = $item['box_text'];
         ?>
               <div class="be-section-wrap__list-item" data-aos="zoom-in" data-aos-duration="800">
                  <div class="item-wrap">
                     <span class="item-wrap-num" style="color: <?= esc_attr($sab_box_color_number) ?>"><?= esc_attr($box_number) ?></span>
                     <span class="item-wrap-text" style="color: <?= esc_attr($sab_box_color_text) ?>"><?= esc_attr($box_text) ?></span>
                  </div>
               </div>
         <?php
            }
            echo '</div>';
         }
         ?>
      </div>
   </div>
</div>