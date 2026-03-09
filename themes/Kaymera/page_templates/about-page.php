<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>
<main class="main">
    <?php
    get_template_part('page_templates/about_page/block-1');
    get_template_part('page_templates/about_page/block-2');
    get_template_part('page_templates/about_page/block-3');
    get_template_part('page_templates/about_page/block-4');
    get_template_part('page_templates/about_page/block-5');
    get_template_part('page_templates/contacts-form');
    ?>
</main>
<?php get_footer(); ?>