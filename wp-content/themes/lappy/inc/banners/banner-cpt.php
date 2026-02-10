<?php
// Register Banner CPT
add_action('init', function () {
    register_post_type('home_banner', [
        'labels' => [
            'name' => 'Banners',
            'singular_name' => 'Banner',
            'add_new_item' => 'Add New Banner',
            'edit_item' => 'Edit Banner',
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-format-image',
        'supports' => ['title', 'thumbnail'],
        'show_in_rest' => true,
    ]);
});
