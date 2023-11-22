<?php

/**
 * The template for displaying 404 pages (not found)
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package goza
 */

get_header();
?>
<main id="primary" class="site-main">
    <div class="error-404">
        <div class="container">
            <div class="wrap-entry-404">
                <h1>WHO TURNED OFF THE LIGHTS?</h1>            
                <p>We can’t seem to find the page you are looking for.</p>
                <p>You can return to the homepage or use the menu to find something else.</p>
                <div class="back-to-home">
                    <a class="btn-go" href="/">BACK TO HOME</a>
                </div>
                <?php echo get_search_form(); ?>
            </div>
        </div>
    </div>
</main><!-- #main -->
<?php
get_footer();
