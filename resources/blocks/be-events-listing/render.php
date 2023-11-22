<?php
if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {
   // create id attribute for specific styling
   $id = 'be-events-listing-' . $block['id'];

   // ACF field variables
   $ev_posts_per_page = __get_field('ev_posts_per_page') ?: 3;
   $ev_select_events  = __get_field('ev_select_events') ?: [];
   $ev_taxonomy       = __get_field('ev_taxonomy') ?: [];
   $ev_order          = __get_field('ev_order') ?: 'ASC';
   $ev_heading_color  = __get_field('ev_heading_color') ?: '#333';
   $ev_desc_color     = __get_field('ev_desc_color') ?: '#333';

   $classes = !empty($block['className']) ? $block['className'] : "is-style-default";

   $args = [
      'post_type'   => 'tribe_events',
      'post_status' => 'publish'
   ];

   $args['posts_per_page']  = $ev_posts_per_page;
   $args['post__in']        = $ev_select_events;
   $args['order']           = $ev_order;

   if (!empty($ev_taxonomy)) {
      $args['tax_query'] = [
         array(
            'taxonomy' => 'tribe_events_cat',
            'field'    => 'term_id',
            'terms'    => $ev_taxonomy,
         )
      ];
   }

   ob_start();
   $the_query = new WP_Query($args);
   ?>

   <div id="<?php echo $id; ?>" class="be-events-listing-block <?php echo $classes ?>" style="--title-color:<?= esc_attr($ev_heading_color) ?>; --desc-color : <?= esc_attr($ev_desc_color) ?>">
      <?php if (is_plugin_active('the-events-calendar/the-events-calendar.php')) { ?>
         <?php if ($the_query->have_posts()) { ?>
            <div class="be-events-listing-block-inner">
               <?php while ($the_query->have_posts()) {
                  $the_query->the_post();
                  be_item_event($classes);
               } ?>
            </div>
         <?php } else {
            echo '<div class="be-not-found">No results found.</div>';
         }
         ?>
      <?php } else {
         echo '<div class="required-text" style="padding: 30px 0;">This block require The Events Calendar plugin. Please install follow link <a href="https://wordpress.org/plugins/the-events-calendar/" target="_blank">here</div>';
      } ?>
   </div>
   <?php
   wp_reset_postdata();
}
