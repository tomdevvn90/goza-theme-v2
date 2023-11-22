<?php

$goza_phone_number = __get_field('goza_phone_number', 'option');
$goza_email = __get_field('goza_email', 'option');
$goza_address = __get_field('goza_address', 'option');

//general
$goza_ft_general_op = __get_field('goza_ft_general_op', 'option');
if ($goza_ft_general_op) {
    $goza_ft_logo = $goza_ft_general_op['goza_ft_logo'];
    $goza_general_heading = $goza_ft_general_op['goza_general_heading'];
    $goza_general_content = $goza_ft_general_op['goza_general_content'];
}

//quicklink
$goza_ft_quick_links_op = __get_field('goza_ft_quick_links_op', 'option');
if ($goza_ft_quick_links_op) {
    $goza_ql_heading = $goza_ft_quick_links_op['goza_ql_heading'];
}

//Gallery
$goza_ft_gallery_op = __get_field('goza_ft_gallery_op', 'option');
if ($goza_ft_gallery_op) {
    $goza_gallery_heading = $goza_ft_gallery_op['goza_gallery_heading'];
    $goza_ft_gallery = $goza_ft_gallery_op['goza_ft_gallery'];
}

//newsletter
$goza_sub_news_op = __get_field('goza_sub_news_op', 'option');
if ($goza_sub_news_op) {
    $goza_sc_sub_form = $goza_sub_news_op['goza_sc_sub_form'];
}

//copyright
$goza_txt_copyright = __get_field('goza_txt_copyright', 'option');
?>

<footer id="site-footer" class="main-footer footer-ngo-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-3 main-footer-widget">
                <?php if (isset($goza_general_heading) && !empty($goza_general_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_general_heading ?></h3>
                <?php } ?>
                <?php if (isset($goza_general_content) && !empty($goza_general_content)) { ?>
                    <div class="main-footer-desc"><?= $goza_general_content ?></div>
                <?php } ?>

                <?php if (isset($goza_email) && !empty($goza_email)) { ?>
                    <p class="main-footer-info"><a href="mailto:<?= esc_attr($goza_email) ?>"><i class="fa fa-envelope-open-o"></i><span><?= esc_attr($goza_email) ?></span></a></p>
                <?php } ?>
                <?php if (isset($goza_phone_number) && !empty($goza_phone_number)) { ?>
                    <p class="main-footer-info"><a href="tel:<?= esc_attr($goza_phone_number) ?>"><i class="fa fa-phone"></i><span><?= esc_attr($goza_phone_number) ?></span></a></p>
                <?php } ?>
                <?php if (isset($goza_address) && !empty($goza_address)) { ?>
                    <p class="main-footer-info"><i class="fa fa-map-marker"></i><span><?= esc_attr($goza_address) ?></span></p>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-6 main-footer-widget">
                <div class="main-footer-gallery">
                    <?php if ($goza_ft_gallery) { ?>
                        <div id="main-footer-gallery-list" class="main-footer-gallery-list">
                            <?php foreach ($goza_ft_gallery as $item) { ?>
                                <a class="main-footer-gallery-item" href="<?= esc_url($item['url']); ?>" title="<?= esc_attr($item['title']); ?>">
                                    <img src="<?= esc_url($item['url']); ?>" alt="<?= esc_attr($item['alt']); ?>" />
                                    <span class="main-footer-gallery-list-item-icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="main-footer-newsletter">
                    <?php if (isset($goza_sc_sub_form) && !empty($goza_sc_sub_form)) { ?>
                        <?= do_shortcode($goza_sc_sub_form) ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 main-footer-widget">
                <?php if (isset($goza_ql_heading) && !empty($goza_ql_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_ql_heading ?></h3>
                <?php } ?>
                <div class="main-footer-menu">
                    <?php
                    if (has_nav_menu('quicklinks-menu')) {
                        wp_nav_menu([
                            'theme_location' => 'quicklinks-menu',
                            'menu_class' => 'quicklinks-menu',
                            'container_class' => 'menu-container',
                            'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                            'bootstrap' => false
                        ]);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="main-footer-socket">
        <div class="container">
            <?php if (isset($goza_txt_copyright) && !empty($goza_txt_copyright)) { ?>
                <p><?= $goza_txt_copyright ?></p>
            <?php } ?>
        </div>
    </div>
</footer>