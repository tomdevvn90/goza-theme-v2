<?php
//Background footer
$bg_footer = __get_field('goza_ft_bg_image', 'option');
if ($bg_footer) {
    $style = 'background-image: url(' . $bg_footer . ')';
}
//General
$goza_ft_general_op = __get_field('goza_ft_general_op', 'option');
if ($goza_ft_general_op) {
    $goza_ft_logo = $goza_ft_general_op['goza_ft_logo'];
    $goza_general_heading = $goza_ft_general_op['goza_general_heading'];
    $goza_general_content = $goza_ft_general_op['goza_general_content'];
}
//quicklinks
$goza_ft_quick_links_op = __get_field('goza_ft_quick_links_op', 'option');
if ($goza_ft_quick_links_op) {
    $goza_ql_heading = $goza_ft_quick_links_op['goza_ql_heading'];
}
//Social
$goza_ft_socials_op = __get_field('goza_ft_socials_op', 'option');
if ($goza_ft_socials_op) {
    $goza_social_heading = $goza_ft_socials_op['goza_social_heading'];
}
//newsletter
$goza_sub_news_op = __get_field('goza_sub_news_op', 'option');
if ($goza_sub_news_op) {
    $goza_newsletter_heading = $goza_sub_news_op['goza_newsletter_heading'];
    $goza_sc_sub_form = $goza_sub_news_op['goza_sc_sub_form'];
    $goza_newsletter_desc = $goza_sub_news_op['goza_newsletter_desc'];
}
//
$goza_txt_copyright = __get_field('goza_txt_copyright', 'option');
$goza_social_network = __get_field('goza_social_network', 'option');
//logo
$logo = goza_get_logo_footer_site();
if ($logo) $goza_ft_logo = $logo;
?>
<footer id="site-footer" class="main-footer footer-earthquake" style="<?= esc_attr($style) ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3 main-footer-widget">
                <?php if ($goza_ft_logo) { ?>
                    <a href="/" class="main-footer-logo">
                        <img src="<?= esc_url($goza_ft_logo) ?>" alt="Logo" />
                    </a>
                <?php } ?>
                <?php
                if (isset($goza_social_network) && !empty($goza_social_network)) :
                    if (have_rows('goza_social_network', 'option')) :
                        echo '<ul class="main-footer-social">';
                        while (have_rows('goza_social_network', 'option')) : the_row();
                            $social_text = get_sub_field('icon');
                            $social_url = get_sub_field('url');
                            echo '<li><a href="' . $social_url . '" target="_blank" class="' . $social_text['label'] . '" rel="nofollow"></a></li>';
                        endwhile;
                        echo '</ul>';
                    endif;
                endif;
                ?>
            </div>

            <div class="col-md-6 col-lg-6 main-footer-widget">
                <?php if (isset($goza_general_content) && !empty($goza_general_content)) { ?>
                    <div class='main-footer-content'><?= $goza_general_content ?></div>
                <?php } ?>
                <?php if (isset($goza_ql_heading) && !empty($goza_ql_heading)) { ?>
                    <h3 class='main-footer-heading'><?= esc_attr($goza_ql_heading) ?></h3>
                <?php } ?>
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

            <div class="col-md-3 col-lg-3 main-footer-widget">
                <div class="newsletter-form-box">
                    <?php if (isset($goza_newsletter_heading) && !empty($goza_newsletter_heading)) { ?>
                        <h3 class='main-footer-heading'><?= esc_attr($goza_newsletter_heading) ?></h3>
                    <?php } ?>
                    <?php if (isset($goza_newsletter_desc) && !empty($goza_newsletter_desc)) { ?>
                        <div class="main-footer-desc"><?= $goza_newsletter_desc ?></div>
                    <?php } ?>
                    <div class="main-footer-subscribe">
                        <?php echo do_shortcode($goza_sc_sub_form) ?>
                    </div>
                </div>
                <div class="main-footer-socket-copyright">
                    <?php if (isset($goza_txt_copyright) && !empty($goza_txt_copyright)) { ?>
                        <?= $goza_txt_copyright ?>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</footer>