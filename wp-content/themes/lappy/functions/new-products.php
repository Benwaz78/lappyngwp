<?php
/**
 * Date-based New Products handling
 * - Uses ?new=1
 * - Modifies entire menu item dynamically
 */

/**
 * 1. Filter WooCommerce archive when ?new=1 is present
 */
add_action('pre_get_posts', function ($query) {

    if (!is_admin() && $query->is_main_query() && is_post_type_archive('product')) {

        if (isset($_GET['new']) && $_GET['new'] == 1) {

            $days = 30;

            $query->set('date_query', [
                [
                    'after'     => date('Y-m-d', strtotime("-{$days} days")),
                    'inclusive' => true,
                ]
            ]);

            $query->set('orderby', 'date');
            $query->set('order', 'DESC');
        }
    }
});


/**
 * 2. Modify the ENTIRE menu item based on new product availability
 */
add_filter('wp_get_nav_menu_items', function ($items) {

    $days = 30;

    // Check if any new products exist
    $has_new_products = !empty(wc_get_products([
        'limit'      => 1,
        'status'     => 'publish',
        'date_after' => date('Y-m-d', strtotime("-{$days} days")),
    ]));

    foreach ($items as $key => $item) {

        // Match by menu label (safe for Appearance → Menus)
        if ($item->title === 'New Arrivals') {

            if ($has_new_products) {

                // Update URL to new products filter
                $item->url = esc_url(
                    get_permalink(wc_get_page_id('shop')) . '?new=1'
                );

                // Update label + badge
                $item->title = 'New Arrivals <span class="badge bg-success ms-1">New</span>';

            } else {

                // OPTION A: remove menu item entirely
                unset($items[$key]);

                // OPTION B (alternative): turn it into Shop instead
                /*
                $item->title = 'Shop';
                $item->url   = get_permalink(wc_get_page_id('shop'));
                */
            }
        }
    }

    return $items;

});
