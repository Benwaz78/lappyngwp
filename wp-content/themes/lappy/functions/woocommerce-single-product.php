<?php
function get_product_attribute_value( $product, $taxonomy ) {
    if ( ! $product ) return '';

    // Global attributes (pa_*)
    if ( taxonomy_exists( $taxonomy ) ) {
        $terms = wc_get_product_terms( $product->get_id(), $taxonomy, [
            'fields' => 'names'
        ]);
        return ! empty( $terms ) ? implode( ', ', $terms ) : '—';
    }

    // Custom attributes
    $value = $product->get_attribute( $taxonomy );
    return $value ? $value : '—';
}
