<?php

/**
 * The template for displaying search results pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package goza
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php do_action( 'goza_hook_blog_hero_section' ); ?>
	
	<?php if ( have_posts() ) : ?>
		<section class="be-search-posts-list"> 
			<div class="container"> 
				<div class="be-search-posts-list-inner"> 
					<?php
						// Start the Loop.
						while ( have_posts() ) :
							the_post();

							/*
								* Include the Post-Format-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Format name) and that
								* will be used instead.
								*/
							get_template_part( 'template-parts/posts/content', 'search' );

							// End the loop.
						endwhile;
					?>
				</div>
			</div>
		</section>
	<?php else: ?>	
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif;?>	
</main><!-- #main -->
<?php
get_sidebar();
get_footer();
