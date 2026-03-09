<?php
/*
Template Name: FAQ
*/
?>
<?php get_header(); ?>

<main class="main">
    <?php
        get_template_part('page_templates/FAQ/first_screen');
        get_template_part('page_templates/FAQ/questions');
    ?>
</main>

<?php get_footer(); ?>