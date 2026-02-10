<?php
/**
 * Render banners dynamically based on position
 *
 * Positions:
 * - home_left
 * - home_right
 * - sidebar_left
 * - shop_top
 */
function render_banner($position) {

    $args = [
        'post_type'      => 'home_banner',
        'posts_per_page' => 1,
        'meta_key'       => '_banner_position',
        'meta_value'     => $position,
        'post_status'    => 'publish',
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        $query->the_post();

        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $link = get_post_meta(get_the_ID(), '_banner_link', true);
        $description = get_post_meta(get_the_ID(), '_banner_description', true);

        // Only output if image exists
        if ($image) :

            switch ($position) {

                case 'home_left':
                case 'home_right':
                    // Home page banners (left/right)
                    ?>
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <?php if ($link) : ?>
                                <a href="<?php echo esc_url($link); ?>">
                            <?php endif; ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>">
                            <?php if ($link) : ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php if ($description) : ?>
                            <p class="banner-description d-none"><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </figure>
                    <?php
                    break;

                case 'sidebar_left':
                    // Shop sidebar banner
                    ?>
                    <div class="widget_list widget_banner">
                        <figure class="single_banner">
                            <div class="banner_thumb">
                                <?php if ($link) : ?>
                                    <a href="<?php echo esc_url($link); ?>">
                                <?php endif; ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>">
                                <?php if ($link) : ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php if ($description) : ?>
                                <p class="banner-description d-none"><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                        </figure>
                    </div>
                    <?php
                    break;

                case 'shop_top':
                    // Shop top banner
                    ?>
                    <div class="shop_banner_area mb-30">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop_banner_thumb">
                                    <?php if ($link) : ?>
                                        <a href="<?php echo esc_url($link); ?>">
                                    <?php endif; ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>">
                                    <?php if ($link) : ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <?php if ($description) : ?>
                                    <p class="banner-description d-none"><?php echo esc_html($description); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
            }

        endif;

    endif;

    wp_reset_postdata();
}
