<?php

/**
 * Box Network Connect Block Template.
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
$class_name = 'box-network-connect-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$bnc_icon            = __get_field('bnc_icon') ?: '';
$bnc_title           = __get_field('bnc_title') ?: '';
$bnc_desc            = __get_field('bnc_desc') ?: '';
$bnc_cta             = __get_field('bnc_cta') ?: [];
$bnc_bg_img          = __get_field('bnc_bg_img') ?: ['url' => 'https://picsum.photos/1920/400'];
$bnc_bg_color        = __get_field('bnc_bg_color') ?: '';
$bnc_bg_color_box    = __get_field('bnc_bg_color_box') ?: '';
$bnc_txt_color       = __get_field('bnc_txt_color') ?: '';
$bnc_style_button    = __get_field('bnc_style_button') ?: 'btn-default';

// Build a valid style attribute for background and text colors.
$styles = array('background-color: ' . $bnc_bg_color);
if ($bnc_bg_img) {
   $styles[] = 'background-image: url(' . esc_url($bnc_bg_img['url']) . ')';
}
$style  = implode('; ', $styles);

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
   <div class="container">
      <div class="block-box" style="background-color:<?php echo $bnc_bg_color_box ?>">
         <?php if ($bnc_icon) { ?>
            <img src="<?= esc_attr($bnc_icon['url']) ?>" alt="<?= esc_attr($bnc_icon['alt']) ?>" />
         <?php } ?>

         <?php if ($bnc_title) { ?>
            <h4 class="bnc-title" style="color: <?= esc_attr($bnc_txt_color) ?>"><?= esc_attr($bnc_title) ?></h4>
         <?php } ?>

         <?php if ($bnc_desc) { ?>
            <p class="bnc-description" style="color: <?= esc_attr($bnc_txt_color) ?>"><?= esc_attr($bnc_desc) ?></p>
         <?php } ?>

         <?php if ($bnc_cta) { ?>
            <a href="<?= esc_url($bnc_cta['url']) ?>" target="<?= esc_attr($bnc_cta['target']) ?>" class="btn <?= esc_attr($bnc_style_button) ?>">
               <?= esc_attr($bnc_cta['title']) ?>
               <?php if ($bnc_style_button == 'btn-water') { ?>
                  <svg class="wgl-dashes inner-dashed-border animated-dashes">
                     <rect rx="0%" ry="0%"> </rect>
                  </svg>
               <?php } ?>
            </a>
         <?php } ?>

      </div>
   </div>
</div>