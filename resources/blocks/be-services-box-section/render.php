<?php

/**
 * Be Services Box Section Template.
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
$class_name = 'be-services-box-section';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

$sbs_counterup_value    = __get_field('sbs_counterup_value') ?: '';
$sbs_button             = __get_field('sbs_button');
$sbs_content            = __get_field('sbs_content') ?: '';
$sbs_bg_image           = __get_field('sbs_bg_image') ?: 'https://picsum.photos/1920/650';
$sbs_bg_color_box       = __get_field('sbs_bg_color_box') ?: '#FFF';
$sbs_button_style       = __get_field('sbs_button_style') ?: ['goza_button_style' => 'btn-default'];

$styles = [];
if ($sbs_bg_image) {
    $styles[] = 'background-image: url(' . esc_url($sbs_bg_image) . ')';
}
$style  = implode('; ', $styles);
?>

<section <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="container">
        <div class="section-row section-wrap">
            <div class="section-wrap__col section-wrap__list">
                <?php if (have_rows('sbs_list_services_box')) : ?>
                    <div class="section-wrap__list-wrap">
                        <?php while (have_rows('sbs_list_services_box')) : the_row();
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $bg_image = get_sub_field('bg_image');
                        ?>
                            <div class="section-wrap__list-item" data-aos="zoom-in" data-aos-duration="1200">
                                <div class="section-wrap__list-item-wrap">
                                    <div class="section-wrap__list-default">
                                        <div class="image-wrap">
                                            <?php if ($icon) { ?>
                                                <img src="<?= esc_url($icon) ?>" alt="<?= esc_html($title) ?>" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="section-wrap__list-hover" style="background-image: url(<?= esc_url($bg_image) ?>)">
                                        <div class="section-wrap__list-hover-overlay">
                                            <h5 class="section-wrap__list-title"><?= esc_html($title) ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="section-wrap__col section-wrap__content">
                <div class="section-wrap__content-counterUp counterUp" data-aos="fade-up" data-aos-duration="1200"><?= esc_attr($sbs_counterup_value) ?></div>
                <?php if ($sbs_content) { ?>
                    <p class="section-wrap__content-desc" data-aos="fade-up" data-aos-duration="1200"><?= esc_attr($sbs_content) ?></p>
                <?php } ?>
                <div class="section-wrap__content-btn" data-aos="fade-up" data-aos-duration="1200">
                    <?php if (isset($sbs_button) && $sbs_button) {
                        goza_button_render($sbs_button, $sbs_button_style['goza_button_style']);
                    } ?>
                </div>

            </div>
        </div>
    </div>
</section>