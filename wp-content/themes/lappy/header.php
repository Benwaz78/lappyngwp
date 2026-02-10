<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 <!--Offcanvas menu area start-->
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="antomi_message">
                            <p>Get free shipping – Free 30 day money back guarantee</p>
                        </div>
                        <div class="header_top_settings text-end">
                            <ul>
                                <?php if (has_site_contact('sc_email1')) : ?>
                                    <li>Email: <a href="mailto:<?php echo site_contact('sc_email1'); ?>"><?php echo site_contact('sc_email1'); ?> </a></li>
                                <?php endif; ?>
                                <?php if (has_site_contact('sc_phone1')) : ?>
                                    <li>Call: <a href="tel:<?php echo site_contact('sc_phone1'); ?>"><?php echo site_contact('sc_phone1'); ?> </a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                      <div class="search_container">
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <div class="search_box">
                                    <input type="search" class="search-field" placeholder="Search product..." value="<?php echo get_search_query(); ?>" name="s" />
                                    <input type="hidden" name="post_type" value="product" />
                                    <button type="submit">Search</button>
                                </div>
                            </form>
                      </div>


                      
                        <div id="menu" class="text-start ">
                            <?php
                                wp_nav_menu([
                                    'theme_location' => 'primary_menu',
                                    'container'      => false,
                                    'menu_class'     => 'offcanvas_main_menu',
                                    'fallback_cb'    => false,
                                ]);
                            ?>

                        </div>
                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> demo@example.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->

    <!--header area start-->
    <header>
        <div class="main_header">
            <div class="container">
                <!--header top start-->
                <div class="header_top">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-5">
                            <div class="antomi_message">
                                <?php if (has_site_contact('sc_address')) : ?>
                                    <p><?php echo site_contact('sc_address'); ?> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="header_top_settings text-end">
                                <ul>
                                    <?php if (has_site_contact('sc_email1')) : ?>
                                        <li>Email: <a href="mailto:<?php echo site_contact('sc_email1'); ?>"><?php echo site_contact('sc_email1'); ?> </a></li>
                                    <?php endif; ?>
                                    <?php if (has_site_contact('sc_phone1')) : ?>
                                        <li>Call: <a href="tel:<?php echo site_contact('sc_phone1'); ?>"><?php echo site_contact('sc_phone1'); ?> </a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo get_permalink( get_page_by_path('about-us') ); ?>"> About</a></li>
                                    <li><a href="<?php echo get_permalink( get_page_by_path('contact-us') ); ?>"> Contact</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header top start-->

                <!--header middel start-->
                <div class="header_middle sticky-header">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-4">
                            <div class="logo">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="main_menu menu_position ">
                                <nav>
                                    <?php
                                        wp_nav_menu([
                                            'theme_location' => 'primary_menu',
                                            'container'      => false,
                                            'menu_class'     => '',
                                            'fallback_cb'    => false,
                                        ]);
                                    ?>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-7 col-6">
                            <div class="header_configure_area">
                                <?php if (has_site_contact('sc_facebook')) : ?>
                                    <div class="mini_cart_wrapper">
                                        <a href="<?php echo site_contact('sc_facebook'); ?>" class="top-social facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </div>
                               <?php endif; ?>
                                <?php if (has_site_contact('sc_twitter')) : ?>
                                    <div class="mini_cart_wrapper">
                                        <a href="<?php echo site_contact('sc_twitter'); ?>" class="top-social twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if (has_site_contact('sc_instagram')) : ?>
                                    <div class="mini_cart_wrapper">
                                        <a href="<?php echo site_contact('sc_instagram'); ?>" target="_blank" class="top-social instagram">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header middel end-->

                

                <!--header bottom satrt-->
                <div class="header_bottom">
                    <div class="row align-items-center">
                        <div class="column1 col-lg-3 col-md-6">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">
                                        <i class="fa fa-search-plus"></i> 
                                        FIND YOUR LAPTOP FASTER
                                   </h2>
                                </div>
                                <div class="categories_menu_toggle" <?php if( !is_front_page() ) echo 'style="display:none;"'; ?>>
                                    <form class="p-2" method="get" action="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">
                                        <div class="site-form">
                                            <select name="product_brand" class="form-control">
                                                <option value="">Choose Brand</option>
                                                <?php
                                                $brands = get_terms([
                                                    'taxonomy'   => 'product_brand',
                                                    'hide_empty' => true,
                                                ]);
                                                foreach ($brands as $brand) {
                                                    echo '<option value="' . esc_attr($brand->slug) . '">' . esc_html($brand->name) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="site-form">
                                            <select name="pa_processor" class="form-control">
                                                <option value="">Choose Processor</option>
                                                <?php
                                                $processors = get_terms([
                                                    'taxonomy'   => 'pa_processor',
                                                    'hide_empty' => true,
                                                ]);
                                                foreach ($processors as $p) {
                                                    echo '<option value="' . esc_attr($p->slug) . '">' . esc_html($p->name) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="site-form">
                                            <select name="pa_ram" class="form-control">
                                                <option value="">Choose RAM</option>
                                                <?php
                                                $rams = get_terms([
                                                    'taxonomy'   => 'pa_ram',
                                                    'hide_empty' => true,
                                                ]);
                                                foreach ($rams as $r) {
                                                    echo '<option value="' . esc_attr($r->slug) . '">' . esc_html($r->name) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="site-form">
                                            <select name="pa_storage" class="form-control">
                                                <option value="">Choose Storage</option>
                                                <?php
                                                $storages = get_terms([
                                                    'taxonomy'   => 'pa_hdd',
                                                    'hide_empty' => true,
                                                ]);
                                                foreach ($storages as $s) {
                                                    echo '<option value="' . esc_attr($s->slug) . '">' . esc_html($s->name) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="site-form">
                                            <select name="pa_operating-system" class="form-control">
                                                <option value="">Choose OS</option>
                                                <?php
                                                $os = get_terms([
                                                    'taxonomy'   => 'pa_operating-system',
                                                    'hide_empty' => true,
                                                ]);
                                                foreach ($os as $o) {
                                                    echo '<option value="' . esc_attr($o->slug) . '">' . esc_html($o->name) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="site-form">
                                            <select name="pa_condition" class="form-control">
                                                <option value="">Choose Condition</option>
                                                <?php
                                                $conditions = get_terms([
                                                    'taxonomy'   => 'pa_condition',
                                                    'hide_empty' => true,
                                                ]);
                                                foreach ($conditions as $c) {
                                                    echo '<option value="' . esc_attr($c->slug) . '">' . esc_html($c->name) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <button class="site-btn w-100 text-center" type="submit">FIND NOW</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-9 col-md-9">
                           <div class="search_container">
                                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <div class="search_box">
                                        <input type="search" class="search-field" placeholder="Search product..." value="<?php echo get_search_query(); ?>" name="s" />
                                        <input type="hidden" name="post_type" value="product" />
                                        <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                        
                    </div>
                </div>
                <!--header bottom end-->
            </div>
        </div>
    </header>
    <!--header area end-->