<?php
//Background footer
$bg_footer = __get_field('goza_ft_bg_image', 'option');
if ($bg_footer) {
    $style = 'background-image: url(' . $bg_footer . ')';
}
//General
$goza_ft_general_op = __get_field('goza_ft_general_op', 'option');
if ($goza_ft_general_op) {
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
}
//
$goza_txt_copyright = __get_field('goza_txt_copyright', 'option');

$goza_social_network = __get_field('goza_social_network', 'option');
?>
<footer id="site-footer" class="main-footer footer-default" style="<?= esc_attr($style) ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 main-footer-widget">
                <?php if (isset($goza_general_heading) && !empty($goza_general_heading)) { ?>
                    <h3 class='main-footer-heading heading-general'><?= esc_attr($goza_general_heading) ?></h3>
                <?php } ?>
                <?php if (isset($goza_general_content) && !empty($goza_general_content)) { ?>
                    <div class='main-footer-content'><?= $goza_general_content ?></div>
                <?php } ?>
            </div>

            <div class="col-md-6 col-lg-2 main-footer-widget">
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

            <div class="col-md-6 col-lg-2 main-footer-widget">
                <?php if (isset($goza_social_heading) && !empty($goza_social_heading)) { ?>
                    <h3 class='main-footer-heading'><?= esc_attr($goza_social_heading) ?></h3>
                <?php } ?>
                <?php
                if (isset($goza_social_network) && !empty($goza_social_network)) :
                    if (have_rows('goza_social_network', 'option')) :
                        echo '<ul class="main-footer-social">';
                        while (have_rows('goza_social_network', 'option')) : the_row();
                            $social_text = get_sub_field('icon');
                            $social_url = get_sub_field('url');
                            echo '<li><a href="' . $social_url . '" target="_blank" rel="nofollow">' . $social_text['label'] . '</a></li>';
                        endwhile;
                        echo '</ul>';
                    endif;
                endif;
                ?>
            </div>

            <div class="col-md-6 col-lg-4 main-footer-widget">
                <?php if (isset($goza_newsletter_heading) && !empty($goza_newsletter_heading)) { ?>
                    <h3 class='main-footer-heading'><?= esc_attr($goza_newsletter_heading) ?></h3>
                <?php } ?>
                <div class="main-footer-subscribe">
                    <?php echo do_shortcode($goza_sc_sub_form) ?>
                </div>
            </div>
        </div>
        <div class="main-footer-socket">
            <div class="main-footer-socket-copyright">
                <?php if (isset($goza_txt_copyright) && !empty($goza_txt_copyright)) { ?>
                    <?= $goza_txt_copyright ?>
                <?php } ?>
            </div>
            <div class="main-footer-socket-menu">
                <?php
                if (has_nav_menu('privacy-menu')) {
                    wp_nav_menu([
                        'theme_location' => 'privacy-menu',
                        'menu_class' => 'privacy-menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                        'bootstrap' => false
                    ]);
               }
                ?>
            </div>
        </div>
    </div>
</footer>