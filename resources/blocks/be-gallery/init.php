<?php
function load_template_gallerys($classes){
    switch ($classes) {
        case strpos($classes, 'is-style-ngo-dark') !== false:
            be_tempplate_gallery_default();
            break;

        case strpos($classes, 'is-style-charity-organization') !== false:
            be_tempplate_charity_organization();
            break;    

        default:
            be_tempplate_gallery_water_charity();
            break; 
    } 
}


function be_tempplate_gallery_default(){
    $gallerys = __get_field('items_gallery_bl');
    ?>
    <?php foreach ($gallerys as $key => $value) : ?>
        <?php 
            $img_id     = $value['ID'];
            $img_url    = $value['url'];
            $img_srcset = wp_get_attachment_image_srcset($img_id) ? : '';    
        ?>    

        <a href="<?= esc_url($img_url) ?>" class="item-gallery">
            <img src="<?= esc_url($img_url) ?>" srcset="<?= $img_srcset ?>" />
            <div class="item-gallery--icon">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M116 16v24a4 4 0 0 1-8 0V25.656L82.828 50.828C82.047 51.609 81.023 52 80 52s-2.047-.391-2.828-1.172a3.997 3.997 0 0 1 0-5.656L102.344 20H88a4 4 0 0 1 0-8h24a4 4 0 0 1 4 4zM50.828 45.172 25.656 20H40a4 4 0 0 0 0-8H16a4 4 0 0 0-4 4v24a4 4 0 0 0 8 0V25.656l25.172 25.172C45.953 51.609 46.977 52 48 52s2.047-.391 2.828-1.172a3.997 3.997 0 0 0 0-5.656zM112 84a4 4 0 0 0-4 4v14.344L82.828 77.172c-1.563-1.563-4.094-1.563-5.656 0s-1.563 4.094 0 5.656L102.344 108H88a4 4 0 0 0 0 8h24a4 4 0 0 0 4-4V88a4 4 0 0 0-4-4zm-61.172-6.828a3.997 3.997 0 0 0-5.656 0L20 102.344V88a4 4 0 0 0-8 0v24a4 4 0 0 0 4 4h24a4 4 0 0 0 0-8H25.656l25.172-25.172a3.997 3.997 0 0 0 0-5.656z" fill="#000000" data-original="#000000"></path></g></svg>
            </div>
        </a>

    <?php endforeach; ?>
<?php }


function be_tempplate_gallery_water_charity(){
    $gallerys = __get_field('items_gallery_bl');
    ?>
    <?php foreach ($gallerys as $key => $value) : ?>
        <?php 
            $img_id     = $value['ID'];
            $img_url    = $value['url'];
            $img_name   = $value['title'];
            $img_srcset = wp_get_attachment_image_srcset($img_id) ? : '';    
        ?>    

        <a href="<?= esc_url($img_url) ?>" class="item-gallery">
            <img src="<?= esc_url($img_url) ?>" srcset="<?= $img_srcset ?>" />
            <div class="item-gallery--overlay">
                <div class="item-gallery--icon"> 
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M55.146 51.887 41.588 37.786A22.926 22.926 0 0 0 46.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 0 0 .083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z" fill="#000000" data-original="#000000" class=""></path></g></svg>
                </div>
                
                <h4 class="item-gallery--name"> <?= esc_attr($img_name) ?> </h4>
            </div>
        </a>

    <?php endforeach; ?>
<?php }


function be_tempplate_charity_organization(){
    $gallerys = __get_field('items_gallery_bl');
    ?>
    <?php foreach ($gallerys as $key => $value) : ?>
        <?php
            $img_id     = $value['ID'];
            $img_url    = $value['url'];
            $img_name   = $value['title'];
            $img_desc   = $value['description'];
            $img_srcset = wp_get_attachment_image_srcset($img_id) ? : '';    
        ?>    

        <a href="<?= esc_url($img_url) ?>" class="item-gallery">
            <img src="<?= esc_url($img_url) ?>" srcset="<?= $img_srcset ?>" />
            <div class="item-gallery--overlay">
                <?php if(!empty($img_desc)): ?>
                    <p class="item-gallery--desc"> <?= esc_attr($img_desc) ?>  </p>
                <?php endif; ?>
                
                <h4 class="item-gallery--title"> <?= esc_attr($img_name) ?> </h4>
            </div>
        </a>

    <?php endforeach; ?>
<?php }