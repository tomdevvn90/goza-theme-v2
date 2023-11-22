<?php

// create id attribute for specific styling
$id = 'be-give-slider-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$query          = __get_field('query_gives_slider_block');
$slider_setting = __get_field('slider_setting_gives_slider_block');
//var_dump($query);
$args = [
    'post_type'   => 'give_forms',
    'post_status' => 'publish',
];

$listCate = $query['categoires'];

$args['posts_per_page']  = $query['posts_per_page'];
$args['order']           = $query['order'];
$args['category__in']    = (!empty($query['categoires'])) ? $query['categoires'] : [];
$args['tag__in']         = (!empty($query['tags'])) ? $query['tags'] : [];

$data_carousel = array(
    'slidesToShow'   =>  $slider_setting['slidesToShow'] ? intval($slider_setting['slidesToShow']) : 1,
    'slidesToScroll' =>  $slider_setting['slidesToScroll'] ? intval($slider_setting['slidesToScroll']) : 1,
    'arrows'         =>  $slider_setting['arrows'] ? $slider_setting['arrows'] : false,
    'dots'           =>  $slider_setting['dots'] ? $slider_setting['dots'] : false,
    'autoplay'       =>  $slider_setting['autoplay'] ? $slider_setting['autoplay'] : false,
    'loop'           =>  $slider_setting['loop'] ? $slider_setting['loop'] : false,
    'fade'           =>  $slider_setting['fade'] ? $slider_setting['fade'] : false,
);

$is_style = isset($block['className']) ? $block['className'] : "is-style-default";
$the_query = new WP_Query($args);
if(class_exists('Give')){
?>

<div id="<?php echo $id; ?>" class="be-give-slider-block <?php echo $align_class; ?> <?php echo $is_style ?>" data-style="<?php echo $is_style ?>" data-slider='<?= json_encode($data_carousel) ?>'>
    <?php if (is_plugin_active('the-events-calendar/the-events-calendar.php')) { ?>
        <?php if ($the_query->have_posts()) { ?>
            <div class="be-give-slider-block-inner">
                <?php while ($the_query->have_posts()) {
                    $the_query->the_post();
                    be_item_give_slider($block);
                } ?>
            </div>
        <?php } else { ?>
            <div class="be-not-found"><?php esc_html_e('No results found.', 'goza') ?></div>
        <?php } ?>
    <?php } else {
        echo '<div class="required-text" style="padding: 30px 0;">This block require The Events Calendar plugin. Please install follow link <a href="https://wordpress.org/plugins/the-events-calendar/" target="_blank">here</div>';
    } ?>
</div>
<?php
}