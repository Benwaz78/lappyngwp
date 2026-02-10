<?php 
/*
Template Name: Compare Page
*/
get_header();

$ids = isset($_GET['ids'])
    ? array_map('intval', explode(',', $_GET['ids']))
    : [];

if ( empty($ids) ) {
    echo '<p>No products selected for comparison.</p>';
    get_footer();
    exit;
}

$products = wc_get_products([
    'include' => $ids,
    'limit'   => -1,
]);


?>
 <?php get_template_part( 'template-parts/product/breadcrumb' ); ?>




     <!-- main-content-wrap start -->
    <div class="main-content-wrap compaer-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="compaer-page--inner">
                        <form action="#">
                            <!-- Compare Table -->
                            <div class="compare-table table-responsive">
                                <table class="table mb-0">
                                    <tbody>

                    <!-- PRODUCT ROW -->
                    <tr>
                        <td class="first-column">Product</td>
                        <?php foreach ( $products as $product ) : ?>
                            <td class="product-image-title">
                                <a href="<?php echo get_permalink($product->get_id()); ?>" class="image">
                                    <?php echo $product->get_image(); ?>
                                </a>
                                <a href="<?php echo get_permalink($product->get_id()); ?>" class="title">
                                    <?php echo esc_html( $product->get_name() ); ?>
                                </a>
                            </td>
                        <?php endforeach; ?>
                    </tr>

                        <!-- PRICE -->
                      <tr>
                            <td class="first-column">Price</td>
                            <?php foreach ( $products as $product ) : ?>
                                <td class="pro-price"><?php echo wc_price( $product->get_price() ); ?></td>
                            <?php endforeach; ?>
                        </tr>


                        <!-- BRAND -->
                       <tr>
                        <td class="first-column">Brand</td>
                        <?php foreach ( $products as $product ) : ?>
                            <td class="pro-color">
                                <?php
                                echo wc_get_product_terms(
                                    $product->get_id(),
                                    'brand',
                                    ['fields' => 'names']
                                )[0] ?? '—';
                                ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>


                       <?php
                        $attrs = [
                            'pa_processor' => 'Processor',
                            'pa_ram'       => 'RAM',
                            'pa_hdd'   => 'Storage',
                            'pa_screen'    => 'Screen Size',
                        ];

                        foreach ( $attrs as $key => $label ) :
                        ?>
                        <tr>
                            <td class="first-column"><?php echo esc_html($label); ?></td>
                            <?php foreach ( $products as $product ) : ?>
                                <td class="pro-color">
                                    <?php echo $product->get_attribute($key) ?: '—'; ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>

                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->






<?php get_footer(); ?>
