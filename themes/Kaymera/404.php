<?php get_header(); ?>
<main class="main">
    <section class="section-text-center section-full-height red">
        <div class="wrap">
            <div class="block-text-center">
                <div class="top-upper">
                    <span>4</span>
                    <?php echo wp_get_attachment_image(
									730,
									'full', ''); ?>
                    <span>4</span>
                </div>
                <span class="main-text mdc-typography--headline2">
                    Oops!
                </span>
                <div class="mdc-typography--body1 text-center">
                    <p>
                        We tried, but page not found
                    </p>
                </div>
                <div class="t-center btn-center-block">
                    <a href="<?= home_url(); ?>" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                        <span class="mdc-button__label">Home page</span>
                        <span class="mdc-button__ripple"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>