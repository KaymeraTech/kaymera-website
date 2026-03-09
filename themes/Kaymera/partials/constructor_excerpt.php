<?php
    $constructor = get_field('constructor_blocks');
        if($constructor){
            foreach($constructor as $item){
                if (isset($item['editor'])) {
                    echo wp_trim_words($item['editor'], 23, '...');
                    break;
                }
            }
        }
?>