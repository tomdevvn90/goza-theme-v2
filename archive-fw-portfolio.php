<?php

get_header();
?>

<main id="primary" class="site-main">

    <?php do_action( 'goza_hook_blog_hero_section' ); ?>

    <section class="goza-section gz-fw-portfolio-filter">
        <div class="container">
            <div class="gz-fw-portfolio-filter-inner"> 
                <?php 
                    $terms = get_terms([
                        'taxonomy' => 'fw-portfolio-category',
                        'hide_empty' => false,
                    ]);
                ?>

                <?php if(!empty($terms) && isset($terms)):?>
                    <ul class="gz-fw-portfolio-filter-categorys"> 
                        <li class="gz-fw-portfolio-filter-categorys--item"> 
                            <a class="active" href="!#" data-filter="all"> All </a> 
                        </li>
                        <?php foreach ($terms as $key => $term) : ?>
                            <li class="gz-fw-portfolio-filter-categorys--item"> 
                                <a href="!#" data-filter="<?= $term->slug ?>"> <?= $term->name ?> </a> 
                            </li>
                        <?php endforeach; ?>        
                    </ul>
                <?php endif;?>    

                <?php if ( have_posts() ) : ?>
                    <div class="gz-fw-portfolio-filter--list-posts"> 
                        <?php  
                            while ( have_posts() ) :
                                the_post();
                                get_template_part( 'template-parts/posts/content', get_post_type() );
                            endwhile;
                        ?>
                    </div>
                <?php else : ?>
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                <?php endif;?>        
            </div>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();