<?php
// create id attribute for specific styling
$id = 'be-team-carousel-' . $block['id'];

$align_class = $block['align'] ? 'align' . $block['align'] : '';

$styles = [ ];
// ACF field variables
$link_op = __get_field('goza_link_color_op', 'option') ? : '';
if(!empty($link_op) && isset($link_op)){
    $link_color = $link_op['link_color'] ? : '#d94532';
}

$team        = __get_field('items_team_carousel_bl') ? : '';
$carousel_st = __get_field('setting_team_carousel_bl');
$color_name  = __get_field('color_name_team_carousel_bl') ? : '';   
$color_ps    = __get_field('color_postion_team_carousel_bl') ? : ''; 
$color_sc    = __get_field('color_social_team_carousel_bl') ? : '#000'; 
$color_dots  = __get_field('color_dots_team_carousel_bl') ? : ''; 
$color_arrow = __get_field('color_arrow_team_carousel_bl') ? : ''; 

if(!empty($color_sc) && isset($color_dots)){
    $color_dots_df = $color_dots['default'] ? : "#000";
    $color_dots_at = $color_dots['active'] ? : $link_color;

    $styles['--color-dots-df'] = $color_dots_df;
    $styles['--color-dots-at'] = $color_dots_at;
}

if(!empty($color_arrow) && isset($color_arrow)){
    $color_arrow_df = $color_arrow['cl_df'] ? : '#000';
    $color_arrow_hv = $color_arrow['cl_df'] ? : $link_color;
    
    $bg_arrow_df = $color_arrow['bg_df'] ? : 'transparent';
    $bg_arrow_hv = $color_arrow['bg_hv'] ? : 'transparent';

    $styles['--bg-ar-df']    = $bg_arrow_df;
    $styles['--bg-ar-hv']    = $bg_arrow_hv;
    $styles['--color-ar-hv'] = $color_arrow_hv;
    $styles['--color-ar-df'] = $color_arrow_df;
}

// Combining styles into a single string using semicolons
$styleString = '';
foreach ($styles as $key => $value) {
    $styleString .= "$key: $value; ";
}
$styleString = rtrim($styleString, '; '); 


if(!empty($carousel_st) && isset($carousel_st)){
    $data_carousel = array(
       'slidesToShow'   =>  $carousel_st['slidesToShow'] ? intval($carousel_st['slidesToShow']) : 1,
       'slidesToScroll' =>  $carousel_st['slidesToScroll'] ? intval($carousel_st['slidesToScroll']) : 1,
       'arrows'         =>  $carousel_st['arrows'] ?: false,
       'dots'           =>  $carousel_st['dots'] ?: false,
       'autoplay'       =>  $carousel_st['autoplay'] ?: false,
       'loop'           =>  $carousel_st['loop'] ?: false,
       'fade'           =>  $carousel_st['fade'] ?: false,
    );
}

$classes = isset($block['className']) ? $block['className'] : "is-style-default";
?>

<div id="<?php echo $id; ?>" class="be-team-carousel be-team-carousel-<?php echo $classes?> <?php echo $classes?>" data-style="<?php echo $classes?>">
    <?php if(!empty($team) && isset($team)): ?>
        <div class="be-team-carousel-inner" data-carousel='<?= json_encode($data_carousel) ?>' data-aos="fade-up" style="<?php echo esc_attr($styleString); ?>"> 
            <?php foreach ($team as $key => $value) : ?>
                <?php 
                    $avatar  = $value['avatar'] ? : 'https://picsum.photos/1920/900?1';
                    $socials = $value['social'] ? : '';
                ?>
                <div class="item-team"> 
                    <div class="item-team--inner"> 
                        <div class="item-team--avatar"> 
                            <?php if(is_array($avatar)){
                                $srcset = wp_get_attachment_image_srcset($avatar['id']) ? : '';
                            ?>
                                <img src="<?= esc_url($avatar['url']) ?>" srcset="<?= $srcset ?>" alt="<?= $avatar['name'] ?>" alt="avatar" />
                            <?php }else { ?>
                                <img src="<?= esc_url($avatar) ?>" alt="avatar" />
                            <?php } ?>

                            <?php if(!empty($socials)): ?>
                                <ul class="item-team--social" style="--color-social:<?= $color_sc ?>"> 
                                    <?php foreach ($socials as $key => $social) : ?>
                                        <?php 
                                            $social_icon = $social['icon'];
                                            $social_url  = $social['url'];
                                            $transition  = (($key + 1) * 0.3)
                                        ?>

                                        <?php if(!empty($social_icon) && !empty($social_url)): ?>
                                            <li style="--transition:<?= $transition ?>s"> 
                                                <a href="<?= esc_url($social_url) ?>" target="_blank" class="social-<?= esc_attr($social_icon['value']) ?>" rel="nofollow"> 
                                                    <i class="fa fa-<?= esc_attr($social_icon['value']) ?>" aria-hidden="true"></i>
                                                </a>
                                             </li>
                                        <?php endif; ?>    

                                    <?php endforeach;?>    
                                </ul>
                            <?php endif; ?>    
                        </div>

                        <div class="item-team--content"> 
                            <?php if(!empty($value['name'])): ?>
                                <h4 class="item-team--name" style="color:<?= $color_name ?>"> <?= esc_attr($value['name'])?> </h4>
                            <?php endif; ?>   
                            
                            <?php if(!empty($value['postion'])): ?>
                                <p class="item-team--postion" style="color:<?= $color_ps ?>"> <?= esc_attr($value['postion'])?> </p>
                            <?php endif; ?> 
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>    
        </div>

    <?php else: ?>
        <div id="be-block--not-found"> 
            <h3> <?php echo esc_html('Please enter team on sidebar!')  ?></h3>
        </div>
    <?php endif; ?>    
</div>