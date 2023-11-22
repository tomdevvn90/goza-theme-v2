<?php
function be_events_listing(){
    $events_query  = (!empty(__get_field('query_event_ss_up_ev_vd'))) ? __get_field('query_event_ss_up_ev_vd') : '';
    $cta_style     = __get_field('bnc_style_ss_up_ev_vd') ?: 'btn-default';
   
    $args = [
        'post_type'   => 'tribe_events',
        'post_status' => 'publish',
    ];
     
    $args['posts_per_page']  = $events_query['posts_per_page'] ? : -1;
    $args['post__in']        = $events_query['select_events'] ?: [ ];
    $args['order']           = $events_query['order'] ?: 'ASC';
     
    if(!empty($events['categories'])){
        $args['tax_query'] = [
            array (
                'taxonomy' => 'tribe_events_cat',
                'field'    => 'term_id',
                'terms'    => $events_query['categories'],
            )
        ];
    }

    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) { ?>
        <div class="be-ss-upcoming-event-video--content-event-list" data-aos="fade-up" data-aos-duration="1000"> 
            <div class="be-ss-upcoming-event-video--content-event-list-inner">
                <?php while ($the_query->have_posts()) { 
                    $the_query->the_post(); 
                    $ev_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                    if(is_plugin_active('the-events-calendar/the-events-calendar.php')){
                        $start_date = tribe_get_start_date( get_the_ID(), true, 'j M Y - G:i a, l');
                    } ?>
                    
                    <div class="item-event __hide"> 
                        <div class="item-event-inner"> 
                            <div class="item-event-inner-left"> 
                                <?php if(!empty($ev_img_url)): ?>
                                    <div class="item-event--thumbnail">  
                                        <img src="<?php echo esc_url( $ev_img_url )?>" alt="<?php the_title() ?>">
                                        <span class="item-event--icon-toggle"></span>
                                    </div>
                                <?php endif; ?>    
                                
                                <div class="item-event--meta"> 
                                    <h3 class="item-event--name"> 
                                        <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                                    </h3>

                                    <?php if(!empty($start_date)): ?>
                                        <span class="item-event--start-date"> <?php echo $start_date ?> </span>
                                    <?php endif; ?>    

                                    <div class="item-event--excerpt"> <?php the_excerpt() ?> </div>
                                </div>
                            </div>
                            
                            <div class="item-event-inner-right"> 
                                <div class="item-event--cta be-button"> 
                                    <a href="<?php the_permalink() ?>" class="btn <?= esc_attr($cta_style) ?>">
                                        Join Us 
                                        <?php if ($cta_style == 'btn-water') { ?>
                                            <svg class="wgl-dashes inner-dashed-border animated-dashes">
                                                <rect rx="0%" ry="0%"> </rect>
                                            </svg>
                                        <?php } ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }else{
      echo '<div class="be-not-found">No results found.</div>';
    } 
}