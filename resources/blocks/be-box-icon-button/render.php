<?php

// create id attribute for specific styling
$id = 'be-box-icon-btn-' . $block['id'];

// ACF field variables
$link_op     = __get_field('goza_link_color_op', 'option') ? : '';
$link_color_op  = isset($link_op['link_color']) ? $link_op['link_color'] : '#d41b65';
$typography_heading = __get_field('typography_heading', 'option');
$heading_color_op   = isset($typography_heading['heading_color']) ? $typography_heading['heading_color'] : '#333';
$typography_body    = __get_field('typography_body', 'option');
$body_color_op      = isset($typography_body['body_color']) ? $typography_body['body_color'] : '#666';

$icon      = (!empty(__get_field('icon_box_icon_btn'))) ? __get_field('icon_box_icon_btn') : '';
$ic_normal = $icon['ic_normal'] ? : '';
$ic_hv     = $icon['ic_hv'] ? : '';
$heading   = __get_field('heading_box_icon_btn') ? : '';
$subHd     = __get_field('subheading_box_icon_btn') ? : '';
$btnText   = __get_field('btn_box_icon_btn') ? : '';
$linkBox   = __get_field('link_box_icon_btn') ? : '';

// styles
$ic_style = (!empty(__get_field('ic_style_box_icon_btn'))) ? __get_field('ic_style_box_icon_btn') : '';
$ic_bg    = $ic_style['bg_normal'] ? : $link_color_op;
$ic_bg_hv = $ic_style['bg_hv'] ? : $link_color_op;
$hd_color = __get_field('hd_cl_box_icon_btn') ? : $heading_color_op;
$subHdCl  = __get_field('sub_cl_box_icon_btn') ? : $body_color_op;

$btn_style = (!empty(__get_field('btn_cl_style_box_icon_btn'))) ? __get_field('btn_cl_style_box_icon_btn') : '';
$btnCl     = $btn_style['color_normal'] ? : $heading_color_op;
$btnClHv   = $btn_style['color_hv'] ? : $link_color_op;


// echo "<pre>";
// echo print_r($btn_style);
// echo "</pre>";

?>
<div id="<?php echo $id; ?>" class="be-box-icon-btn"> 
   <div class="be-box-icon-btn-inner"> 
      <?php if(!empty($ic_normal) && isset($ic_normal)): ?>
         <div class="be-box-icon-btn--icon" style="background-color:<?= $ic_bg ?>; --bg-hover:<?= $ic_bg_hv ?>"> 
            <img src="<?= esc_url($ic_normal) ?>" alt="icon normal" class="--icon-normal" /> 

            <?php if(!empty($ic_normal) && isset($ic_normal)): ?>
               <img src="<?= esc_url($ic_hv) ?>" alt="icon hover" class="--icon-hv" /> 
            <?php endif;?> 
         </div>
      <?php endif;?>

      <div class="be-box-icon-btn--content"> 
         <?php if(!empty($heading) && isset($heading)): ?>
            <h3 class="be-box-icon-btn--heading" style="color:<?= $hd_color  ?>"> 
                  <?php if(!empty($linkBox) && isset($linkBox)):?>
                     <a href="<?= esc_url($linkBox) ?>"> <?= $heading ?>  </a>
                  <?php else:?>  
                     <?= $heading ?>
                  <?php endif;?>   
            </h3>
         <?php endif;?>

         <?php if(!empty($subHd) && isset($subHd)): ?>
            <p class="be-box-icon-btn--sub-heading" style="color:<?= $subHdCl  ?>"> <?= $subHd ?> </p>
         <?php endif;?>   

         <?php if(!empty($btnText) &&  !empty($linkBox)): ?>
            <a class="be-box-icon-btn--cta" href="<?= esc_url($linkBox) ?>" style="--btn-color:<?= $btnCl ?> ; --btn-color-hv:<?= $btnClHv ?>"> 
               <span> <?= $btnText ?> </span>
               <svg class="svg-icon" width="16" height="16" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068    c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557    l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104    c0.006-0.006,0.011-0.013,0.018-0.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg>
            </a>
         <?php endif; ?>
      </div>
   </div>
</div>