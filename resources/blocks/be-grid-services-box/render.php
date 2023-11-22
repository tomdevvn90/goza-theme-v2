<?php

/**
 * Grid Services Box Block Template.
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
$class_name = 'grid-services-box-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$gsb_heading               = __get_field('gsb_heading') ?: '';
$gsb_subheading            = __get_field('gsb_subheading') ?: '';
$gsb_bg_image              = __get_field('gsb_bg_image') ?: [];
$gsb_box_services          = __get_field('gsb_box_services') ?: [];
$gsb_heading_color         = __get_field('gsb_heading_color') ?: '#fff';
$gsb_bg_color              = __get_field('gsb_bg_color');
$gsb_box_color             = __get_field('gsb_box_color') ?: '#fff';
$gsb_box_hover_color       = __get_field('gsb_box_hover_color') ?: '#000';
$gsb_box_bg_color          = __get_field('gsb_box_bg_color') ?: '#FFF';
$gsb_box_bg_hover_color    = __get_field('gsb_box_bg_hover_color') ?: '';

// Build a valid style attribute for background and text colors.
$styles = array('background-color: ' . $gsb_bg_color);
if ($gsb_bg_image) {
   $styles[] = 'background-image: url(' . esc_attr($gsb_bg_image['url']) . ')';
}
$style  = implode('; ', $styles);

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
   <div class="container">
      <?php if ($gsb_heading) { ?>
         <h2 class="gsb-heading" style="color: <?= esc_attr($gsb_heading_color) ?>"><?= esc_attr($gsb_heading) ?></h2>
      <?php } ?>

      <?php if ($gsb_heading) { ?>
         <p class="gsb-subheading" style="color: <?= esc_attr($gsb_heading_color) ?>"><?= esc_attr($gsb_subheading) ?></p>
      <?php } ?>

      <?php
      if ($gsb_box_services) {
         echo '<div class="gsb-services-list">';
         foreach ($gsb_box_services as $box_item) {
            $icon    = $box_item['icon'];
            $title   = $box_item['title'];
            $desc    = $box_item['description'];
      ?>
            <div class="gsb-services-item" data-aos="fade-up" data-aos-duration="800" style="background-color: <?=$gsb_box_bg_color?>">
               <div class="gsb-services-item__wrap">
                  <?php if ($icon) { ?>
                     <div class="gsb-services-item__wrap-icon"><img src="<?= esc_url($icon['url']) ?>" alt="<?= esc_attr($title) ?>" /></div>
                  <?php } ?>
                  <?php if ($title) { ?>
                     <h4 class="gsb-services-item__wrap-title" style="color: <?= esc_attr($gsb_box_color) ?>"><?= esc_attr($title) ?></h4>
                  <?php } ?>
               </div>
               <div class="gsb-services-item__wrap-hover" style="background-color: <?=$gsb_box_bg_hover_color?>">
                  <?php if ($title) { ?>
                     <h4 class="gsb-services-item__wrap-title" style="color: <?= esc_attr($gsb_box_hover_color) ?>"><?= esc_attr($title) ?></h4>
                  <?php } ?>
                  <?php if ($desc) { ?>
                     <p class="gsb-services-item__wrap-desc" style="color: <?= esc_attr($gsb_box_hover_color) ?>"><?= esc_attr($desc) ?></p>
                  <?php } ?>
               </div>
            </div>
      <?php
         }
         echo '</div>';
      }
      ?>
   </div>
</div>