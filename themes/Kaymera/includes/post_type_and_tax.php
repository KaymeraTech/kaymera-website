<?php

//register custom post_type and taxonomy
function register_post_types()
{
    //Custum post type and tax functions
    function custum_post_type($name, $menu_name, $icon, $archive = false) {
        register_post_type(
            $name,
            array(
                'label'  => null,
                'labels' => array(
                    'name'               => ucfirst($name), //First symbol to uppercase
                    'singular_name'      => $name,
                    'add_new'            => 'Add new',
                    'add_new_item'       => 'Add new '.$name,
                    'edit_item'          => 'Edit',
                    'new_item'           => 'New '.$name,
                    'view_item'          => 'View '.$name,
                    'search_items'       => 'Search',
                    'not_found'          => 'Not found',
                    'not_found_in_trash' => 'Not found',
                    'parent_item_colon'  => '',
                    'menu_name'          => $menu_name
                ),
                'has_archive'         => $archive,
                'public'              => true,
                'exclude_from_search' => false,
                'show_in_menu'        => true,
                'menu_position'       => null,
                'supports'            => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes'),
                'menu_icon'           => $icon
            )
        );
    }
    function custum_post_taxonomy($name) {
        register_taxonomy($name.'s-tax', array($name), array(
            'label'                 => '',
            'labels'                => array(
                'name'              => ucfirst($name).'s',
                'singular_name'     => ucfirst($name).'s',
                'search_items'      => 'Search',
                'all_items'         => 'All '.$name.'s',
                'view_item '        => 'View '.$name.'s',
                'parent_item'       => 'Parent '.$name.'s',
                'parent_item_colon' => 'Parent taxonomy:',
                'edit_item'         => 'Edit '.$name.'s',
                'update_item'       => 'Update '.$name.'s',
                'add_new_item'      => 'Add new '.$name.' term',
                'new_item_name'     => 'Add',
                'menu_name'         => ucfirst($name).'s'.' taxonomies'
            ),
            'description'           => '',
            'public'                => true,
            'publicly_queryable'    => true,
            'show_in_nav_menus'     => true,
            'show_ui'               => true,
            'show_tagcloud'         => true,
            'show_in_rest'          => null,
            'rest_base'             => null,
            'hierarchical'          => true,
            'update_count_callback' => '',
            'rewrite' => array( 'hierarchical' => true ),
            'capabilities'          => array(),
            'meta_box_cb'           => null,
            'show_admin_column'     => true,
            '_builtin'              => false,
            'show_in_quick_edit'    => null,
        ));
    }

    //Contact form
    custum_post_type('contact-form', 'Contact form', 'dashicons-email-alt');
    custum_post_taxonomy('contact-form');

    //Event
    custum_post_type('event', 'Events', 'dashicons-megaphone');
    custum_post_taxonomy('event');

    //Event registrations
    custum_post_type('event-registration', 'Registrations to events', 'dashicons-email-alt');
    custum_post_taxonomy('event-registration');

    //Support
    //custum_post_type('support-article', 'Support articles', 'dashicons-admin-tools');
    //custum_post_taxonomy('support-article');

    //Support tickets
    //custum_post_type('support', 'Support', 'dashicons-admin-users');
    //custum_post_taxonomy('support');

    //Custumers
    custum_post_type('custumer', 'Custumers', 'dashicons-admin-users');
    custum_post_taxonomy('custumer');

    //Careers
    custum_post_type('career', 'Careers', 'dashicons-admin-page');
    custum_post_taxonomy('career');

    //Downloads (Whitepapers&etc)
    custum_post_type('download', 'Downloads', 'dashicons-download');
    custum_post_taxonomy('download');

    //Download emails
    custum_post_type('download-email', 'Emails from downloads', 'dashicons-email');

    //Download emails
    custum_post_type('presscenter', 'Press Center', 'dashicons-text-page');
    custum_post_taxonomy('presscenter');

    custum_post_type('store', 'Products', 'dashicons-products', true);

    custum_post_type('client-order', 'Orders', 'dashicons-cart', true);
}

//Add a default category for all post type, but 'post' default
function default_terms_event($post_id, $post, $update) {
    $types = ['career', 'download', 'event', 'custumer', 'presscenter'];
    foreach ($types as $type) :
        //Check exist tax
        if (isset(get_object_taxonomies($type)[0])) :
            $tax_name = get_object_taxonomies($type)[0];
            //Check exist tax category and dont have set category
            if (isset(get_terms($tax_name)[0]->term_id) && !isset(get_the_terms($post_id, $tax_name)[0]->term_id)) :
                $tax = get_terms($tax_name)[0]->term_id;
                $default_term = $tax; //ID category
                $taxonomy = $tax_name; //Name tax
                wp_set_post_terms($post_id, $default_term, $taxonomy);
            endif;
        endif;
    endforeach;
}

//Array taxonomies for gluing url
function tax_for_change_url() {
    return ['category', 'events-tax', 'custumers-tax', 'presscenters-tax'];
}

//Change query for tax
function change_term_request($query){
    $taxonomies = tax_for_change_url();
    foreach ($taxonomies as $tax) {
        if (isset($query['attachment'])) :
            $include_children = true;
            $name = $query['attachment'];
        else:
            $include_children = false;
            if (isset($query['name'])) :
                $name = $query['name'];
            endif;
        endif;
        if (isset($name)):
            $term = get_term_by('slug', $name, $tax);
        endif;
        if (isset($name) && $term && !is_wp_error($term)):
            if ($include_children) {
                unset($query['attachment']);
                $parent = $term->parent;
                while( $parent ) {
                    $parent_term = get_term( $parent, $tax);
                    $name = $parent_term->slug . '/' . $name;
                    $parent = $parent_term->parent;
                }
            } else {
                unset($query['name']);
            }
            switch($tax):
                case 'category':{
                    $query['category_name'] = $name;
                    break;
                }
                case 'post_tag':{
                    $query['tag'] = $name;
                    break;
                }
                default:{
                    $query[$tax] = $name;
                    break;
                }
            endswitch;
        endif;
    }
    return $query;
}

//Remove tax names
function term_permalink( $url, $term, $taxonomy ){
    $taxonomies = tax_for_change_url();
    foreach ($taxonomies as $tax) {
        if ( strpos($url, $tax) === FALSE || $taxonomy != $tax ) return $url;
        $url = str_replace('/' . $tax, '', $url);
    }
    return $url;
}

//301 redirect
function term_redirect() {
  $taxonomies = tax_for_change_url();
  foreach ($taxonomies as $tax) {
        if( ( is_category() && $tax=='category' ) || ( is_tag() && $tax=='post_tag' ) || is_tax( $tax ) ) :
            if(!strpos( $_SERVER['REQUEST_URI'], $tax ) === FALSE) :
                wp_redirect( site_url( str_replace($tax, '', $_SERVER['REQUEST_URI']) ), 301 );
            else :
                return;
            endif;
        endif;
    }
}

//Redirect post type within single
function no_exist_single() {
  $queried_post_type = get_query_var('post_type');
  $post_types = ['event-registration', 'custumer', 'contact-form', 'download'];
  foreach ($post_types as $post_type) :
    if ( is_single() && $post_type == $queried_post_type ) :
        wp_redirect( home_url(), 301 );
        exit;
    endif;
  endforeach;
}

//Redirect tax within tax page
function no_exist_tax_page() {
    $taxonomies = ['downloads-tax', 'careers-tax'];
    foreach ($taxonomies as $tax) :
      if ( is_tax($tax) ) :
          wp_redirect( home_url(), 301 );
          exit;
      endif;
    endforeach;
}