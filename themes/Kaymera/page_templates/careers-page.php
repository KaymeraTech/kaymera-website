<?php
/*
Template Name: Careers
*/
?>
<?php get_header(); ?>
<main class="main">
    <?php
        get_template_part('page_templates/careers_page/first_screen');
        get_template_part('page_templates/careers_page/open_roles');
        get_template_part('page_templates/careers_page/send_cv');
        get_template_part('page_templates/careers_page/image');
        get_template_part('page_templates/careers_page/adventages');
        get_template_part('page_templates/careers_page/explore');
        get_template_part('page_templates/contacts-form');
    ?>
<?php get_footer(); ?>