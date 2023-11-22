<?php

// create id attribute for specific styling
$id = 'be-single-post_' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$is_style    = isset($block['className']) ? $block['className'] : "is-style-water";

// ACF field variables
$post_select = __get_field('select_post_sg_p') ?: '';
$reverse     = __get_field('row_reverse_sg_p') ? '__row-reverse': '';

$args = array(
   'post_type' => 'post',
   'post_status' => 'publish',
   'posts_per_page' => 1,
   'order' => 'ASC',
);

if(!empty($post_select)){
   $args['post__in']  = array();
   array_push($args['post__in'], $post_select );
}
ob_start();

$the_query = new WP_Query($args);
?>
<div id="<?php echo $id; ?>" class="be-single-post-block <?php echo $align_class; ?> <?php echo esc_attr($is_style) ?>"> 
    <?php if ($the_query->have_posts()){ ?>
        <div class="be-single-post-inner <?= esc_attr($reverse) ?>" data-aos="zoom-in"> 
            <?php while ($the_query->have_posts()){
                $the_query->the_post(); 
                single_post_template($is_style );
            } ?>
        </div>
    <?php wp_reset_postdata(); ?>
    <?php } else{
        echo '<div class="be-not-found">No results found.</div>';
    } ?>
</div>
<?php
wp_reset_postdata();