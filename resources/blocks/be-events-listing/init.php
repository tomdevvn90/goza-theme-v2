<?php
function be_item_event($is_style){

    switch ($is_style) {
        case strpos($is_style, 'is-style-ev-list') !== false:
            be_template_ev_list();
            break;

        case strpos($is_style, 'is-style-ev-grid') !== false:
            be_template_ev_grid();
            break;

        case strpos($is_style, 'is-style-ev-fill') !== false:
            be_template_ev_fill();
            break;

        case strpos($is_style, 'is-style-ev-outline') !== false:
            be_template_ev_outline();
            break;

        case strpos($is_style, 'is-style-ev-special') !== false:
            be_template_ev_special();
            break;

        default:
            be_template_ev_default();
            break;
    }
}

function be_template_ev_list()
{
    $day         = tribe_get_start_date(get_the_ID(), true, 'j');
    $month       = tribe_get_start_date(get_the_ID(), true, 'M');
    $time        = tribe_get_start_date(get_the_ID(), true, 'G:i a');
    $author_id   = get_the_author_meta('ID');
    $author_name = get_the_author_meta('display_name', $author_id);
    $venue       = tribe_get_address(get_the_ID());

?>
    <div class="item-event">
        <div class="item-event-inner">
            <div class="item-event--start-date">
                <span class="item-event--start-date__day"> <?php echo esc_attr($day) ?> </span>
                <span class="item-event--start-date__month"> <?php echo esc_attr($month) ?> </span>
            </div>

            <div class="item-event--meta">
                <div class="item-event--time">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 443.294 443.294" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <path d="M221.647 0C99.433 0 0 99.433 0 221.647s99.433 221.647 221.647 221.647 221.647-99.433 221.647-221.647S343.861 0 221.647 0zm0 415.588c-106.941 0-193.941-87-193.941-193.941s87-193.941 193.941-193.941 193.941 87 193.941 193.941-87 193.941-193.941 193.941z" fill="#000000" data-original="#000000" class=""></path>
                            <path d="M235.5 83.118h-27.706v144.265l87.176 87.176 19.589-19.589-79.059-79.059z" fill="#000000" data-original="#000000" class=""></path>
                        </g>
                    </svg>
                    <span><?php echo esc_attr($time) ?> - By <?php echo esc_attr($author_name) ?></span>
                </div>

                <h3 class="item-event--name">
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>

                <?php if (!empty($venue)) : ?>
                    <div class="item-event--venue">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <defs>
                                    <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                        <path d="M0 512h512V0H0Z" fill="#000000" data-original="#000000"></path>
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                                    <path d="M0 0c-60 90-165 212-165 317 0 90.981 74.019 165 165 165s165-74.019 165-165C165 212 60 90 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 15)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                    <path d="M0 0c-41.353 0-75 33.647-75 75s33.647 75 75 75 75-33.647 75-75S41.353 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 257)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                </g>
                            </g>
                        </svg>
                        <span><?php echo esc_attr($venue) ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php }

function be_template_ev_grid()
{
    $ev_img_url  = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $start_date  = '';
    $time_start  = '';
    $time_end    = '';
    $venue       = '';
   
    $start_date  = tribe_get_start_date(get_the_ID(), true, 'd F');
    $time_start  = tribe_get_start_date(get_the_ID(), true, 'G:i');
    $time_end    = tribe_get_end_date(get_the_ID(), true, 'G:i');
    $venue       = tribe_get_address(get_the_ID());
   
    $author_id   = get_the_author_meta('ID');
    $author_name = get_the_author_meta('display_name', $author_id);
    
?>
     <div class="item-event">
        <div class="item-event--inner">
            <?php if (!empty($ev_img_url)) : ?>
                <div class="item-event--thumbnail">
                    <?php if ($ev_img_url) { ?>
                        <img src="<?php echo esc_url($ev_img_url) ?>" alt="<?php the_title() ?>">
                    <?php } ?>
                </div>
            <?php endif; ?>

            <div class="item-event--meta">
                <?php if (!empty($start_date)) : ?>
                    <span class="item-event--start-date"> <?php echo esc_attr($start_date) ?> </span>
                <?php endif; ?>
                <h3 class="item-event--name">
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>
                <?php if ( !empty($time_start) && !empty($time_end) ) : ?>
                    <div class="item-event--start-date-time"> 
                        <i class="fa fa-clock-o" aria-hidden="true"> </i>
                        <?php echo esc_attr($time_start); ?> 
                        -
                        <?php echo esc_attr($time_end); ?> 
                        <span>By <?php echo esc_attr($author_name); ?></span>
                    </div>
                <?php endif; ?>
                <?php if (!empty($venue)) : ?>
                    <div class="item-event--venue"> 
                        <i class="fa fa-map-marker" aria-hidden="true"> </i>
                        <?php echo esc_attr($venue); ?> 
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php }

function be_template_ev_default(){
    $ev_img_url      = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $ev_button_style = __get_field('ev_button_style') ?: ['goza_button_style' => 'btn-default'];
    $start_date      = tribe_get_start_date(get_the_ID(), true, 'j M Y - G:i a, l');
?>
    <div class="item-event __hide">
        <div class="item-event-inner">
            <div class="item-event-inner-left">
                <?php if (!empty($ev_img_url)) : ?>
                    <div class="item-event--thumbnail">
                        <?php if ($ev_img_url) { ?>
                            <img src="<?php echo esc_url($ev_img_url) ?>" alt="<?php the_title() ?>">
                        <?php } ?>
                        <span class="item-event--icon-toggle"></span>
                    </div>
                <?php endif; ?>

                <div class="item-event--meta">
                    <h3 class="item-event--name">
                        <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                    </h3>

                    <?php if (!empty($start_date)) : ?>
                        <span class="item-event--start-date"> <?php echo esc_attr($start_date) ?> </span>
                    <?php endif; ?>

                    <div class="item-event--excerpt"> <?php the_excerpt() ?> </div>
                </div>
            </div>

            <div class="item-event-inner-right">
                <div class="item-event--cta be-button be-button-<?= esc_attr($ev_button_style['goza_button_style']) ?>">
                    <a href="<?= the_permalink() ?>" class="btn <?= esc_attr($ev_button_style['goza_button_style']) ?>">
                        <?= esc_html__('Join Us', 'goza') ?>
                        <?php if ($ev_button_style['goza_button_style'] == 'btn-water') { ?>
                            <svg class="wgl-dashes inner-dashed-border animated-dashes">
                                <rect rx="0%" ry="0%"> </rect>
                            </svg>
                        <?php } ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php
}

function be_template_ev_fill(){   
    $day         = tribe_get_start_date(get_the_ID(), true, 'j F');
    $count_down  = tribe_get_start_date(get_the_ID(), true, 'm-d-Y G:i:s');
    $time        = tribe_get_start_date(get_the_ID(), true, 'G:i a');
    $venue       = tribe_get_address(get_the_ID());
    $excerpt     = get_the_excerpt(get_the_ID());
?>
    <div class="item-event">
        <div class="item-event-inner">
            <div class="item-event--date">
                <?php if (!empty($day)) : ?>
                    <span class="item-event--date-day"> <?php echo esc_attr($day) ?> </span>
                <?php endif; ?>

                <?php if (!empty($time)) : ?>
                    <span class="item-event--date-time">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 443.294 443.294" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path d="M221.647 0C99.433 0 0 99.433 0 221.647s99.433 221.647 221.647 221.647 221.647-99.433 221.647-221.647S343.861 0 221.647 0zm0 415.588c-106.941 0-193.941-87-193.941-193.941s87-193.941 193.941-193.941 193.941 87 193.941 193.941-87 193.941-193.941 193.941z" fill="#000000" data-original="#000000" class=""></path>
                                <path d="M235.5 83.118h-27.706v144.265l87.176 87.176 19.589-19.589-79.059-79.059z" fill="#000000" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                        <p><?php echo esc_attr($time) ?></p>
                    </span>
                <?php endif; ?>
            </div>

            <h3 class="item-event--name">
                <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
            </h3>
            <?php if (!empty($venue)) : ?>
                <div class="item-event--venue d-flex justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <defs>
                                <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                    <path d="M0 512h512V0H0Z" fill="#000000" data-original="#000000"></path>
                                </clipPath>
                            </defs>
                            <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                                <path d="M0 0c-60 90-165 212-165 317 0 90.981 74.019 165 165 165s165-74.019 165-165C165 212 60 90 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 15)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                <path d="M0 0c-41.353 0-75 33.647-75 75s33.647 75 75 75 75-33.647 75-75S41.353 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 257)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                            </g>
                        </g>
                    </svg>
                    <span> <?php echo esc_attr($venue) ?> </span>
                </div>
            <?php endif; ?>

            <div class="item-event--excerpt">
                <?php echo goza_expandable_excerpt($excerpt); ?>
            </div>

            <div class="item-event--count-down" data-count-down="<?= esc_attr($count_down) ?>">
                <div id="be-count-down--result" class="be-count-down--result"> </div>
            </div>

        </div>
    </div>
<?php }

function be_template_ev_outline(){
    $ev_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $day        = tribe_get_start_date(get_the_ID(), true, 'j');
    $month      = tribe_get_start_date(get_the_ID(), true, 'F Y -');
    $time_start = tribe_get_start_date(get_the_ID(), true, 'G:i');
    $time_end   = tribe_get_end_date(get_the_ID(), true, 'G:i');
    $address    = tribe_get_address(get_the_ID());
?>
    <div class="item-event">
        <div class="item-event-inner">
            <div class="item-event--thumbnail">
                <?php if ($ev_img_url) { ?>
                    <img src="<?php echo esc_url($ev_img_url) ?>" alt="<?php the_title() ?>" />
                <?php } ?>
            </div>

            <div class="item-event--meta">
                <h3 class="item-event--name">
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>

                <div class="item-event--info d-flex align-items-center flex-wrap flex-lg-nowrap"> 
                    <?php if (!empty($address)) : ?>
                        <div class="item-event--address d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <defs>
                                        <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                            <path d="M0 512h512V0H0Z" fill="#000000" data-original="#000000"></path>
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                                        <path d="M0 0c-60 90-165 212-165 317 0 90.981 74.019 165 165 165s165-74.019 165-165C165 212 60 90 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 15)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                        <path d="M0 0c-41.353 0-75 33.647-75 75s33.647 75 75 75 75-33.647 75-75S41.353 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 257)" fill="none" stroke="#000000" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class=""></path>
                                    </g>
                                </g>
                            </svg>
                            <span> <?php echo esc_attr($address) ?> </span>
                        </div>
                    <?php endif; ?>

                    <div class="item-event--start-date d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m347.216 301.211-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83-10.966 0-19.83 8.864-19.83 19.83v118.978c0 6.246 2.935 12.136 7.932 15.864l79.318 59.489a19.713 19.713 0 0 0 11.878 3.966c6.048 0 11.997-2.717 15.884-7.952 6.585-8.746 4.8-21.179-3.965-27.743z" fill="#000000" data-original="#000000"></path><path d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.833 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.066-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.066 216.341 216.341S375.275 472.341 256 472.341z" fill="#000000" data-original="#000000"></path></g></svg>
                        <span>
                            <?php if (!empty($day)) : ?>
                                <span class="item-event--start-date-day"> 
                                    <b><?php echo esc_attr($day) ?></b> 
                                </span>
                            <?php endif; ?>
                            <?php if (!empty($month)) : ?>
                                <span class="item-event--start-date-month"> 
                                    <?php echo esc_attr($month) ?> 
                                </span>
                            <?php endif; ?>
                            <?php if (!empty($time_start) || !empty($time_end) ) : ?>
                                <span class="item-event--start-date-time"> 
                                    <?php echo esc_attr($time_start) ?> 
                                    -
                                    <?php echo esc_attr($time_end) ?> 
                                </span>
                            <?php endif; ?>
                        </span>
                    </div>

                </div>

                <div class="item-event--excerpt"> <?php the_excerpt() ?> </div>

                <div class="item-event--cta">
                    <a href="<?php the_permalink() ?>">
                        View Details
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php }


function be_template_ev_special(){
    $ev_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $day        = tribe_get_start_date(get_the_ID(), true, 'j F Y,');
    $time       = tribe_get_start_date(get_the_ID(), true, 'G:i a');
    $address    = tribe_get_address(get_the_ID());
?>
    <div class="item-event">
        <div class="item-event-inner">
            <div class="item-event--thumbnail">
                <?php if ($ev_img_url) { ?>
                    <img src="<?php echo esc_url($ev_img_url) ?>" alt="<?php the_title() ?>" />
                <?php } ?>
            </div>

            <div class="item-event--meta">
                <h3 class="item-event--name">
                    <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
                </h3>

                <div class="item-event--meta__warp"> 
                    <div class="item-event--info">
                        <?php if (!empty($day)) : ?>
                            <div class="item-event--start-time d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M256 0C161.896 0 85.333 76.563 85.333 170.667c0 28.25 7.063 56.26 20.49 81.104L246.667 506.5c1.875 3.396 5.448 5.5 9.333 5.5s7.458-2.104 9.333-5.5l140.896-254.813c13.375-24.76 20.438-52.771 20.438-81.021C426.667 76.563 350.104 0 256 0zm0 256c-47.052 0-85.333-38.281-85.333-85.333S208.948 85.334 256 85.334s85.333 38.281 85.333 85.333S303.052 256 256 256z" fill="#000000" data-original="#000000"></path></g></svg>
                                <p><?php echo esc_attr($day) ?> <span><?php echo esc_attr($time) ?></span></p>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($address)) : ?>
                            <div class="item-event--address d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m347.216 301.211-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83-10.966 0-19.83 8.864-19.83 19.83v118.978c0 6.246 2.935 12.136 7.932 15.864l79.318 59.489a19.713 19.713 0 0 0 11.878 3.966c6.048 0 11.997-2.717 15.884-7.952 6.585-8.746 4.8-21.179-3.965-27.743z" fill="#000000" data-original="#000000"></path><path d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.833 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.066-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.066 216.341 216.341S375.275 472.341 256 472.341z" fill="#000000" data-original="#000000"></path></g></svg>
                                <span><?php echo esc_attr($address) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="item-event--excerpt"> <?php the_excerpt() ?> </div>
                </div>
            </div>
        </div>
    </div>
<?php }
?>