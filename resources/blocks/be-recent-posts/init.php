<?php


function be_recent_post_render_template($is_style){
    switch ($is_style) {
        case strpos($is_style, 'is-style-goza-charity-2') !== false:       
            be_template_recent_post_goza_charity_2();
            break;

        case strpos($is_style, 'is-style-water-charity') !== false:       
            be_template_recent_post_water_charity();
            break;

        default:
            be_template_recent_post_default();
            break; 
    } 
}

function be_template_recent_post_default(){
    $display_author  = ( __get_field('display_author_name_recent_posts') )? __get_field('display_author_name_recent_posts') : '';
    $display_date    = ( __get_field('display_date_recent_posts') )? __get_field('display_date_recent_posts') : '';
    $display_excerpt = ( __get_field('display_excerpt_recent_posts') )? __get_field('display_excerpt_recent_posts') : '';
    $display_featured_image = ( __get_field('display_featured_image_recent_posts') )? __get_field('display_featured_image_recent_posts') : '';
    $image_size = __get_field('image_size_recent_posts')? __get_field('image_size_recent_posts') : 'small';

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
    ?>

    <article id="post-<?php echo $post_id; ?>" <?php post_class('post-item') ?>>
        <div class="post-item__inner">
            <?php if ( $display_featured_image ) { ?>
                <a href="<?php echo esc_url( $post_link ); ?>" class="post-item__featured-thumbnail <?php echo esc_attr( $image_size );?>">
                    <?php echo $thumbnail; ?>
                </a>
            <?php } ?>

            <div class=post-item__content>
                <a href="<?php echo esc_url( $post_link ); ?>" class="post-item__title-link">
                    <h3 class="post-item__title"><?php echo __( $title, 'goza'); ?></h3>
                </a>

                <?php if ( $display_author ) { ?>
                    <div class="post-item__author">
                        <span><i class="fa fa-user"></i>by </span>
                        <a href="<?php echo esc_url( $post_author_url ); ?>" class="post-item__author-link link"><?php echo $post_author_name; ?></a>
                    </div>
                <?php } ?>

                <?php if ( $display_date ) { ?>
                    <div class="post-item__date">
                        <?php echo $post_date; ?>
                    </div>
                <?php } ?>

                <?php if ( $display_excerpt ) { ?>
                    <div class="post-item__excerpt"><?php echo $excerpt; ?></div>
                <?php } ?>
            </div>
        </div>
    </article>
<?php }


function be_template_recent_post_water_charity(){
    $display_date  = ( __get_field('display_date_recent_posts') )? __get_field('display_date_recent_posts') : '';
    $comment       = get_comments_number();
    $post_date     = get_the_date('d M, Y');
    ?>

    <article id="post-<?php echo get_the_ID() ?>" <?php post_class('post-item') ?>>
        <div class="post-item-inner"> 
            <div class="post-item--meta">
                <?php if($display_date): ?>
                    <span class="post-item--date"> <?= esc_attr($post_date) ?> </span>
                <?php endif;?>  
                
                <span class="post-item--comment"> 
                    <i class="fa fa-comment" aria-hidden="true"></i> <?= esc_attr($comment)?> <span>comment</span>
                </span>
            </div>

            <h2 class="post-item--title"> 
                <a href="<?php the_permalink() ?>"> <?php the_title() ?></a>
            </h2>

            <div class="post-item--excerpt"> <?php the_excerpt() ?> </div>
        </div>
    </article>
<?php }

function be_template_recent_post_goza_charity_2(){
    $display_author  = ( __get_field('display_author_name_recent_posts') )? __get_field('display_author_name_recent_posts') : '';
    $display_date    = ( __get_field('display_date_recent_posts') )? __get_field('display_date_recent_posts') : '';
    $display_excerpt = ( __get_field('display_excerpt_recent_posts') )? __get_field('display_excerpt_recent_posts') : '';
    $display_featured_image = ( __get_field('display_featured_image_recent_posts') )? __get_field('display_featured_image_recent_posts') : '';
    $image_size = __get_field('image_size_recent_posts')? __get_field('image_size_recent_posts') : 'small';

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
    ?>

    <article id="post-<?php echo $post_id; ?>" <?php post_class('post-item') ?>>
        <div class="post-item__inner">
            <?php if ( $display_featured_image ) { ?>
                <a href="<?php echo esc_url( $post_link ); ?>" class="post-item__featured-thumbnail <?php echo esc_attr( $image_size );?>">
                    <?php echo $thumbnail; ?>
                </a>
            <?php } ?>

            <div class=post-item__content>
                <div class="post-item__meta">
                    <?php if ( $display_date ) { ?>
                        <div class="post-item__date">
                            <?php echo $post_date; ?>
                        </div> - 
                    <?php } ?>
                    <?php if ( $display_author ) { ?>
                        <div class="post-item__author">
                            <span>By </span>
                            <a href="<?php echo esc_url( $post_author_url ); ?>" class="post-item__author-link link"><?php echo $post_author_name; ?></a>
                        </div>
                    <?php } ?>
                </div>
                <a href="<?php echo esc_url( $post_link ); ?>" class="post-item__title-link">
                    <h3 class="post-item__title"><?php echo __( $title, 'goza'); ?></h3>
                </a>
                <?php if ( $display_excerpt ) { ?>
                    <div class="post-item__excerpt"><?php echo $excerpt; ?></div>
                <?php } ?>
            </div>
        </div>
    </article>
<?php }