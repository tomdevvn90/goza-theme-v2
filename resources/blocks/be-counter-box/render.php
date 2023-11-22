<?php
// create id attribute for specific styling
$id = 'be-counter-up-' . $block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$is_style    = isset($block['className']) ? $block['className'] : "is-style-default";

$counter_bg_img  = __get_field('bg_image_counter_box');
$counter_number  = __get_field('number_counter_box');
$counter_heading = __get_field('heading_counter_box');

$bg_img = !empty($counter_bg_img) ? 'background-image: url(' . esc_url($counter_bg_img) . ');' : '';

$counter_duration = __get_field('duration_counter_box');
$counter_delay    = __get_field('delay_counter_box');

$number_color        = __get_field('number_color_counter_box');
$heading_color       = __get_field('heading_color_counter_box');
$number_color_style  = !empty($number_color) ? 'color:' . esc_attr($number_color) . ';' : '';
$heading_color_style = !empty($heading_color) ? 'color:' . esc_attr($heading_color) . ';' : '';

?>
<div id="<?php echo $id; ?>" class="be-counter-up <?php echo $align_class; ?> <?= $is_style ?>">
    <div class="be-counter-up-box" style="<?php echo $bg_img; ?>">
        <h2 class="be-counter-up-box__number" style="<?php echo $number_color_style; ?>">
            <span class="counter-up" data-counter="<?php echo esc_attr($counter_number); ?>" data-duration="<?php echo esc_attr($counter_duration); ?>" data-delay="<?php echo esc_attr($counter_delay); ?>">
                <?php echo esc_attr($counter_number); ?>
            </span>
        </h2>
        <h5 class="be-counter-up-box__heading" style="<?php echo $heading_color_style; ?>">
            <?php echo __($counter_heading, 'goza'); ?>
        </h5>
    </div>
</div>