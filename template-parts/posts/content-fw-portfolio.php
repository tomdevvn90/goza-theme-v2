<?php
    $post_id        = get_the_ID();
    $post_img_url   = get_the_post_thumbnail_url( $post_id, 'full' ); 
    $post_excerpt   = get_the_excerpt();
    $post_permalink = get_the_permalink();
?>

<div id="fw-portfolio-<?= the_ID() ?>" class="item-fw-portfolio" data-aos="zoom-in"> 
    <a href="<?= esc_url( $post_permalink); ?>"> 
        <div class="item-fw-portfolio-inner"> 
            <div class="item-fw-portfolio--thumbnail"> 
                <?php if( !empty($post_img_url) ):?>
                    <img src="<?= esc_url( $post_img_url ); ?>" alt="<?php the_title() ?>" />
                <?php endif;?>
            </div>

            <div class="item-fw-portfolio--content"> 
                <h3 class="item-fw-portfolio--heading"> <?php the_title() ?> </h3>
                
                <div class="item-fw-portfolio--excerpt">
                    <p><?php echo wp_trim_words( $post_excerpt, 20 ); ?></p>
                </div>

                <div class="item-fw-portfolio--cta">
                    <span class="item-fw-portfolio--cta-icon"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                    <span class=item-fw-portfolio--cta-text"><?php echo __( 'View Details', 'goza'); ?></span>
                </div>
            </div>
        </div>
    </a>
</div>