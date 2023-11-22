
<?php   
    $icon_hero_bar = __get_field('goza_icon_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/icon-hero-default.png';
	$bg_hero_bar   = __get_field('goza_bg_hero_bar', 'option') ? :  get_template_directory_uri(). '/resources/assets/images/bg-img-hero-default.jpg';
    $heading        = get_the_title();
    $bg_image_style = !empty( $bg_field_option )? 'background-image: url('.$bg_field_option.');' : '';
?>

<section class="single-hero-section goza-hero-section" style="background-image:url('<?= esc_url($bg_hero_bar) ?>')">
    <div class="goza-hero-section--bg-overlay"></div>
    <div class="goza-hero-section--content container">
        <div class="goza-hero-section-inner">

            <?php if ( !empty( $icon_hero_bar ) ): ?>
                <div class="goza-hero-section-inner__icon">
                    <img src="<?= esc_url($icon_hero_bar) ?>" alt="icon" /> 
                </div>  
            <?php endif; ?>  

            <h2 class="goza-hero-section-inner__heading"> <?= esc_attr($heading) ?></h2>
        
            <?php if ( function_exists( 'yoast_breadcrumb' ) ): ?>
                <div class="goza-hero-section-inner__breadcrumb">
                    <?php yoast_breadcrumb(); ?>  
                </div> 
            <?php endif; ?>   
            
        </div>       
    </div>
</section>

<section class="goza-section section">
    <div class="post-container container">
        <?php if ( is_active_sidebar('blog-sidebar') ):?>
        <div class="posts-flex-box has-sidebar">
        <?php endif;?>

            <div class="post-content">
                <?php
                    $title       = get_the_title( );
                    $post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'full' );
                    $post_date   = get_the_date( );

                    $post_author_id = get_post_field( 'post_author', get_the_ID() );
                    $post_author_name = get_the_author_meta( 'display_name', $post_author_id );
                    $post_author_url = get_author_posts_url( $post_author_id );
                ?>
                <article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>> 
                    <div class="single-entry-header">
                        <div class="featured-image"><?php echo $post_thumbnail; ?></div>
                        <div class="extra-meta">
                            <div class="post-author meta" titile="Post by">
                                <span><i class="fa fa-user"></i>By </span>
                                <a href="<?php echo esc_url( $post_author_url ); ?>" class="post-item__author-link link">
                                    <?php echo $post_author_name; ?>
                                </a>
                            </div>
                            <div class="post-date meta" title="Post date">
                                <span><i class="fa fa-calendar"></i></span>
                                <?php echo $post_date; ?>
                            </div>
                            <div class="post-total-comment meta" title="Comment">
                                <span><i class="fa fa-comments" aria-hidden="true"></i></span>
                                <?php echo get_comments_number().' Comments'; ?>
                            </div>
                        </div>
                        <h2 class="post-title"><?php echo $title; ?></h2>
                    </div>
                    <div class="entry-content"> 
                        <?php the_content(); ?>
                    </div>
                </article>

                <?php do_action( 'goza_hook_single_post_navigation' ); ?>

                <?php do_action( 'goza_hook_single_post_related' ); ?>

                <?php comments_template(); ?>

            </div>

        <?php if ( is_active_sidebar('blog-sidebar') ):?>
            <div class="post-sidebar">
                <div class="post-sidebar-wrap">
                    <?php get_sidebar( 'blog' ); ?>
                </div>
            </div>
        </div>
        <?php endif;?>

    </div>
</section>
