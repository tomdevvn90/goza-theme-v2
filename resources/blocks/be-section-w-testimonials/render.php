<?php

/**
 * Box Section with Testimonials Template.
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
$class_name = 'be-section-w-testinials-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}

$class_name .= ' alignfull';


// Load values and assign defaults.
$ss_ts_testimonials  = __get_field('ss_ts_testimonials') ?: [];
$ss_ts_bt_image      = __get_field('ss_ts_bt_image') ?: 'https://picsum.photos/1920/600';
$ss_ts_bg_color      = __get_field('ss_ts_bg_color') ?: '';
$ss_ts_bg_color_tes  = __get_field('ss_ts_bg_color_tes') ?: 'rgba(0,0,0,0.9)';
$ss_ts_color_text    = __get_field('ss_ts_color_text') ?: '#FFF';
$autoplay            = __get_field('autoplay') ?: true;
$infinite            = __get_field('infinite') ?: true;
$autoplaySpeed       = __get_field('autoplaySpeed') ?: '2000';

// Build a valid style attribute for background and text colors.
$styles = array('background-color: ' . $ss_ts_bg_color);
if ($ss_ts_bt_image) {
   $styles[] = 'background-image: url(' . esc_url($ss_ts_bt_image) . ')';
}
$style  = implode('; ', $styles);

$carousel_settings = [
   'autoplay' => $autoplay,
   'infinite' => $infinite,
   'autoplaySpeed' => $autoplaySpeed
];

$style_wrap = [
   'background-color:' . $ss_ts_bg_color_tes,
   '--text-color: ' . $ss_ts_color_text
];

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" data-carousel=<?= esc_attr(json_encode($carousel_settings)) ?> style="<?php echo esc_attr($style); ?>">
   <div class="container">
      <div class="be-testimonials-wrap" style="<?= esc_attr(implode('; ', $style_wrap)) ?>" data-aos="fade-up" data-aos-duration="1000">
         <div class="be-testimonials-icon">
            <img src="<?= THEME_URI . '/resources/assets/images/icon-testimonials.png' ?> " alt="testimonials quote" />
         </div>
         <?php
         if (!empty($ss_ts_testimonials)) {
            echo '<div class="be-testimonials-list">';
            foreach ($ss_ts_testimonials as $testimonial) {
               $quote = $testimonial['quote'];
               $author = $testimonial['author'];
         ?>
               <div class="be-testimonials-list-item">
                  <?php if ($quote) { ?>
                     <div class="be-testimonials-list-item-quote"><?= esc_attr($quote) ?></div>
                  <?php } ?>
                  <?php if ($author) { ?>
                     <div class="be-testimonials-list-item-author">-- <?= esc_attr($author) ?></div>
                  <?php } ?>
               </div>
         <?php
            }
            echo '</div>';
         } else {
            echo '<div class="text-notify">' . esc_html('Please enter some testimonials!') . '</div>';
         }
         ?>
      </div>
   </div>
</div>