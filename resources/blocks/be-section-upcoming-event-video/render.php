<?php

// create id attribute for specific styling
$id = 'be-ss-upcoming-event-video-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$heading  = __get_field('heading_ss_up_ev_vd') ?: '';
$desc     = __get_field('desc_ss_up_ev_vd') ?: '';
$bg       = __get_field('bg_img_ss_up_ev_vd') ?: '';
$bg_left  = (!empty($bg['left'])) ? $bg['left'] : get_template_directory_uri(). '/resources/assets/images/bg-event-left-default.jpg';
$bg_right = (!empty($bg['right'])) ? $bg['right'] : get_template_directory_uri(). '/resources/assets/images/bg-event-right-default.jpg';
$show_vd  = __get_field('show_video_ss_up_ev_vd') ?: false;
$url_vd   = __get_field('url_video_ss_up_ev_vd') ?: '';
?>
<section id="<?php echo $id; ?>" class="be-ss-upcoming-event-video <?php echo $align_class; ?>"> 
   <div class="be-ss-upcoming-event-video--bg"> 
      <div class="be-ss-upcoming-event-video--bg-left">  <img src="<?php echo esc_url($bg_left) ?>" alt="bg image"> </div>
      <div class="be-ss-upcoming-event-video--bg-right"> <img src="<?php echo esc_url($bg_right) ?>" alt="bg image"> </div>
   </div>

   <div class="be-ss-upcoming-event-video--content container"> 
        <div class="be-ss-upcoming-event-video--content-inner"> 
            <?php if(!empty($heading)): ?>
               <h2 class="be-ss-upcoming-event-video--content-heading"> <?php echo $heading ?> </h2>
            <?php endif; ?>   

            <?php if(!empty($desc)): ?>
               <p class="be-ss-upcoming-event-video--content-desc"> <?php echo $desc?> </p>
            <?php endif; ?> 

            <?php be_events_listing() ?>

            <?php if($show_vd && !empty($url_vd)): ?>
               <div id="be-popup-video-<?php echo $block['id'] ?>" class="be-ss-upcoming-event-video--content-cta be-popup-video"> 
                  <a data-src="<?php echo esc_url($url_vd) ?>" data-lg-size="1280-720">
                     <span class="__icon-play"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 163.861 163.861" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M34.857 3.613C20.084-4.861 8.107 2.081 8.107 19.106v125.637c0 17.042 11.977 23.975 26.75 15.509L144.67 97.275c14.778-8.477 14.778-22.211 0-30.686L34.857 3.613z" fill="#000000" data-original="#000000" class=""></path></g></svg></span>
                  </a>
               </div>
            <?php endif; ?>   
        </div>
   </div>
</section>