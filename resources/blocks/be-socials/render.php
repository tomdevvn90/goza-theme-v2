<?php

// create id attribute for specific styling
$id = 'be-socials-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$heading      = __get_field('heading_bl_socials');
$open_new_tab = __get_field('open_new_tab_bl_social');
$items        = __get_field('list_items_bl_socials');
$is_style     = isset($block['className']) ? $block['className'] : "is-style-default";

?>
<div id="<?php echo $id; ?>" class="be-socials-block <?php echo $align_class; ?> <?php echo $is_style?>"> 
   <?php if(!empty($items) && isset($items)): ?>
      <div class="be-socials-block-inner"> 
         <?php if(!empty($heading)): ?>
            <h6 class="be-socials-block--heading"> <?php echo $heading ?> </h6>
         <?php endif; ?>   

         <ul class="be-socials-block--items">
            <?php foreach ($items as $key => $value) : ?>
               <?php $icon = $value['icon']; ?>
               <?php if(!empty($value['url'])): ?>
                  <li> 
                     <a href="<?php echo esc_url($value['url']) ?>" class="<?php echo $icon['value']; ?>" target="<?php echo ($open_new_tab)? '_blank' : ''; ?>"> 
                        <i class="fa fa-<?php echo $icon['value']; ?>" aria-hidden="true"></i>
                     </a>
                  </li>
               <?php endif; ?>   
            <?php endforeach; ?>   
         </ul>  
      </div>
   <?php else: ?> 
      <div id="be-block--not-found"> 
         <h3> Please add socials </h3>
      </div>
  <?php endif; ?>    
</div>