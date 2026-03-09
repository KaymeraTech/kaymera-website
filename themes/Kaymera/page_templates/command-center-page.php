<?php
/*
Template Name: Command center
*/
?>
<?php get_header(); ?>
<main class="main">
    <?php 
        get_template_part('page_templates/comand_center_page/block_1');
        get_template_part('page_templates/comand_center_page/block_2');
        get_template_part('page_templates/comand_center_page/block_3');
        get_template_part('page_templates/comand_center_page/block_4');
        get_template_part('page_templates/comand_center_page/block_5');
        get_template_part('page_templates/comand_center_page/block_6');
        get_template_part('page_templates/contacts-form');
    ?>
</main>
<?php 
get_template_part('partials/modal-contact-form');
get_footer(); ?>
