<?php

// create id attribute for specific styling
$id = 'be-ss-ab-vd-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field 

// tab General
$heading = __get_field('hd_ss_ab_vd');
$sub_hd  = __get_field('sub_hd_ss_ab_vd') ? : '';
$desc    = __get_field('desc_hd_ss_ab_vd') ? : '';
$img     = __get_field('img_ss_ab_vd') ? : 'https://picsum.photos/1920/900?1';

if(!empty($heading) && isset($heading)){
   $hd_name = $heading['name'] ? : '';
   $hd_url  = $heading['url'] ? : '';
}

// tab Video
$vd_st = __get_field('vd_ss_ab_vd');

if(!empty($vd_st) && isset($vd_st)){
   $vd_url = $vd_st['url'] ? : '';
}

// tab CTA
$cta_name  = __get_field('cta_name_ss_ab_vd') ? : '';
$cta_link  = __get_field('cta_link_ss_ab_vd') ? : '';
$cta_style = __get_field('cta_style_ss_ab_vd') ? : 'style_default';

// tab Styles
$color_hd     = __get_field('color_hd_ss_ab_vd') ? : '';
$color_sub_hd = __get_field('color_sub_hd_ss_ab_vd') ? : '';

?>
<section id="<?php echo $id; ?>" class="be-ss-ab-vd <?php echo $align_class; ?>"> 
   <div class="be-ss-ab-vd--inner">
      <div class="be-ss-ab-vd--row be-ss-ab-vd--top"> 
         <div class="be-ss-ab-vd--top-left"> 
            <?php if(!empty($sub_hd)): ?>
               <p class="be-ss-ab-vd--sub-heading" style="color:<?= $color_sub_hd ?>"> <?= esc_attr($sub_hd) ?> </p>
            <?php endif; ?>   

            <?php if(!empty($hd_url)){ ?>
               <h2 class="be-ss-ab-vd--heading" style="color:<?= $color_hd ?>"> 
                  <a href="<?= esc_url($hd_url) ?>"> <?= esc_attr($hd_name) ?> </a>
               </h2>
            <?php }else{ ?>
               <h2 class="be-ss-ab-vd--heading" style="color:<?= $color_hd ?>"> <?= esc_attr($hd_name) ?> </h2>
            <?php } ?>
         </div>

         <div class="be-ss-ab-vd--top-right"> 
            <?php if(!empty($vd_url)): ?>
               <?php __load_template_video($block['id']) ?>
            <?php endif; ?>   
         </div>
      </div>

      <div class="be-ss-ab-vd--row be-ss-ab-vd--bottom"> 
         <div class="be-ss-ab-vd--bottom-left"> 
            <div class="be-ss-ab-vd--image" data-aos="fade-up"> 
               <?php if(is_array($img)){
                  $srcset = wp_get_attachment_image_srcset($img['id']) ? : '';
                  ?>
                  <img src="<?= esc_url($img['url']) ?>" srcset="<?= $srcset ?>" alt="<?= $img['name'] ?>"  />
               <?php }else { ?>
                  <img src="<?= esc_url($img) ?>" alt="image" />
               <?php } ?>
            </div>
         </div>

         <div class="be-ss-ab-vd--bottom-right"> 
            <?php if(!empty($desc)): ?>
               <p class="be-ss-ab-vd--desc"> <?= esc_attr($desc) ?>  </p>
            <?php endif; ?>   

            <?php if( !empty($cta_name) && !empty($cta_link) ): ?>   
               <div class="be-ss-ab-vd--cta be-button"> 
                  <a href="<?= esc_url($cta_link) ?>" class="btn <?= esc_attr($cta_style) ?>">
                     <?= esc_attr($cta_name) ?>
                     <?php if ($cta_style == 'btn-water') { ?>
                           <svg class="wgl-dashes inner-dashed-border animated-dashes">
                              <rect rx="0%" ry="0%"> </rect>
                           </svg>
                     <?php } ?>
                  </a>
               </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
</section>