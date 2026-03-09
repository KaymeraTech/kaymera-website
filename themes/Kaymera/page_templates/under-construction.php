<?php
/*
Template Name: Construction
*/
?>
<?php get_header(); ?>

<main class="main">
    <section class="section-text-center section-full-height">
        <div class="wrap">
            <div class="banner-anim">
				<canvas id="canvas"></canvas>
			</div>
            <div class="block-text-center">
                <h1 class="mdc-typography--headline3 title-center">
                   <?php the_field('title'); ?>
                </h1>
                <div class="mdc-typography--body1 text-center">
                    <p>
                        <?php the_field('text'); ?>
                    </p>
                </div>
                <div class="t-center btn-center-block">
                    <a href="<?php echo get_home_url(); ?>" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                        <span class="mdc-button__label dark">Home page</span>
                        <div class="mdc-button__ripple"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('page_templates/contacts-form'); ?>

</main>

<?php get_footer(); ?>