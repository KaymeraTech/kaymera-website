<?php 
global $post, $constructor, $item;
$constructor = get_field('constructor_blocks', $post->ID);
if($constructor){
    foreach($constructor as $item){
        get_template_part('partials/constructor_parts/'.$item['acf_fc_layout']);
    }
}