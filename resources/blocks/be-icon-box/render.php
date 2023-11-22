<?php

// create id attribute for specific styling
$id = 'be-icon-box-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$bgImage = (!empty(__get_field('bg__icon_box'))) ? __get_field('bg__icon_box') : '';

$is_style = isset($block['className']) ? $block['className'] : "is-style-default";

?>
<div id="<?php echo $id; ?>" class="be-icon-box-block <?php echo $align_class; ?> <?php echo $is_style?>"> 
   <div class="be-icon-box-block-inner" style="background-image: url('<?php echo $bgImage ?>')"> 
        <?php be_item_icon_box($block) ?>
   </div>
</div>