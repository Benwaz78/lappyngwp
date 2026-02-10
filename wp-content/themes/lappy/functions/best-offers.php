<?php
/**
 * Featured Products – WooCommerce native
 */

add_action('pre_get_posts', function ($query) {

    if (is_admin() || ! $query->is_main_query()) {
        return;
    }

    if (is_post_type_archive('product') && isset($_GET['featured'])) {

        // WooCommerce featured products are stored in a taxonomy
        $query->set('tax_query', [
            [
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => ['featured'],
            ]
        ]);

        $query->set('orderby', 'date');
        $query->set('order', 'DESC');
    }

});
