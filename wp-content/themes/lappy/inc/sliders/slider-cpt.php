<?php

add_action( 'init', function () {

    register_post_type( 'home_slider', [
        'labels' => [
            'name'          => 'Home Sliders',
            'singular_name' => 'Home Slider',
            'add_new_item'  => 'Add New Slide',
            'edit_item'     => 'Edit Slide',
        ],
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-images-alt2',
        'supports'     => [ 'title', 'thumbnail' ],
        'show_in_rest' => true,
    ]);

});
