<?php
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <li>Search Results</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop_area shop_reverse">
    <div class="container">
        <div class="row">
            <?php get_sidebar( 'shop' ); ?>
            
            <div class="col-lg-9 col-md-12">
                <?php
                if ( have_posts() ) : ?>
                    <div class="row no-gutters shop_wrapper">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            if ( 'product' === get_post_type() ) : ?>
                                <div class="col-lg-3 col-md-4 col-12">
                                    <?php get_template_part( 'template-parts/product/product-card' ); ?>
                                </div>
                            <?php endif;
                        endwhile; ?>
                    </div>

                    <?php get_template_part( 'template-parts/product/pagination' ); ?>

                <?php else : ?>
                    <p>No products found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
