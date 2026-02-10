<?php 
/*
Template Name: Contact  Page
*/
get_header();

?>
 <?php get_template_part( 'template-parts/product/breadcrumb' ); ?>




    <div class="contact_page_bg">
        <!--contact map start-->
        <div class="contact_map">
            <div class="map-area">
                <iframe class="map-size"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.693667617067!2d144.946279515845!3d-37.82064364221098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4cee0cec83%3A0xd019c5f69915a4a0!2sCollins%20St%2C%20West%20Melbourne%20VIC%203003%2C%20Australia!5e0!3m2!1sen!2sbd!4v1607512676761!5m2!1sen!2sbd">
                </iframe>
            </div>
        </div>
        <!--contact map end-->
        <div class="container">
            <!--contact area start-->
            <div class="contact_area">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="contact_message content">
                            <h3>contact us</h3>
                            <ul>
                                <?php if (has_site_contact('sc_address')) : ?>
                                    <li><i class="fa fa-fax"></i> Address : <?php echo site_contact('sc_address'); ?></li>
                                <?php endif; ?>
                                <?php if (has_site_contact('sc_phone1')) : ?>
                                    <li><i class="fa fa-phone"></i> <a href="#"><?php echo site_contact('sc_phone1'); ?></a></li>
                                  <?php endif; ?>
                                <?php if (has_site_contact('sc_email1')) : ?>
                                    <li><i class="fa fa-envelope-o"></i> <?php echo site_contact('sc_email1'); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="contact_message form">
                            <h3>Tell us your project</h3>
                           <?php echo my_custom_contact_form() ?>

                        </div>
                    </div>
                </div>
            </div>
            <!--contact area end-->
        </div>
    </div>





<?php get_footer(); ?>
