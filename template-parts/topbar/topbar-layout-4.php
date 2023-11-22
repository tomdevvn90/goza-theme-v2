<?php
$goza_topbar_options = __get_field('goza_topbar_options', 'option');
$goza_phone_number   = __get_field('goza_phone_number', 'option');
$goza_email          = __get_field('goza_email', 'option');
$goza_en_social      = $goza_topbar_options['goza_en_social'];
$goza_label_social   = $goza_topbar_options['goza_label_social'];
$goza_topbar_btn     = $goza_topbar_options['goza_topbar_btn'];
if ($goza_topbar_btn) {
    $goza_url_button_title  = $goza_topbar_btn['title'];
    $goza_url_button_url    = $goza_topbar_btn['url'];
    $goza_url_button_target = $goza_topbar_btn['target'];
}
?>
<div class="goza-topbar goza-topbar-layout4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center goza-topbar-inner">
            <div class="d-flex align-items-center flex-wrap goza-topbar-inner-info">
                <?php if (isset($goza_email) && $goza_email) { ?>
                    <div class="goza-topbar-ep">
                        <a href="mailto:<?= $goza_email ?>"><i class="fa fa-envelope" aria-hidden="true"></i><span>Email:</span> <?= $goza_email ?></a>
                    </div>
                <?php  } ?>
                <?php if (isset($goza_phone_number) && $goza_phone_number) { ?>
                    <div class="goza-topbar-ep">
                        <a href="tel:<?= $goza_phone_number ?>"><i class="fa fa-phone" aria-hidden="true"></i><span>In Emergency:</span> <?= $goza_phone_number ?></a>
                    </div>
                <?php  } ?>
            </div>

            <?php if (isset($goza_topbar_btn) && !empty($goza_topbar_btn)) { ?>
                <div class="goza-topbar-item goza-topbar-ep goza-topbar-link">
                    <a href="<?= $goza_url_button_url ?>" target="<?= $goza_url_button_target ?>"><i class="fa fa-user" aria-hidden="true"></i><?= $goza_url_button_title ?></a>
                </div>
            <?php  } ?>
        </div>
    </div>
</div>