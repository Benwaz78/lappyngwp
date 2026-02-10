<!--footer area start-->
    <footer class="footer_widgets">
        <!--newsletter area start-->
        <div class="newsletter_area">
            <div class="container">
                <div class="newsletter_inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-5">
                            <div class="newsletter_sing_up">
                                <h3>Newsletter Sign Up</h3>
                                <p>Subscribe to our newsletter</p>
                            </div>
                        </div>
                      
                        <div class="col-lg-5 col-md-12 offset-lg-4">
                            <div class="subscribe_form">
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address..." />
                                    <button id="mc-submit">Subscribe</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--newsletter area end-->
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-7">
                       <div class="widgets_container contact_us">
                           <h3>About Us</h3>
                           <div class="aff_content">
                               <p>
                                Lappy NG is one of Nigeria's leading online Market place; We have the best collection of all kind and brand of Laptops 
                                and Desktops ranging from the highest processor to the lowest
                               </p>
                               <a class="text-danger" href="<?php echo get_permalink( get_page_by_path('about-us') ); ?>">Readmore</a>
                               
                           </div>
                          
                       </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="widgets_container widget_menu">
                            <h3>Filter By Brands</h3>
                            <div class="footer_menu">
                                <ul class="footer_menu">
                                    <?php
                                    $brands = get_terms([
                                        'taxonomy'   => 'product_brand', // change to pa_brand if needed
                                        'hide_empty' => true,
                                    ]);

                                    if ( ! empty($brands) && ! is_wp_error($brands) ) :
                                        foreach ( $brands as $brand ) :
                                            ?>
                                            <li>
                                                <a href="<?php echo esc_url( get_term_link( $brand ) ); ?>">
                                                    <?php echo esc_html( $brand->name ); ?>
                                                </a>
                                            </li>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Filter By Processor</h3>
                            <div class="footer_menu">
                               <ul>
                                <?php
                                $processors = get_terms([
                                    'taxonomy'   => 'pa_processor',
                                    'hide_empty' => true,
                                ]);

                                if ( ! empty($processors) && ! is_wp_error($processors) ) :
                                    foreach ( $processors as $processor ) :
                                        ?>
                                        <li>
                                            <a href="<?php echo esc_url( get_term_link( $processor ) ); ?>">
                                                <?php echo esc_html( $processor->name ); ?>
                                            </a>
                                        </li>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-5 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Filter By RAM</h3>
                            <div class="footer_menu">
                               <ul>
                                    <?php
                                    $ram_terms = get_terms([
                                        'taxonomy'   => 'pa_ram',
                                        'hide_empty' => true,
                                    ]);

                                    if ( ! empty($ram_terms) && ! is_wp_error($ram_terms) ) :
                                        foreach ( $ram_terms as $term ) :
                                            ?>
                                            <li>
                                                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                                                    <?php echo esc_html( $term->name ); ?>
                                                </a>
                                            </li>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                              </ul>

                            </div>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 col-md-7 col-sm-12">
                        <div class="widgets_container">
                            <h3>CONTACT INFO</h3>
                            <div class="footer_contact">
                                <div class="footer_contact_inner">
                                    <div class="contact_icone">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/icon/icon-phone.png" alt="">
                                    </div>
                                    <div class="contact_text">
                                        <p>Hotline Free 24/24: <br> <strong><?php echo site_contact('sc_phone1'); ?></strong></p>
                                    </div>
                                </div>
                                <p>Your address goes here. <br> <?php echo site_contact('sc_email1'); ?></p>
                            </div>

                            <div class="footer_social">
                                <ul>
                                    <?php if (has_site_contact('sc_facebook')) : ?>
                                        <li>
                                            <a class="facebook" href="<?php echo site_contact('sc_facebook'); ?>"><i class="fa fa-facebook"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (has_site_contact('sc_twitter')) : ?>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (has_site_contact('sc_instagram')) : ?>
                                        <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                     <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>&copy; <?php echo date("Y") ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-uppercase">Lappy.ng</a>. Made with <i class="fa fa-heart"></i> by <a target="_blank" href="#">Bonnysoft</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-end">
                            <img src="assets/img/icon/payment.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
  



    <!-- JS
============================================ -->

  <?php wp_footer(); ?>


</body>

</html>