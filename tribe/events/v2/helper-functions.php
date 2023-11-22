<?php

function tribe_event_item(){

    $event_thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    $event_thumb_bg = !empty($event_thumb_url)? 
        'background: url('.$event_thumb_url.') no-repeat center center / cover, #fafafa;' : '';
    
    $start_day   = tribe_get_start_date(get_the_ID(), true, 'd');
    $start_month = tribe_get_start_date(get_the_ID(), true, 'F');
    $time_start  = tribe_get_start_date(get_the_ID(), true, 'G:i a');
    $time_end    = tribe_get_end_date(get_the_ID(), true, 'G:i a');
    $venue       = tribe_get_address(get_the_ID());

    ?>
    <div <?php post_class( 'item-event', get_the_ID() ); ?> >
        <div class="item-event--inner">
            <div class="item-event--bg"></div>              
            <div class="item-event--featured-image-wrap">
                <div class="event-thumbnail" style="<?php echo $event_thumb_bg; ?>">
                    <div class="event-thumbnail-overlay"></div>
                </div>
            </div>
            <div class="item-event--content">
                <div class="item-event--event-date">
                    <?php if( !empty($start_day) && !empty($start_month) ): ?>
                        <div class="event-month-day">
                            <span><?php echo $start_day; ?></span>
                            <?php echo $start_month; ?>
                        </div>
                    <?php endif; ?>
                    <?php if( !empty($start_day) && !empty($start_month) ): ?>
                        <div class="event-time">
                            <?php echo $time_start ?> 
                            -
                            <?php echo $time_end ?> 
                        </div>
                    <?php endif; ?>
                </div>
                <div class="item-event--content-entry">
                    <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="title-link" title="">
                        <?php echo get_the_title(); ?>
                    </a>
                    <?php if( !empty($venue) ): ?>
                        <div class="venue-empty d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.49 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5l140.896-254.813c13.375-24.76 20.438-52.771 20.438-81.021C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.281-85.333-85.333S208.948 85.334 256 85.334s85.333 38.281 85.333 85.333S303.052 256 256 256z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                            <span><?php echo $venue; ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="item-event--excerpt"> <?php the_excerpt() ?> </div>
                </div>
            </div>
            <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="readmore-link">
                <?php esc_html_e('View Details', 'goza'); ?>
            </a>
        </div>
    </div>
    <?php
}

function tribe_event_list( $event_type ){

    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $event_type = $event_type? $event_type : 'happening';
    $format = 'Y-m-d';
    $args_event = array(
        'post_type'   => 'tribe_events',
        'posts_per_page' => tribe_get_option( 'postsPerPage', 10 ),
        'post_status' => 'publish',
        'paged' => $paged,
        'orderby' => '_EventStartDate',
        'order' => 'ASC',
        'eventDisplay'=> 'custom',
    );

    if( $event_type == 'happening' ){
        $args_event['meta_query'] = array(
            array(
                'key' => '_EventStartDate',
                'value' => date( $format ),
                'compare' => '<=',
            ),
            array(
                'key' => '_EventEndDate',
                'value' => date( $format ),
                'compare' => '>=',
            )
        );
    }

    if( $event_type == 'upcoming' ){
        $args_event['meta_query'] = array(
            array(
                'key' => '_EventStartDate',
                'value' => date( $format ),
                'compare' => '>',
            ),
        );
    }

    if( $event_type == 'expired' ){
        $args_event['orderby'] = '_EventEndDate';
        $args_event['order'] = 'DESC';
        $args_event['meta_query'] = array(
            array(
                'key' => '_EventEndDate',
                'value' => date( $format ),
                'compare' => '<',
            ),
        );
    }

    $events = new WP_Query( $args_event );
   
    echo '<div class="event-list">';

    if( $events->have_posts() ){
        while ( $events->have_posts() ) {
            $events->the_post();
    
            tribe_event_item();
    
        }
        wp_reset_postdata(  );

    }else{
        ?><p class="not-found"><strong><?php __( 'Sorry, not found!', 'goza' );?></strong></p><?php
    }

    echo '</div>';

    wp_reset_postdata(  );

    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // This is required for AJAX to work on our page
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
            var event_type = '<?php echo $event_type; ?>';
            var tab_event = '#tab-' + event_type;
            function event_load_all_posts(page){
                var data = {
                    page: page,
                    event_type: event_type,
                    action: "event-pagination-load-posts"
                };
               
                // Send the data
                $.post(ajaxurl, data, function(response) {

                    $(".bt-list-event").removeClass('loading');

                    $( tab_event ).html('').append(response);

                    $(tab_event + ' .pagination .active').on('click',function(e){
                        e.preventDefault();
                        let page = $(this).attr('p');
                        $('.bt-list-event').addClass('loading');
                        event_load_all_posts(page);
                    });
                });
            }
            // Load page 1 as the default
            event_load_all_posts(1);

        }); 
    </script>
    <?php

}

add_action( 'wp_ajax_event-pagination-load-posts', 'goza_event_pagination_load_posts' );
add_action( 'wp_ajax_nopriv_event-pagination-load-posts', 'goza_event_pagination_load_posts' ); 

function goza_event_pagination_load_posts(){

   if(isset($_POST['page'])){
        $event_type = isset($_POST['event_type'])? sanitize_text_field($_POST['event_type']) : 'happening';

        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        // Set the number of results to display
        $per_page = 3;
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;

        $format = 'Y-m-d';
        $args_event = array(
            'post_type'   => 'tribe_events',
            'posts_per_page' => tribe_get_option( 'postsPerPage', 10 ),
            'post_status' => 'publish',
            'paged' => $cur_page,
            'orderby' => '_EventStartDate',
            'order' => 'ASC',
            'eventDisplay'=> 'custom',
        );

        if( $event_type == 'happening' ){
            $args_event['meta_query'] = array(
                array(
                    'key' => '_EventStartDate',
                    'value' => date( $format ),
                    'compare' => '<='
                ),
                array(
                    'key' => '_EventEndDate',
                    'value' => date( $format ),
                    'compare' => '>='
                ),
            );
        }

        if( $event_type == 'upcoming' ){
            $args_event['meta_query'] = array(
                array(
                    'key' => '_EventStartDate',
                    'value' => date( $format ),
                    'compare' => '>'
                ),
            );
        }

        if( $event_type == 'expired' ){
            $args_event['orderby'] = '_EventEndDate';
            $args_event['order'] = 'DESC';
            $args_event['meta_query'] = array(
                array(
                    'key' => '_EventEndDate',
                    'value' => date( $format ),
                    'compare' => '<'
                ),
            );
        }
    
        $events = new WP_Query( $args_event );

        $total_page = $events->max_num_pages;

        $content = '';
        ob_start();
        if( $events->have_posts() ){
            while ( $events->have_posts() ) {
                $events->the_post();
        
                tribe_event_item();
        
            }
            wp_reset_postdata(  );

        }else{
            ?><p class="not-found"><strong><?php __( 'Sorry, not found!', 'goza' );?></strong></p><?php
        }
        
        $content = ob_get_clean();

        // Pagination Buttons logic
        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($total_page > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $total_page && $cur_page > $total_page - 6) {
                $start_loop = $total_page - 6;
                $end_loop = $total_page;
            } else {
                $end_loop = $total_page;
            }
        } else {
            $start_loop = 1;
            if ($total_page > 7)
                $end_loop = 7;
            else
                $end_loop = $total_page;
        }
             
        $pag_container .= "
        <div class='pagination'>";

        if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1;
            $pag_container .= "<span p='$pre' class='active prev'><i class='fa fa-angle-left'></i> <strong>".__('Newer','goza')."</strong></span>";
        } else if ($previous_btn) {
            $pag_container .= "<span class='inactive prev'><i class='fa fa-angle-left'></i> <strong>".__('Newer','goza')."</strong></span>";
        }

        $pag_container .= "<ul>";

        for ($i = $start_loop; $i <= $end_loop; $i++) {

            if ($cur_page == $i)
                $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
            else
                $pag_container .= "<li p='$i' class='active'>{$i}</li>";
        }

        $pag_container .= "</ul>";

        if ($next_btn && $cur_page < $total_page) {
            $nex = $cur_page + 1;
            $next = __('Older','goza');
            $pag_container .= "<span p='$nex' class='active next'><strong>".__('Older','goza')."</strong> <i class='fa fa-angle-right'></i></span>";
        } else if ($next_btn) {
            $pag_container .= "<span class='inactive next'><strong>".__('Older','goza')."</strong> <i class='fa fa-angle-right'></i></span>";
        }

        $pag_container = $pag_container . "
        </div>";

        echo  '<div class = "event-list">' . $content . '</div>' ;

        if( $total_page > 1 ){
            echo '<div class = "pagination-nav">' . $pag_container . '</div>';
        }
        
   }

   exit();
}