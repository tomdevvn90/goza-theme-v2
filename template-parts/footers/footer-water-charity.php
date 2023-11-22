<?php

//general
$goza_ft_general_op = __get_field('goza_ft_general_op', 'option');
if ($goza_ft_general_op) {
    $goza_ft_logo = $goza_ft_general_op['goza_ft_logo'];
    $goza_general_heading = $goza_ft_general_op['goza_general_heading'];
    $goza_general_content = $goza_ft_general_op['goza_general_content'];
}

//newsletter
$goza_sub_news_op = __get_field('goza_sub_news_op', 'option');
if ($goza_sub_news_op) {
    $goza_newsletter_heading = $goza_sub_news_op['goza_newsletter_heading'];
    $goza_newsletter_desc = $goza_sub_news_op['goza_newsletter_desc'];
    $goza_sc_sub_form = $goza_sub_news_op['goza_sc_sub_form'];
}
$goza_social_network = __get_field('goza_social_network', 'option');
//copyright
$goza_txt_copyright = __get_field('goza_txt_copyright', 'option');
?>

<footer id="site-footer" class="main-footer footer-water-charity">
    <div class="container">
        <?php if (isset($goza_general_heading) && !empty($goza_general_heading)) { ?>
            <h5 class="main-footer-subtitle text-center"><?= $goza_general_heading ?></h5>
        <?php } ?>

        <?php if (isset($goza_general_content) && !empty($goza_general_content)) { ?>
            <div class="main-footer-title  text-center"><?= $goza_general_content ?></div>
        <?php } ?>
        <div class="row d-flex align-items-center flex-wrap main-footer-subsocial">
            <div class="col-xl-8 col-lg-7 main-footer-newsletter">
                <?php if (isset($goza_sc_sub_form) && !empty($goza_sc_sub_form)) { ?>
                    <?= do_shortcode($goza_sc_sub_form) ?>
                <?php } ?>
            </div>
            <div class="col-xl-4 col-lg-5 main-footer-social">
                <?php
                if (isset($goza_social_network) && !empty($goza_social_network)) :
                    if (have_rows('goza_social_network', 'option')) :
                        echo '<ul class="main-footer-social-list">';
                        while (have_rows('goza_social_network', 'option')) : the_row();
                            $social_icon = get_sub_field('icon');
                            $social_url = get_sub_field('url');
                            echo '<li><a href="' . $social_url . '" target="_blank" class="social-' . $social_icon['value'] . '" rel="nofollow"><i class="fa fa-' . $social_icon['value'] . '" aria-hidden="true"></i></a></li>';
                        endwhile;
                        echo '</ul>';
                    endif;
                endif;
                ?>
            </div>
        </div>
        <?php if (isset($goza_txt_copyright) && !empty($goza_txt_copyright)) { ?>
            <div class="main-footer-copyright"><?= $goza_txt_copyright ?></div>
        <?php } ?>
        <div class="main-footer-socket-menu">
            <?php
            if (has_nav_menu('privacy-menu')) {
                wp_nav_menu([
                    'theme_location' => 'privacy-menu',
                    'menu_class' => 'privacy-menu',
                    'container_class' => 'menu-container',
                    'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                    'bootstrap' => false
                ]);
            }
            ?>
        </div>
    </div>
</footer>