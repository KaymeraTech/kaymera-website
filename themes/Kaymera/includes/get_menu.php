<?php 

class MenuConstructorSA
{
    private function get_menu($location_name)
    {
        $menu_name = $location_name;
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
        return $menuitems;
    }

    public function main()
    {
        $permalink = get_permalink();
        $consctructed = '
        <nav class="menu-nav">
            <ul class="menu-main">';
                $count = 0;
                foreach( $this->get_menu('main') as $item ):
                    // if it does not have a parent item menu_item_parent = 0 (false)
                    if ( !$item->menu_item_parent ): 
                        $consctructed .= '<li>';
                            $consctructed .= '<a ';
                            if($permalink !== $item->url){
                                $consctructed .= 'href="';
                                $consctructed .= $item->url;
                                $consctructed .= '"';
                            }
                            $consctructed .= '>';
                                $consctructed .= $item->title;
                            $consctructed .= '</a>
                        </li>';
                    endif;
                $count++; endforeach;
            $consctructed .= '</ul>
        </nav>';
        return $consctructed;
    }

    // Check for parent class
    private function is_parent_item($get_menu, $parent_id, $item) {
        $parent = 0;
        foreach( $get_menu as $item ):
            if ( $parent_id == $item->menu_item_parent ) :
                $parent++;
            endif;
        endforeach;
        if ($parent > 0) :
            return true;
        endif;
    }

    public function secondary() {
        $permalink = get_permalink();
        $get_menu = $this->get_menu('secondary');
        $constructed = '<nav class="header-secondary-menu">
            <div class="wrap">
                <ul class="secondary-menu">';
                foreach( $get_menu as $item ) :
                    // if it does not have a parent item menu_item_parent = 0 (false)
                    if ( !$item->menu_item_parent ):
                    // save the identifier for later comparison with submenu items
                        $parent_id = $item->ID;
                        $is_parent = $this->is_parent_item($get_menu, $parent_id, $item);
                        // Start displaying the first level item
                        $constructed .= '<li';
                        if ($is_parent) :
                            $constructed .= ' class="has-submenu"';
                        endif;
                        $constructed .=  '>
                            <a ';
                            // Add a link if there are no child items
                            if (!$is_parent && $permalink !== $item->url) :
                                $constructed .= 'href="'.$item->url.'"';
                            endif;
                            $constructed .= '>';
                                $constructed .= $item->title;
                            $constructed .= '</a>';

                            $constructed .= '<ul class="submenu">';
                                foreach( $get_menu as $item_child ):
                                    if ( $parent_id == $item_child->menu_item_parent ):
                                        $constructed .= '<li>';
                                            $constructed .= '<a ';
                                            if($permalink !== $item_child->url){
                                                $constructed .= 'href="';
                                                $constructed .= $item_child->url;
                                                $constructed .='"';
                                            }
                                            $constructed .= '>';
                                            $constructed .= $item_child->title;
                                        $constructed .= '</a></li>';
                                    endif;
                                endforeach;
                            $constructed .= '</ul>';
                        $constructed .= '</li>';
                    endif; 
                endforeach;
            $constructed .= '</ul> </div>
            
        </nav>';
        return $constructed;
    }

    public function footer() {
        $permalink = get_permalink();
        $get_menu = $this->get_menu('footer');
        $constructed = '<nav class="footer-menu">
            <div class="row">';
                foreach( $get_menu as $item ):
                    // if it does not have a parent item menu_item_parent = 0 (false)
                    if ( !$item->menu_item_parent ):
                    // save the identifier for later comparison with submenu items
                        $parent_id = $item->ID;
                        $constructed .= '<div class="col-2 col-md">
                        <div class="footer-menu-title mdc-typography--subtitle2">';
                        $constructed .= $item->title;
                        $constructed .= '</div>';
                            $constructed .= '<ul class="footer-menu-list">';
                                foreach( $get_menu as $item_child ):
                                    if ( $parent_id == $item_child->menu_item_parent ):
                                        $constructed .= '<li>';
                                        $constructed .= '<a ';
                                        if($permalink !== $item_child->url){
                                            $constructed .= 'href="';
                                            $constructed .= $item_child->url;
                                            $constructed .= '" ';
                                        }
                                        $constructed .='class="title">';
                                        $constructed .= $item_child->title;
                                        $constructed .= '</a>';
                                        $constructed .= '</li>';
                                    endif;
                                endforeach;
                            $constructed .= '</ul>';
                        $constructed .= '</div>';     
                    endif;
                endforeach;
            $constructed .= '</div>
        </nav>';
        return $constructed;
    }
}
/*
add_filter( 'nav_menu_submenu_css_class', 'submenu_class', 10, 3 );
function submenu_class( $classes, $args, $depth ){
    if ( $args->theme_location == 'secondary' ) {
        foreach ( $classes as $key => $class ) {
            if ( $class == 'sub-menu' ) {
                $classes[ $key ] = 'submenu';
            }
        }
        return $classes;
    }
}
add_filter( 'nav_menu_css_class', 'menu_class', 10, 3 );
function menu_class( $classes, $args, $depth ){
     foreach ( $classes as $key => $class ) {
        if ( $class == 'menu-item-has-children' ) {
            $classes[ $key ] = 'has-submenu';
        }
    }
    return $classes;
}*/