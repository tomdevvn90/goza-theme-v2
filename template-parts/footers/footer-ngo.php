<?php

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

//newsletter
$goza_sub_news_op = __get_field('goza_sub_news_op', 'option');
if ($goza_sub_news_op) {
    $goza_newsletter_heading = $goza_sub_news_op['goza_newsletter_heading'];
    $goza_newsletter_desc = $goza_sub_news_op['goza_newsletter_desc'];
    $goza_sc_sub_form = $goza_sub_news_op['goza_sc_sub_form'];
}

//Gallery
$goza_ft_gallery_op = __get_field('goza_ft_gallery_op', 'option');
if ($goza_ft_gallery_op) {
    $goza_gallery_heading = $goza_ft_gallery_op['goza_gallery_heading'];
    $goza_ft_gallery = $goza_ft_gallery_op['goza_ft_gallery'];
}

//copyright
$goza_txt_copyright = __get_field('goza_txt_copyright', 'option');

//logo
$logo = goza_get_logo_footer_site();
if ($logo) $goza_ft_logo = $logo;
?>

<footer id="site-footer" class="main-footer footer-ngo">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-3 main-footer-widget">
                <?php if ($goza_ft_logo) { ?>
                    <a href="/" class="main-footer-logo">
                        <img src="<?= esc_url($goza_ft_logo) ?>" alt="Logo" />
                    </a>
                <?php } ?>
                <?php if (isset($goza_general_content) && !empty($goza_general_content)) { ?>
                    <div class="main-footer-desc"><?= $goza_general_content ?></div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-xl-3 main-footer-widget">
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
            <div class="col-md-6 col-xl-3 main-footer-widget">
                <?php if (isset($goza_newsletter_heading) && !empty($goza_newsletter_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_newsletter_heading ?></h3>
                <?php } ?>

                <?php if (isset($goza_newsletter_desc) && !empty($goza_newsletter_desc)) { ?>
                    <div class="main-footer-desc"><?= $goza_newsletter_desc ?></div>
                <?php } ?>

                <?php if (isset($goza_sc_sub_form) && !empty($goza_sc_sub_form)) { ?>
                    <?= do_shortcode($goza_sc_sub_form) ?>
                <?php } ?>

            </div>
            <div class="col-md-6 col-xl-3 main-footer-widget">
                <?php if (isset($goza_gallery_heading) && !empty($goza_gallery_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_gallery_heading ?></h3>
                <?php } ?>
                <div class="main-footer-gallery">
                    <?php if ($goza_ft_gallery) { ?>
                        <div id="main-footer-gallery-list" class="main-footer-gallery-list">
                            <?php foreach ($goza_ft_gallery as $item) { ?>
                                <a class="main-footer-gallery-list-item" href="<?= esc_url($item['url']); ?>" title="<?= esc_attr($item['title']); ?>">
                                    <img src="<?= esc_url($item['url']); ?>" alt="<?= esc_attr($item['alt']); ?>" />
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
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