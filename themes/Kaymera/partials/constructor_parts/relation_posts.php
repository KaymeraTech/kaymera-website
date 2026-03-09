<?php
    global $item, $post;
    $postcontent = $item['relation_posts'];
    //echo $postcontent[0]->post_title;
    //var_dump($postcontent) ?>
<div class="read-more">
    <span class="read-more-text mdc-typography--subtitle2">
         Read also:
    </span>
    <a href="<?php echo get_permalink($postcontent[0]->ID); ?>" class="read-more-title mdc-typography--subtitle1">
        <?php echo $postcontent[0]->post_title; ?>
    </a>
    
</div>