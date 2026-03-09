<?php
//Theme setup
function setup_theme() {
    //add thumbnails
    add_theme_support('post-thumbnails');
    add_image_size( 'big', 848, 999, false );
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    //menus
    register_nav_menus(array(
        'main' => __('main', 'main'),
        'secondary' => __('secondary', 'secondary'),
        'footer' => __('footer', 'footer')
    ));
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => 'Theme settings',
            'menu_title'    => 'Custum settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}
//Color class
function theme_class() {
    if(color_condition()) :
        return('light');
    else :
        return('dark');
    endif;
}
//Moderator menu custum
function remove_menus(){
    if( current_user_can( 'administrator' ) ) : return false; endif;
	//remove_menu_page( 'index.php' );                  // Консоль
	//remove_menu_page( 'edit.php' );                   // Записи
	//remove_menu_page( 'upload.php' );                 // Медиафайлы
	//remove_menu_page( 'edit.php?post_type=page' );    // Страницы
	remove_menu_page( 'edit-comments.php' );          // Комментарии
	remove_menu_page( 'themes.php' );                 // Внешний вид
	remove_menu_page( 'plugins.php' );                // Плагины
	remove_menu_page( 'users.php' );                  // Пользователи
	remove_menu_page( 'tools.php' );                    // Инструменты
    remove_menu_page( 'options-general.php' );        // Параметры
    remove_menu_page( 'edit.php?post_type=acf-field-group'); //ACF
    add_menu_page( 'menus_edit', 'Edit menus', 'read', 'nav-menus.php', '', 'dashicons-menu', 2 );
    $role_object = get_role( 'editor' );
    $role_object->add_cap( 'edit_theme_options' );
}
//Moderator menu menu order custum
function custom_menu_order($menu_ord) {
    if( current_user_can( 'administrator' ) ) : return false; endif;
    if (!$menu_ord) return true;
    return array(
        'index.php', // Консоль
        'edit.php?post_type=page',
        'edit.php',
        'edit.php?post_type=event',
        'edit.php?post_type=event-registration',
        'edit.php?post_type=custumer',
        'edit.php?post_type=career',
        'edit.php?post_type=contact-form',
        'edit.php?post_type=whitepaper',
        'edit.php?post_type=download',
        'edit.php?post_type=download-email',
        'edit.php?post_type=presscenter',
        'link-manager.php',
        'upload.php',
        'users.php',
        //'edit-comments.php',
        //'themes.php',
        //'plugins.php',
        //'tools.php',
        //'options-general.php',
    );
}
//Moderator menu rename default menu item blog
function post_rename_labels( $labels )
{
    if( current_user_can( 'administrator' ) ) : return false; endif;
    $labels->name = 'Blog posts';
    $labels->menu_name = 'Blog posts';
    return $labels;
}