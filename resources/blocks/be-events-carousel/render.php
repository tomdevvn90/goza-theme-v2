<?php


// create id attribute for specific styling
$id     = 'be-events-carousel-' . $block['id'];
$classes = isset($block['className']) ? $block['className'] : "is-style-ngo-dark";


$args = [
   'post_type'   => 'tribe_events',
   'post_status' => 'publish',
   'orderby'     => 'meta_value',
   'meta_key'    => '_EventStartDate',
];

// ACF field variables
$query       = __get_field('query_ev_carousel');
$carousel_st = __get_field('cr_st_ev_carousel');
$sub_heading = __get_field('sub_hd_ev_carousel') ?: '';

// ACF Tab Style
$color_heading = __get_field('color_hd_ev_carousel') ?: '';
$color_sub_hd  = __get_field('color_sub_hd_ev_carousel') ?: '';
$color_content = __get_field('color_content_ev_carousel') ?: '';
$cta_style     = __get_field('cta_style_ev_carousel') ?: 'btn-default';

if (!empty($carousel_st) && isset($carousel_st)) {
   $data_carousel = array(
      'slidesToShow'   =>  $carousel_st['slidesToShow'] ? intval($carousel_st['slidesToShow']) : 1,
      'slidesToScroll' =>  $carousel_st['slidesToScroll'] ? intval($carousel_st['slidesToScroll']) : 1,
      'arrows'         =>  $carousel_st['arrows'] ?: false,
      'dots'           =>  $carousel_st['dots'] ?: false,
      'autoplay'       =>  $carousel_st['autoplay'] ?: false,
      'loop'           =>  $carousel_st['loop'] ?: false,
      'fade'           =>  $carousel_st['fade'] ?: false,
   );
}

if (!empty($query) && isset($query)) {
   $args['posts_per_page']  = (!empty($query['posts_per_page'])) ? $query['posts_per_page'] : -1;
   $args['post__in']        = (!empty($query['select_events'])) ? $query['select_events'] : [];
   $args['order']           = (!empty($query['order'])) ? $query['order'] : 'ASC';

   if (!empty($query['categories'])) {
      $args['tax_query'] = [
         array(
            'taxonomy' => 'tribe_events_cat',
            'field'    => 'term_id',
            'terms'    => $query['categories'],
         )
      ];
   }
}

ob_start();
$the_query = new WP_Query($args);
?>

<div id="<?php echo $id; ?>" class="be-events-carousel <?php echo $classes ?>">
   <?php if (is_plugin_active('the-events-calendar/the-events-calendar.php')) { ?>
      <?php if ($the_query->have_posts()) { ?>
         <div class="be-events-carousel-inner" data-carousel='<?= json_encode($data_carousel) ?>' data-aos="fade-up">
            <?php while ($the_query->have_posts()) {
               $the_query->the_post();
               $event_date = tribe_get_start_date(get_the_ID(), true, 'j M Y');
               $event_time = tribe_get_start_date(get_the_ID(), true, 'G:i a');
               $address    = tribe_get_address(get_the_ID());
            ?>

               <?php load_template_item_event($classes) ?>
            <?php } ?>
         </div>
      <?php } else {
         echo '<div class="be-not-found">No results found.</div>';
      } ?>
   <?php } else {
      echo '<div class="required-text" style="padding: 30px 0;">This block require The Events Calendar plugin. Please install follow link <a href="https://wordpress.org/plugins/the-events-calendar/" target="_blank">here</div>';
   } ?>
</div>
<?php
wp_reset_postdata();
