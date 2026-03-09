<?php
/**
 * Main setup
 * -----------------
*/
function color_condition() {
    $condition = (is_archive() && !is_post_type_archive('store') ) ||
        is_page_template('page_templates/about-page.php') ||
        is_page_template('page_templates/careers-page.php') ||
        is_page_template('page_templates/contact-us-page.php') ||
        is_page_template('page_templates/faq-page.php') ||
        is_page_template('page_templates/downloads-page.php') ||
        is_page_template('page_templates/press-center-page.php') ||
        is_page_template('page_templates/banking-page.php') ||
        (is_single() && !is_singular(array('store'))); // !is_page_template('')
    return $condition;
}
/**
 * Includes
 * -----------------
*/
include(get_template_directory() . '/includes/front/enqueue.php');
include(get_template_directory() . '/includes/ednpoints.php');
include(get_template_directory() . '/includes/setup.php');
include(get_template_directory() . '/includes/strings_translation.php');
include(get_template_directory() . '/includes/additional_func.php');
include(get_template_directory() . '/includes/post_type_and_tax.php');
include(get_template_directory() . '/includes/get_menu.php');
include(get_template_directory() . '/includes/acf_func.php');
/**
 * Scripts and style
 * -----------------
*/
add_action('wp_enqueue_scripts', 'theme_styles_and_scripts');
/** 
 * Post type and tax
 * -----------------
*/


add_filter( 'term_link', 'rewrite_links', 10, 3 );
function rewrite_links( $termlink, $term, $taxonomy ){
	
    if($taxonomy == 'events-tax'){
        // echo 'link changed';
        $termlink = str_replace('events-tax/', '', $termlink);
    }
    // print_r($term);
    if($taxonomy == 'presscenters-tax'){
        // echo 'link changed';
        $termlink = str_replace('presscenters-tax/', '', $termlink);
    }
	return $termlink;
}


add_action('init', 'register_post_types');
//Default terms
add_action('save_post', 'default_terms_event', 30, 3);
//Request for redirect
add_filter('request', 'change_term_request', 1, 1 );
//Term permalink
add_filter('term_link', 'term_permalink', 10, 3 );
//Term redirect
add_action('template_redirect', 'term_redirect');
//Redirect post type within single
add_action('template_redirect', 'no_exist_single' );
//Redirect tax within tax page
add_action('template_redirect', 'no_exist_tax_page' );
//Execrpt more - "..."
add_filter('excerpt_more', 'new_excerpt_more');
//Execrpt custum length
add_filter('excerpt_length', 'new_excerpt_length');
/** 
 * Themes settings
 * -----------------
*/
add_action('after_setup_theme', 'setup_theme');
//remove admin panel
add_filter('show_admin_bar', '__return_false');
//Disable file editor
// define('DISALLOW_FILE_EDIT', true);
//Disable xmlrpc
add_filter('xmlrpc_enabled', '__return_false');
//Remove menu from admin for moderator
add_action( 'admin_menu', 'remove_menus' );
/** 
 * ACF
 * -----------------
*/
//Notification update ACF off
add_filter('site_transient_update_plugins', 'rwmove_notification_update_acf');
//Notification update ACF off
add_filter('site_transient_update_plugins', 'rwmove_notification_update_acf');
/** 
 * Admin setup
 * -----------------
*/
//Admin column set post views
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
//Admin column get post views
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );
//Moderator menu menu order custum
add_filter('custom_menu_order', 'custom_menu_order'); 
add_filter('menu_order', 'custom_menu_order');
//Moderator menu rename default menu item blog
add_filter( 'post_type_labels_post', 'post_rename_labels' );
/** 
 * Endpoints
 * -----------------
*/
//Send form
add_action('wp_ajax_sendForm', 'sendForm');
add_action('wp_ajax_nopriv_sendForm', 'sendForm');
//Send full form
add_action('wp_ajax_sendFormFull', 'sendFormFull');
add_action('wp_ajax_nopriv_sendFormFull', 'sendFormFull');
//Registration on event
add_action('wp_ajax_registration_event', 'registration_event');
add_action('wp_ajax_nopriv_registration_event', 'registration_event');
//Load more downloads
add_action('wp_ajax_get_downloads', 'get_downloads');
add_action('wp_ajax_nopriv_get_downloads', 'get_downloads');
//Get downloods file
add_action('wp_ajax_download_file', 'download_file');
add_action('wp_ajax_nopriv_download_file', 'download_file');
//Send chooce form
add_action('wp_ajax_sendChoose', 'sendChoose');
add_action('wp_ajax_nopriv_sendChoose', 'sendChoose');
// Create order
add_action('wp_ajax_orderForm', 'orderForm');
add_action('wp_ajax_nopriv_orderForm', 'orderForm');