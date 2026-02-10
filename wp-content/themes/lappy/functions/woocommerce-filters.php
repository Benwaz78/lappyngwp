<?php

function theme_product_attribute_filter( $taxonomy ) {

    if ( ! taxonomy_exists( $taxonomy ) ) {
        return;
    }

    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => true,
    ]);

    if ( empty( $terms ) || is_wp_error( $terms ) ) {
        return;
    }

    // Is this a product attribute?
    $is_attribute = str_starts_with( $taxonomy, 'pa_' );

    // Correct query key
    $query_key = $is_attribute ? 'filter_' . $taxonomy : $taxonomy;

    foreach ( $terms as $term ) {

        // Active state
        $active = (
            isset($_GET[$query_key]) &&
            $_GET[$query_key] === $term->slug
        );

        $active_class = $active ? 'active' : '';

        // Preserve existing filters
        $url = add_query_arg(
            $query_key,
            $term->slug,
            wc_get_page_permalink( 'shop' )
        );

        echo '<li class="' . esc_attr($active_class) . '">';
        echo '<a href="' . esc_url($url) . '" class="' . esc_attr($active_class) . '">';
        echo esc_html( $term->name );
        echo '</a></li>';
    }
}



add_filter( 'woocommerce_get_breadcrumb', 'theme_fix_attribute_breadcrumbs', 20, 2 );
function theme_fix_attribute_breadcrumbs( $crumbs, $breadcrumb ) {

    if ( is_tax() ) {
        $term = get_queried_object();

        if ( $term && ! is_wp_error( $term ) ) {

            // Get Shop page safely
            $shop_id    = wc_get_page_id( 'shop' );
            $shop_title = $shop_id > 0 ? get_the_title( $shop_id ) : __( 'Shop', 'woocommerce' );
            $shop_link  = $shop_id > 0 ? get_permalink( $shop_id ) : home_url( '/shop/' );

            // Remove last crumb if it's Shop
            $last = end( $crumbs );
            if ( isset( $last[0] ) && $last[0] === $shop_title ) {
                array_pop( $crumbs );
            }

            // Add Shop back cleanly
            $crumbs[] = [ $shop_title, $shop_link ];

            // Taxonomy label (Brand, RAM, Storage, etc.)
            $taxonomy = get_taxonomy( $term->taxonomy );
            if ( ! empty( $taxonomy->labels->singular_name ) ) {
                $crumbs[] = [ $taxonomy->labels->singular_name, '' ];
            }

            // Current term
            $crumbs[] = [ single_term_title( '', false ), '' ];
        }
    }

    return $crumbs;
}




 