<?php 
/*
Template Name: About Us 
*/
get_header();

?>
 <?php get_template_part( 'template-parts/product/breadcrumb' ); ?>




   <!--about bg area start-->
    <div class="about_bg_area">
        <div class="container">
            <!--about section area -->
            <section class="about_section mb-60">
                <div class="row align-items-center">
                    <div class="col-12">
                        <figure>
                            <div class="about_thumb">
                                <img src="assets/img/about/about1.jpg" alt="">
                            </div>
                            <figcaption class="about_content">
                                <h1>About Us</h1>
                                <p>
                                    Lappy NG is one of Nigeria's leading online Market place; We have the best collection of all kind and brand of Laptops and Desktops ranging from the highest processor to the lowest
                                </p>
                                <p>
                                    Our aim is to make affordable laptop and Desktop available at every Nigerian home
                                </p>
                                <p>
                                    We are also a verified reseller of HP, Lenovo, Dell, Asus, Acer, Apple and other brands
                                </p>
                                <div class="about_signature">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo/logo.png" alt="">
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </section>
            <!--about section end-->

          

           

         
        </div>
    </div>
    <!--about bg area end-->






<?php get_footer(); ?>
