<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); 
?>

 <?php get_template_part( 'template-parts/product/breadcrumb' ); ?>

<div class="shop_area shop_reverse">
    <div class="container">
        <div class="row">
            <?php get_sidebar( 'shop' ); ?>

            <div class="col-lg-9 col-md-12">
                <?php render_banner('shop_top'); ?>

                
                    <?php 
                    // WooCommerce product loop
                    if ( wc_get_loop_prop( 'total' ) > 0 || have_posts() ) { ?>
                      <div class="row no-gutters shop_wrapper">
                       
                        <?php  
                           
                        while ( have_posts() ) {
                            the_post(); ?>
                            <div class='col-lg-3 col-md-4 col-12'>
                                <?php
                                    get_template_part( 'template-parts/product/product-card' );  ?>
                             </div>

                        <?php   }  ?>
                      </div>
                                    
                        <?php get_template_part( 'template-parts/product/pagination' ); ?>

                   <?php } else {
                        echo '<p>No products found.</p>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer( 'shop' ); ?>
