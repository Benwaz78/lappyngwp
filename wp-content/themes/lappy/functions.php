<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


require_once get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/functions/woocommerce-filters.php';
require get_template_directory() . '/functions/woocommerce-single-product.php';
require get_template_directory() . '/functions/woocommerce-product-card.php';
require get_template_directory() . '/inc/sliders/slider-init.php';
require get_template_directory() . '/inc/banners/banner-init.php';
require get_template_directory() . '/functions/new-products.php';
require get_template_directory() . '/functions/hot-deals.php';
require get_template_directory() . '/functions/best-offers.php';
require get_template_directory() . '/functions/social-share.php';
require get_template_directory() . '/functions/share-fb.php';
require get_template_directory() . '/functions/misce.php';


