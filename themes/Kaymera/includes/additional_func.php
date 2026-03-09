<?php

//Add cron task
if ( ! wp_next_scheduled( 'api_store_prices' ) ) {
	wp_schedule_event( time(), 'hourly', 'api_store_prices' );
}
add_action( 'api_store_prices', 'getApiStoreData' );

// Get data for store
function getApiStoreData() {
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://license.kaymera.com/api/v1/purchase/products/',
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

    $products = json_decode($response);
    foreach ($products as $product) {
        //update_field('overview_price', 'rrr---', 3303);
        $query = array(
            'numberposts'      => 1,
            'post_type'        => 'store',
            'meta_key'         => 'product_code',
            'meta_value'       => $product->productCode
        );
        $post_id = get_posts($query)[0]->ID;

        //file_put_contents('test-cron.txt', json_encode($post_id));

        if (!get_field('overview_not_update', $post_id)) {
            update_field('overview_price', $product->price, $post_id);
        }
    }
}

//Navigation
function navigation() {
    global $wp_query;
    $post_per_page = $wp_query->query_vars['posts_per_page'];
    $max_pages = $wp_query->max_num_pages;
    $count = $wp_query->post_count;

    if (isset($wp_query->query['paged'])) :
        $paged = $wp_query->query['paged'];
        $before_pages = $paged - 1;
    else :
        $before_pages = 0;
    endif;
    $first_current_page_post = $before_pages * $post_per_page + 1;
    $last_current_page_post = $before_pages * $post_per_page + $count;

    if ($max_pages > 1) :
        ?>
        <div class="page-navigation">
            <span class="page-number mdc-typography--body1">
                <?php
                    if ($first_current_page_post != $last_current_page_post) :
                        echo $first_current_page_post.' - '.$last_current_page_post;
                    else :
                        echo $first_current_page_post;
                    endif;
                    echo ' of '.$wp_query->found_posts;
                ?>
            </span>
            <a
                <?= get_previous_posts_link() ? 'href="'.get_previous_posts_page_link($max_pages).'"' : '' ?> 
                class="nav-arrow prev">
                    <svg class="icon">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/icons/svgmap.svg#prev" />
                    </svg>
            </a>
            <a
                <?= get_next_posts_link() ? 'href="'.get_next_posts_page_link($max_pages).'"' : '' ?> 
                class="nav-arrow next">
                <svg class="icon">
                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/icons/svgmap.svg#next" />
                </svg>
            </a>
        </div>
    <?php endif;
}
//Breadcrumbs
function breadcrumbs() {
    if (!is_front_page()) {
	    // Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<ul class="breadcrumbs-list">';
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a></li>';
        // Check if the current page is a category
        if (is_category() || is_tax()){
            global $wp_query;
            isset($wp_query->query['paged']) ? $paged = $wp_query->query['paged'] : '';
            $term = get_queried_object();
            //Parent item
            if($term->parent != 0) {
                $term_parent = get_term($term->parent);
                echo '<li><a href="'.get_term_link($term_parent->term_id).'">'.$term_parent->name.'</a></li>';
            }
            //Paged item
            if (isset($paged)) :
                echo '<li><a href="'.get_term_link($term->term_id).'">'.$term->name.'</a></li>';
                echo '<li><span>page #'.$paged.'</span></li>';
            else :
                echo '<li><span>'.$term->name.'</span></li>';
            endif;
        }
        // If the current page is a single post, show its title with the separator
        if (is_singular('career')) {
            echo '
            <li><a href="'.get_home_url().'/careers/">Careers</a></li>
            <li><span>'.get_the_title().'</span></li>';
        }
        elseif (is_single()) {
            $taxonomy = get_post_taxonomies()[0];
            $terms = wp_get_object_terms( get_queried_object_id(), $taxonomy);
            //Parent item
            $term = $terms[0];
            $term_obj = get_term($term, $taxonomy);
            if($term_obj->parent != 0) {
                $term_obj_parent = get_term($term_obj->parent);
                echo '<li><a href="'.get_term_link($term_obj_parent->term_id).'">'.$term_obj_parent->name.'</a></li>';
            }
            echo '
            <li><a href="'.get_term_link($term->term_id).'">'.$term->name.'</a></li>
            <li><span>'.get_the_title().'</span></li>';
        }
        // If the current page is a static page, show its title.
        if (is_page()) {
            echo '<li><span>'.get_the_title().'</span></li>';
        }
	    // if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                echo '<li><span>'.get_the_title().'</span></li>';
                rewind_posts();
            }
        }
        echo '</ul></div>';
    }
}
//Get post views
function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count views";
}
//Set post views
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
//Admin column set post views
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
//Admin column get post views
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
//Execrpt more...
function new_excerpt_more( $more ) {
    return '...';
}
//Execrpt custum length
function new_excerpt_length($length) {
    return 43;
}
//GetResponse integration
function get_response_api($data) {
    $authorization = 'X-Auth-Token: api-key '.get_field('token','option');
    $ch = curl_init();
    //Get value
    $first_name = isset($data['first_name']) ? $data['first_name'] : 'none';
    $last_name = isset($data['last_name']) ? $data['last_name'] : 'none';
    $email = isset($data['email']) ? $data['email'] : 'none';
    $link = isset($data['link']) ? $data['link'] : 'none';
    if ( $first_name != 'none' ) :
        $name = $first_name.' '.$last_name;
    else :
        $name = isset($data['name']) ? $data['name'] : 'none';
    endif;
    //Set data
    $data = array (
    'name' => $name,
    'email' => $email,
    'customFieldValues' => array(
            array(
                "customFieldId" => get_field('customfieldid','option'),
                "value" => array($link)
            )
        ),
    'campaign' => array('campaignId'=>get_field('campaignid','option'))
    );
    $data_string = json_encode($data);
    curl_setopt($ch, CURLOPT_URL,'https://api.getresponse.com/v3/contacts');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    // Receive server response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    //print_r($server_output);
    curl_close ($ch);
}
//Hubspot integration
function hubspot_api($data) {
    //Get API key
    $hapikey = get_field('hapikey','option');
    
    //Get values
    $firstname = isset($data['first_name']) ? $data['first_name'] : '';
    $lastname = isset($data['last_name']) ? $data['last_name'] : '';
    $email = isset($data['email']) ? $data['email'] : '';
    $phone = isset($data['phone']) ? $data['phone'] : '';
    $link = isset($data['link']) ? $data['link'] : '';

    if ( $firstname == '' ) :
        $firstname = isset($data['name']) ? $data['name'] : '';
    endif;

    //Create array of data
    $arr = array(
        'properties' => array(
            array(
                'property' => 'email',
                'value' => $email
            ),
            array(
                'property' => 'firstname',
                'value' => $firstname
            ),
            array(
                'property' => 'lastname',
                'value' => $lastname
            ),
            array(
                'property' => 'phone',
                'value' => $phone
            ),
            array(
                'property' => 'custumsitetag',
                'value' => $link
            )
        )
    );
    $post_json = json_encode($arr);
    $endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . $hapikey;
    $ch = @curl_init();
    @curl_setopt($ch, CURLOPT_POST, true);
    @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
    @curl_setopt($ch, CURLOPT_URL, $endpoint);
    @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = @curl_exec($ch);
    $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_errors = curl_error($ch);
    @curl_close($ch);

}

add_action( 'template_redirect', 'redirections' );
function redirections() {
    $url = substr($_SERVER["REQUEST_URI"], -1) == "/" ? mb_substr($_SERVER["REQUEST_URI"], 0, -1) : $_SERVER["REQUEST_URI"];
    switch ( $url ) {
        case "/kaymeras-mobile-cyber-security-solutions-at-the-cyber-tech-2015-conference-in-israel":
            wp_redirect('/');
            break;
        case "/wp-content/uploads/2018/02/cw-hands.png":
            wp_redirect('/kaymera-smartphone');
            break;
        case "/wp-content/uploads/2015/02/cybertech.png":
            wp_redirect('/press-center/news-press-releases');
            break;
        case "/secured-device":
            wp_redirect('/kaymera-smartphone');
            break;
        case "/secured-device":
            wp_redirect('/kaymera-smartphone');
            break;
        case "/secured-device":
            wp_redirect('/kaymera-smartphone');
            break;
        case "/press":
            wp_redirect('/press-center/news-press-releases');
            break;
        case "/cipherbnd":
            wp_redirect('/app');
            break;
        case "/the-first-anti-espionage-smartphone-enterprise-platform":
            wp_redirect('/the-first-anti-espionage-smartphone-enterprise-platform');
            break;
        case "/the-most-secure-android-phone-ever-introducing-kaymeras-secured-pixel":
            wp_redirect('https://blog.kaymera.com/industry-news-and-articles/the-most-secure-android-phone-ever-introducing-kaymera-phones');
            break;
        case "/kaymera-uses-machine-learning-for-stronger-faster-more-agile-mobile-security":
            wp_redirect('/presscenter/kaymera-uses-machine-learning-for-stronger-faster-more-agile-mobile-security');
            break;
        case "/dont-be-paranoid-about-android":
            wp_redirect('https://blog.kaymera.com/industry-news-and-articles/dont-be-paranoid-about-android');
            break;
        case "/striking-the-perfect-balance-between-usability-and-security":
            wp_redirect('https://blog.kaymera.com/industry-news-and-articles/striking-the-perfect-balance-between-usability-security-kaymera');
            break;
        case "/5-things-you-should-expect-from-your-mobile-cyber-security-solution":
            wp_redirect('https://privacy.kaymera.com/improve-performance-of-your-mobile-security.-kaymera-services');
            break;
        case "/mobile-threat-defense":
            wp_redirect('/presscenter/highest-protection-and-maximum-functionality-perfectly-balanced-kaymera-technologies');
            break;
        case "/kaymera-technologies-mobile-cyber-defense-platform-announces-support-for-the-oneplus-one":
            wp_redirect('/presscenter/kaymera-technologies-mobile-cyber-defense-platform-announces-support-for-the-oneplus-one');
            break;
        case "/confidentia-and-kaymera-partner-to-deliver-secure-mobile-communications":
            wp_redirect('/presscenter/confidentia-and-kaymera-partner-to-deliver-secure-mobile-communications');
            break;
        case "/httpwww-bloomberg-comnews2014-09-29israeli-entrepreneurs-play-both-sides-of-the-cyber-wars-html":
            wp_redirect('/presscenter/israeli-entrepreneurs-play-both-sides-of-the-cyber-wars');
            break;
    }
}

// хук для метатега canonical на родительсткую страницу при пагинации
function archive_canonical( $canonical ) {
    // если в ссылке архива будут цифры - значит это не основная страница и нужно изменить canonical
    if ( is_tax('events-tax') ) {
        $canonical = get_home_url();
        $canonical .= "/webinars";
        $canonical .= "/";
        // echo 'webinaaaaaa';
    }
    
    if ( is_archive('presscenter') ) {
        if(is_paged()){
            $canonical = get_home_url();
            $canonical .= "/press-center";
            $canonical .= "/";
        } else{
            
            $canonical = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        }
    }

    if((int) preg_replace('/[^0-9]/', '', $canonical)){
        if ( is_archive('blog') ) {
            $canonical = get_home_url();
            $canonical .= "/blog";
            $canonical .= "/";
        }

    }
    return $canonical;
}
add_filter( 'wpseo_canonical', 'archive_canonical', 10, 1 );




function reverse_parse_url(array $parts)
{
	$url = '';
	if (!empty($parts['scheme'])) {
		$url .= $parts['scheme'] . ':';
	}
	if (!empty($parts['user']) || !empty($parts['host'])) {
		$url .= '//';
	}	
	if (!empty($parts['user'])) {
		$url .= $parts['user'];
	}	
	if (!empty($parts['pass'])) {
		$url .= ':' . $parts['pass'];
	}
	if (!empty($parts['user'])) {
		$url .= '@';
	}	
	if (!empty($parts['host'])) {
		$url .= $parts['host'];
	}
	if (!empty($parts['port'])) {
		$url .= ':' . $parts['port'];
	}	
	if (!empty($parts['path'])) {
		$url .=  '/' . $parts['path'];
	}	
	if (!empty($parts['query'])) {
		if (is_array($parts['query'])) {
			$url .= '?' . http_build_query($parts['query']);
		} else {
			$url .= '?' . $parts['query'];
		}
	}	
	if (!empty($parts['fragment'])) {
		$url .= '#' . $parts['fragment'];
	}
	
	return $url;
}