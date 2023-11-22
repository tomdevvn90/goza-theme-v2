<?php
// create id attribute for specific styling
$id = 'be-ss-hero-'.$block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$min_height = __get_field('min_height_ss_hero');
$bg = __get_field('bg_ss_hero');
$bg_color = __get_field('bg_color_ss_hero');
$bg_overlay_color = __get_field('bg_overlay_color_ss_hero');
$bg_overlay_opacity = __get_field('bg_overlay_opacity_ss_hero');
$content_alignmnet = __get_field('content_alignmnet_ss_hero');
$icon = __get_field('icon_ss_hero');
$heading = __get_field('heading_ss_hero');
$heading_color = __get_field('heading_color_ss_hero');
$heading_font_size = __get_field('heading_font_size_ss_hero');
$breadcrumb_color = __get_field('breadcrumb_color_ss_hero');

$min_height_style = !empty( $min_height )? 'min-height: '.$min_height.'px;' : '';
$bg_image_style = !empty( $bg['url'] )? 'background-image: url('.$bg['url'].');' : '';
$bg_color_style = !empty( $bg_color )? 'background-color:'.$bg_color.';' : '';
$bg_overlay_color_style = !empty( $bg_overlay_color )? 'background-color:'.$bg_overlay_color.';' : '';
$bg_overlay_opacity_style = !empty( $bg_overlay_opacity )? 'opacity:'.$bg_overlay_opacity.';' : '';
$content_alignmnet_style = 'text-align:'.$content_alignmnet.';' ;
$heading_color_style = !empty( $heading_color )? 'color:'.$heading_color.';' : '';
$heading_font_size_style = !empty( $heading_font_size )? 'font-size:'.$heading_font_size.'px;' : '';
$breadcrumb_color_style = !empty( $breadcrumb_color )? 'color:'.$breadcrumb_color.';' : '';

?>
<section id="<?php echo $id ?>" class="be-ss-hero <?php echo $align_class; ?>" style="<?php echo $min_height_style; ?><?php echo $bg_image_style; ?> <?php echo $bg_color_style; ?>">
    <div class="be-ss-hero--bg-overlay" style="<?php echo $bg_overlay_color_style; ?><?php echo $bg_overlay_opacity_style; ?>"></div>
    <div class="be-ss-hero--content container">
        <div class="be-ss-hero-inner" style="<?php echo $content_alignmnet_style; ?>">

            <?php if ( !empty( $icon ) ): ?>
                <div class="be-ss-hero-inner__icon">
                    <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">   
                </div>
            <?php endif; ?>   
            

            <?php if ( !empty( $heading ) ): ?>
                <h2 class="be-ss-hero-inner__heading" style="<?php echo $heading_font_size_style; ?><?php echo $heading_color_style; ?>"><?php echo $heading; ?></h2>
            <?php endif; ?>   
         
            <?php if ( function_exists( 'yoast_breadcrumb' ) ): ?>
                <div class="be-ss-hero-inner__breadcrumb" style="<?php echo $breadcrumb_color_style; ?>">
                    <?php yoast_breadcrumb(); ?>  
                </div> 
            <?php endif; ?>   
            
        </div>       
    </div>

</section>




