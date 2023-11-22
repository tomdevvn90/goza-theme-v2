<?php

/**
 * Box Featured Block Template.
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
$class_name = 'be-box-featured-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$fb_icon                = __get_field('fb_icon') ?: '';
$fb_heading             = __get_field('fb_heading') ?: '';
$fb_desc                = __get_field('fb_description') ?: '';
$fb_box_button          = __get_field('fb_box_button') ?: [];
$fb_box_featured_list   = __get_field('fb_box_featured_list');
//styles
$fb_color_title         = __get_field('fb_color_title') ?: '';
$fb_color_text          = __get_field('fb_color_text') ?: '';
$fb_bg_color            = __get_field('fb_bg_color') ?: '';
$fb_button_color        = __get_field('fb_button_color') ?: '';
$fb_button_color_hover  = __get_field('fb_button_color_hover') ?: '';
$fb_btn_bg              = __get_field('fb_btn_bg') ?: '';
$fb_btn_bg_hover        = __get_field('fb_btn_bg_hover') ?: '';

// Build a valid style attribute for background and text colors.
$styles = [
   '--bg-color: ' . $fb_bg_color,
   '--title-color : ' . $fb_color_title,
   '--text-color: ' . $fb_color_text,
   '--btn-color: ' . $fb_button_color,
   '--btn-color-hover: ' . $fb_button_color_hover,
   '--btn-bg-color: ' . $fb_btn_bg,
   '--btn-bg-color-hover: ' . $fb_btn_bg_hover,
];
$style  = implode('; ', $styles);

?>
<div  data-aos="fade-up" <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
   <div class="inner-block">
      <div class="block-col block-col-6">
         <?php if ($fb_icon) { ?>
            <div class="icon-wrap">
               <img src="<?= esc_attr($fb_icon['url']) ?>" alt="<?= esc_attr($fb_icon['alt']) ?>" />
            </div>
         <?php } ?>
         <div class="entry-box-wrap">
            <h4 class="featured-box-title"><?= esc_attr($fb_heading) ?></h4>
            <div class="featured-box-text"><?= esc_attr($fb_desc) ?></div>
         </div>

      </div>
      <div class="block-col block-col-4">
         <?php
         if (have_rows('fb_box_featured_list')) {
            while (have_rows('fb_box_featured_list')) {
               the_row();
               $box_value = get_sub_field('box_value');
               $box_text = get_sub_field('box_text');
         ?>
               <div class="box-item">
                  <h4 class="featured-box-title"><?= esc_attr($box_value) ?></h4>
                  <div class="featured-box-text"><?= esc_attr($box_text) ?></div>
               </div>
         <?php
            }
         }
         ?>
      </div>
      <div class="block-col block-col-2">
         <?php if (!empty($fb_box_button) && isset($fb_box_button)) { ?>
            <a class="featured-box-btn" href="<?= esc_url($fb_box_button['url']) ?>" target="<?= esc_url($fb_box_button['target']) ?>"><?= esc_attr($fb_box_button['title']) ?></a>
         <?php }else {
            $goza_form_donation = __get_field('goza_form_donation', 'option') ? : '';
            if(!empty($goza_form_donation) && isset($goza_form_donation)){
               $atts = array(
                  'id' => $goza_form_donation->ID,  // integer.
                  'show_title' => false, // boolean.
                  'show_goal' => false, // boolean.
                  'show_content' => 'none', //above, below, or none
                  'display_style' => 'button', //modal, button, and reveal
                  'continue_button_title' => '' //string
               );
               if (function_exists('give_get_donation_form')) {
                  echo give_get_donation_form($atts);
               }
            }
         } ?>
      </div>
   </div>
</div>