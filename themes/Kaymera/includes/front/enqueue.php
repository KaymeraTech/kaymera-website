<?php
function theme_styles_and_scripts()
{
    //style
    // wp_register_style('font', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), '1.0', 'all');
    wp_register_style('style', get_template_directory_uri() . '/dist/css/style.css', array(), '1.0', 'all');
    wp_register_style('dark', get_template_directory_uri() . '/dist/css/style-dark.css', array(), '1.0', 'all');
    wp_register_style('light', get_template_directory_uri() . '/dist/css/style-light.css', array(), '1.0', 'all');
    
    wp_enqueue_style('style');
    wp_enqueue_style('font');
    wp_enqueue_style('tiny-slider');

    //Remove Gutenberg Block Library CSS from loading on the frontend
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );

    //Set current color theme file
    if (color_condition()) :
        wp_enqueue_style('light');
    else :
        wp_enqueue_style('dark');
    endif;
   
    //scripts
    wp_register_script('jquery-n', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '1.0.0', true);
    wp_register_script('tiny-slider', 'https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', array(), '1.0.0', true);
    wp_register_script('scroll-magic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js', array(), '1.0.0', true);
    wp_register_script('animation-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.min.js', array(), '1.0.0', true);
    wp_register_script('scroll-magic-indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/debug.addIndicators.min.js', array(), '1.0.0', true);
    wp_register_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array(), '1.0.0', true);
    wp_register_script('draggabilly', 'https://draggabilly.desandro.com/draggabilly.pkgd.min.js', array(), '1.0.0', true);
    wp_register_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '1.0.0', true);

    wp_register_script('feedback-form', get_template_directory_uri() . '/src/js/feedback.js', array('script'), '1.0.0', true);
    wp_register_script('script', get_template_directory_uri() . '/dist/js/script.js', array(), '1.0.0', true);
    wp_register_script('intlTelInput', get_template_directory_uri() . '/dist/js/libs/intlTelInput.js', array(), '1.0.0', true);

    wp_enqueue_script('jquery-n');
    wp_enqueue_script('tiny-slider');
    wp_enqueue_script('scroll-magic');
    wp_enqueue_script('animation-gsap');
    wp_enqueue_script('scroll-magic-indicators');
    wp_enqueue_script('gsap');
    wp_enqueue_script('draggabilly');
    wp_enqueue_script('intlTelInput');
    wp_enqueue_script('swiper');
    wp_enqueue_script('script');
    wp_enqueue_script('feedback-form');

    //register basic value
    wp_localize_script('script', 'api_settings', array(
        'root'          => esc_url_raw(rest_url()),
        'nonce'         => wp_create_nonce('wp_rest'),
        'ajax_url'      => site_url() . '/wp-admin/admin-ajax.php',
        'template'      => get_bloginfo('template_url') . '/'
    ));
    //register field text
    wp_localize_script('script', 'field_settings', array(
        'short_form' => get_field('short_form','option'),
        'short_form_modal' => get_field('short_form_modal','option'),
        'full_form' => get_field('full_form','option'),
        'form_download' => get_field('form_download','option'),
        'registration_form' => get_field('registration_form','option'),
        'wait' => get_field('wait','option'),
        'to_many' => get_field('to_many','option'),
        'must_plus' => get_field('must_plus','option'),
        'choose_form' => get_field('choose_form','option'),
        'short_form_modal' => get_field('short_form_modal','option'),
        'registration_title' => get_field('registration_title','option'),
        'choose_title' => get_field('choose_title','option')
        
    ));
 
    
}
