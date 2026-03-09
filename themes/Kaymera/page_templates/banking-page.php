<?php /*
Template Name: Banking
*/
?>
<?php get_header(); ?>
<main class="main">
    <?php
        get_template_part('page_templates/banking/first_screen');
        get_template_part('page_templates/banking/threats');
        get_template_part('page_templates/banking/help');
        get_template_part('page_templates/banking/image');
        get_template_part('page_templates/banking/solution');
        get_template_part('page_templates/banking/animated-mockup');
        get_template_part('page_templates/banking/secure');
    ?>
</main>
<?php get_footer(); ?>