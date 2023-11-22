<?php

get_header();
?>

<main id="primary" class="site-main">

    <?php do_action( 'goza_hook_blog_hero_section' ); ?>

    <section class="goza-section section">
        <div class="post-container container">
        <?php
        if ( have_posts() ) :
            get_template_part( 'template-parts/posts/content-loop', get_post_type() );
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();