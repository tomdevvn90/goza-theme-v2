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
