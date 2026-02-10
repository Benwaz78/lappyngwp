<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); 
global $product;

if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
    $product = wc_get_product( get_the_ID() );
}

                                            
?>
 <?php get_template_part( 'template-parts/product/breadcrumb' ); ?>


  <div class="product_page_bg">
        <div class="container">
            <div class="product_details_wrapper mb-55">
                <!--product details start-->
                <div class="product_details">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <?php
global $product;

if ( ! $product ) return;

// Get main product image
$main_image_id  = $product->get_image_id();
$main_image_url = wp_get_attachment_url( $main_image_id );

// Get gallery images
$gallery_ids = $product->get_gallery_image_ids();
?>

<div class="product-details-tab">

    <!-- Main Image -->
    <div id="img-1" class="zoomWrapper single-zoom">
        <a href="#">
            <img id="zoom1" src="<?php echo esc_url( $main_image_url ); ?>" data-zoom-image="<?php echo esc_url( $main_image_url ); ?>" alt="big-1">
        </a>
    </div>

    <!-- Thumbnails -->
    <div class="single-zoom-thumb">
        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">

            <!-- Main Image as first thumb -->
            <li>
                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo esc_url( $main_image_url ); ?>" data-zoom-image="<?php echo esc_url( $main_image_url ); ?>">
                    <img src="<?php echo esc_url( $main_image_url ); ?>" alt="zoom thumb" />
                </a>
            </li>

            <!-- Product Gallery Images -->
            <?php foreach ( $gallery_ids as $gallery_id ) : 
                $gallery_url = wp_get_attachment_url( $gallery_id );
            ?>
                <li>
                    <a href="#" class="elevatezoom-gallery" data-update="" data-image="<?php echo esc_url( $gallery_url ); ?>" data-zoom-image="<?php echo esc_url( $gallery_url ); ?>">
                        <img src="<?php echo esc_url( $gallery_url ); ?>" alt="zoom thumb" />
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>

</div>

                            
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_d_right">
                                <form action="#">

                                    <h3><a href="#"><?php the_title() ?></a></h3>
                                    <div class="product_nav">
                                        <ul>
                                            <li class="prev"><a href="product-details.html"><i class="fa fa-angle-left"></i></a></li>
                                            <li class="next"><a href="variable-product.html"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="price_box">
                                        <?php if ( $product->is_on_sale() ) : ?>
                                            <span class="old_price">
                                                 <?php
                                                    echo get_woocommerce_currency_symbol() .
                                                        number_format( (float) $product->get_regular_price(), 2 );
                                                    ?>
                                            </span>
                                            <span class="current_price">
                                                <?php
                                                    echo get_woocommerce_currency_symbol() .
                                                        number_format( (float) $product->get_sale_price(), 2 );
                                                ?>
                                            </span>
                                        <?php else : ?>
                                            <span class="current_price">
                                                 <?php
                                                    echo get_woocommerce_currency_symbol() .
                                                        number_format( (float) $product->get_price(), 2 );
                                                ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>


                                  
                                  
                                    <?php if ( ! empty( $post->post_excerpt ) ) : ?>
                                        <div class="product_short_desc">
                                            <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="product_desc">
                                        <div class="product_d_table">
                                            <h3>Key Specification</h3>
                                            <form action="#">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="first_child">Brand</td>
                                                            <td><?php echo esc_html( get_product_attribute_value( $product, 'product_brand' ) ); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Processor</td>
                                                            <td><?php echo esc_html( get_product_attribute_value( $product, 'pa_processor' ) ); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">RAM</td>
                                                            <td><?php echo esc_html( get_product_attribute_value( $product, 'pa_ram' ) ); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Hard Disk</td>
                                                            <td><?php echo esc_html( get_product_attribute_value( $product, 'pa_hdd' ) ); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Screen Size</td>
                                                            <td><?php echo esc_html( get_product_attribute_value( $product, 'pa_screen-size' ) ); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <?php
                                                global $product;

                                                $product_title = $product->get_name();
                                                $product_price = wc_price( $product->get_price() );
                                                $product_url   = get_permalink( $product->get_id() );

                                                $message = sprintf(
                                                "Hello, I am interested in this product:%s\n\n%s\nPrice: %s\n\nLink: %s",
                                                "\n",
                                                $product_title,
                                                wp_strip_all_tags($product_price),
                                                $product_url
                                                );

                                                $wa_link = "https://wa.me/2349057277551?text=" . urlencode($message);
                                                ?>

                                               

                                                <a href="<?php echo esc_url($wa_link); ?>" 
                                                    class="btn btn-success d-inline-flex align-items-center gap-2"
                                                    target="_blank" rel="noopener">
                                                    <i class="fa fa-whatsapp"></i>
                                                    <span>Chat on WhatsApp</span>
                                                </a>

                                                <a href="tel:+2349057277551" 
                                                 class="btn btn-primary d-inline-flex align-items-center gap-2">
                                                <i class="fa fa-phone"></i>
                                                <span>Call Now</span>
                                                </a>
                                       
                                    </div>

                                            <?php
                                            // Get categories (product_cat)
                                            $categories = wc_get_product_category_list( $product->get_id(), ', ' );

                                            // Get Brand (custom taxonomy)
                                            $brands = wp_get_post_terms(
                                                $product->get_id(),
                                                'product_brand', // taxonomy slug
                                                [ 'fields' => 'names' ] // we just want the names
                                            );
                                            $brand = ! empty( $brands ) ? implode( ', ', $brands ) : '';

                                            // Get Condition (attribute)
                                            $condition = $product->get_attribute( 'pa_condition' );
                                            ?>

                                            <div class="product_desc">
                                                <div class="product_meta">

                                                    <?php if ( $categories ) : ?>
                                                        <div class="mb-1">
                                                            <span>Category: <?php echo $categories; ?></span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if ( $brand ) : ?>
                                                        <div class="mb-1">
                                                            <span>Brand: <a href="#"><?php echo esc_html( $brand ); ?></a></span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if ( $condition ) : ?>
                                                        <div class="mb-1">
                                                            <span>Condition: <a href="#"><?php echo esc_html( $condition ); ?></a></span>
                                                        </div>
                                                    <?php endif; ?>

                                                </div>
                                            </div>

                                    

                                    <div class="product_desc">
                                        <div class=" product_d_action">
                                            <ul>
                                                <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                     
                                    <div class="product_desc">
                                        <p>Share this product</p>
                                       <div class="priduct_social">
                                          <?php $share_links = my_product_share_links(); ?>
                                           <ul>
                                               <li><a class="facebook" href="<?php echo esc_url($share_links["facebook"]); ?>" title="facebook"><i class="fa fa-facebook"></i> Share</a></li>
                                               <li><a class="twitter" href="<?php echo esc_url($share_links["twitter"]); ?>" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                               <li><a class="whatsapp" href="<?php  echo esc_url($share_links["whatsapp"]); ?>" title="WhatsApp"><i class="fa fa-whatsapp"></i> WhatsApp</a></li>
                                               <li><a class="tiktok" href="<?php  echo esc_url($share_links["tiktok"]); ?>" title="Tiktok"><i class="fa fa-tiktok"></i> Tiktok</a></li>
                                               
                                           </ul>
                                       </div>
                                    </div>
                                     
                                    
                                    
                                   
                                   
                                   

                                </form>
                                

                            </div>
                        </div>
                    </div>
                </div>
                <!--product details end-->

                <!--product info start-->
                <div class="product_d_info">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_d_inner">
                                <div class="product_info_button">
                                    <ul class="nav" role="tablist" id="nav-tab">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Full Specification</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                                        <div class="product_info_content">
                                            <?php the_content() ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sheet" role="tabpanel">
                                        <div class="product_d_table">
                                            <form action="#">
                                                <table>
                                                    <tbody>
                                                        <?php
                                                                global $product;

                                                                if ( ! $product instanceof WC_Product ) {
                                                                    return;
                                                                }

                                                                $attributes = $product->get_attributes();

                                                                foreach ( $attributes as $attribute ) {

                                                                    // Attribute label (e.g. RAM, Processor, Condition)
                                                                    $label = wc_attribute_label( $attribute->get_name() );

                                                                    // Attribute values
                                                                    if ( $attribute->is_taxonomy() ) {
                                                                        $values = wc_get_product_terms(
                                                                            $product->get_id(),
                                                                            $attribute->get_name(),
                                                                            [ 'fields' => 'names' ]
                                                                        );
                                                                        $value = implode( ', ', $values );
                                                                    } else {
                                                                        $value = implode( ', ', $attribute->get_options() );
                                                                    }

                                                                    if ( empty( $value ) ) {
                                                                        continue;
                                                                    }
                                                                    ?>
                                                                    
                                                                    <tr>
                                                                        <td class="first_child"><?php echo esc_html( $label ); ?></td>
                                                                        <td><?php echo esc_html( $value ); ?></td>
                                                                    </tr>

                                                                <?php } ?>

                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                       
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--product info end-->
            </div>

        <!--product area start-->
        <section class="product_area related_products">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Related Products </h2>
                    </div>
                </div>
            </div>
             <div class="product_carousel product_style product_column5 owl-carousel">

    <?php 
    global $product;

    // Get related product IDs (limit 8)
    $related_ids = wc_get_related_products( $product->get_id(), 8 );

    if ( ! empty( $related_ids ) ) :

        $related_query = new WP_Query([
            'post_type' => 'product',
            'post__in'  => $related_ids,
            'orderby'   => 'post__in',
        ]);

        if ( $related_query->have_posts() ) :
            while ( $related_query->have_posts() ) : $related_query->the_post(); ?>

                <div class="product_items">
                    <?php get_template_part( 'template-parts/product/product-card' ); ?>
                </div>

            <?php endwhile;
        else :
            echo '<p>No related products found.</p>';
        endif;

        wp_reset_postdata();

    else :
        echo '<p>No related products found.</p>';
    endif;
    ?>

</div>

        </section>
        <!--product area end-->


        
        </div>
    </div>




 <?php get_footer( 'shop' ); ?>
