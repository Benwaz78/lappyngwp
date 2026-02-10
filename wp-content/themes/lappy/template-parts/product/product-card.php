<article class="single_product">
    <figure>
        <div class="product_thumb">
            <?php
            global $product;

            // Primary image
            if ( has_post_thumbnail( $product->get_id() ) ) {
                $primary_img = get_the_post_thumbnail_url( $product->get_id(), 'full' );
                echo '<a class="primary_img" href="' . get_permalink() . '"><img src="' . esc_url( $primary_img ) . '" alt="' . get_the_title() . '"></a>';
            } else {
                echo '<a class="primary_img" href="' . get_permalink() . '"><img src="' . get_template_directory_uri() . '/assets/img/product/default.jpg" alt="No image"></a>';
            }

            // Secondary image (first gallery image if exists)
            $attachment_ids = $product->get_gallery_image_ids();
            if ( ! empty( $attachment_ids ) ) {
                $secondary_img = wp_get_attachment_url( $attachment_ids[0] );
                echo '<a class="secondary_img" href="' . get_permalink() . '"><img src="' . esc_url( $secondary_img ) . '" alt="' . get_the_title() . '"></a>';
            }
            ?>

           <?php global $product; ?>

            <div class="label_product">
                <?php
                if ( $product->is_on_sale() ) {

                    // SALE has priority
                    echo '<span class="label_sale">Sale</span>';

                } elseif ( function_exists( 'lappyng_product_new_label' ) ) {

                    // Show NEW only if NOT on sale
                    lappyng_product_new_label();
                }
                ?>
            </div>


        </div>

        <div class="product_content grid_content">
            <div class="product_content_inner">
                <h4 class="product_name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                <div class="price_box">
                    <?php
                    if ( $product->is_on_sale() ) {
                        echo '<span class="old_price">' . wc_price( $product->get_regular_price() ) . '</span>';
                        echo '<span class="current_price">' . wc_price( $product->get_sale_price() ) . '</span>';
                    } else {
                        echo '<span class="current_price">' . wc_price( $product->get_price() ) . '</span>';
                    }
                    ?>
                </div>
              

            </div>

          <!-- <div class="add_to_cart">
            <a href="#" 
            class="compare-btn" 
            data-product-id="<?php //echo esc_attr( $product->get_id() ); ?>">
            Compare
            </a>
        </div> -->

        </div>
    </figure>
</article>
