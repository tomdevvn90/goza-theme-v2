<?php
    $page_for_posts_id  = get_option( 'page_for_posts' );
    $page_for_posts_obj = get_post( $page_for_posts_id );

    $hd_hero_blog     = __get_field('goza_blog_heading_hero_bar', 'option') ? : $page_for_posts_obj->post_title;
    $bg_hero_bar      = __get_field('goza_bg_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/bg-img-hero-default.jpg';
    $icon_hero_bar    = __get_field('goza_icon_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/icon-hero-default.png';
    $heading_hero_bar = ( !is_front_page() && is_home() ) ? $hd_hero_blog : $page_for_posts_obj->post_title;
?>
<section class="blog-hero-section goza-hero-section" style="background-image:url('<?= esc_url($bg_hero_bar) ?>')">
    <div class="goza-hero-section--bg-overlay"></div>
    <div class="goza-hero-section--content container">
        <div class="goza-hero-section-inner">
            <?php if ( !empty( $icon_hero_bar ) ): ?>
                <div class="goza-hero-section-inner__icon">
                    <img src="<?php echo esc_url( $icon_hero_bar ); ?>" alt="<?php echo __('icon', 'goza'); ?>">   
                </div>  
            <?php endif; ?>  

            <?php if(is_archive()){ ?>
                <h2 class="goza-hero-section-inner__heading"> <?= esc_attr(get_the_archive_title());?> </h2>
            <?php }else{ ?>
                <h2 class="goza-hero-section-inner__heading"> <?= esc_attr($heading_hero_bar);?> </h2>
            <?php } ?>
            
            <?php if ( function_exists( 'yoast_breadcrumb' ) ): ?>
                <div class="goza-hero-section-inner__breadcrumb">
                    <?php yoast_breadcrumb(); ?>  
                </div> 
            <?php endif; ?>   
        </div>       
    </div>
</section>

