<?php
function my_custom_contact_form() {
    if ( function_exists( 'wpcf7_contact_form' ) ) {
        // Replace 123 with your actual Contact Form 7 ID
        return do_shortcode('[contact-form-7 id="5cdd6cf" title="Contact Form"]');
    }
    return '<p>Contact form not found.</p>';
}

