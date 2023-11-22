<?php 

function load_testimonial(){
    $link_op     = __get_field('goza_link_color_op', 'option');
    $link_color  = $link_op['link_color'] ? : '';
    $testimonial = __get_field('item_testimonials_ss_text_tsm_vd') ?: '';
    $color_tsm   = __get_field('color_testimonials_ss_text_tsm_vd') ?: '';
    $color_hd    = $color_tsm['heading'] ?: ''; 
    $color_qt    = $color_tsm['quocte'] ?: '';
    $color_dots  = $color_tsm['dots'] ?  : $link_color;
    $slider_st   = __get_field('slider_settings_ss_text_tsm_vd') ?: '';

    $data_slider = array(
        'dots'           =>  $slider_st['dots'] ?: false,
        'autoplay'       =>  $slider_st['autoplay'] ?: false,
        'loop'           =>  $slider_st['loop'] ?: false,
        'fade'           =>  $slider_st['fade'] ?: false,
    );

    ?>
    <div class="be-ss-text-tsm-video--testimonial" style="--color-dots:<?= $color_dots ?>"> 
        <div class="be-ss-text-tsm-video--testimonial-slider" data-slider='<?= json_encode($data_slider) ?>'> 
            <?php foreach ($testimonial as $key => $value): ?>
                <div class="item-testimonial"> 
                    <?php if(!empty($value['heading'])): ?>
                        <p class="item-testimonial--heading" style="color:<?= $color_hd ?>"> <?= esc_attr($value['heading']) ?> </p>
                    <?php endif; ?>   

                    <?php if(!empty($value['quocte'])): ?>
                        <blockquote style="color:<?= $color_qt ?>; --color-icon:<?= $color_qt ?>"> <?= esc_attr($value['quocte']) ?> </blockquote>
                    <?php endif; ?>    
                </div>
            <?php endforeach; ?>    
        </div>
    </div>
<?php }


function load_video($id){
    $video      = __get_field('vd_ss_text_tsm_vd') ?: ''; 
    $bg         = $video['bg'] ?: 'https://picsum.photos/1920/900?1';
    $url_vd     = $video['url'];
    $format_vd  = $video['format_video'];
    $color_vd   = __get_field('color_vd_ss_text_tsm_vd') ?: '';
    $color_icon = $color_vd['icon'] ?: ''; 
    $bg_icon    = $color_vd['bg'] ?: '';
    ?>
    <div class="be-ss-text-tsm-video--video" data-aos="fade-left"> 
        <div class="be-ss-text-tsm-video--video-bg"> 
            <img src="<?= esc_url($bg) ?>" alt="image"> 
        </div>

        <div class="be-ss-text-tsm-video--video-cta"> 
            <div id="be-popup-video-<?php echo $id?>" class=" be-popup-video"> 
                <?php if($format_vd == 'default'){ ?>
                    <a data-src="<?php echo esc_url($url_vd) ?>" data-lg-size="1280-720" style="color:<?= $bg_icon ?>; background-color:<?= $bg_icon ?>">
                        <span class="__icon-play"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 163.861 163.861" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M34.857 3.613C20.084-4.861 8.107 2.081 8.107 19.106v125.637c0 17.042 11.977 23.975 26.75 15.509L144.67 97.275c14.778-8.477 14.778-22.211 0-30.686L34.857 3.613z" fill="<?= $color_icon ?>" data-original="#000000" class=""></path></g></svg></span>
                    </a>    
                <?php }else{ ?>
                    <a data-video='{"source": [{"src":"<?= esc_url($url_vd) ?>", "type":"video/mp4"}], "attributes": {"preload": false, "playsinline": true, "controls": true}}' data-lg-size="1280-720" style="color:<?= $bg_icon ?>; background-color:<?= $bg_icon ?>">
                        <span class="__icon-play"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 163.861 163.861" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M34.857 3.613C20.084-4.861 8.107 2.081 8.107 19.106v125.637c0 17.042 11.977 23.975 26.75 15.509L144.67 97.275c14.778-8.477 14.778-22.211 0-30.686L34.857 3.613z" fill="<?= $color_icon ?>" data-original="#000000" class=""></path></g></svg></span>
                    </a> 
                <?php } ?>
            </div>
        </div>
    </div>
<?php 
}