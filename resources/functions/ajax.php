<?php
add_action('wp_ajax_gz_load_filter_fw_portfolio', 'gz_load_filter_fw_portfolio');
add_action('wp_ajax_nopriv_gz_load_filter_fw_portfolio', 'gz_load_filter_fw_portfolio');
function gz_load_filter_fw_portfolio(){
    ob_start();
    $dataFilter = isset( $_POST['dataFilter'] )? $_POST['dataFilter'] : '';
    if(!empty($dataFilter)){
        $args = array(
            'post_type' => 'fw-portfolio',
        );

        if($dataFilter != 'all'){
            $args['tax_query'][] = [
                'taxonomy' => 'fw-portfolio-category',
                'field'    => 'slug',
                'terms'    => $dataFilter,
            ];
        }

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                get_template_part( 'template-parts/posts/content', 'fw-portfolio' );
            }
        } else {
            echo "<div class='div-not-found' style='margin-bottom: 40px'><h4>Sorry, we couldn't find anything.</h4><p>
            Looks like there weren't any results matching your search criteria.
          </p></div>";
        }
    }
    wp_reset_query();
    $result = ob_get_clean();
    wp_send_json_success($result);
    die();
}


add_action('wp_ajax_be_load_item_fw_portfolio', 'be_load_item_fw_portfolio');
add_action('wp_ajax_nopriv_be_load_item_fw_portfolio', 'be_load_item_fw_portfolio');
function be_load_item_fw_portfolio(){
   
    $dataFilter    = isset( $_POST['dataFilter'] )? $_POST['dataFilter'] : '';
    $paged         = isset($_POST['page']) ? $_POST['page'] : 1;
    $term          = isset($_POST['term']) ? $_POST['term'] : 'all';
    $action        = isset($_POST['actioned']) ? $_POST['actioned'] : '';
    $postsPerPpage = isset($_POST['postsPerPpage']) ? $_POST['postsPerPpage'] : '-1';
    $order         = isset($_POST['order']) ? $_POST['order'] : 'desc';
    $orderby       = isset($_POST['orderby']) ? $_POST['orderby'] : 'date';
   

    $hideLoadMore   = false;
     
    $args = array(
        'post_type' => 'fw-portfolio',
        'posts_per_page' => $postsPerPpage,
        'order'          => $order,
        'orderby'        => $orderby,
        'paged'          => $paged
    );

    if($action == 'filter'){
        if($dataFilter != 'all'){
            $args['tax_query'][] = [
                'taxonomy' => 'fw-portfolio-category',
                'field'    => 'slug',
                'terms'    => $dataFilter,
            ];
        }
    }else{
        if($term != 'all'){
            $args['tax_query'][] = [
                'taxonomy' => 'fw-portfolio-category',
                'field'    => 'slug',
                'terms'    => $term,
            ];
        }
    }
    
    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            get_template_part( 'template-parts/posts/content', 'fw-portfolio' );
        }
    } else { ?>
        <div class="not-found"><?php echo __('No results found.', 'goza'); ?></div> 
    <?php 
        $hideLoadMore = true;
    }
        
   
    $items = ob_get_clean();
    if ($the_query->max_num_pages == $paged) {
        $hideLoadMore = true;
    }
    wp_send_json([
        'items'         => $items,
        'hideLoadMore'  => $hideLoadMore,
    ]);
    wp_die();
}