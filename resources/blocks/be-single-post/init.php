<?php
function single_post_template($is_style){
    switch ($is_style) {
        case strpos($is_style, 'is-style-ngo-dark') !== false:
            be_single_post_ngo_dark();
            break;

        default:
            be_single_post_template_water();
            break; 
    } 
}


function be_single_post_template_water(){ 
    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
    $post_date    = get_the_date('d M, Y');
    $comment      = get_comments_number();
    $cta_text     = __get_field('cta_text_sg_p') ?: 'Read More';
    $cta_style    = __get_field('cta_style_sg_p') ?: 'btn-default';
    $color_hd     = __get_field('cta_style_sg_p') ?: '';
    $thumbnail_id = get_post_thumbnail_id(get_the_ID());
    $srcset       = wp_get_attachment_image_srcset( $thumbnail_id, array( 100, 100 ) );

    ?>
    <div class="be-single-post-inner--thumbnail">
        <?php if(!empty($post_img_url)): ?>
            <svg class="wgl-dashes inner-dashed-border animated-dashes"><rect rx="50%" ry="50%"> </rect></svg>
            <img src="<?= esc_url($post_img_url) ?>" srcset="<?= esc_attr($srcset) ?>" alt="<?php the_title() ?>" />
        <?php endif; ?>
    </div>

    <div class="be-single-post-inner--content">
        <div class="be-single-post-inner--meta"> 
            <div class="be-single-post-inner--date"> 
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M452 40h-24V0h-40v40H124V0H84v40H60C26.916 40 0 66.916 0 100v352c0 33.084 26.916 60 60 60h392c33.084 0 60-26.916 60-60V100c0-33.084-26.916-60-60-60zm20 412c0 11.028-8.972 20-20 20H60c-11.028 0-20-8.972-20-20V188h432v264zm0-304H40v-48c0-11.028 8.972-20 20-20h24v40h40V80h264v40h40V80h24c11.028 0 20 8.972 20 20v48z" fill="#000000" data-original="#000000" class=""></path><path d="M76 230h40v40H76zM156 230h40v40h-40zM236 230h40v40h-40zM316 230h40v40h-40zM396 230h40v40h-40zM76 310h40v40H76zM156 310h40v40h-40zM236 310h40v40h-40zM316 310h40v40h-40zM76 390h40v40H76zM156 390h40v40h-40zM236 390h40v40h-40zM316 390h40v40h-40zM396 310h40v40h-40z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                <span> <?= esc_attr($post_date) ?> </span>
            </div>

            <div class="be-single-post-inner--comment"> 
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M12 1a10.995 10.995 0 0 0-9.464 16.6l-1.475 4.058A1 1 0 0 0 2 23a1.019 1.019 0 0 0 .342-.06L6.4 21.464A11 11 0 1 0 12 1z" data-name="Layer 2" fill="#000000" data-original="#000000" class=""></path></g></svg>
                <span> <?= esc_attr($comment) ?> comment</span>
            </div>
        </div> 

        <h2 class="be-single-post-inner--name" style="color:<?= $color_hd ?>">  
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>

        <div class="be-single-post-inner--excerpt"> <?php the_excerpt() ?> </div>

        <div class="be-single-post-inner--cta be-button"> 
            <a href="<?php the_permalink() ?>" class="btn <?= esc_attr($cta_style) ?>">
                <?= esc_attr($cta_text) ?>
                <?php if ($cta_style == 'btn-water') { ?>
                    <svg class="wgl-dashes inner-dashed-border animated-dashes">
                        <rect rx="0%" ry="0%"> </rect>
                    </svg>
                <?php } ?>
            </a>
        </div>
    </div>    
<?php }

function be_single_post_ngo_dark(){
    $post_date    = get_the_date('d M, Y');
    $comment      = get_comments_number();
    $cta_text     = __get_field('cta_text_sg_p') ?: 'Read More';
    $cta_style    = __get_field('cta_style_sg_p') ?: 'btn-default';
    $color_hd     = __get_field('color_hd_sg_p') ?: '';
    ?>
    <div class="be-single-post-inner--thumbnail"> 
        <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('full'); ?>
        <?php endif; ?>
    </div>

    <div class="be-single-post-inner--content">
        <h2 class="be-single-post-inner--name" style="color:<?= $color_hd ?>">  
            <a href="<?php the_permalink() ?>"> <?php the_title() ?> </a>
        </h2>

        <div class="be-single-post-inner--meta"> 
            <div class="be-single-post-inner--date"> 
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M452 40h-24V0h-40v40H124V0H84v40H60C26.916 40 0 66.916 0 100v352c0 33.084 26.916 60 60 60h392c33.084 0 60-26.916 60-60V100c0-33.084-26.916-60-60-60zm20 412c0 11.028-8.972 20-20 20H60c-11.028 0-20-8.972-20-20V188h432v264zm0-304H40v-48c0-11.028 8.972-20 20-20h24v40h40V80h264v40h40V80h24c11.028 0 20 8.972 20 20v48z" fill="#000000" data-original="#000000" class=""></path><path d="M76 230h40v40H76zM156 230h40v40h-40zM236 230h40v40h-40zM316 230h40v40h-40zM396 230h40v40h-40zM76 310h40v40H76zM156 310h40v40h-40zM236 310h40v40h-40zM316 310h40v40h-40zM76 390h40v40H76zM156 390h40v40h-40zM236 390h40v40h-40zM316 390h40v40h-40zM396 310h40v40h-40z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                <span> <?= esc_attr($post_date) ?> </span>
            </div>

            <div class="be-single-post-inner--comment"> 
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M12 1a10.995 10.995 0 0 0-9.464 16.6l-1.475 4.058A1 1 0 0 0 2 23a1.019 1.019 0 0 0 .342-.06L6.4 21.464A11 11 0 1 0 12 1z" data-name="Layer 2" fill="#000000" data-original="#000000" class=""></path></g></svg>
                <span> <?= esc_attr($comment) ?> comment</span>
            </div>
        </div> 

        <div class="be-single-post-inner--excerpt"> <?php the_excerpt() ?> </div>

        <div class="be-single-post-inner--cta be-button"> 
            <a href="<?php the_permalink() ?>" class="btn <?= esc_attr($cta_style) ?>">
                <?= esc_attr($cta_text) ?>
                <?php if ($cta_style == 'btn-water') { ?>
                    <svg class="wgl-dashes inner-dashed-border animated-dashes">
                        <rect rx="0%" ry="0%"> </rect>
                    </svg>
                <?php } ?>
            </a>
        </div>
    </div>    
<?php }