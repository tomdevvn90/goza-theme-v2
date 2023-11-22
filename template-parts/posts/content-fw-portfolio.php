<?php
    $id = get_post_type( get_the_ID() ).'-'.get_the_ID();
    $post_id = get_the_ID();
    $post_img_url = get_the_post_thumbnail_url( $post_id, 'full' ); 
    $post_title = get_the_title();
    $post_excerpt = get_the_excerpt();
    $post_permalink = get_the_permalink();
?>
<div id="<?php echo esc_attr( $id ); ?>" <?php post_class('post-item'); ?>>
    <a href="<?php echo esc_url( $post_permalink  ); ?>" class="post-item__link">
        <div class="post-item__thumbnail">
            <?php if( !empty($post_img_url) ):?>
            <img src="<?php echo esc_url( $post_img_url ); ?>" alt="alt">
            <?php endif;?>
        </div>
    </a>
    <div class="post-item__content">
        <a class="post-item__link" href="<?php echo esc_url( $post_permalink ); ?>">
            <h2 class="post-item__title"><?php echo __( $post_title, 'goza' ); ?></h2>
        </a>
        <div class="post-item__excerpt">
            <p><?php echo wp_trim_words( $post_excerpt, 20 ); ?></p>
        </div>
        <a class="post-item__button" href="<?php echo esc_url( $post_permalink ); ?>">
            <span class="post-item__button-icon"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
            <span class="post-item__button-text"><?php echo __( 'View Details', 'goza'); ?></span>
        </a>
    </div> 
</div> 