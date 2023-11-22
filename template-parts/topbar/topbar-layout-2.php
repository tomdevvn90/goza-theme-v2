<?php
$goza_topbar_options = __get_field('goza_topbar_options', 'option');
$goza_phone_number = __get_field('goza_phone_number', 'option');
$goza_email = __get_field('goza_email', 'option');
$goza_en_social = $goza_topbar_options['goza_en_social'];
$goza_label_social = $goza_topbar_options['goza_label_social'];
$goza_topbar_btn = $goza_topbar_options['goza_topbar_btn'];
if ($goza_topbar_btn) {
    $goza_url_button_title = $goza_topbar_btn['title'];
    $goza_url_button_url = $goza_topbar_btn['url'];
    $goza_url_button_target = $goza_topbar_btn['target'];
}
?>
<div class="goza-topbar goza-topbar-layout2">
    <div class="container">
        <div class="d-none d-lg-flex justify-content-between align-items-center goza-topbar-inner">
            <div class="d-flex align-items-center flex-wrap goza-topbar-inner-info">
                <?php if (isset($goza_email) && $goza_email) { ?>
                    <div class="goza-topbar-ep">
                        <a href="mailto:<?= $goza_email ?>"><i class="fa fa-envelope" aria-hidden="true"></i>Send Us Email: <?= $goza_email ?></a>
                    </div>
                <?php  } ?>
                <?php if (isset($goza_phone_number) && $goza_phone_number) { ?>
                    <div class="goza-topbar-ep">
                        <a href="tel:<?= $goza_phone_number ?>"><i class="fa fa-phone" aria-hidden="true"></i>Call Us Now: <?= $goza_phone_number ?></a>
                    </div>
                <?php  } ?>
            </div>

            <?php if (isset($goza_en_social) && $goza_en_social) { ?>
                <div class="goza-topbar-social">
                    <?php
                    if (have_rows('goza_social_network', 'option')) :
                        echo '<ul class="goza-topbar-social-list">';
                        while (have_rows('goza_social_network', 'option')) : the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('url');
                            echo '<li><a class="' . $icon['value'] . '" href="' . $url . '" target="_blank"><i class="fa fa-' . $icon['value'] . '" aria-hidden="true"></i></a></li>';
                        endwhile;
                        echo '</ul>';
                    endif;
                    ?>
                </div>
            <?php  } ?>
        </div>
        <div class="d-flex align-items-center justify-content-center flex-wrap d-lg-none goza-topbar-inner goza-topbar-mobile">
            <?php if (isset($goza_email) && $goza_email) { ?>
                <div class="goza-topbar-item goza-topbar-ep">
                    <a href="mailto:<?= $goza_email ?>"><i class="fa fa-envelope" aria-hidden="true"></i>Send Us Email: <?= $goza_email ?></a>
                </div>
            <?php  } ?>
            <?php if (isset($goza_phone_number) && $goza_phone_number) { ?>
                <div class="goza-topbar-item goza-topbar-ep">
                    <a href="tel:<?= $goza_phone_number ?>"><i class="fa fa-phone" aria-hidden="true"></i>Call Us Now: <?= $goza_phone_number ?></a>
                </div>
            <?php  } ?>
        </div>
    </div>
</div>