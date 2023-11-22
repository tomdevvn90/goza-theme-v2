<?php

/**
 * Box Grid Post Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
   $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'be-grid-post-block';
if (!empty($block['className'])) {
   $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
   $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$gp_order          = __get_field('gp_order') ?: 'DESC';
$gp_orderby        = __get_field('gp_orderby') ?: 'date';
$gp_ppp            = __get_field('gp_ppp') ?: 4;
$gp_categories     = __get_field('gp_categories') ?: '';

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
   <div class="be-grid-post-wrap">
      <?php
      $args = [
         'post_type'       => 'post',
         'order'           => $gp_order,
         'orderby'         => $gp_orderby,
         'posts_per_page'  => $gp_ppp,
         'post_status'  => 'publish',
      ];

      if ($gp_categories) {
         $args['tax_query'] = [[
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $gp_categories,
         ]];
      }

      $the_query = new WP_Query($args);

      if ($the_query->have_posts()) {
         echo '<div class="be-grid-post__list">';
         while ($the_query->have_posts()) {
            $the_query->the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: 'https://placehold.co/600x400?text=Hello+World';
      ?>
            <div class="be-grid-post__item">
               <a href="<?php echo esc_url(get_permalink()) ?>" class="be-grid-post__item-image">
                  <img src="<?php echo esc_url($featured_img_url) ?>" data-aos="zoom-in" data-aos-duration="800" alt="<?php echo esc_html(get_the_title()) ?>" />
               </a>
               <div class="be-grid-post__item-content">
                  <span class="be-grid-post__item-date" data-aos="fade-up" data-aos-duration="800"><?php esc_attr_e(get_the_date('d M, Y')) ?></span>
                  <h4 class="be-grid-post__item-title" data-aos="fade-up" data-aos-duration="800"><a href="<?php echo esc_url(get_permalink()) ?>"><?php echo esc_html(get_the_title()) ?></a></h4>
                  <div class="be-grid-post__item-meta" data-aos="fade-up" data-aos-duration="800">
                     <span><?php esc_html_e('by ' . get_the_author()) ?></span>
                     <span><i class="fa fa-comment" aria-hidden="true"></i> <?php esc_attr_e(get_comments_number()) ?></span>
                  </div>
               </div>
            </div>
      <?php
         }
         echo '</div>';
      } else {
         esc_html_e('Sorry, no posts matched your criteria.');
      }
      wp_reset_postdata();
      ?>
   </div>
</div>