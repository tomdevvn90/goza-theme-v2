<?php

// create id attribute for specific styling
$id = 'be-ss-text-tsm-video-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$bg          = __get_field('bg_ss_ab_counter') ?: get_template_directory_uri(). '/resources/assets/images/bg-ss-text-tsm-video.jpg';
$sub_heading = __get_field('sub_heading_ss_text_tsm_vd') ?: '';
$heading     = __get_field('heading_ss_text_tsm_vd') ?: '';
$testimonial = __get_field('item_testimonials_ss_text_tsm_vd') ?: '';
$video       = __get_field('vd_ss_text_tsm_vd') ?: '';
$color_hd    = __get_field('color_heading_ss_text_tsm_vd') ?: '';
$color_sb_hd = __get_field('color_sub_heading_ss_text_tsm_vd') ?: '';
?>
<section id="<?php echo $id; ?>" class="be-ss-text-tsm-video <?php echo $align_class; ?>"> 
   <div class="be-ss-text-tsm-video--bg"> 
      <img src="<?= esc_url($bg) ?>" alt="bg-image">
   </div>

   <div class="be-ss-text-tsm-video--content">
      <div class="container"> 
         <div class="be-ss-text-tsm-video--inner"> 
            <div class="be-ss-text-tsm-video--inner-left" data-aos="fade-right"> 
               <?php if(!empty($sub_heading)): ?>
                  <p class="be-ss-text-tsm-video--sub-heading" style="color:<?= $color_sb_hd ?>"> <?= esc_attr($sub_heading) ?> </p>
               <?php endif; ?>   

               <?php if(!empty($heading)): ?>
                  <h2 class="be-ss-text-tsm-video--heading" style="color:<?= $color_hd?>"> <?= esc_attr($heading) ?> </h2>
               <?php endif; ?>  

               <?php if(!empty($testimonial)): ?>
                  <?php load_testimonial() ?>
               <?php endif; ?>   
               
            </div>

            <div class="be-ss-text-tsm-video--inner-right"> 
               <?php if(!empty($video['url'])): ?>
                  <?php load_video($block['id']) ?>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>   
</section>