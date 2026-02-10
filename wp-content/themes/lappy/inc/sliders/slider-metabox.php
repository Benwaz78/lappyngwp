<?php

add_action( 'add_meta_boxes', function () {
    add_meta_box(
        'home_slider_marketing_content',
        'Slider Marketing Content',
        'lappyng_slider_metabox',
        'home_slider',
        'normal',
        'high'
    );
});

function lappyng_slider_metabox( $post ) {

    $badge   = get_post_meta( $post->ID, '_slider_badge_text', true );
    $offer   = get_post_meta( $post->ID, '_slider_offer_text', true );
    $cta_url = get_post_meta( $post->ID, '_slider_cta_url', true );
    $cta_lbl = get_post_meta( $post->ID, '_slider_cta_label', true );
    ?>

    <p>
        <label><strong>Promo Badge Text</strong></label><br>
        <input type="text" name="slider_badge_text" value="<?php echo esc_attr( $badge ); ?>" style="width:100%;">
        <em>Example: Big Sale Products, New Arrivals</em>
    </p>

   

    <p>
        <label><strong>Offer Value / Supporting Text</strong></label><br>
        <input type="text" name="slider_offer_text" value="<?php echo esc_attr( $offer ); ?>" style="width:100%;">
        <em>Example: 50% OFF, Save ₦120,000</em>
    </p>

    <p>
        <label><strong>Call To Action Label</strong></label><br>
        <input type="text" name="slider_cta_label" value="<?php echo esc_attr( $cta_lbl ); ?>" placeholder="Shop Now" style="width:100%;">
    </p>

    <p>
        <label><strong>Call To Action URL</strong></label><br>
        <input type="url" name="slider_cta_url" value="<?php echo esc_url( $cta_url ); ?>" style="width:100%;">
    </p>

    <?php
}

add_action( 'save_post_home_slider', function ( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    update_post_meta( $post_id, '_slider_badge_text', sanitize_text_field( $_POST['slider_badge_text'] ?? '' ) );
    update_post_meta( $post_id, '_slider_offer_text', sanitize_text_field( $_POST['slider_offer_text'] ?? '' ) );
    update_post_meta( $post_id, '_slider_cta_label', sanitize_text_field( $_POST['slider_cta_label'] ?? '' ) );
    update_post_meta( $post_id, '_slider_cta_url', esc_url_raw( $_POST['slider_cta_url'] ?? '' ) );

});
