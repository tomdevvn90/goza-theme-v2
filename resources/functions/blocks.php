<?php

/**
 * Blocks
 *
 * @package      Goza
 * @author       Beplus Team
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

/**
 * Load Blocks
 */
function goza_load_blocks()
{
    $blocks = goza_get_blocks();
    foreach ($blocks as $block) {
        if (file_exists(get_template_directory() . '/resources/blocks/' . $block . '/block.json')) {
            register_block_type(get_template_directory() . '/resources/blocks/' . $block . '/block.json');
            if (file_exists(get_template_directory() . '/resources/blocks/' . $block . '/init.php')) {
                include_once get_template_directory() . '/resources/blocks/' . $block . '/init.php';
            }
        }
    }
}
add_action('init', 'goza_load_blocks');


/**
 * Get Blocks
 */
function goza_get_blocks()
{
    $blocks  = get_option('goza_blocks');
    $blocks = scandir(get_template_directory() . '/resources/blocks/');
    $blocks = array_values(array_diff($blocks, array('..', '.', '.DS_Store', '_base-block')));
    update_option('goza_blocks', $blocks);
    return $blocks;
}

/**
 * Block categories
 *
 * @since 1.0.0
 */
function goza_block_categories($categories)
{
    // Check to see if we already have a Goza Theme category
    $include = true;
    foreach ($categories as $category) {
        if ('goza-theme' === $category['slug']) {
            $include = false;
        }
    }

    if ($include) {
        $categories = array_merge(
            $categories, [[
                    'slug'  => 'goza-theme',
                    'title' => __('Goza Theme', 'goza'),
                    'icon'  => ''
                ]]
        );
    } 

    return $categories;
}
add_filter('block_categories_all', 'goza_block_categories');
