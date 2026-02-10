<?php
// Add Meta Boxes
add_action('add_meta_boxes', function () {
    add_meta_box(
        'banner_content_meta',
        'Banner Content',
        'banner_metabox_callback',
        'home_banner',
        'normal',
        'high'
    );
});

function banner_metabox_callback($post) {
    $position = get_post_meta($post->ID, '_banner_position', true);
    $description = get_post_meta($post->ID, '_banner_description', true);
    $link = get_post_meta($post->ID, '_banner_link', true);
    ?>
    <p>
        <label><strong>Banner Position</strong></label><br>
        <select name="banner_position" style="width:100%;">
            <option value="">Select Position</option>
            <option value="home_left" <?php selected($position, 'home_left'); ?>>Home Left Banner (685x200)</option>
            <option value="home_right" <?php selected($position, 'home_right'); ?>>Home Right Banner (685x200)</option>
            <option value="sidebar_left" <?php selected($position, 'sidebar_left'); ?>>Sidebar Left Banner (270x430)</option>
            <option value="shop_top" <?php selected($position, 'shop_top'); ?>>Shop Top Banner (1100x240)</option>
        </select>
    </p>

    <p>
        <label><strong>Banner Description</strong></label><br>
        <textarea name="banner_description" rows="3" style="width:100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>

    <p>
        <label><strong>Banner Link (Optional)</strong></label><br>
        <input type="url" name="banner_link" value="<?php echo esc_url($link); ?>" style="width:100%;">
    </p>
    <?php
}

// Save Meta
add_action('save_post_home_banner', function($post_id) {

    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;

    update_post_meta($post_id, '_banner_position', sanitize_text_field($_POST['banner_position'] ?? ''));
    update_post_meta($post_id, '_banner_description', sanitize_textarea_field($_POST['banner_description'] ?? ''));
    update_post_meta($post_id, '_banner_link', esc_url_raw($_POST['banner_link'] ?? ''));

});
