<?php
if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {

   // create id attribute for specific styling
   $id = 'be-single-event' . $block['id'];

   // create align class ("alignwide") from block setting ("wide")
   $align_class = $block['align'] ? 'align' . $block['align'] : '';
   $is_style    = isset($block['className']) ? $block['className'] : "is-style-default";

   // ACF field variables
   $ev_select = __get_field('event_sg_ev') ?: '';

   $args = array(
      'post_type' => 'tribe_events',
      'posts_per_page' => 1,
      'orderby' => 'meta_value',
      'meta_key' => '_EventStartDate',
      'order' => 'DESC',
   );

   if(!empty($ev_select)){
      $args['post__in']  = array();
      array_push($args['post__in'], $ev_select );
   }
   ob_start();
   $the_query = new WP_Query($args);
   ?>
   
   <section id="<?php echo $id; ?>" class="be-single-event <?php echo $align_class; ?> <?php echo $is_style ?>"> 
         <?php if ($the_query->have_posts()){ ?>
            <div class="be-single-event-inner"> 
               <?php while ($the_query->have_posts()){
                  $the_query->the_post(); 
                  single_ev_template($is_style );
               } ?>
            </div>
            <?php wp_reset_postdata(); ?>
         <?php } else{
            echo '<div class="be-not-found">No results found.</div>';
         } ?>
   </section>
   <?php
   wp_reset_postdata();
}