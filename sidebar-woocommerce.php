<?php
/**
 * The template for displaying sidebar.
 *
 * @package gozagutenberg
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * This file is here to avoid the Deprecated Message for sidebar by wp-includes/theme-compat/sidebar.php.
 */


?>
<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
<div class="col-md-4 col-sm-12 goza-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<div class="bt-col-inner">
		<?php dynamic_sidebar( 'shop-sidebar' ); ?>
	</div><!-- /.inner -->
</div><!-- /.sidebar -->
<?php } ?>
<?php

