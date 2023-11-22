<?php

// create id attribute for specific styling
$id = 'be-posts-slider-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$query          = __get_field('query_posts_slider_block');
$slider_setting = __get_field('slider_setting_posts_slider_block');

$args = [
    'post_type'   => 'post',
    'post_status' => 'publish',
];

$listCate = $query['categoires'];

$args['posts_per_page']  = $query['posts_per_page'];
$args['order']           = $query['order'];
$args['category__in']    = (!empty($query['categoires'])) ? $query['categoires'] : [ ];
$args['tag__in']         = (!empty($query['tags'])) ? $query['tags'] : [ ];

$data_carousel = array(
    'slidesToShow'   =>  $slider_setting['slidesToShow'] ? intval($slider_setting['slidesToShow']) : 1,
    'slidesToScroll' =>  $slider_setting['slidesToScroll'] ? intval($slider_setting['slidesToScroll']) : 1,
    'arrows'         =>  $slider_setting['arrows'] ?: false,
    'dots'           =>  $slider_setting['dots'] ?: false,
    'autoplay'       =>  $slider_setting['autoplay'] ?: false,
    'loop'           =>  $slider_setting['loop'] ?: false,
    'fade'           =>  $slider_setting['fade'] ?: false,
);

$is_style = isset($block['className']) ? $block['className'] : "is-style-default";
$the_query = new WP_Query($args);
?>

<div id="<?php echo $id; ?>" class="be-post-slider-block <?php echo $align_class; ?> <?php echo $is_style?>" data-style="<?php echo $is_style?>"  data-slider='<?= json_encode($data_carousel) ?>'> 
    <?php if ($the_query->have_posts()) { ?>
        <div class="be-post-slider-block-inner"> 
            <?php while ($the_query->have_posts()) {
                $the_query->the_post(); 
                be_item_post($is_style);
            } ?>
        </div>
    <?php }else{
        echo '<div class="be-not-found">No results found.</div>';
    } ?>      
</div>
<?php 

