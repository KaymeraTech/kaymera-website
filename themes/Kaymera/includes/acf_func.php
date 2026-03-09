<?php
//Footer social links
function the_social(){
    if( have_rows('social', 'option') ):
        $constructed = '<ul class="socials">';
            while( have_rows('social', 'option') ) : the_row();
            $constructed .= '<li>
                    <a href="'.
                    get_sub_field('link').'" target="_blank">
                        <svg class="icon">
                            <use xlink:href="'.get_template_directory_uri().'/img/icons/svgmap.svg#'.
                            strtolower(get_sub_field('title')).
                            '" />
                        </svg>
                    </a>
                </li>';
            endwhile;
        $constructed .= '</ul>';
    endif;
    echo $constructed;
}
//Footer copywrite
function the_copywrite(){
    echo '© '.get_bloginfo( 'name' ).
    ' '.
    get_field('year', 'option').'. '.
    get_field('all_right','option');
}
//Notification ACF off
function rwmove_notification_update_acf($value) {
    unset($value->response[ 'advanced-custom-fields-pro/acf.php' ]);
    return $value;
}