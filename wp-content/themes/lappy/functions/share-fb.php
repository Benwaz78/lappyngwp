<?php
// Add Open Graph tags for single product pages
add_action('wp_head', function() {
    if (is_product()) {
        global $product;

        if (!is_a($product, 'WC_Product')) return;

        $title = get_the_title($product->get_id());
        $url = get_permalink($product->get_id());
        $description = $product->get_short_description() ?: $product->get_description();

        // Get featured image
        $image_id = $product->get_image_id();
        $image = $image_id ? wp_get_attachment_url($image_id) : '';

        echo '<meta property="og:type" content="product" />' . "\n";
        echo '<meta property="og:title" content="' . esc_attr($title) . '" />' . "\n";
        echo '<meta property="og:url" content="' . esc_url($url) . '" />' . "\n";
        echo '<meta property="og:description" content="' . esc_attr(wp_strip_all_tags($description)) . '" />' . "\n";

        if ($image) {
            echo '<meta property="og:image" content="' . esc_url($image) . '" />' . "\n";
        }

        // Optional: add product price
        $price = $product->get_price();
        if ($price) {
            echo '<meta property="product:price:amount" content="' . esc_attr($price) . '" />' . "\n";
            echo '<meta property="product:price:currency" content="' . get_woocommerce_currency() . '" />' . "\n";
        }
    }
});
