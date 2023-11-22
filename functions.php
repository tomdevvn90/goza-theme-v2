<?php

/**
 * Theme functions and definitions
 *
 * @package gozagutenberg
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

define('THEME_VERSION', WP_DEBUG ? rand() : '1.0');
define('THEME_URI', get_template_directory_uri());
define('THEME_PATH', get_template_directory());
define('THEME_URI_DIST', get_template_directory_uri() . '/dist');


require THEME_PATH . '/resources/functions/reset.php';
require THEME_PATH . '/resources/functions/initialize.php';
require THEME_PATH . '/resources/functions/assets.php';
require THEME_PATH . '/resources/functions/acf-options.php';
require THEME_PATH . '/resources/functions/menus.php';
require THEME_PATH . '/resources/functions/widgets.php';
require THEME_PATH . '/resources/functions/post-types.php';
require THEME_PATH . '/resources/functions/meta.php';
require THEME_PATH . '/resources/functions/images.php';
require THEME_PATH . '/resources/functions/helpers.php';
require THEME_PATH . '/resources/functions/template-tags.php';
require THEME_PATH . '/resources/functions/hooks.php';
require THEME_PATH . '/resources/functions/generate-styles.php';
require THEME_PATH . '/resources/functions/template-func.php';
require THEME_PATH . '/resources/functions/blocks.php';
require THEME_PATH . '/resources/functions/responsive-controls.php';

/**
 * Theme block gutenberg
 */
require THEME_PATH . '/editor/editor.php';

/**
 * Theme install
 */
require THEME_PATH . '/install/plugin-required.php';
require  THEME_PATH . '/install/import-pack/functions.php';
/**
 * SVG Icons class.
 */
require THEME_PATH . '/classes/class-goza-svg-icons.php';


if (class_exists('Tribe__Events__Main')) {
	/**
	 * Tribe Events.
	 */
	require THEME_PATH . '/tribe/events/v2/helper-functions.php';
	require THEME_PATH . '/tribe-events/helper-functions.php';
}

/**
 * Validation form comment
 */
add_action('wp_footer', 'goza_comment_validation_init');
function goza_comment_validation_init(){
  if(comments_open() ) { ?>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
      jQuery('#commentform').validate({
          rules: {
            author: {
              required: true,
              minlength: 2
            },
            email: {
              required: true,
              email: true
            },
            comment: {
              required: true,
              minlength: 20
            }
          },
          errorElement: "div",
          errorPlacement: function(error, element) {
            element.after(error);
          }
      });
    });
    </script>
    <?php
    }
}