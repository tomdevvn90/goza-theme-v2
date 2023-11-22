<?php
    /**
     * Template part for displaying content post
     * @package goza
     */


	$animation = 'data-aos="fade-up" data-aos-duration="1000"';

    $post_id     = get_the_ID();
    $thumbnail   = get_the_post_thumbnail( );
    $title       = get_the_title( );
    $post_date   = get_the_date( );
    $post_categories = get_the_category( );
    $post_link = get_the_permalink();
    $excerpt = get_the_excerpt();

    $post_author_id = get_post_field( 'post_author', $post_id );
    $post_author_name = get_the_author_meta( 'display_name', $post_author_id );
    $post_author_url = get_author_posts_url( $post_author_id );

    $goal_option = get_post_meta( $post_id, '_give_goal_option', true );
    $form        = new Give_Donate_Form( $post_id );
    $goal        = $form->goal;
    $goal_format = get_post_meta( $post_id, '_give_goal_format', true );
    $income      = $form->get_earnings();
    $color       = get_post_meta( $post_id, '_give_goal_color', true );
    $give_forms_category = (wp_get_post_terms( $post_id, 'give_forms_category'));

    // set color if empty
    if(empty($color)) $color = '#01FFCC';
    $progress = ($goal === 0) ? 0 : round( ( $income / $goal ) * 100, 2 );

    if ( $income >= $goal ) { $progress = 100; }
    $class_none = '';
    if ( $goal_option == 'disabled' ) { $class_none = 'class-none'; }
    
    // Get formatted amount.
    $income = give_human_format_large_amount( give_format_amount( $income ) );
    $goal = give_human_format_large_amount( give_format_amount( $goal ) );

?>

<article <?php echo $animation; ?> <?php post_class('post-item'); ?>>
	<div class="post-inner">
        <?php if( !empty( $thumbnail ) ): ?>
        <a href="<?php echo esc_url( $post_link ); ?>" class="post-item__featured-thumbnail">
            <?php echo $thumbnail; ?>
            <div class="post-item__extra-meta">
                <span class="post-item__date">
                    <?php echo $post_date; ?>
                </span>
            </div>
        </a>
        <?php endif; ?>
        <div class="post-item__content <?php echo empty( $thumbnail )? 'not-thumb' : ''; ?>">
            <div class="post-item__give-goal-progress">  
                <div class="give-goal-raised">
                    <span class="give-price-raised">
                        <span>$</span><?php echo $income ?>
                    </span>
                    <span>of</span>
                    <span class="give-price-goal">
                        <span>$</span><?php echo $goal ?>
                    </span>
                    <span>Raised</span>
                </div>         
                <div class="give-goal-progress">
                    <div class="progress-bar">
                        <div class="bar" 
                        style="background: linear-gradient(180deg,<?php echo $color; ?> 0%, <?php echo $color; ?> 100%),
                            linear-gradient(180deg, #fff 0%, #ccc 100%);width: <?php echo $progress; ?>%;" >
                        </div>
                    </div>
                </div>
            </div>

            <a href="<?php echo esc_url( $post_link ); ?>" class="post-item__title-link">
                <h3 class="post-item__title"><?php echo __( $title, 'goza'); ?></h3>
            </a>

            <?php if ( $excerpt ) {
                ?><div class="post-item__excerpt"><?php echo $excerpt; ?></div><?php
            } ?>
            
            <a href="<?php echo esc_url( $post_link ); ?>" class="post-item__readmore-btn">
                <span class="readmore-btn-text"><?php echo __('Read More', 'goza'); ?></span>
                <span class="readmore-btn-icon ion-ios-arrow-thin-right"></span>
            </a>
        </div>
    </div>
</article>