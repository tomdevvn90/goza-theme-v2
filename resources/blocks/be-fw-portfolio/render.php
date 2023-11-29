<?php
// create id attribute for specific styling
$id     = 'be-fw-portfolio-'.$block['id'];
$align  = $block['align'] ? 'align' . $block['align'] : '';
$styles = [ ];

$link_op            = __get_field('goza_link_color_op', 'option') ? : '';
$link_color_op      = isset($link_op['link_color']) ? $link_op['link_color'] : '#d41b65';
$typography_heading = __get_field('typography_heading', 'option');
$heading_color_op   = isset($typography_heading['heading_color']) ? $typography_heading['heading_color'] : '#333';
$typography_body    = __get_field('typography_body', 'option');
$body_color_op      = isset($typography_body['body_color']) ? $typography_body['body_color'] : '#666';


// option query fields
$filter         = __get_field('filter_cate_fp_bl') ? : '';
$loadmore       = __get_field('loadmore_fp') ? __get_field('loadmore_fp')  : false;
$posts_per_page = !empty( __get_field('posts_per_page_fp') ) ? __get_field('posts_per_page_fp') : get_option('posts_per_page');
$order          = __get_field('order_fp') ? __get_field('order_fp') : 'desc';
$orderby        = __get_field('orderby_fp') ? __get_field('orderby_fp') : 'date';
$loadmore_text  = __get_field('loadmore_text_fp') ? : __('View More', 'goza');

// style options
$hd_cl = __get_field('title_color_fp') ? : $heading_color_op;
$ex_cl = __get_field('excerpt_color_fp') ? : $body_color_op;
$bt_cl = __get_field('btn_color_fp') ? : $link_color_op;

$filter_style    = __get_field('filter_style_fp') ? : '';
$load_more_style = __get_field('loadmore_style_fp') ?: 'btn-default';

if(isset($filter_style) && !empty($filter_style)){
    $color_nm = $filter_style['color_normal'] ? : '#fff';
    $bg_nm    = $filter_style['bg_normal'] ? : '#000';
    $color_hv = $filter_style['color_hv'] ? : '#fff';
    $bg_hv    = $filter_style['bg_hv'] ? : $link_color_op;

    $styles['--filter-cl-nm'] = $color_nm;
    $styles['--filter-bg-nm'] = $bg_nm;
    $styles['--filter-cl-hv'] = $color_hv;
    $styles['--filter-bg-hv'] = $bg_hv;
}

// layout options
$columns        = __get_field('columns_fp') ? : '3';
$columns_tablet = __get_field('columns_tablet_fp') ? : '2';
$columns_mobile = __get_field('columns_mb_fp') ? : '1';
$column_gap     = __get_field('column_gap_fp') ? : '20';
$row_gap        = __get_field('row_gap_projects_grid') ? : '20';


$styles['--columns']    = $columns;
$styles['--columns-tb'] = $columns_tablet;
$styles['--columns-mb'] = $columns_mobile;
$styles['--column-gap'] = $column_gap . 'px';;
$styles['--row-gap']    = $row_gap . 'px';
$styles['--hd-color']   = $hd_cl;
$styles['--ex-color']   = $ex_cl;
$styles['--btn-color']  = $bt_cl;

// Combining styles into a single string using semicolons
$styleString = '';
foreach ($styles as $key => $value) {
    $styleString .= "$key: $value; ";
}
$styleString = rtrim($styleString, '; '); 

$paged = get_query_var( 'paged' )? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type'      => 'fw-portfolio',
    'posts_per_page' => $posts_per_page,
    'post_status'    => 'publish',
    'order'          => $order,
    'orderby'        => $orderby,
    'paged'          => $paged
);


$the_query     = new WP_Query($args);
$max_num_pages = $the_query->max_num_pages; 
?>

<section id="<?php echo $id; ?>" class="be-fw-portfolio-block <?= $align ?>"
    data-posts-per-page = "<?= $posts_per_page ?>"
    data-orderby = "<?= $orderby ?>"
    data-order   = "<?= $order ?>"
    style="<?= esc_attr($styleString); ?>"
>
    <div class="container"> 
        <div class="be-fw-portfolio-block-inner"> 
            <?php if( $filter && !empty($filter) ): ?>
                <?php 
                    $terms = get_terms([
                        'taxonomy' => 'fw-portfolio-category',
                        'hide_empty' => false,
                    ]);
                ?>

                <?php if(!empty($terms) && isset($terms)):?>
                    <ul class="be-fw-portfolio-block-categorys"> 
                        <li class="be-fw-portfolio-block-categorys--item"> 
                            <a class="active" href="#!" data-filter="all"> All </a> 
                        </li>
                        <?php foreach ($terms as $key => $term) : ?>
                            <li class="be-fw-portfolio-block-categorys--item"> 
                                <a href="#!" data-filter="<?= $term->slug ?>"> <?= $term->name ?> </a> 
                            </li>
                        <?php endforeach; ?>        
                    </ul>
                <?php endif;?>   
            <?php endif; ?>   
            
            <?php if( $the_query->have_posts() ): ?>
                <div class="be-fw-portfolio-block--list-posts"> 
                    <?php while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        get_template_part( 'template-parts/posts/content', 'fw-portfolio' );
                    } ?>
                    <?php wp_reset_postdata(); ?>  
                </div>
            <?php else: ?>  
                <div class="not-found"><?php echo __('No results found.', 'goza'); ?></div> 
            <?php endif; ?>  
            
            <?php if ( $loadmore && $max_num_pages > 0 ):?>
                <div class="be-fw-portfolio-block--loadmore"  data-aos="fade-up" data-aos-duration="1000">
                    <a href="#!" class="be-fw-portfolio-block--loadmore-btn btn <?= esc_attr($load_more_style) ?>"
                        data-page="2"
                        data-max-page ="<?= esc_attr( $max_num_pages ) ?>"
                        data-term ="all"
                    >
                        <?= $loadmore_text ?>
                        <?php if ($load_more_style == 'btn-water') { ?>
                            <svg class="wgl-dashes inner-dashed-border animated-dashes">
                                <rect rx="0%" ry="0%"> </rect>
                            </svg>
                        <?php } ?>
                    </a>

                </div>
            <?php endif; ?>
        </div>
    </div>
</section>