<?php

function be_projects_grid_item($block)
{

    $id = get_post_type( get_the_ID() ).'-'.get_the_ID();
    ?>
    <div id="<?php echo esc_attr( $id ); ?>" <?php post_class( "project-grid-item grid-item" ); ?>>
        <?php be_template_projects_grid_default(); ?>
    </div>
    <?php
}

function be_template_projects_grid_default()
{   

    $post_id = get_the_ID();
    $post_img_url = get_the_post_thumbnail_url( $post_id, 'full' ); 
    $post_title = get_the_title();
    $post_excerpt = get_the_excerpt();
    $post_permalink = get_the_permalink();

    ?>
    <div class="project-grid-item__thumbnail">
        <img src="<?php echo esc_url( $post_img_url ); ?>" alt="">
        <a href="<?php echo esc_url( $post_img_url ); ?>" class="zoom-image">
            <i class="fa fa-search" aria-hidden="true"></i>
        </a>
    </div>
    <div class="project-grid-item__content">
        <a class="project-grid-item__link" href="<?php echo esc_url( $post_permalink ); ?>">
            <h2 class="project-grid-item__title"><?php echo $post_title; ?></h2>
        </a>
        <div class="project-grid-item__excerpt">
            <p><?php echo wp_trim_words( $post_excerpt, 20 ); ?></p>
        </div>
        <a class="project-grid-item__button" href="<?php echo esc_url( $post_permalink ); ?>">
            <span class="project-grid-item__button-icon"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
            <span class="project-grid-item__button-text"><?php echo __( 'View Details', 'goza'); ?></span>
        </a>
    </div> 
    <?php
}

// loadmore
add_action( 'wp_ajax_nopriv_loadmore_projects_grid', 'loadmore_projects_grid_func' );
add_action( 'wp_ajax_loadmore_projects_grid', 'loadmore_projects_grid_func' );
function loadmore_projects_grid_func()
{
    $page = isset( $_POST['page'] )? $_POST['page'] : ( get_query_var( 'paged' )? get_query_var( 'paged' ) : 1 );
    $page = $page + 1;
    $settings = isset( $_POST['settings'] )? ( wp_unslash( $_POST['settings'] ) ) : '';
    $settings = json_decode($settings);
    $posts_per_page = get_option('posts_per_page');
    $order = 'desc';
    $orderby = 'date';

    if( $settings ){
        $posts_per_page = $settings->posts_per_page;
        $order = $settings->order;
        $orderby = $settings->orderby;
    }

    $args = array(
        'post_type'   => 'fw-portfolio',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'order' => $order,
        'orderby' => $orderby,
        'paged' => $page
    );

    $the_query = new WP_Query($args);

    $content = '';

    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            $id = get_post_type( get_the_ID() ).'-'.get_the_ID();
            $post_id = get_the_ID();
            $post_img_url = get_the_post_thumbnail_url( $post_id, 'full' ); 
            $post_title = get_the_title();
            $post_excerpt = get_the_excerpt();
            $post_permalink = get_the_permalink();
            
            $content .= '<div id="'.esc_attr( $id ).'" class="project-grid-item grid-item">
                    <div class="project-grid-item__thumbnail">
                        <img src="'.esc_url( $post_img_url ).'" alt="">
                        <a href="'.esc_url( $post_img_url ).'" class="zoom-image">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="project-grid-item__content">
                        <a class="project-grid-item__link" href="'.esc_url( $post_permalink ).'">
                            <h2 class="project-grid-item__title">'.$post_title.'</h2>
                        </a>
                        <div class="project-grid-item__excerpt">
                            <p>'.wp_trim_words( $post_excerpt, 20 ).'</p>
                        </div>
                        <a class="project-grid-item__button" href="'.esc_url( $post_permalink ).'">
                            <span class="project-grid-item__button-icon"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                            <span class="project-grid-item__button-text">'.__( 'View Details', 'goza').'</span>
                        </a>
                    </div> 
                </div>';
        }

        wp_reset_postdata();
    }

    wp_send_json_success( $content );
    
    die();
}

