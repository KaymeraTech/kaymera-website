<?php
/*
Template Name: Smartphone
*/
?>
<?php get_header(); ?>
<main class="main smartphone-page" id="smartphone-page">
    <?php
        get_template_part('page_templates/smartphone_page/first-screen');
        get_template_part('page_templates/smartphone_page/adventages');
        get_template_part('page_templates/smartphone_page/security');
        get_template_part('page_templates/smartphone_page/threats');
        get_template_part('page_templates/smartphone_page/usability');
        get_template_part('page_templates/smartphone_page/mode');
        get_template_part('page_templates/smartphone_page/image');
        get_template_part('page_templates/smartphone_page/device');
    ?>
</main>
<?php 
get_template_part('partials/modal-contact-form');
get_footer(); ?>