<?php

/**
 * Be Column Image Text Video Block Template.
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
$class_name = 'be-column-image-text-video-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$citv_heading              = __get_field('citv_heading') ?: '';
$citv_subheading           = __get_field('citv_subheading') ?: '';
$citv_button               = __get_field('citv_button') ?: '';
$citv_description          = __get_field('citv_description') ?: '';
$citv_name_person          = __get_field('citv_name_person');
$citv_position_person      = __get_field('citv_position_person') ?: '';
$citv_type_video           = __get_field('citv_type_video') ?: '';
$citv_link_video           = __get_field('citv_link_video') ?: '';
$citv_link_video_local     = __get_field('citv_link_video_local') ?: '';
$citv_bg_img_content       = __get_field('citv_bg_img_content') ?: '';
$citv_bg_img_video         = __get_field('citv_bg_img_video') ?: '';
$citv_subheading_color     = __get_field('citv_subheading_color') ?: '';
$citv_heading_color        = __get_field('citv_heading_color') ?: '';
$citv_desc_color           = __get_field('citv_desc_color') ?: '';
$citv_button_style         = __get_field('citv_button_style') ?: 'btn-default';

// Build a valid style attribute for background and text colors.
$styles = array('background-color: ' . $bnc_bg_color);
if ($bnc_bg_img) {
   $styles[] = 'background-image: url(' . esc_attr($bnc_bg_img['url']) . ')';
}
$style  = implode('; ', $styles);

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
   <div class="block-grid">
      <div class="block-col block-col-content">
         <div class="block-col__bg">
            <?php if (isset($citv_bg_img_content) && $citv_bg_img_content) { ?>
               <img src="<?= esc_url($citv_bg_img_content['url']) ?>" alt="<?= esc_attr($citv_bg_img_content['alt']) ?>" />
            <?php } else { ?>
               <img src="https://picsum.photos/1000/500" alt="placeholder image" />
            <?php } ?>
         </div>
         <div class="block-col__content">
            <div class="block-col__content-wrap">
            <?php if (isset($citv_subheading) && !empty($citv_subheading)) { ?>
               <h6 class="block-col__subheading" style="color: <?= $citv_subheading_color ?>" data-aos="fade-up" data-aos-duration="800"><?= esc_attr($citv_subheading) ?></h6>
            <?php } ?>

            <?php if (isset($citv_heading) && !empty($citv_heading)) { ?>
               <h2 class="block-col__heading" style="color: <?= $citv_heading_color ?>" data-aos="fade-up" data-aos-duration="800"><?= $citv_heading ?></h2>
            <?php } ?>

            <?php if (isset($citv_description) && !empty($citv_description)) { ?>
               <div class="block-col__desc" style="color: <?= $citv_desc_color ?>" data-aos="fade-up" data-aos-duration="800"><?= $citv_description ?></div>
            <?php } ?>

            <?php if (isset($citv_button) && $citv_button) { ?>
               <a href="<?= esc_url($citv_button['url']) ?>" target="<?= esc_attr($citv_button['target']) ?>" class="btn <?= esc_attr($citv_button_style) ?>" data-aos="fade-up" data-aos-duration="800">
                  <?= esc_attr($citv_button['title']) ?>
                  <?php if ($citv_button_style == 'btn-water') { ?>
                     <svg class="wgl-dashes inner-dashed-border animated-dashes">
                        <rect rx="0%" ry="0%"> </rect>
                     </svg>
                  <?php } ?>
               </a>
            <?php } ?>
            </div>
         </div>
      </div>

      <div class="block-col block-col-video">
         <div class="block-col__bg">
            <?php if (isset($citv_bg_img_video) && $citv_bg_img_video) { ?>
               <img src="<?= esc_url($citv_bg_img_video['url']) ?>" alt="<?= esc_attr($citv_bg_img_video['alt']) ?>" />
            <?php } else { ?>
               <img src="https://picsum.photos/1000/500" alt="placeholder image" />
            <?php } ?>
         </div>
         <div class="block-col__content block-col__box" data-aos="fade-up" data-aos-duration="800">
            <div class="block-col__box-content">
               <?php if (isset($citv_name_person) && !empty($citv_name_person)) { ?>
                  <h5 class="block-col__name"><?= esc_attr($citv_name_person) ?></h5>
               <?php } ?>
               <?php if (isset($citv_position_person) && !empty($citv_position_person)) { ?>
                  <p class="block-col__position"><?= esc_attr($citv_position_person) ?></p>
               <?php } ?>
            </div>
            <div id="goza-citv-action" class="block-col__box-action">
               <?php if ($citv_type_video == 'local') { ?>
                  <?php $video_url = $citv_link_video_local ? $citv_link_video_local : ''; ?>
                  <!-- HTML5 Video --->
                  <a data-lg-size="1280-720" data-video='{"source": [{"src":"<?= esc_url($video_url) ?>", "type":"video/mp4"}], "attributes": {"preload": false, "playsinline": true, "controls": true}}'>
                     <i class="fa fa-play-circle-o"></i>
                  </a>
               <?php } else { ?>
                  <?php $video_url = $citv_link_video ? $citv_link_video : ''; ?>
                  <a data-lg-size="1280-720" data-src="<?= esc_url($video_url) ?>">
                     <i class="fa fa-play-circle-o"></i>
                  </a>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>