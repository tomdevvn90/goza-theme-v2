<?php 
// create id attribute for specific styling
$id = 'be-ss-hero-'.$block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$location = __get_field('location_google_map_block');
$height = __get_field('height_google_map_block');

$height_style = !empty( $height )? '--google-map-height:'.$height.'px;' : '';

?>
<section id="<?php echo $id; ?>" class="be-google-map <?php echo $align_class; ?>">
    <div class="be-google-map--content">
        <div class="be-google-map-box" style="<?php echo $height_style; ?>">
            <?php
            if ( !empty( $location ) ) {
               echo $location;
            }else{
                echo '<p>Please Embed Google Map!</p>';
            }
            ?>
        </div>
    </div>
</section>


