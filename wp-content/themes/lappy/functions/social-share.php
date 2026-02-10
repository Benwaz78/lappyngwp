<?php
/**
 * Generate share links for a WooCommerce product
 * Platforms: WhatsApp, Twitter (X), Facebook, TikTok
 */

function my_product_share_links($product_id = 0) {

    if ( ! $product_id ) {
        global $product;
        if ( ! is_a( $product, 'WC_Product' ) ) {
            return [];
        }
        $product_id = $product->get_id();
    }

    $url   = get_permalink( $product_id );
    $title = get_the_title( $product_id );
    $price = get_woocommerce_currency_symbol() . number_format( (float) $product->get_price(), 2 );
    $image = wp_get_attachment_url( get_post_thumbnail_id( $product_id ) );

    /* -----------------------------
     * WhatsApp (supports image link)
     * ----------------------------- */
    $whatsapp_msg = "Check out this product:\n{$title}\nPrice: {$price}\n{$url}";
    if ( $image ) {
        $whatsapp_msg .= "\n{$image}";
    }

    $whatsapp_url = 'https://wa.me/?text=' . urlencode( $whatsapp_msg );

    /* -----------------------------
     * Twitter / X
     * Image pulled via OG tags
     * ----------------------------- */
    $twitter_text = "Check out this product: {$title}";
    $twitter_url  = 'https://twitter.com/intent/tweet?text=' . urlencode( $twitter_text ) . '&url=' . urlencode( $url );

    /* -----------------------------
     * Facebook
     * Image + title via OG tags
     * ----------------------------- */
    $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode( $url );

    /* -----------------------------
     * TikTok (no direct share API)
     * Opens upload page with link
     * ----------------------------- */
    $tiktok_url = 'https://www.tiktok.com/upload?lang=en&link=' . urlencode( $url );

    return [
        'whatsapp' => $whatsapp_url,
        'twitter'  => $twitter_url,
        'facebook' => $facebook_url,
        'tiktok'   => $tiktok_url,
    ];
}
