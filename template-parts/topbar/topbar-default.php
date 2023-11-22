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
<div class="goza-topbar goza-topbar-default">
    <div class="container">
        <div class="row d-none d-lg-flex no-gutters text-center goza-topbar-inner">
            <?php if (isset($goza_en_social) && $goza_en_social) { ?>
                <div class="col-3 goza-topbar-item goza-topbar-social">
                    <span class="goza-topbar-social-label"><?= $goza_label_social ?></span>
                    <?php
                    if (have_rows('goza_social_network', 'option')) :
                        echo '<ul class="goza-topbar-social-list">';
                        while (have_rows('goza_social_network', 'option')) : the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('url');
                            echo '<li><a href="' . $url . '" target="_blank"><i class="fa fa-' . $icon['value'] . '" aria-hidden="true"></i></a></li>';
                        endwhile;
                        echo '</ul>';
                    endif;
                    ?>
                </div>
            <?php  } ?>
            <?php if (isset($goza_phone_number) && $goza_phone_number) { ?>
                <div class="col-3 goza-topbar-item goza-topbar-ep">
                    <a href="tel:<?= $goza_phone_number ?>"><i class="fa fa-phone" aria-hidden="true"></i><?= $goza_phone_number ?></a>
                </div>
            <?php  } ?>
            <?php if (isset($goza_email) && $goza_email) { ?>
                <div class="col-3 goza-topbar-item goza-topbar-ep">
                    <a href="mailto:<?= $goza_email ?>"><i class="fa fa-envelope" aria-hidden="true"></i><?= $goza_email ?></a>
                </div>
            <?php  } ?>
            <?php if (isset($goza_topbar_btn) && !empty($goza_topbar_btn)) { ?>
                <div class="col-3 goza-topbar-item goza-topbar-ep goza-topbar-link">
                    <a href="<?= $goza_url_button_url ?>" target="<?= $goza_url_button_target ?>"><i class="fa fa-heart" aria-hidden="true"></i><?= $goza_url_button_title ?></a>
                </div>
            <?php  } ?>
        </div>
        <div class="d-flex d-lg-none goza-topbar-inner goza-topbar-mobile">
            <?php if (isset($goza_email) && $goza_email) { ?>
                <div class="goza-topbar-item goza-topbar-ep">
                    <a href="mailto:<?= $goza_email ?>"><i class="fa fa-envelope" aria-hidden="true"></i>Send Us Email: <?= $goza_email ?></a>
                </div>
            <?php  } ?>
            <?php if (isset($goza_phone_number) && $goza_phone_number) { ?>
                <div class="goza-topbar-item goza-topbar-ep">
                    <a href="tel:<?= $goza_phone_number ?>"><i class="fa fa-phone" aria-hidden="true"></i>Call Us Now: <?= $goza_phone_number ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>