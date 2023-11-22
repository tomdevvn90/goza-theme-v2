<?php
// create id attribute for specific styling
$id = 'be-ss-hero-'.$block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

// layput

$columns = __get_field('columns_projects_grid');
$columns_tablet = __get_field('columns_tablet_projects_grid');
$columns_mobile = __get_field('columns_mobile_projects_grid');
$column_gap = __get_field('column_gap_projects_grid');
$row_gap = __get_field('row_gap_projects_grid');

$columns_style = !empty( $columns )? '--columns-project-grid:'.$columns.';' : '';
$columns_tablet_style = !empty( $columns_tablet )?'--columns-project-grid-tablet:'.$columns_tablet.';' : '';
$columns_mobile_style = !empty( $columns_mobile )?'--columns-project-grid-mobile:'.$columns_mobile.';' : '';
$column_gap_style = !empty( $column_gap )? '--column-project-grid-gap:'.$column_gap.'px;' :  ( ( $column_gap === '0' )? '--column-project-grid-gap:'.$column_gap.'px;' : '' );
$row_gap_style = !empty( $row_gap )? '--row-project-grid-gap:'.$row_gap.'px;' : ( ( $row_gap === '0' )? '--column-project-grid-gap:'.$row_gap.'px;' : '' );

$columns_variables = $columns_style.$columns_tablet_style.$columns_mobile_style.$column_gap_style.$row_gap_style;

// styles
$bg_color = __get_field('bg_color_projects_grid');
$title_color = __get_field('title_color_projects_grid');
$excerpt_color = __get_field('excerpt_color_projects_grid');
$button_color = __get_field('button_color_projects_grid');

$bg_color_style = !empty( $bg_color )? '--bg-color-project-grid:'.$bg_color.';' : '';
$title_color_style = !empty( $title_color )? '--title-color-project-grid:'.$title_color.';' : '';
$excerpt_color_style = !empty( $excerpt_color )? '--excerpt-color-project-grid:'.$excerpt_color.';' : '';
$button_color_style = !empty( $button_color )? '--btn-color-project-grid:'.$button_color.';' : '';

$color_variables = $bg_color_style.$title_color_style.$excerpt_color_style.$button_color_style;
// option query fields
$posts_per_page = !empty( __get_field('posts_per_page_projects_grid') )? __get_field('posts_per_page_projects_grid') : get_option('posts_per_page');
$order = __get_field('order_projects_grid') ? __get_field('order_projects_grid') : 'desc';
$orderby = __get_field('orderby_projects_grid') ? __get_field('orderby_projects_grid') : 'date';
$loadmore = __get_field('loadmore_projects_grid') ? __get_field('loadmore_projects_grid') : false;
$loadmore_type = __get_field('loadmore_type_projects_grid') ? __get_field('loadmore_type_projects_grid') : 'default';
$loadmore_text = __get_field('loadmore_text_projects_grid') ? __get_field('loadmore_text_projects_grid') : __('View More', 'goza');

$paged = get_query_var( 'paged' )? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type'   => 'fw-portfolio',
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish',
    'order' => $order,
    'orderby' => $orderby,
    'paged' => $paged
);

$the_query = new WP_Query($args);

$max_num_pages = $the_query->max_num_pages;

?>
<section id="<?php echo $id; ?>" class="be-projects-grid-section <?php echo $align_class; ?>">
    <div class="be-projects-grid--content container">  
    <?php if( $the_query->have_posts() ): ?>
        <div id="block-projects-grid-action-<?php echo $block['id']; ?>" 
             class="be-projects-grid grid-layout" 
             style="<?php echo $columns_variables;?><?php echo $color_variables;?>" 
             data-aos="fade-up" data-aos-duration="1000">
            <?php while ( $the_query->have_posts() ) {
                $the_query->the_post();

                be_projects_grid_item( $block );

            } ?>
            <?php wp_reset_postdata(); ?>   
        </div>
    <?php else: ?>  
        <div class="not-found"><?php echo __('No results found.', 'goza'); ?></div> 
    <?php endif; ?>  
    
    <?php if( $loadmore_type == 'default' ): ?>
        <?php if ( $loadmore && $max_num_pages > 0 ){
        $setting_loadmore = array(
            'posts_per_page' => $posts_per_page,
            'order' => $order,
            'orderby' => $orderby,
        );

        echo '<div class="be-projects-grid__loadmore" 
                data-block-id="'.$block['id'].'"
                data-aos="fade-up" data-aos-duration="1000">
            <a href="#"
               class="be-projects-grid__loadmore-btn be-projects-grid__button"
               data-page="1"
               data-max-page="'.esc_attr( $max_num_pages ).'"
               data-settings="'.esc_attr( json_encode($setting_loadmore) ).'" 
               >'.__($loadmore_text, 'goza').'
            </a>
        </div>';
        } ?>
    <?php else: ?>
        <div class="be-projects-grid__loadmore" data-block-id="<?php echo $block['id']; ?>" data-aos="fade-up" data-aos-duration="1000">
            <a href="<?php echo esc_url( get_post_type_archive_link('fw-portfolio') ); ?>" class="be-projects-grid__button"><?php echo __($loadmore_text, 'goza'); ?></a>
        </div>
    <?php endif; ?>

    </div>
</section>