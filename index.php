<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package goza
 */

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