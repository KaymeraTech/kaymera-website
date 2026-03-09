<?php get_header();
while ( have_posts() ) :
    the_post(); ?>
    <main class="main">
        <section class="section-simple">
            <div class="wrap">
                <?php breadcrumbs(); ?>
            </div>
        </section>

        <section class="section-page">
            <div class="wrap">
                <div class="row section-blog-grid-row">
                    
                    <div class="col col-9 col-lg-8 col-md">
                        <div class="single-content-block">
                            <h1 class="mdc-typography--headline4 single-title">
                                <?php the_title(); ?>
                            </h1>
                            <?php the_content(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
<?php endwhile;
get_footer(); ?>