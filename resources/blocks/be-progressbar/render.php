<?php
// create id attribute for specific styling
$id = 'be-progressbar-' . $block['id'];

// ACF field
$link_op = __get_field('goza_link_color_op', 'option') ? : '';
if(!empty($link_op) && isset($link_op)){
    $link_color = $link_op['link_color'] ? : '#ec5e87';
}

$shape    = __get_field('shape_pb_bl') ? : 'line';
$value    = __get_field('value_pb_bl') ? : 0;
$text     = __get_field('text_pb_bl') ? : '';
$height   = __get_field('height_pb_bl') ? : 0;
$strokeCl = __get_field('stroke_color_pb_bl') ? : $link_color;
$trailCl  = __get_field('trail_color_pb_bl') ? : '#000';
$size     = __get_field('size_pb_bl') ? : '';
$duration = __get_field('duration_pb_bl') ? : 1200;
$pgID     = uniqid();
?>

<div id="<?= $id; ?>" class="be-progressbar-block <?= $shape; ?>" data-shape="<?= $shape ?>" data-value="<?= $value ?>" 
    data-height="<?= $height ?>" data-stroke-color="<?= $strokeCl ?>" data-trail-color="<?= $trailCl ?>" data-duration= <?= $duration ?>
    style="--size:<?= $size ?>">

    <div id="be-progressbar-<?= $block['id'] ?>-<?= $pgID ?>" class="be-progressbar-block-warp"> </div>
    <div class="be-progressbar-block-warp __editor"> 
        <?php if($value > 0): ?>
            <?php if($shape == 'circle'){?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                    <circle cx="16.1" cy="15.7" r="15.5" style="stroke:<?= $trailCl ?>; stroke-width:<?= $height ?>px"></circle>
                    <circle cx="16.1" cy="15.7" r="15.5" 
                            style="stroke: <?= $strokeCl ?>; stroke-dashoffset: calc(100px - <?= $value ?>px); stroke-width:<?= $height ?>px">
                    </circle>
                </svg>
            <? }else{ ?>
                <?php $line = 100 - $value; ?>
                <?php if($line >= 0){ ?>
                    <svg viewBox="0 0 100 1" preserveAspectRatio="none" style="display: block; width: 100%; height: <?=$height?>px;">
                        <path d="M 0,0.5 L 100,0.5" stroke="<?= $trailCl ?>" stroke-width="1" fill-opacity="0"></path>
                        <path d="M 0,0.5 L 100,0.5" stroke="<?= $strokeCl ?>" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 100, 100; stroke-dashoffset: <?= $line ?>;"></path>
                    </svg>
                <?php } ?>
            <?php } ?>
        <?php endif; ?>    
    </div>

    <?php if(!empty($text)): ?>
        <h3 class="be-progressbar-block--heading"> <?= esc_attr($text) ?> </h3>
    <?php endif ?>
</div>