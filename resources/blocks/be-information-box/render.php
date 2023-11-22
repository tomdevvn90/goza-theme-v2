<?php 
// create id attribute for specific styling
$id = 'be-ss-hero-'.$block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

$infomation_list = __get_field('infomation_list_block');

$info_bg_color = __get_field('infomation_bg_color_block');
$info_text_color = __get_field('text_color_infomation_block');
$info_margin_top = __get_field('margin_top_infomation_block');
$info_box_shadow = __get_field('box_shadow_infomation_block');
$info_animation = __get_field('animation_infomation_block');

$info_bg_color_style = !empty($info_bg_color)? 'background-color:'.$info_bg_color.';' : '';
$info_text_color_style = !empty($info_text_color)? 'color:'.$info_text_color.';' : '';
$info_margin_top_style = !empty($info_margin_top)? 'margin-top:'.$info_margin_top.'px;' : '';

$shadow_class = ($info_box_shadow)? 'shadow' : '';
$data_aos_animated = ($info_animation != 'none')? $info_animation : '';

?>
<section id="<?php echo $id; ?>" class="be-infomation-section <?php echo $align_class; ?>">
    <div class="be-infomation-box">
        <div data-aos="<?php echo $data_aos_animated; ?>" class="be-infomation-list <?php echo $shadow_class; ?>" style="<?php echo $info_bg_color_style; ?><?php echo $info_margin_top_style; ?>">
            <?php if ( !empty( $infomation_list ) ) {
                
                foreach ($infomation_list as $key => $value) {
                    $field_type = $value['field_type'];
                    $phone_list = $value['phone'];
                    $email_list = $value['email'];

                   ?>
                    <div class="be-infmation-item">
                        <?php if( !empty( $value['icon']['url'] ) ): ?>
                        <div class="be-infmation-item--icon-wrap">
                            <img src="<?php echo esc_url( $value['icon']['url']); ?>" alt="<?php echo esc_attr( $value['icon']['alt'] ); ?>">
                        </div>
                        <?php endif; ?>
                        <?php if( !empty( $value['text'] ) || !empty( $phone_list ) || !empty( $email_list ) ): ?>
                        <div class="be-infmation-item--content-wrap">
                            <?php if( $field_type == 'text' && !empty( $value['text'] ) ): ?>
                                <div class="be-infmation-item--text" style="<?php echo $info_text_color_style; ?>">
                                    <?php echo esc_attr($value['text']); ?>
                                </div>
                            <?php endif; ?>
                            <?php if( $field_type === 'phone' && !empty( $phone_list ) ): ?>
                                <div class="be-infmation-item--text phone" style="<?php echo $info_text_color_style; ?>">
                                    <?php if ( !empty( $phone_list ) ) {
                                        $i = 0;
                                        $total = count( $phone_list );
                                        
                                        foreach ($phone_list as $key => $phone) {
                                            $format_phone = preg_replace('/[^A-Za-z0-9]/', '', $phone['phone_number']);
                                            echo '<a href="tel:'.esc_attr( $format_phone ).'">'.$phone['phone_number'].'</a>';
                                            if ( $i != $total - 1 ) {
                                               echo '<br>';
                                            }
                                            $i++;
                                        }
                                    } ?>
                                </div>
                            <?php endif; ?>
                            <?php if( $field_type === 'email' && !empty( $email_list ) ): ?>
                                <div class="be-infmation-item--text email" style="<?php echo $info_text_color_style; ?>">
                                    <?php if ( !empty( $email_list ) ) {
                                        $i = 0;
                                        $total = count( $email_list );

                                        foreach ($email_list as $key => $email) {
                                            echo '<a href="mailto:'.esc_attr( $email['email_address'] ).'">'.$email['email_address'].'</a>';
                                            if ( $i != $total - 1 ) {
                                               echo '<br>';
                                            }
                                            $i++;
                                        }
                                    } ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                   <?php
                }
            } else{
                echo '<p style="padding: 30px 0;">Please enter some field on sidebar!</p>';
            } ?>
        </div>
    </div>
</section>


