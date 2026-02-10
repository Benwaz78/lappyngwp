<?php get_header(); ?>
    <!--slider area start-->
    <?php
/**
 * Slider Frontend Render
 */

$args = [
    'post_type'      => 'home_slider',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
];

$slider_query = new WP_Query( $args );

if ( ! $slider_query->have_posts() ) {
    return;
}
?>



    <?php
/**
 * Slider Frontend Render
 */

$args = [
    'post_type'      => 'home_slider',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
];

$slider_query = new WP_Query( $args );

if ( ! $slider_query->have_posts() ) {
    return;
}
?>

<section class="slider_section slider_s_two mb-60 mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3 col-md-12">

                <!-- Main Slider -->
                <div class="swiper-container gallery-top">
                    <div class="slider_area swiper-wrapper">

                        <?php while ( $slider_query->have_posts() ) : $slider_query->the_post();

                            $subtitle    = get_post_meta( get_the_ID(), '_slider_badge_text', true );
                            $offer_text  = get_post_meta( get_the_ID(), '_slider_offer_text', true );
                            $button_text = get_post_meta( get_the_ID(), '_slider_cta_label', true );
                            $button_link = get_post_meta( get_the_ID(), '_slider_cta_url', true );

                            $bg_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        ?>

                        <div class="single_slider swiper-slide d-flex align-items-center"
                             <?php if ( $bg_image ) : ?>
                                 data-bgimg="<?php echo esc_url( $bg_image ); ?>"
                             <?php endif; ?>>

                            <div class="slider_content">

                                <?php if ( $subtitle ) : ?>
                                    <h3><?php echo esc_html( $subtitle ); ?></h3>
                                <?php endif; ?>

                                <h1><?php the_title() ?></h1>

                                <?php if ( $offer_text ) : ?>
                                    <p><?php echo esc_html( $offer_text ); ?></p>
                                <?php endif; ?>

                                <?php if ( $button_text && $button_link ) : ?>
                                    <a class="button" href="<?php echo esc_url( $button_link ); ?>">
                                        <?php echo esc_html( $button_text ); ?>
                                    </a>
                                <?php endif; ?>

                            </div>
                        </div>

                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>

                    <div class="swiper-pagination"></div>
                </div>

                <!-- Thumbnail Slider -->
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">

                        <?php
                        // Reset loop for thumbs
                        $slider_query->rewind_posts();
                        while ( $slider_query->have_posts() ) : $slider_query->the_post();

                            $thumb_title = get_the_title();
                        ?>

                            <div class="swiper-slide">
                                <?php echo esc_html( $thumb_title ); ?>
                            </div>

                        <?php endwhile; wp_reset_postdata(); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



    <!--home section bg area start-->
    <div class="home_section_bg">
       
        <!--banner area start-->
       <div class="banner_area mb-55">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <?php render_banner('home_left'); ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <?php render_banner('home_right'); ?>
                    </div>
                </div>
            </div>
        </div>

        <!--banner area end-->

       <!--Laptops  sale  area start-->
        <div class="product_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>Laptops On Sale</h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_style product_column5 owl-carousel">
                    <?php
                        $sale_query = new WP_Query([
                            'post_type'      => 'product',
                            'posts_per_page' => 8, // change as needed
                            'post_status'    => 'publish',
                            'meta_query'     => WC()->query->get_meta_query(),
                            'tax_query'      => WC()->query->get_tax_query(),
                            'post__in'       => wc_get_product_ids_on_sale(),
                        ]);

                        if ( $sale_query->have_posts() ) :
                            while ( $sale_query->have_posts() ) :
                                $sale_query->the_post();
                                ?>
                                
                                <div class="product_items">
                                    <?php get_template_part( 'template-parts/product/product-card' ); ?>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>

                   
                </div>

            </div>
        </div>
        <!--Laptops on sale  area end-->

         <!--top choices area start-->
        <div class="product_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>Top Choices </h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_style product_column5 owl-carousel">
                    <?php
                        $sale_query = new WP_Query([
                            'post_type'      => 'product',
                            'posts_per_page' => 8, // change as needed
                            'post_status'    => 'publish',
                            'meta_query'     => WC()->query->get_meta_query(),
                            'tax_query'      => WC()->query->get_tax_query(),
                            'post__in'       => wc_get_product_ids_on_sale(),
                        ]);

                        if ( $sale_query->have_posts() ) :
                            while ( $sale_query->have_posts() ) :
                                $sale_query->the_post();
                                ?>
                                
                                <div class="product_items">
                                    <?php get_template_part( 'template-parts/product/product-card' ); ?>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata();
                        endif;
                    ?>

                   
                </div>

            </div>
        </div>
        <!--top choices area end-->


    <!-- featured product  -->
        <div class="product_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>Featured Products </h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_style product_column5 owl-carousel">
                    <?php
                    $args = [
                        'post_type'      => 'product',
                        'posts_per_page' => 8,          // number of new arrivals
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'post_status'    => 'publish',
                        // THIS is the key part for featured products
                        'tax_query'      => [
                            [
                                'taxonomy' => 'product_visibility',
                                'field'    => 'name',
                                'terms'    => ['featured'],
                            ],
                        ],
                    ];

                    $featured_products = new WP_Query( $args );

                    if ( $featured_products->have_posts() ) :
                        while ( $featured_products->have_posts() ) :
                            $featured_products->the_post();
                            ?>
                            
                            <div class="product_items">
                                <?php get_template_part( 'template-parts/product/product-card' ); ?>
                            </div>

                        <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>

            </div>
        </div>
    <!-- featured product  -->


     <!--new arrival  start-->
        <div class="product_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>New Arrivals </h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_style product_column5 owl-carousel">
                    <?php
                    $args = [
                        'post_type'      => 'product',
                        'posts_per_page' => 8,          // number of new arrivals
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'post_status'    => 'publish',
                    ];

                    $new_arrivals = new WP_Query( $args );

                    if ( $new_arrivals->have_posts() ) :
                        while ( $new_arrivals->have_posts() ) :
                            $new_arrivals->the_post();
                            ?>
                            
                            <div class="product_items">
                                <?php get_template_part( 'template-parts/product/product-card' ); ?>
                            </div>

                        <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>

            </div>
        </div>
    <!--new arrival  end-->



    </div>
    <!--home section bg area end-->

<?php get_footer(); ?>
