<?php

// create id attribute for specific styling
$id = 'be-give-grid-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// ACF field variables
$query          = __get_field('query_give_grid_block');
$grid_setting = __get_field('setting_give_grid_block');
//var_dump($grid_setting);
if ($grid_setting) {
    $grid_decktop = $grid_setting['grid_colum_decktop'];
    $grid_tablet = $grid_setting['grid_colum_tablet'];
    $grid_mobile = $grid_setting['grid_colum_mobile'];
}
$args = [
    'post_type'   => 'give_forms',
    'post_status' => 'publish',
];

$args['posts_per_page']  = $query['posts_per_page'];
$query['order']          = $query['order'];

$is_style = isset($block['className']) ? $block['className'] : "is-style-default";

ob_start();
$the_query = new WP_Query($args);
if(class_exists('Give')){
?>
<div id="<?php echo $id; ?>" class="be-give-grid-block <?php echo $align_class; ?> <?php echo $is_style ?> grid-decktop-<?php echo $grid_decktop ?> grid-tablet-<?php echo $grid_tablet ?> grid-mobile-<?php echo $grid_mobile ?>">
    <?php if (is_plugin_active('the-events-calendar/the-events-calendar.php')) { ?>
        <?php if ($the_query->have_posts()) { ?>
            <div class="be-give-grid-block-inner">
                <?php while ($the_query->have_posts()) {
                    $the_query->the_post();
                    be_item_give($block);
                } ?>
            </div>
        <?php } else {
            echo '<div class="bph-not-found">No results found.</div>';
        } ?>
    <?php } else {
        echo '<div class="required-text" style="padding: 30px 0;">This block require The Events Calendar plugin. Please install follow link <a href="https://wordpress.org/plugins/the-events-calendar/" target="_blank">here</div>';
    } ?>
</div>
<?php
}