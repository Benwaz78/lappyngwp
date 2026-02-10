<?php
defined( 'ABSPATH' ) || exit;

global $product;
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<div class="col-lg-3 col-md-4 col-12">
    <?php get_template_part('template-parts/product/product-card'); ?>
</div>
