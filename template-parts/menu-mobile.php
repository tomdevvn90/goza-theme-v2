<div class="site-menu-mobile">
    <span class="off-canvas-menu-closed">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="02 User"><path d="M25 512a25 25 0 0 1-17.68-42.68l462-462a25 25 0 0 1 35.36 35.36l-462 462A24.93 24.93 0 0 1 25 512z" fill="#ffffff" data-original="#000000" opacity="1" class=""></path><path d="M487 512a24.93 24.93 0 0 1-17.68-7.32l-462-462A25 25 0 0 1 42.68 7.32l462 462A25 25 0 0 1 487 512z" fill="#ffffff" data-original="#000000" opacity="1" class=""></path></g></g></svg>
    </span>
    <div class="site-menu-mobile-wrap-menu">
        <?php
        if (has_nav_menu('mobile-menu')) {
            wp_nav_menu([
                'theme_location' => 'mobile-menu',
                'menu_class' => 'mobile-menu',
                'container_class' => 'mobile-menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                'bootstrap' => false
            ]);
        }
        ?>
    </div>
</div>