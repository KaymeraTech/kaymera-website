<?php get_header(); ?>
<main class="main">
        <section class="section-simple">
            <div class="wrap">
                <?php breadcrumbs(); ?>
            </div>
        </section>

        <section class="section-page">
            <div class="wrap">
                <div class="row">
                    <div class="col-8 col-md">
                        <div class="single-content-block">
                            <h1 class="mdc-typography--headline4 single-title">
                                <?php the_title(); ?>
                            </h1>
                            <div class="single-info-row">
                                <span class="single-info-desc">
                                    <span class="text">
                                        <?= get_the_date('j.n.Y'); ?>
                                    </span>
                                </span>
                                <?php if (get_field('city') != '') : ?>
                                    <span class="single-info-desc">
                                        <svg class="icon">
                                            <use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#pin" />
                                        </svg>    
                                        <span class="text">
                                            <?php the_field('city'); ?>
                                        </span>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
  
                    <?php
                    $popular_posts = array(
                        'post_type' => 'presscenter',
                        'showposts' => 3,
                        'orderby' => 'rand',
                        'order' => 'DESC',
                        'post__not_in' => array(get_the_ID())
                    );
                    $query = new WP_Query( $popular_posts );
                    if ($query->have_posts()) : ?>
                        <div class="col-4 col-md">
                            <div class="single-aside">
                                <div class="single-aside-top">
                                    <span class="mdc-typography--headline5 single-aside-title">
                                        Read also
                                    </span>
                                    <a href="<?php home_url(); ?>/press-center/" class="mdc-button">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label">More</span>
                                    </a>
                                </div>
                                <div class="single-aside-set">
                                    <?php 
                                        while ( $query->have_posts() ) {
                                            $query->the_post();
                                            get_template_part('partials/loop-popular');
                                        }
                                        wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>