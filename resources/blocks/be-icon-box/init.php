<?php
function be_item_icon_box($block){
    $is_style = (isset($block['className']) && !empty($block['className'])) ? $block['className'] : "is-style-default";

    // field global variables
    $typography_body = __get_field('typography_body', 'option');
    $body_color      = isset($typography_body['body_color']) ? $typography_body['body_color'] : '#666';

    $typography_heading = __get_field('typography_heading', 'option');
    $heading_color      = isset($typography_heading['heading_color']) ? $typography_heading['heading_color'] : '#333';

    // ACF field variables
    $heading     = __get_field('heading_icon_box');
    $link        = __get_field('link_icon_box');
    $icon        = (!empty(__get_field('icon__icon_box'))) ? __get_field('icon__icon_box') : get_template_directory_uri(). '/resources/assets/images/icon-box-default.svg' ;
    $button      = __get_field('button_icon_box');
    $subheading  = __get_field('subheading_icon_box');
    $hd_color    = __get_field('hd_color_ibx') ? : $heading_color;
    $sub_hd_cl   = __get_field('hd_color_ibx') ? : $body_color;
   
    switch ($is_style) {
        case strpos($is_style, 'is-style-2') !== false:       
            be_template_icon_box_style_2($heading, $icon, $button, $link, $hd_color, $sub_hd_cl);
            break;

        case strpos($is_style, 'is-style-3') !== false:    
            be_template_icon_box_style_3($heading, $icon, $button, $link, $hd_color, $sub_hd_cl);
            break;
        
        case strpos($is_style, 'is-style-4') !== false:    
            be_template_icon_box_style_4($heading, $icon, $subheading, $link, $hd_color, $sub_hd_cl);
            break;

        case strpos($is_style, 'is-style-5') !== false:
            be_template_icon_box_style_4($heading, $icon, $subheading, $link, $hd_color, $sub_hd_cl);
            break;

        case strpos($is_style, 'water-charity') !== false:
            be_template_icon_box_style_water_charity($heading, $icon, $subheading, $link, $hd_color, $sub_hd_cl);
            break;    

        default:
            be_template_icon_box_default($heading, $icon, $button, $link, $hd_color, $sub_hd_cl);
            break; 
    } 
}

function be_template_icon_box_style_water_charity($heading, $icon, $subheading, $link, $hd_color, $sub_hd_cl){?>
    <div class="be-icon-box-block-inner--icon">  
        <div class="be-icon-box-block-inner--icon-secret-circle"> </div>
        <img src="<?php echo esc_url($icon) ?>" alt="icon">
    </div>

    <?php if(!empty($heading)): ?>
        <h3 class="be-icon-box-block-inner--heading" style="color:<?php echo $hd_color ?>"> 
            <?php if(!empty($link)){ ?>
                <a href="<?php echo esc_url($link) ?>">  <?= esc_attr($heading ) ?>  </a>
            <?php }else{
                echo esc_attr($heading);
            } ?>
        </h3>
    <?php endif; ?> 
<?php }

function be_template_icon_box_style_5($heading, $icon, $subheading, $link, $hd_color, $sub_hd_cl){ ?>
    <div class="be-icon-box-block-inner--content"> 
        <div class="be-icon-box-block--icon"> 
            <img src="<?php echo esc_url($icon) ?>" alt="icon">
        </div>

        <?php if(!empty($heading)): ?>
            <h3 class="be-icon-box-block--heading" style="color:<?php echo $hd_color ?>"> 
                <?php if(!empty($link)){ ?>
                    <a href="<?php echo esc_url($link) ?>"> <?= esc_attr($heading ) ?>  </a>
                <?php }else{
                    echo esc_attr($heading);
                } ?>
            </h3>
        <?php endif; ?>  
        <?php if(!empty($subheading)): ?>
            <p class="be-icon-box-block--subheading" style="color:<?php echo $sub_hd_cl ?>"> <?= esc_attr($subheading) ?> </p>
        <?php endif; ?> 
    </div>
<?php }

function be_template_icon_box_style_4($heading, $icon, $subheading, $link, $hd_color, $sub_hd_cl){ ?>
    <div class="be-icon-box-block-inner--content"> 
        <div class="be-icon-box-block--icon"> 
            <img src="<?php echo esc_url($icon) ?>" alt="icon">
        </div>

        <?php if(!empty($heading)): ?>
            <h3 class="be-icon-box-block--heading" style="color:<?php echo $hd_color ?>"> 
                <?php if(!empty($link)){ ?>
                    <a href="<?php echo esc_url($link) ?>">  <?= esc_attr($heading ) ?>  </a>
                <?php }else{
                    echo esc_attr($heading);
                } ?>
            </h3>
        <?php endif; ?>  
        <?php if(!empty($subheading)): ?>
            <p class="be-icon-box-block--subheading" style="color:<?php echo $sub_hd_cl ?>"> <?= esc_attr($subheading) ?> </p>
        <?php endif; ?> 
    </div>
<?php }

function be_template_icon_box_style_3($heading, $icon, $button, $link, $hd_color, $sub_hd_cl){ ?>
    <div class="be-icon-box-block-inner--content"> 
        <div class="be-icon-box-block--icon"> 
            <img src="<?php echo esc_url($icon) ?>" alt="icon">
        </div>

        <?php if(!empty($heading)): ?>
            <h3 class="be-icon-box-block--heading" style="color:<?php echo $hd_color ?>"> 
                <?php if(!empty($link)){ ?>
                    <a href="<?php echo esc_url($link) ?>">  <?= esc_attr($heading ) ?>  </a>
                <?php }else{
                    echo esc_attr($heading);
                } ?>
            </h3>
        <?php endif; ?>  
    </div>
<?php }

function be_template_icon_box_style_2($heading, $icon, $button, $link, $hd_color, $sub_hd_cl){ ?>
    <div class="be-icon-box-block-warp" data-aos="zoom-in"> 
        <div class="be-icon-box-block--icon"> 
            <img src="<?php echo esc_url($icon) ?>" alt="icon">
        </div>

        <?php if(!empty($heading)): ?>
            <h3 class="be-icon-box-block--heading" style="color:<?php echo $hd_color ?>"> 
                <?php if(!empty($link)){ ?>
                    <a href="<?php echo esc_url($link) ?>">  <?= esc_attr($heading ) ?>  </a>
                <?php }else{
                    echo esc_attr($heading);
                } ?>
            </h3>
        <?php endif; ?>    
    </div> 

    <div class="be-icon-box-block-hover"> 
        <div class="be-icon-box-block-hover--inner"> 
            <?php if(!empty($heading)): ?>
                <h3 class="be-icon-box-block--heading"> 
                    <?php if(!empty($link)){ ?>
                        <a href="<?php echo esc_url($link) ?>">  <?= esc_attr($heading ) ?>  </a>
                    <?php }else{
                        echo esc_attr($heading);
                    } ?>
                </h3>
            <?php endif; ?>  

            <?php if(!empty($button['text']) && !empty($button['link'])): ?>
                <div class="be-icon-box-block--button"> 
                    <a href="<?php echo esc_url($button['link']) ?>"> <?php echo $button['text'] ?> </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php }

function be_template_icon_box_default($heading, $icon, $button, $link, $hd_color, $sub_hd_cl){ ?>
    <div class="be-icon-box-block-warp" data-aos="zoom-in"> 
        <div class="be-icon-box-block--icon"> 
            <img src="<?php echo esc_url($icon) ?>" alt="icon">
        </div>

        <?php if(!empty($heading)): ?>
            <h3 class="be-icon-box-block--heading" style="color:<?php echo $hd_color ?>"> 
                <?php if(!empty($link)){ ?>
                    <a href="<?php echo esc_url($link) ?>">  <?= esc_attr($heading ) ?>  </a>
                <?php }else{
                    echo esc_attr($heading);
                } ?>
            </h3>
        <?php endif; ?>    
    </div> 

    <div class="be-icon-box-block-hover"> 
        <?php if(!empty($button['text']) && !empty($button['link'])): ?>
            <div class="be-icon-box-block--button"> 
                <a href="<?php echo esc_url($button['link']) ?>"> <?php echo $button['text'] ?> </a>
            </div>
        <?php endif; ?>
    </div>
<?php }