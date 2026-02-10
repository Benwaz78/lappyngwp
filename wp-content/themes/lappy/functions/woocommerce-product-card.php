<?php
/**
 * Display "New" product label based on publish date
 */
function lappyng_product_new_label( $days = 30 ) {

    global $product;

    if ( ! $product ) {
        return;
    }

    $created_date = get_the_date( 'U', $product->get_id() );
    $current_date = current_time( 'timestamp' );

    if ( ( $current_date - $created_date ) <= ( $days * DAY_IN_SECONDS ) ) {
        echo '
        <div class="label_product">
            <span class="label_new">New</span>
        </div>';
    }
}
