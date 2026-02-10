<?php



function lappy_with_delight_enable_thumbnails() {
    add_theme_support('post-thumbnails');
}

function lappy_with_delight_theme_setup() {
    add_theme_support('title-tag');
}

function lappy_enable_excerpts() {
    add_post_type_support( 'page', 'excerpt' );
}

function lappy_enable_woocommerce() {
     add_theme_support( 'woocommerce' );
}






function lappy_enqueue_styles() {

    $version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'lappy-plugins',
        get_template_directory_uri() . '/assets/css/plugins.css',
        array(),
        $version
    );

    wp_enqueue_style(
        'lappy-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array('lappy-plugins'),
        $version
    );

    wp_enqueue_style(
        'lappy-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        array('lappy-plugins'),
        $version
    );
}


function lappy_enqueue_scripts() {

    $version = wp_get_theme()->get('Version');

    wp_enqueue_script(
        'lappy-plugins',
        get_template_directory_uri() . '/assets/js/plugins.js',
        array('jquery'),
        $version,
        true
    );

    wp_enqueue_script(
        'lappy-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('lappy-plugins'),
        $version,
        true
    );
    wp_enqueue_script(
        'lappy-compare',
        get_template_directory_uri() . '/assets/js/compare.js',
        array('lappy-plugins'),
        $version,
        true
    );
}

// Register a customizer setting
function customizer_products_per_page( $wp_customize ) {

    $wp_customize->add_section( 'shop_layout_section', array(
        'title'    => __( 'Shop Layout', 'your-theme' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'products_per_page', array(
        'default'           => 6, // default value
        'sanitize_callback' => 'absint', // make sure it's an integer
    ) );

    $wp_customize->add_control( 'products_per_page_control', array(
        'label'    => __( 'Products per Page', 'your-theme' ),
        'section'  => 'shop_layout_section',
        'settings' => 'products_per_page',
        'type'     => 'number',
    ) );

}



remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );






add_filter( 'loop_shop_per_page', 'custom_products_per_page', 20 );
function custom_products_per_page( $cols ) {
    return 12; // Change this number to test pagination
}

// Add this to your functions.php if you want all search 
// results to be products by default, even if the form doesn’t have post_type hidden:

add_action( 'pre_get_posts', function ( $q ) {

    if (
        ! is_admin()
        && $q->is_main_query()
        && $q->is_search()
    ) {
        $q->set( 'post_type', 'product' );
    }
});

add_action( 'after_setup_theme', function () {
    register_nav_menus([
        'primary_menu' => __( 'Primary Menu', 'lappyng' ),
    ]);
});



function my_product_open_graph_tags() {

    // WooCommerce not loaded
    if ( ! function_exists('is_product') ) {
        return;
    }

    // Not a product page
    if ( ! is_product() ) {
        return;
    }

    global $post;
    if ( ! $post ) {
        return;
    }

    $product = wc_get_product( $post->ID );
    if ( ! $product ) {
        return;
    }

    $title = get_the_title( $post->ID );
    $url   = get_permalink( $post->ID );
    $image = wp_get_attachment_url( $product->get_image_id() );
    $price = get_woocommerce_currency_symbol() . number_format(
        (float) $product->get_price(),
        2
    );

    echo "\n<!-- Woo Product OG Tags -->\n";
    echo '<meta property="og:type" content="product" />' . "\n";
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '" />' . "\n";
    echo '<meta property="og:url" content="' . esc_url( $url ) . '" />' . "\n";

    if ( $image ) {
        echo '<meta property="og:image" content="' . esc_url( $image ) . '" />' . "\n";
    }

    echo '<meta property="og:description" content="Price: ' . esc_attr( $price ) . '" />' . "\n";
}



add_action('wp_head', 'my_product_open_graph_tags', 5);
add_action( 'customize_register', 'customizer_products_per_page' );
add_action('after_setup_theme', 'lappy_with_delight_theme_setup');
add_action('after_setup_theme', 'lappy_with_delight_enable_thumbnails');
add_action('after_setup_theme', 'lappy_enable_woocommerce');
add_action('wp_enqueue_scripts', 'lappy_enqueue_scripts');
add_action('wp_enqueue_scripts', 'lappy_enqueue_styles');
add_action('wp_enqueue_scripts', 'lappy_enqueue_scripts');

