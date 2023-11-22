<?php

// create id attribute for specific styling
$id = 'be-numberal-donation-box-' . $block['id'];

// ACF field variables
$counters      = (!empty(__get_field('counter_numberal_donation_box'))) ? __get_field('counter_numberal_donation_box') : '';
$pg_value      =  __get_field('value_progressbar_donation_box') ?: '';
$pg_desc       =  __get_field('desc_progressbar_donation_box') ?: '';
$strokecolor   =  __get_field('strokecolor_progressbar_donation_box') ?: '#fff';
$trailcolor    =  __get_field('trailcolor_progressbar_donation_box') ?: '#000';
$pg_duration   =  __get_field('duration_progressbar_donation_box') ?: '1400';
$pg_bg         =  __get_field('bg_progressbar_donation_box') ?: get_template_directory_uri(). '/resources/assets/images/bg-progressbar_donation_box_default.png';
$cta_donation  = (!empty(__get_field('cta_donation_numberal_donation_box'))) ? __get_field('cta_donation_numberal_donation_box') : '';
$cta_valunteer = (!empty(__get_field('cta_valunteer_numberal_donation_box'))) ? __get_field('cta_valunteer_numberal_donation_box') : '';
$cta_style     = __get_field('style_cta_numberal_donation_box') ?: 'btn-default';
$btn_animation = (!empty($general['animation_button'])) ? $general['animation_button'] : '';
$bg            = (!empty(__get_field('bg_numberal_donation_box'))) ? __get_field('bg_numberal_donation_box') : get_template_directory_uri(). '/resources/assets/images/bg-number-box-default.jpg';
?>

<div id="<?php echo $id; ?>" class="be-numberal-donation-box" style="background-image:url('<?php echo $bg ?>')">   
  
   <?php if(!empty($pg_value)): ?>
      <div class="be-numberal-donation-box-progressbar" style="background-image:url('<?php echo $pg_bg ?>')"> 
         <div class="be-numberal-donation-box-progressbar-inner"> 
            <span id="be-progressbar" data-progressbar="<?php echo $pg_value ?>" data-heading="<?php echo $pg_desc ?>"
                  data-strokecolor="<?php echo $strokecolor ?>" data-trailcolor="<?php echo $trailcolor ?>"
                  data-duration=<?php echo $pg_duration ?>
            > 
            <div class="be-progressbar-editor" style="--progressbar:<?php echo $pg_value?>px;"> 
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                  <circle cx="16.1" cy="15.7" r="15.5" style=" --trailcolor:<?php echo $trailcolor ?>"/>
                  <circle cx="16.1" cy="15.7" r="15.5" style=" --strokecolor:<?php echo $strokecolor ?>"/>
               </svg>
              <div class="__meta"> 
                  <span> <?php echo $pg_value ?><sup>%</sup> </span>
                  <p><?php echo $pg_desc ?></p>
              </div>
            </div>
         </span>
         </div>
      </div>
   <?php endif; ?>

   <div class="be-numberal-donation-box-inner">
      <?php if(!empty($counters)){ ?>
         <div class="be-numberal-donation-box--list-item"> 
            <?php 
               $st_counter = (!empty(__get_field('settings_counter_numberal_donation_box'))) ? __get_field('settings_counter_numberal_donation_box') : '';
               $duration   =  $st_counter['duration'] ?: 1000;
               $delay      =  $st_counter['delay'] ?: 800;
            ?>
            <?php foreach ($counters as $key => $value): ?>
               <?php $delay_item = (($key * 20) + $delay)?>
               <div class="item-numberal-donation"> 
                     <div class="item-numberal-donation--number"> 
                        <?php if(!empty($value['numberal'])): ?>
                           <span data-counter  data-duration="<?php echo $duration ?>" data-delay="<?php echo $delay_item ?>"> <?php echo $value['numberal'] ?></span>
                        <?php endif; ?>  
                     </div>

                     <?php if(!empty($value['heading'])): ?>
                        <h4 class="item-numberal-donation--heading">  <?= esc_attr($value['heading']) ?> </h4>
                     <?php endif; ?>
               </div>
            <?php endforeach; ?>

         </div>
      <?php }else{ ?>
         <div class="be-numberal-donation-box--space" style="min-height:200px"> 
            <h3> Please add counter </h3>
         </div>
      <?php } ?>   

      <div class="be-numberal-donation-box--buttons"> 
         <?php if(!empty($cta_donation['name']) && !empty($cta_donation['link'])): ?>
            <div class="be-numberal-donation-box--buttons-donation be-button"> 
               <a href="<?= esc_url($cta_donation['link']) ?>" class="btn <?= esc_attr($cta_style) ?>">
                  <?= esc_attr($cta_donation['name']) ?>
                  <?php if ($cta_style == 'btn-water') { ?>
                        <svg class="wgl-dashes inner-dashed-border animated-dashes">
                           <rect rx="0%" ry="0%"> </rect>
                        </svg>
                  <?php } ?>
               </a>
            </div>
         <?php endif; ?>   

         <?php if(!empty($cta_valunteer['name']) && !empty($cta_valunteer['link'])): ?>
            <div class="be-numberal-donation-box--buttons-valunteer be-button">
               <a href="<?= esc_url($cta_valunteer['link']) ?>" class="btn <?= esc_attr($cta_style) ?>">
                  <?= esc_attr($cta_valunteer['name']) ?>
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