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

//Social
$goza_ft_socials_op = __get_field('goza_ft_socials_op', 'option');
if ($goza_ft_socials_op) {
    $goza_social_heading = $goza_ft_socials_op['goza_social_heading'];
}
//newsletter
$goza_sub_news_op = __get_field('goza_sub_news_op', 'option');
if ($goza_sub_news_op) {
    $goza_sc_sub_form = $goza_sub_news_op['goza_sc_sub_form'];
}

//copyright
$goza_txt_copyright = __get_field('goza_txt_copyright', 'option');

$goza_social_network = __get_field('goza_social_network', 'option');

//logo
$logo = goza_get_logo_footer_site();
if ($logo) $goza_ft_logo = $logo;
?>

<footer id="site-footer" class="main-footer footer-charity-organization">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4 main-footer-widget">
                <?php if ($goza_ft_logo) { ?>
                    <a href="/" class="main-footer-logo">
                        <img src="<?= esc_url($goza_ft_logo) ?>" alt="Logo" />
                    </a>
                <?php } ?>
                <?php if (isset($goza_general_content) && !empty($goza_general_content)) { ?>
                    <div class="main-footer-desc"><?= $goza_general_content ?></div>
                <?php } ?>

            </div>

            <div class="col-md-6 col-lg-4 col-xl-5 main-footer-widget">
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

            <div class="col-md-6 col-lg-4 col-xl-3 main-footer-widget">
                <?php if (isset($goza_social_heading) && !empty($goza_social_heading)) { ?>
                    <h3 class='main-footer-title'><?= esc_attr($goza_social_heading) ?></h3>
                <?php } ?>
                <?php
                if (isset($goza_social_network) && !empty($goza_social_network)) :
                    if (have_rows('goza_social_network', 'option')) :
                        echo '<ul class="main-footer-social">';
                        while (have_rows('goza_social_network', 'option')) : the_row();
                            $social_icon = get_sub_field('icon');
                            $social_url = get_sub_field('url');
                            echo '<li><a href="' . $social_url . '" target="_blank" rel="nofollow"><i class="fa fa-' . $social_icon['value'] . '" aria-hidden="true"></i></a></li>';
                        endwhile;
                        echo '</ul>';
                    endif;
                endif;
                ?>
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