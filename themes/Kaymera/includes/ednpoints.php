<?php
//Check allowed data
function validate_submission($form_data, $limit_seconds = 60) {
    // 1. Nonce verification
    if (!isset($form_data['nonce']) || !wp_verify_nonce($form_data['nonce'], 'wp_rest')) {
        wp_send_json(['result' => 'Security check failed. Please refresh the page.']);
        exit;
    }

    // 2. Honeypot check
    if (isset($form_data['hp_check']) && !empty($form_data['hp_check'])) {
        wp_send_json(['result' => 'Submission blocked.']);
        exit;
    }

    // 3. User Agent check (basic)
    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        wp_send_json(['result' => 'Submission blocked.']);
        exit;
    }

    // 4. Rate Limiting
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'form_limit_' . md5($user_ip . $_SERVER['HTTP_USER_AGENT']);
    if (get_transient($transient_key)) {
        wp_send_json(['result' => 'Too many submissions. Please wait a minute.']);
        exit;
    }
    set_transient($transient_key, true, $limit_seconds);

    // 5. Length check
    foreach($form_data as $value) :
        if (is_string($value) && strlen($value) > 1000) {
            wp_send_json(['result' => 'Entering too many characters in a form.']);
            exit;
        }
    endforeach;

    return true;
}
//Send form
function sendForm()
{
    // --- START SECURITY CHECKS ---
    
    // 1. Nonce verification
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'wp_rest')) {
        wp_send_json(['result' => 'Security check failed. Please refresh the page.']);
        return;
    }

    // 2. Honeypot check
    if (isset($_POST['hp_check']) && !empty($_POST['hp_check'])) {
        wp_send_json(['result' => 'Submission blocked.']);
        return;
    }

    // 3. User Agent check (basic)
    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        wp_send_json(['result' => 'Submission blocked.']);
        return;
    }

    // 4. Rate Limiting (1 submission per 60 seconds per IP)
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'form_limit_' . md5($user_ip);
    if (get_transient($transient_key)) {
        wp_send_json(['result' => 'Too many submissions. Please wait a minute.']);
        return;
    }
    set_transient($transient_key, true, 60);

    // --- END SECURITY CHECKS ---
    if (validate_submission($_POST)) :
        
        //Mail from setting theme
        $email = get_field('email', 'option');
        //Message to email
        $to = $email;
        $subject = "New Client";
        $headers = 'Content-type: text/html; charset="utf-8"'."\r\n";
        if (!empty($_POST['email'])) {
            $headers .= 'Reply-To: ' . sanitize_email($_POST['email']) . "\r\n";
        }

        $message =
             $_POST['name']
            .'<br />'
            . $_POST['email']
            .'<br />'
            . $_POST['phone']
            . '<br />'
            . $_POST['country']
            . '<br />';
        if (isset($_POST['data_set'])) :
            $message .=
                'data set: '
                . $_POST['data_set']
                .'<br />';
        endif;
        $message .= 'Form type: '.$_POST['form_type'];

        wp_mail($to, $subject, $message, $headers);
        //Post contact
        $my_postarr = array(
            'post_type' => 'contact-form',
            'post_title' => $_POST['name'],
            'post_status' => 'publish'
        );
        //Add post and get this ID
        $post_id = wp_insert_post($my_postarr);

        //Create or set tax with post event name
        $taxonomy = 'contact-forms-tax';
        $term = $_POST['form_type'];
        if (term_exists($term, $taxonomy)) {
            $term_id = get_term_by('name', $term, $taxonomy)->term_id;
            wp_set_post_terms( $post_id, $term_id, $taxonomy, true);
        } else {
            $inserted_term = wp_insert_term( $term, $taxonomy);
            if(!is_wp_error($inserted_term)) {
                $term_id = get_term_by('name', $term, $taxonomy)->term_id;
                wp_set_post_terms( $post_id, $term_id, $taxonomy, true);
            }
        }
        add_post_meta($post_id, 'name', $_POST['name'], false);
        add_post_meta($post_id, 'email', $_POST['email'], false);
        add_post_meta($post_id, 'phone', $_POST['phone'], false);
        add_post_meta($post_id, 'country', $_POST['country'], false);
        if (isset($_POST['data_set'])) :
            add_post_meta($post_id, 'data_set', $_POST['data_set'], false);
        endif;
        
        if($_POST['check']) {
            get_response_api($_POST);
            hubspot_api($_POST);
        }

        $result = ['result' => get_field('contact_success_message','option')];
        wp_send_json($result);

        
    else :
        $result = ['result' => 'Entering too many characters in a form.'];
        wp_send_json($result);
    endif;
}

//Send form Full
function sendFormFull()
{
    // --- START SECURITY CHECKS ---
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'wp_rest')) {
        wp_send_json(['result' => 'Security check failed. Please refresh the page.']);
        return;
    }
    if (isset($_POST['hp_check']) && !empty($_POST['hp_check'])) {
        wp_send_json(['result' => 'Submission blocked.']);
        return;
    }
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'form_limit_full_' . md5($user_ip);
    if (get_transient($transient_key)) {
        wp_send_json(['result' => 'Too many submissions. Please wait a minute.']);
        return;
    }
    set_transient($transient_key, true, 120); // 2 minutes for full form
    // --- END SECURITY CHECKS ---
    if (validate_submission($_POST)) :
        //Mail from setting theme
        $email = get_field('email', 'option');
        //Message to email
        $to = $email;
        $subject = "New Client";
        $headers = 'Content-type: text/html; charset="utf-8"'."\r\n";
        if (!empty($_POST['email'])) {
            $headers .= 'Reply-To: ' . sanitize_email($_POST['email']) . "\r\n";
        }

        $message =
             $_POST['first_name']
            .'<br />'
            . $_POST['last_name']
            .'<br />'
            . $_POST['email']
            .'<br />'
            . $_POST['phone']
            .'<br />'
            . $_POST['country']
            .'<br />'
            . $_POST['company_name']
            .'<br />'
            . $_POST['textarea']
            .'<br />
            Form type: '.$_POST['form_type'];

        wp_mail($to, $subject, $message, $headers);

        //Post contact
        $my_postarr = array(
            'post_type' => 'contact-form',
            'post_title' => $_POST['first_name'].' '.$_POST['last_name'],
            'post_status' => 'publish'
        );

        //Add post and get this ID
        $post_id = wp_insert_post($my_postarr);

        //Create or set tax with post event name
        $taxonomy = 'contact-forms-tax';
        $term = $_POST['form_type'];
        if (term_exists($term, $taxonomy)) {
            $term_id = get_term_by('name', $term, $taxonomy)->term_id;
            wp_set_post_terms( $post_id, $term_id, $taxonomy, true);
        } else {
            $inserted_term = wp_insert_term( $term, $taxonomy);
            if(!is_wp_error($inserted_term)) {
                $term_id = get_term_by('name', $term, $taxonomy)->term_id;
                wp_set_post_terms( $post_id, $term_id, $taxonomy, true);
            }
        }

        add_post_meta($post_id, 'first_name', $_POST['first_name'], false);
        add_post_meta($post_id, 'last_name', $_POST['last_name'], false);
        add_post_meta($post_id, 'email', $_POST['email'], false);
        add_post_meta($post_id, 'phone', $_POST['phone'], false);
        add_post_meta($post_id, 'country', $_POST['country'], false);
        add_post_meta($post_id, 'company_name', $_POST['company_name'], false);
        add_post_meta($post_id, 'message', $_POST['textarea'], false);

        if($_POST['check']) {
            get_response_api($_POST);
            hubspot_api($_POST);
        }

        $result = ['result' => get_field('contact_success_message','option')];
        wp_send_json($result);

    else :
        $result = ['result' => 'Entering too many characters in a form.'];
        wp_send_json($result);
    endif;
}

// Registration to event
function registration_event()
{
    if (validate_submission($_POST)) :

        //Mail from setting theme
        $email = get_field('email', 'option');
        $to = $email;
        $subject = "New Client";
        $headers = 'Content-type: text/html; charset="utf-8"'."\r\n";
        if (!empty($_POST['email'])) {
            $headers .= 'Reply-To: ' . sanitize_email($_POST['email']) . "\r\n";
        }

        //Message to email
        $message =
        '<h2>Member info</h2><br />'
        . $_POST['first_name'] . '<br />'
        . $_POST['last_name'] . '<br />'
        . $_POST['email'] . '<br />'
        . $_POST['phone'] . '<br />'
        . $_POST['country'] . '<br />'
        . $_POST['company'] . '<br />'
        . '<h2>Event info</h2><br />'
        . $_POST['event_title'] . '<br />'
        . $_POST['event_link']. '<br />'
        . $_POST['event_id'];
        wp_mail($to, $subject, $message, $headers);

        //Post registration member data to custum fields
        $my_postarr = array(
            'post_type' => 'event-registration',
            'post_title' => $_POST['first_name'].' '.$_POST['last_name'],
            'post_status' => 'publish'
        );
        //Add post and get this ID
        $post_id = wp_insert_post($my_postarr);
        
        //Create or set tax with post event name
        $taxonomy = 'event-registrations-tax';
        $term = $_POST['event_title'];
        if (term_exists($term, $taxonomy)) {
            $term_id = get_term_by('name', $term, $taxonomy)->term_id;
            wp_set_post_terms( $post_id, $term_id, $taxonomy, true);
        } else {
            $inserted_term = wp_insert_term( $term, $taxonomy);
            if(!is_wp_error($inserted_term)) {
                $term_id = get_term_by('name', $term, $taxonomy)->term_id;
                wp_set_post_terms( $post_id, $term_id, $taxonomy, true);
            }
        }
        
        //Add or Update Member info
        $group_name = 'member_info';
        update_field( $group_name.'_'.'first_name', $_POST['first_name'], $post_id );
        update_field( $group_name.'_'.'last_name', $_POST['last_name'], $post_id );
        update_field( $group_name.'_'.'email', $_POST['email'], $post_id );
        update_field( $group_name.'_'.'phone', $_POST['phone'], $post_id );
        update_field( $group_name.'_'.'country', $_POST['country'], $post_id );
        update_field( $group_name.'_'.'company', $_POST['company'], $post_id );

        //Add/Update Event info
        $group_name = 'event_info';
        update_field( $group_name.'_'.'event_link', $_POST['event_id'], $post_id );

        if($_POST['check']) {
            get_response_api($_POST);
            hubspot_api($_POST);
        }
        
        $result = ['result' => get_field('registration_success_message','option')];
        wp_send_json($result);

    else :
        $result = ['result' => 'Entering too many characters in a form.'];
        wp_send_json($result);
    endif;
}

/** 
 * Downloads functions
 * -----------------
*/
//Download template
function template_download($term, $opacity) {
    $result  =  '<div style="opacity:'.$opacity.'"';
    $result .=  'data-post-id="'.get_the_id().'"';
    $result  .=  'class="modal-download-button fadein full-width-panel">';
    $result .=  '<div class="full-width-panel-image">';
    $result .=  get_the_post_thumbnail(get_the_id(), 'thumbnail') ? get_the_post_thumbnail(get_the_id(), 'thumbnail') : '';
    $result .=  '</div>';
    $result .=  '<div class="full-width-panel-info">';
    $result .=  '<span class="full-width-panel-overline mdc-typography--overline">'.$term.'</span>';
    $result .=  '<h3 class="mdc-typography--headline5 full-width-panel-title">';
    $result .=  get_the_title();
    $result .=  '</h3>';
    $result .=  '</div>';
    $result .=  '<a target="_blank"' ;
    $result .=  'href="#" class="mdc-button mdc-button-icon mdc-button--outlined">';
    $result .=  '<span class="mdc-button__ripple"></span>';
    $result .=  '<span class="mdc-button__label">';
    $result .=  '<svg class="icon"><use xlink:href="'.get_template_directory_uri().'/img/icons/svgmap.svg#download2"/></svg>';
    $result .=  '<span>Download</span>';
    $result .=  '</span>';
    $result .=  '</a>';
    $result .=  '</div>';
    return $result;
}
//Download loop
function loop_download($perpagecount, $offset, $term, $opacity) {
    $downloads = array(
        'post_type' => 'download',
        'posts_per_page' => $perpagecount,
        'orderby' => 'date',
        'order' => 'DESC',
        'offset' => $offset,
        'tax_query' => array(
            array(
                'taxonomy' => 'downloads-tax',
                'field' => 'slug',
                'terms' => $term
            )
        )
    );
    $downloads = get_posts( $downloads );
    if (isset($downloads)) :
        global $post;
        $result = '';
        foreach(  $downloads as $post ) :
            setup_postdata( $post );
            $result .= template_download($term, $opacity);
        endforeach;
        wp_reset_postdata();
    else :
        $result = 'Empty';
    endif;
    return $result;
}

//Download load more
function get_downloads() {
    //For json Ajax
    $data = json_decode(file_get_contents('php://input'), true);
    $result = loop_download($data['perpagecount'], $data['offset'], $data['term'], 0 );
    wp_send_json($result);
}

/** Emails from downloads*/
function download_file()
{
    if (validate_submission($_POST)) :
        //Mail from setting theme
        $email = get_field('email', 'option');
        $to = $email;
        $subject = "New Client";
        $headers = 'Content-type: text/html; charset="utf-8"'."\r\n";
        if (!empty($_POST['email'])) {
            $headers .= 'Reply-To: ' . sanitize_email($_POST['email']) . "\r\n";
        }

        //Get Form data
        $email = $_POST['email'];
        $download_id = $_POST['post_id'];
        $check = $_POST['check'];
        //Get data about post
        $post = get_post( $download_id );
        $post_title = $post->post_title;
        $download_url = get_field('download_link', $download_id);
        //Message to admin
        $message =
        '<h2>Member info</h2><br />'
        . $email . '<br />'
        . '<h3>What downloaded:</h3><br />'
        . '<a target="_blank" href="'.$download_url.'">'.$post_title.'</a><br />'
        . '<h3>ID of post whith this material</h3><br />'
        . $download_id
        . '<h3>Agree to receive security related updates from Kaymera</h3><br />'
        . $check;
        wp_mail($to, $subject, $message, $headers);
        //Message to client
        $message =
          '<h2>Your info</h2><br />'
        . $email . '<br />'
        . '<h3>Link to material:</h3><br />'
        . '<a target="_blank" href="'.$download_url.'">'.$post_title.'</a><br />';
        $headers_client = 'Content-type: text/html; charset="utf-8"'."\r\n";
        wp_mail($email, "Link to material", $message, $headers_client);
        //Set status by check
        if($check) {
            $status = 'publish';
        } else {
            $status = 'private';
        }
        $postarr = array(
            'post_type' => 'download-email',
            'post_title' => $_POST['email'],
            'post_status' => $status
        );
        //Add post and get this ID
        $post_id = wp_insert_post($postarr);
        //Set/Update fields
        update_field( 'email', $email, $post_id );
        update_field( 'link_to_material', $download_id, $post_id );
        update_field( 'agree', $check, $post_id );

        if($_POST['check']) {
            get_response_api($_POST);
            hubspot_api($_POST);
        }

        //Send result
        $result = ['result' => get_field('download_success_message','option'), 'link' => $download_url];
        wp_send_json($result);

    else :
        $result = ['result' => 'Entering too many characters in a form.'];
        wp_send_json($result);
    endif;
}

//Send choose form
function sendChoose()
{
    if (validate_submission($_POST)) :
        //Mail from setting theme
        $email = get_field('email', 'option');
        //Message to email
        $to = $email;
        $subject = "New Client";
        $headers = 'Content-type: text/html; charset="utf-8"'."\r\n";
        if (!empty($_POST['email'])) {
            $headers .= 'Reply-To: ' . sanitize_email($_POST['email']) . "\r\n";
        }

        $message =
             $_POST['first_name']
            .'<br />'
            . $_POST['last_name']
            .'<br />'
            . $_POST['email']
            .'<br />'
            . $_POST['country']
            .'<br />'
            . $_POST['phone']
            .'<br />';
        if (isset($_POST['choose'])) :
            $message .=
                'Choose: '
                . $_POST['choose']
                .'<br />';
        endif;
        $message .=
            'Form type: '.$_POST['form_type'];

        wp_mail($to, $subject, $message, $headers);

        //Post contact
        $my_postarr = array(
            'post_type' => 'contact-form',
            'post_title' => $_POST['first_name'].' '.$_POST['last_name'],
            'post_status' => 'publish'
        );

        //Add post and get this ID
        $post_id = wp_insert_post($my_postarr);

        //Create or set tax with post event name
        $taxonomy = 'contact-forms-tax';
        $term = $_POST['form_type'];
        if (term_exists($term, $taxonomy)) {
            $term_id = get_term_by('name', $term, $taxonomy)->term_id;
            wp_set_post_terms( $post_id, $term_id, $taxonomy, true);
        } else {
            $inserted_term = wp_insert_term( $term, $taxonomy);
            if(!is_wp_error($inserted_term)) {
                $term_id = get_term_by('name', $term, $taxonomy)->term_id;
                wp_set_post_terms( $post_id, $term_id, $taxonomy, true);
            }
        }

        add_post_meta($post_id, 'first_name', $_POST['first_name'], false);
        add_post_meta($post_id, 'last_name', $_POST['last_name'], false);
        add_post_meta($post_id, 'email', $_POST['email'], false);
        add_post_meta($post_id, 'phone', $_POST['phone'], false);
        add_post_meta($post_id, 'country', $_POST['country'], false);
        if (isset($_POST['choose'])) :
            add_post_meta($post_id, 'choose', $_POST['choose'], false);
        endif;

        if($_POST['check']) {
            get_response_api($_POST);
            hubspot_api($_POST);
        }

        $result = ['result' => get_field('contact_success_message','option')];
        wp_send_json($result);

    else :
        $result = ['result' => 'Entering too many characters in a form.'];
        wp_send_json($result);
    endif;
}

// Create order
function orderForm() {
    if (validate_submission($_POST)) :
        $result = buy_api();
        $status = 'decline';
        if ($result->message == 'Success') :
            send_order_data_email();
            //$status = 'accepted';
        endif;
        // Save in DB
        save_order_data_db($result, $status);
    else :
        $result = ['result' => 'Entering too many characters in a form.'];
    endif;
    // Send result
    wp_send_json($result);
}

function buy_api() {
    $receiveUpdates = $_POST['check'] ? $receiveUpdates = 1 : $receiveUpdates = 0;

    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL =>
    // alon.baine@kaymera.com?firstName=alon&lastName=bainer&productCode=888&phone=1234567&receiveUpdates=1
    'https://license.kaymera.com/api/v1/purchase/link/'
        .$_POST['email'].'?firstName='.$_POST['first_name'].'&lastName='.$_POST['last_name'].'&productCode='.$_POST['productCode'].'&phone='.$_POST['phone'].'&receiveUpdates='.$receiveUpdates,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);

    if (!$response) {
        $response->message = 'Error';
    } else {
        $response = json_decode($response);
    }
    
    return $response;
}

function save_order_data_db($result, $status) {
    //Post contact
    $my_postarr = array(
        'post_type' => 'client-order',
        'post_title' => $_POST['first_name'].' '.$_POST['last_name'],
        'post_status' => 'publish'
    );
    //Add post and get this ID
    $post_id = wp_insert_post($my_postarr);
    // Main fields
    add_post_meta($post_id, 'first_name', $_POST['first_name'], false);
    add_post_meta($post_id, 'last_name', $_POST['last_name'], false);
    add_post_meta($post_id, 'email', $_POST['email'], false);
    add_post_meta($post_id, 'phone', $_POST['phone'], false);
    add_post_meta($post_id, 'checkbox_status', $_POST['check'], false);
    add_post_meta($post_id, 'order_status', $status, false);
    add_post_meta($post_id, 'api_response', json_encode($result), false);
    // Additional
    add_post_meta($post_id, 'country', $_POST['country'], false);
    if (isset($_POST['data_set'])) :
        add_post_meta($post_id, 'data_set', $_POST['data_set'], false);
    endif;
}

function send_order_data_email() {
    //Mail from setting theme
    $email = get_field('email', 'option');
    //Message to email
    $to = $email;
    $subject = "New Order";
    $headers = 'Content-type: text/html; charset="utf-8"'."\r\n";
    if (!empty($_POST['email'])) {
        $headers .= 'Reply-To: ' . sanitize_email($_POST['email']) . "\r\n";
    }
    $message =
        $_POST['name']
        .'<br />'
        . $_POST['email']
        .'<br />'
        . $_POST['phone']
        . '<br />'
        . $_POST['country']
        . '<br />';
    if (isset($_POST['data_set'])) :
        $message .=
            'data set: '
            . $_POST['data_set']
            .'<br />';
    endif;
    $message .= 'Form type: '.$_POST['form_type'];
    wp_mail($to, $subject, $message, $headers);
}
