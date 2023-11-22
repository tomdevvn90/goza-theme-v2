<?php
function single_ev_template($is_style ){
    switch ($is_style) {
        case strpos($is_style, 'is-style-charity') !== false:
            be_single_ev_template_charity();
            break;

        default:
            be_single_ev_template_default();
            break; 
    } 
}

function be_single_ev_template_default(){ 
        $heading      = __get_field('heading_sg_ev') ?: '';
        $cta_style    = __get_field('cta_style_sg_ev') ?: 'btn-default';
        $color_hd     = __get_field('cl_heading_sg_ev') ?: '';
        $color_name   = __get_field('cl_name_sg_ev') ?: '';
        $color_cd     = __get_field('cl_cd_sg_ev') ?: '';

        $link_op = __get_field('goza_link_color_op', 'option') ? : '';
        if(!empty($link_op) && isset($link_op)){
            $link_color = $link_op['link_color'];
        }
        $color_heading  = $color_cd['heading'] ? : '#666';
        $color_number   = $color_cd['number'] ? : $link_color;

        // meta events
        $date_start  = tribe_get_start_date( get_the_ID(), true, 'F d, Y');
        $time_start  = tribe_get_start_date( get_the_ID(), true, 'G i a');
        $address     = tribe_get_address(get_the_ID());
        $count_down  = tribe_get_start_date( get_the_ID(), true, 'F d , Y G:i:s');
        $time_now    = time();
        $timestamp   = strtotime($count_down);
        $distance    = $timestamp - $time_now;
        
    ?>
   
    <div class="be-single-event-inner--thumbnail" data-aos="fade-right"> 
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
        <?php endif; ?>    
    </div>

    <div class="be-single-event-inner--content" data-aos="fade-left"> 
        <?php if(!empty($heading)): ?>
            <h2 class="be-single-event-inner--heading" style="color:<?= $color_hd ?>"> <?= esc_attr($heading) ?> </h2>
        <?php endif; ?>
        
        <h2 class="be-single-event-inner--name" style="color:<?= $color_name ?>">  
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>

        <?php if(!empty($time_start) && !empty($date_start)): ?>
            <p class="be-single-event-inner--date-start"> <span> UPCOMING EVENT </span> : <?= esc_attr($date_start)?> at <?= esc_attr($time_start)?></p>
        <?php endif; ?>   
        
        <?php if(!empty($address)): ?>
            <div class="be-single-event-inner--address"> 
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.49 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5l140.896-254.813c13.375-24.76 20.438-52.771 20.438-81.021C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.281-85.333-85.333S208.948 85.334 256 85.334s85.333 38.281 85.333 85.333S303.052 256 256 256z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                <span> <?= $address ?> </span>
            </div>
        <?php endif; ?>  

        <div class="be-single-event-inner--count-down" data-count-down="<?= esc_attr($count_down) ?>"> 
            <?php if(!empty($distance)): ?>
                <?php 
                    $days    = floor($distance / (60 * 60 * 24));
                    $hours   = floor(($distance % (60 * 60 * 24)) / (60 * 60));
                    $minutes = floor(($distance % (60 * 60)) / 60);
                    $seconds = $distance % 60;    
                ?>

                <div id="be-count-down-edit" class="be-count-down--result" style="--color-heading:<?= $color_heading ?>; --color-number:<?= $color_number ?>; ">
                    <?php if($days >= 0){ ?>

                        <div class='be-day'>   <?= $days ?>    <span>Days</span> </div>
                        <div class='be-hours'> <?= $hours ?>   <span>Hours</span> </div>
                        <div class='be-min'>   <?= $minutes ?> <span>Minutes</span> </div>
                        <div class='be-sec'>   <?= $seconds ?> <span>Seconds</span> </div>

                    <?php }else{ ?>
                        <span style="color:<?= $color_heading ?>"> EXPIRED </span>
                    <?php } ?>

                </div>
            <?php endif; ?>    
            
            <div id="be-count-down--result" class="be-count-down--result" style="--color-heading:<?= $color_heading ?>; --color-number:<?= $color_number ?>; "> </div>
        </div>
        
        <div class="be-single-event-inner--button be-button"> 
            <a href="<?php the_permalink() ?>" class="btn <?= esc_attr($cta_style) ?>">
                BUY TICKET
                <?php if ($cta_style == 'btn-water') { ?>
                    <svg class="wgl-dashes inner-dashed-border animated-dashes">
                        <rect rx="0%" ry="0%"> </rect>
                    </svg>
                <?php } ?>
            </a>
        </div>
    </div>
   
<?php }

function be_single_ev_template_charity(){       
    $heading      = __get_field('heading_sg_ev') ?: '';
    $cta_style    = __get_field('cta_style_sg_ev') ?: 'btn-default';
    $color_hd     = __get_field('cl_heading_sg_ev') ?: '';
    $color_name   = __get_field('cl_name_sg_ev') ?: '';
    $color_cd     = __get_field('cl_cd_sg_ev') ?: '';
    $author_id    = get_post_field('post_author', get_the_ID());
    $author_name  = get_the_author_meta('display_name', $author_id);
    $author_avta  = get_avatar($author_id);
    $event_cate   = tribe_get_event_categories();

    $color_heading  = $color_cd['heading'] ? : '#fff';
    $color_number   = $color_cd['number'] ? : '#fff';

    // meta event
    $date_start  = tribe_get_start_date( get_the_ID(), true, 'F d, Y');
    $time_start  = tribe_get_start_date( get_the_ID(), true, 'G i a');
    $address     = tribe_get_address(get_the_ID());
    $count_down  = tribe_get_start_date( get_the_ID(), true, 'F d , Y G:i:s');
    $time_now    = time();
    $timestamp   = strtotime($count_down);
    $distance    = $timestamp - $time_now;
    
    ?> 
    <div class="be-single-event-inner--bg"> 
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail('full');
        } else {
            echo '<img src="https://picsum.photos/1920/900?1" alt="Default Thumbnail">';
        } ?>
    </div>

    <div class="be-single-event-inner--content"> 
        <div class="container">
            <?php if(!empty($heading)): ?>
                <h2 class="be-single-event-inner--heading" style="color:<?= $color_hd ?>"> <?= esc_attr($heading) ?> </h2>
            <?php endif; ?>
            
            <h2 class="be-single-event-inner--name" style="color:<?= $color_name ?>">  
                <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
            </h2>

            <div class="be-single-event-inner--count-down" data-count-down="<?= esc_attr($count_down) ?>"> 
                <?php if(!empty($distance)): ?>
                    <?php 
                        $days    = floor($distance / (60 * 60 * 24));
                        $hours   = floor(($distance % (60 * 60 * 24)) / (60 * 60));
                        $minutes = floor(($distance % (60 * 60)) / 60);
                        $seconds = $distance % 60;    
                    ?>

                    <div id="be-count-down-edit" class="be-count-down--result" style="--color-heading:<?= $color_heading ?>; --color-number:<?= $color_number ?>; ">
                        <?php if($days >= 0){ ?>
                            <div class='be-day'>   <?= $days ?>    <span>Days</span> </div>
                            <div class='be-hours'> <?= $hours ?>   <span>Hours</span> </div>
                            <div class='be-min'>   <?= $minutes ?> <span>Minutes</span> </div>
                            <div class='be-sec'>   <?= $seconds ?> <span>Seconds</span> </div>
                        <?php }else{ ?>
                            <span style="color:<?= $color_heading ?>"> EXPIRED </span>
                        <?php } ?>

                    </div>
                <?php endif; ?>    
                
                <div id="be-count-down--result" class="be-count-down--result" style="--color-heading:<?= $color_heading ?>; --color-number:<?= $color_number ?>; "> </div>
            </div>

            <div class="be-single-event-inner--meta"> 
                <?php if(!empty($address)): ?>
                    <div class="be-single-event-inner--address"> 
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.49 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5l140.896-254.813c13.375-24.76 20.438-52.771 20.438-81.021C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.281-85.333-85.333S208.948 85.334 256 85.334s85.333 38.281 85.333 85.333S303.052 256 256 256z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                        <span> <?= $address ?> </span>
                    </div>
                <?php endif; ?>

                <?php if(!empty($time_start) && !empty($date_start)): ?>
                    <div class="be-single-event-inner--date-start"> 
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m347.216 301.211-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83-10.966 0-19.83 8.864-19.83 19.83v118.978c0 6.246 2.935 12.136 7.932 15.864l79.318 59.489a19.713 19.713 0 0 0 11.878 3.966c6.048 0 11.997-2.717 15.884-7.952 6.585-8.746 4.8-21.179-3.965-27.743z" fill="#000000" data-original="#000000" class=""></path><path d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.833 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.066-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.066 216.341 216.341S375.275 472.341 256 472.341z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                        <p> <span> STARTED </span> : <?= esc_attr($date_start)?> </p>
                    </div>
                <?php endif; ?> 
            </div>

            <div class="be-single-event-inner--info"> 
                <div class="be-single-event-inner--button be-button"> 
                    <a href="<?php the_permalink() ?>" class="btn <?= esc_attr($cta_style) ?>">
                        BUY TICKET
                        <?php if ($cta_style == 'btn-water') { ?>
                            <svg class="wgl-dashes inner-dashed-border animated-dashes">
                                <rect rx="0%" ry="0%"> </rect>
                            </svg>
                        <?php } ?>
                    </a>
                </div>

                <div class="be-single-event-inner--author"> 
                    <div class="be-single-event-inner--author-avatar"> 
                        <?= $author_avta ?>
                    </div>

                    <div class="be-single-event-inner--author-meta"> 
                        <h4 class="be-single-event-inner--author-name"> <?=  esc_attr($author_name) ?> </h4>
                        <div class="be-single-event-inner--author-cate"> 
                            <?= $event_cate ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }