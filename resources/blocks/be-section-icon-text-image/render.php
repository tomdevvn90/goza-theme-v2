<?php

// create id attribute for specific styling
$id = 'be-ss-ic-text-img' . $block['id'];

// ACF field 
$heading   = __get_field('hd_ss_itm') ? : '';
$sub_hd    = __get_field('sub_hd_ss_itm') ? : '';
$image     = __get_field('image_ss_itm') ? : 'https://picsum.photos/1920/900?1';
$list_ict  = __get_field('list_icon_text_ss_itm') ? : '';
$bg_cl     = __get_field('bg_cl_ss_itm') ? : '#043958';
$bg_img    = __get_field('bg_img_ss_itm') ? : '';
$hd_cl     = __get_field('hd_cl_ss_itm') ? : '';
$sub_hd_cl = __get_field('sub_hd_cl_ss_itm') ? : '';
?>


<section id="<?php echo $id; ?>" class="be-ss-ic-text-img-block"> 
   <div class="be-ss-ic-text-img-block-inner flex-wrap flex-lg-nowrap"> 
      <div class="be-ss-ic-text-img-block-left" style="background-color:<?= $bg_cl ?>; background-image: url('<?php echo $bg_img ?>')"> 
            <div class="be-ss-ic-text-img-block-left--inner">
               <?php if(!empty($sub_hd) && isset($sub_hd)): ?>
                  <p class="be-ss-ic-text-img-block--sub-heading" style="color:<?= $sub_hd_cl ?>"> <?= esc_attr($sub_hd) ?> </p>
               <?php endif; ?>

               <?php if(!empty($heading) && isset($heading)): ?>
                  <h2 class="be-ss-ic-text-img-block--heading" style="color:<?= $hd_cl ?>"> <?= esc_attr($heading) ?> </h2>
               <?php endif; ?>

               <?php if(!empty($list_ict) && isset($list_ict)): ?>
                  <?php 
                     $list_ict_style = __get_field('list_icon_text_style_ss_itm') ? : '';

                     if(!empty($list_ict_style) && isset($list_ict_style)){
                        $headingColor = $list_ict_style['hd_cl'];
                        $descColor    = $list_ict_style['desc_cl'];
                     }
                  ?>
                  <div class="be-ss-ic-text-img-block--list-icon-text"> 
                     <?php foreach ($list_ict as $key => $value): ?>
                        <div class="item-icon-text">
                           <div class="item-icon-text--inner">
                              <?php $icon_url = $value['icon']['url'] ? : get_template_directory_uri(). '/resources/assets/images/icon-box-default.svg'; ?>
                              <div class="item-icon-text--thumbnail"> 
                                 <?php if(is_array($icon_url)){
                                    $srcset = wp_get_attachment_image_srcset($value['icon']['id']) ? : '';
                                 ?>
                                    <img src="<?= esc_url($icon_url) ?>" srcset="<?= $srcset ?>" alt="icon"  />
                                 <?php }else { ?>
                                    <img src="<?= esc_url($icon_url) ?>" alt="icon" />
                                 <?php } ?>
                              </div>

                              <div class="item-icon-text--content"> 
                                 <?php if(!empty($value['heading']) && isset($value['heading'])): ?>
                                    <h3 class="item-icon-text--heading" style="color:<?= $headingColor ?>"> <?= esc_attr($value['heading']) ?>  </h3>
                                 <?php endif; ?>   

                                 <?php if(!empty($value['desc']) && isset($value['desc'])): ?>
                                    <p class="item-icon-text--desc" style="color:<?= $descColor ?>"> <?= esc_attr($value['desc']) ?>  </p>
                                 <?php endif; ?>   
                              </div>
                           </div>
                        </div>
                     <?php endforeach; ?> 
                  </div>
               <?php endif; ?>   
            </div>
      </div>
      <div class="be-ss-ic-text-img-block-right">
         <?php if(is_array($image)){
            $srcset = wp_get_attachment_image_srcset($image['id']) ? : '';
         ?>
            <img src="<?= esc_url($image['url']) ?>" srcset="<?= $srcset ?>" alt="icon"  />
         <?php }else { ?>
            <img src="<?= esc_url($image) ?>" alt="icon" />
         <?php } ?>
      </div>
   </div>
</section>