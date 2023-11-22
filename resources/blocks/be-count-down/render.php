<?php
// create id attribute for specific styling
$id = 'be-count-down-' . $block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field
$link_op = __get_field('goza_link_color_op', 'option') ? : '';
if(!empty($link_op) && isset($link_op)){
    $link_color = $link_op['link_color'];
}

// ACF field tab General
$count_down = __get_field('time_count_down_bl') ? : '';
$bg         = __get_field('bg_count_down_bl') ? : 'https://picsum.photos/1920/900?1';
$time_now   = time();
$timestamp  = strtotime($count_down);
$distance   = $timestamp - $time_now;

// ACF field tab Styles
$color_heading = __get_field('color_hd_count_down_bl') ? : '#000';
$color_number  = __get_field('color_nb_count_down_bl') ? : $link_color;
$height        = __get_field('height_count_down_bl') ? : '';
?>

<div id="<?php echo $id; ?>" class="be-count-down <?php echo $align_class; ?>" style="min-height:<?= $height ?>">
    <div class="be-count-down--inner" data-aos="fade-up"> 
        <div class="be-count-down--bg"> 
            <?php if(is_array($bg)){
                $srcset = wp_get_attachment_image_srcset($bg['id']) ? : '';
            ?>
                <img src="<?= esc_url($bg['url']) ?>" srcset="<?= $srcset ?>" alt="<?= $bg['name'] ?>"  />
            <?php }else { ?>
                <img src="<?= esc_url($bg) ?>" alt="image" />
            <?php } ?>
        </div>

        <div class="be-count-down--content"> 
            <?php if(!empty($count_down)): ?>
                <div class="be-count-down--time" data-count-down="<?= esc_attr($count_down) ?>"> 
                    <div id="be-count-down--result" class="be-count-down--result" style="--color-heading:<?= $color_heading ?>; --color-number:<?= $color_number ?>; "> </div>

                    <?php if(!empty($distance)): ?>
                        <?php 
                            $days    = floor($distance / (60 * 60 * 24));
                            $hours   = floor(($distance % (60 * 60 * 24)) / (60 * 60));
                            $minutes = floor(($distance % (60 * 60)) / 60);
                            $seconds = $distance % 60;    
                        ?>

                        <div id="be-count-down-edit" class="be-count-down--result" style="--color-heading:<?= $color_heading ?>; --color-number:<?= $color_number ?>; ">
                            <?php if($days >= 0){ ?>
                                <div class='be-day' >   <?= $days ?>    <span >Days</span> </div>
                                <div class='be-hours'>  <?= $hours ?>   <span >Hours</span> </div>
                                <div class='be-min' >   <?= $minutes ?> <span>Minutes</span> </div>
                                <div class='be-sec' >   <?= $seconds ?> <span>Seconds</span> </div>
                            <?php }else{ ?>
                                <span> EXPIRED </span>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div> 
            <?php endif; ?>    
        </div>
    </div>
</div>