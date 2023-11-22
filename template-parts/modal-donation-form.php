<?php
/*
** Template modal donation form popup
*/
?>
<?php
$goza_form_donation = __get_field('goza_form_donation', 'option');


?>
<div id="goza-modal-donation-form" class="goza-donation-form">
    <div class="goza-donation-form__inner">
        <div class="goza-donation-form__wrap">
            <button title="Close (Esc)" type="button" class="goza-form-close">×</button>
            <?php echo do_shortcode('[give_form show_title="true" show_goal="false" show_content="false" display_style="onpage" id="' . $goza_form_donation->ID . '"]'); ?>
        </div>
    </div>
</div>