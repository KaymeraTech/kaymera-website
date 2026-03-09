<?php /*
Template Name: Contact-us
*/
?>
<?php get_header(); ?>
<main class="main">
    <?php 
		get_template_part('page_templates/contact_us_page/first_screen');
		get_template_part('page_templates/contact_us_page/contact_info');
		get_template_part('page_templates/contact_us_page/help');
	?>
</main>
<?php get_footer(); ?>