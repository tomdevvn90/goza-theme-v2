<?php
function load_template_item_event($classes){
    switch ($classes) {
        case strpos($classes, 'is-style-water-charity') !== false:
            be_template_item_event_water_charity();
            break;

        default:
            be_template_item_event_ngo_dark();
            break; 
    } 
}

function be_template_item_event_water_charity(){ 
    $event_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $color_heading = __get_field('color_hd_ev_carousel') ?: '';
    $color_sub_hd  = __get_field('color_sub_hd_ev_carousel') ?: '';
    $color_content = __get_field('color_content_ev_carousel') ?: '';
    ?>
    <div class="item-event"> 
        <div class="item-event--content"> 
            <div class="item-event--thumnail"> 
                <img src="<?php echo esc_url($event_img_url) ?>" alt="<?php echo esc_html(get_the_title()) ?>" />
                <h3 class="item-event--heading" style="color:<?= $color_heading ?>"> 
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>
            </div>

            <div class="item-event--excerpt" style="color:<?= $color_content ?>"> <?php the_excerpt() ?> </div>
        </div>
    </div>
<?php }

function be_template_item_event_ngo_dark(){ 
    $event_date = tribe_get_start_date( get_the_ID(), true, 'j M Y');
    $event_time = tribe_get_start_date( get_the_ID(), true, 'G:i a');
    $address    = tribe_get_address(get_the_ID());
    $cta_style  = __get_field('cta_style_ev_carousel') ?: 'btn-default';
    $color_heading = __get_field('color_hd_ev_carousel') ?: '';
    $color_sub_hd  = __get_field('color_sub_hd_ev_carousel') ?: '';
    $color_content = __get_field('color_content_ev_carousel') ?: '';
    ?>
    <div class="item-event"> 
        <div class="item-event--content">
            <?php if(!empty($sub_heading)): ?>
                <p class="item-event--sub-heading" style="color:<?= $color_sub_hd ?>"> <?= esc_attr($sub_heading) ?></p>
            <?php endif; ?>

            <h3 class="item-event--heading" style="color:<?= $color_heading ?>"> 
                <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
            </h3>

            <div class="item-event--excerpt" style="color:<?= $color_content ?>"> <?php the_excerpt() ?> </div>
            
            <p class="item-event--date" style="color:<?= $color_content ?>"><span>UPCOMING EVENT:</span> <?= esc_attr($event_date) ?> at <?= esc_attr($event_time) ?></p>

            <?php if(!empty($address)): ?>
            <div class="item-event--address"> 
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.49 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5l140.896-254.813c13.375-24.76 20.438-52.771 20.438-81.021C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.281-85.333-85.333S208.948 85.334 256 85.334s85.333 38.281 85.333 85.333S303.052 256 256 256z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                <span style="color:<?= $color_content ?>"> <?= esc_attr($address) ?> </span>
            </div>
            <?php endif; ?> 

            <div class="item-event--btn"> 
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
    </div>
<?php }