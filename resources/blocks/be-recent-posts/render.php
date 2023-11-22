<?php
// create id attribute for specific styling
$id = 'be-ss-hero-'.$block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$is_style = (isset($block['className']) && !empty($block['className'])) ? $block['className'] : "is-style-default";

// option
$posts_per_page = !empty( __get_field('number_of_items_recent_posts') )? __get_field('number_of_items_recent_posts') : get_option('posts_per_page');
$categories_recent_posts = !empty( __get_field('categories_recent_posts') )? __get_field('categories_recent_posts') : '';
// styles
$title_color = __get_field('title_color_recent_posts')? __get_field('title_color_recent_posts') : '';
$title_color_style = !empty( $title_color )? '--post-title-color:'.$title_color.';' : '';

$args = array(
    'post_type'   => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $posts_per_page,
    "orderby"        => "date",
    "order"          => "DESC",
);

if ( !empty( $categories_recent_posts ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $categories_recent_posts,
        )
    );
}

$the_query = new WP_Query($args);

?>

<div id="<?php echo $id; ?>" class="be-recent-posts <?php echo $is_style ?> <?php echo $align_class; ?>">
    <div class="be-recent-posts--content">
        <div class="recent-posts-list" style="<?php echo $title_color_style; ?>">      
        <?php if( $the_query->have_posts() ){
            
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                be_recent_post_render_template($is_style);
            }

            wp_reset_postdata();
        }else{
            echo '<p class="not-found">'.__('Not Found!', 'goza').'</p>';
        } ?>
        </div>
    </div>
</div>