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

//Instagram
$goza_ft_ig_op = __get_field('goza_ft_ig_op', 'option');
if ($goza_ft_ig_op) {
    $goza_ig_heading = $goza_ft_ig_op['goza_ig_heading'];
    $goza_sc_ig      = $goza_ft_ig_op['goza_sc_ig'];
}

//newsletter
$goza_sub_news_op = __get_field('goza_sub_news_op', 'option');
if ($goza_sub_news_op) {
    $goza_newsletter_heading = $goza_sub_news_op['goza_newsletter_heading'];
    $goza_newsletter_desc = $goza_sub_news_op['goza_newsletter_desc'];
    $goza_sc_sub_form = $goza_sub_news_op['goza_sc_sub_form'];
}

//copyright
$goza_txt_copyright = __get_field('goza_txt_copyright', 'option');

// info
$goza_address      = __get_field('goza_address', 'option');
$goza_email        = __get_field('goza_email', 'option');
$goza_phone_number = __get_field('goza_phone_number', 'option');

$goza_social_network = __get_field('goza_social_network', 'option');
//logo
$logo = goza_get_logo_footer_site();
if ($logo) $goza_ft_logo = $logo;
?>

<footer id="site-footer" class="main-footer footer-water">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 main-footer-widget">
                <?php if ($goza_ft_logo) { ?>
                    <a href="/" class="main-footer-logo">
                        <img src="<?= esc_url($goza_ft_logo) ?>" alt="Logo" />
                    </a>
                <?php } ?>

                <?php if (isset($goza_newsletter_desc) && !empty($goza_newsletter_desc)) { ?>
                    <div class="main-footer-desc"><?= $goza_newsletter_desc ?></div>
                <?php } ?>

                <?php if (isset($goza_sc_sub_form) && !empty($goza_sc_sub_form)) { ?>
                    <div class="main-footer--form-newsletter"><?= do_shortcode($goza_sc_sub_form) ?></div>
                <?php } ?>
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

            <div class="col-md-6 col-lg-3 main-footer-widget">
                <?php if (isset($goza_ig_heading) && !empty($goza_ig_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_ig_heading ?></h3>
                <?php } ?>


                <?php if (isset($goza_sc_ig) && !empty($goza_sc_ig)) { ?>
                    <div class="main-footer--instagram"> <?= do_shortcode($goza_sc_ig) ?></div>
                <?php } ?>
            </div>

            <div class="col-md-6 col-lg-3 main-footer-widget">
                <?php if (isset($goza_general_heading) && !empty($goza_general_heading)) { ?>
                    <h3 class="main-footer-title"><?= $goza_general_heading ?></h3>
                <?php } ?>

                <div class="main-footer--info">
                    <?php if (!empty($goza_address) && isset($goza_address)) : ?>
                        <p class="main-footer--info-item __address">
                            <span>Address:</span> <?= esc_attr($goza_address) ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($goza_phone_number) && isset($goza_phone_number)) : ?>
                        <p class="main-footer--info-item __phone">
                            <span>Phone:</span> <a href="tel:<?= esc_url($goza_phone_number) ?>"> <?= esc_attr($goza_phone_number) ?> </a>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($goza_email) && isset($goza_email)) : ?>
                        <p class="main-footer--info-item __email">
                            <span>Email:</span> <a href="maitol:<?= esc_url($goza_email) ?>"> <?= esc_attr($goza_email) ?> </a>
                        </p>
                    <?php endif; ?>
                </div>

                <?php
                if (isset($goza_social_network) && !empty($goza_social_network)) :
                    if (have_rows('goza_social_network', 'option')) : ?>
                        <ul class="main-footer-social">
                            <?php
                            while (have_rows('goza_social_network', 'option')) : the_row();
                                $icon = get_sub_field('icon');
                                $url = get_sub_field('url');
                                echo '<li><a href="' . esc_url($url) . '" target="_blank"><i class="fa fa-' . esc_attr($icon['value']) . '" aria-hidden="true"></i></a></li>';
                            endwhile; ?>
                        </ul>
                <?php
                    endif;
                endif;
                ?>
            </div>
        </div>
        <div class="main-footer-socket">
            <?php if (isset($goza_txt_copyright) && !empty($goza_txt_copyright)) { ?>
                <p><?= $goza_txt_copyright ?></p>
            <?php } ?>
            <div id="back-to-top"><span>Back to top</span> <i class="fa fa-chevron-up" aria-hidden="true"></i></div>
        </div>
    </div>

</footer>