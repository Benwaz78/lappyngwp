<?php
/**
 * HOT DEALS – WooCommerce Sale Products
 */

/**
 * Filter WooCommerce archive query
 */
add_action('pre_get_posts', function ($query) {

    if (
        !is_admin() &&
        $query->is_main_query() &&
        is_post_type_archive('product') &&
        isset($_GET['hot-deals']) &&
        $_GET['hot-deals'] == 1
    ) {

        // Get all product IDs currently on sale
        $sale_ids = wc_get_product_ids_on_sale();

        // If no sale products, prevent results
        if (empty($sale_ids)) {
            $sale_ids = [0];
        }

        $query->set('post__in', $sale_ids);
        $query->set('orderby', 'date');
        $query->set('order', 'DESC');
    }

});


add_filter('nav_menu_item_title', function ($title, $item) {

    if (stripos($title, 'Hot Deals') !== false) {

        $sale_ids = wc_get_product_ids_on_sale();

        // Hide text entirely if no deals
        if (empty($sale_ids)) {
            return '';
        }

        return 'Hot Deals <span class="badge bg-danger ms-1">SALE</span>';
    }

    return $title;

}, 10, 2);

