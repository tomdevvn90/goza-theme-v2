<?php
function __load_template_video($id){
   // tab Video
    $vd_st = __get_field('vd_ss_ab_vd');

    if(!empty($vd_st) && isset($vd_st)){
        $vd_url = $vd_st['url'] ? : '';
        $fm_vd  = $vd_st['format_video'] ? : 'default';
        $bg_vd  = $vd_st['bg'] ? : 'https://picsum.photos/1920/900?1';
    }

    // tab styles

    $color_vd = __get_field('color_vd_ss_ab_vd');
    if(!empty($color_vd) && isset($color_vd)){
        $color_icon = $color_vd['color_icon'] ? : '';
        $bg_icon    = $color_vd['bg_icon'] ? : '';
    }
    ?>

    <div class="be-ss-ab-vd--video" data-aos="fade-left"> 
        <div class="be-ss-ab-vd--video-bg"> 
            <?php if(is_array($bg_vd)){
                $srcset = wp_get_attachment_image_srcset($bg_vd['id']) ? : '';
                  ?>
                <img src="<?= esc_url($bg_vd['url']) ?>" srcset="<?= $srcset ?>" alt="<?= $bg_vd['name'] ?>"  />
            <?php }else { ?>
                <img src="<?= esc_url($bg_vd) ?>" alt="image" />
            <?php } ?>
        </div>

        <div class="be-ss-ab-vd--video-cta"> 
            <div id="be-popup-video-<?php echo $id?>" class="be-popup-video"> 
                <?php if($fm_vd == 'default'){ ?>

                    <a data-src="<?= esc_url($vd_url) ?>" data-lg-size="1280-720" style="color:<?= $bg_icon ?>; background-color:<?= $bg_icon ?>">
                        <span class="__icon-play">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 163.861 163.861" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M34.857 3.613C20.084-4.861 8.107 2.081 8.107 19.106v125.637c0 17.042 11.977 23.975 26.75 15.509L144.67 97.275c14.778-8.477 14.778-22.211 0-30.686L34.857 3.613z" fill="<?= $color_icon ?>"></path>
                                </g>
                            </svg>
                        </span>
                    </a>

                <?php }else{ ?>
                    
                    <a data-video='{"source": [{"src":"<?= esc_url($vd_url) ?>", "type":"video/mp4"}], "attributes": {"preload": false, "playsinline": true, "controls": true}}' data-lg-size="1280-720" style="color:<?= $bg_icon ?>; background-color:<?= $bg_icon ?>">
                        <span class="__icon-play">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 163.861 163.861" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M34.857 3.613C20.084-4.861 8.107 2.081 8.107 19.106v125.637c0 17.042 11.977 23.975 26.75 15.509L144.67 97.275c14.778-8.477 14.778-22.211 0-30.686L34.857 3.613z"></path></g></svg>
                        </span>
                    </a>

                <?php } ?>
            </div>    
        </div>
    </div>
<?php }