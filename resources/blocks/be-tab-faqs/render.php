<?php
// create id attribute for specific styling
$id     = 'be-tab-faqs-' . $block['id'];
$styles = [];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';


$link_op            = __get_field('goza_link_color_op', 'option') ? : '';
$link_color_op      = isset($link_op['link_color']) ? $link_op['link_color'] : '#d41b65';
$typography_body    = __get_field('typography_body', 'option');
$body_color_op      = isset($typography_body['body_color']) ? $typography_body['body_color'] : '#666';

// General Options
$tabs = __get_field('list_tabs_tf') ? : '';

// Style Options
$tab_st  = __get_field('tabs_styles_ft') ? : '';
$qust_st = __get_field('question_style_ft') ? : '';
$ans_cl  = __get_field('answer_color_ft') ? : $body_color_op;
$ans_bg  = __get_field('answer_bg_ft') ? : '#FAFAFA';

if(isset($tab_st) && !empty($tab_st)){
    $color_nm = $tab_st['color_nm'] ? : $link_color_op;
    $bg_nm    = $tab_st['bg_nm'] ? : '#f5f5f5';
    $color_hv = $tab_st['color_hv'] ? : '#fff';
    $bg_hv    = $tab_st['bg_hv'] ? : $link_color_op;
  
    $styles['--tab-cl-nm'] = $color_nm;
    $styles['--tab-bg-nm'] = $bg_nm;
    $styles['--tab-cl-hv'] = $color_hv;
    $styles['--tab-bg-hv'] = $bg_hv;
}

if(isset($qust_st) && !empty($qust_st)){
    $color_nm = $qust_st['color_nm'] ? : $link_color_op;
    $bg_nm    = $qust_st['bg_nm'] ? : '#f5f5f5';
    $color_hv = $qust_st['color_hv'] ? : '#fff';
    $bg_hv    = $qust_st['bg_hv'] ? : $link_color_op;
  
    $styles['--qust-cl-nm'] = $color_nm;
    $styles['--qust-bg-nm'] = $bg_nm;
    $styles['--qust-cl-hv'] = $color_hv;
    $styles['--qust-bg-hv'] = $bg_hv;
}

// Combining styles into a single string using semicolons
$styleString = '';
foreach ($styles as $key => $value) {
    $styleString .= "$key: $value; ";
}
$styleString = rtrim($styleString, '; '); 

?>

<div id ="<?= $id ?>" class="be-tab-faqs-block <?= $align_class ?>"  style="<?= esc_attr($styleString); ?>">
    <div class="be-tab-faqs-block-inner"> 
        <?php if(!empty($tabs) && isset($tabs)): ?>
            <ul class="be-tab-faqs-block--header"> 
                <?php foreach ($tabs as $key => $tab) : ?>
                    <?php $class = $key == 0 ? 'active' :''; ?>
                    <li class="header-item <?= $class ?>" data-tab="tab-<?= $key ?>"> <?= $tab['tab_heading'] ?> </li>
                <?php endforeach; ?>    
            </ul>

            <div class="be-tab-faqs-block--body"> 
                <?php foreach ($tabs as $key => $tab) : ?>
                    <?php $class = $key == 0 ? 'active' :''; ?>
                    <div class="tab-item tab-<?= $key ?> <?= $class ?>"> 
                        <?php $faq_item = $tab['tab_item']; ?>

                        <?php if(!empty($faq_item) && isset($faq_item)): ?>
                            <div class="tab-item-list-items"> 
                                <?php foreach ($faq_item as $key => $value) : ?>
                                    <?php $class = $key == 0 ? 'active' :''; ?>
                                    <div class="item-faq <?= $class ?>"> 
                                        <div class="item-faq--question"> 
                                            <?php if(!empty($value['question']) && isset($value['question'])): ?>
                                                <h5> <?= $value['question'] ?> </h5>
                                            <?php endif; ?>    
                                        </div>

                                        <div class="item-faq--answer" style="color:<?= $ans_cl ?>; background:<?= $ans_bg ?>"> 
                                            <?php if(!empty($value['answer']) && isset($value['answer'])): ?>
                                                <?= $value['answer'] ?>
                                            <?php endif; ?> 
                                        </div>
                                    </div>
                                <?php endforeach; ?> 
                            </div>
                        <?php endif; ?>    
                    </div>
                <?php endforeach; ?>  
            </div>
        <?php endif; ?>   
    </div>
</div>