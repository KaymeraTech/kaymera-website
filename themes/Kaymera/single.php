<?php get_header(); ?>
<?php gt_set_post_view(); ?>
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
                            <div class="single-info-row">
                                <span class="single-info-desc">    
                                    <span class="text">
                                        <?php get_the_date('d.m.Y'); ?>
                                    </span>
                                </span>
                            </div>
                            <div class="article-img">
                                <?php the_post_thumbnail('big'); ?>
                            </div>
                            <?php get_template_part('partials/constructor'); ?>
                        </div>
                    </div>

                    <div class="col col-3 col-lg-4 col-md">
                        <div class="aside-title-top">
                            <span class="mdc-typography--headline5 underlined-title aside-title">Other</span>
                            <a href="
                                <?php 
                                    $taxonomy = get_post_taxonomies($post->ID)[0];
                                    $terms = wp_get_object_terms( get_queried_object_id(), $taxonomy);
                                    $term = $terms[0];
                                    echo get_term_link($term->term_id);
                                ?>
                            " class="mdc-button mdc-button--touch">
                                <div class="mdc-button__ripple"></div>
                                <span class="mdc-button__label">More</span>
                                <div class="mdc-button__touch"></div>
                            </a>
                        </div>
                        <div class="aside-blog-amount">
                            <?php 
                                $popular_posta = array(
                                    'post_type' => 'post',
                                    'category' => get_the_category()[0]->term_id,
                                    'showposts' => 3,
                                    'orderby' => 'rand',
                                    'order' => 'DESC',
                                    'post__not_in' => array(get_the_ID())
                                );
                                $query = new WP_Query( $popular_posta );
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                                    get_template_part('partials/loop-popular');
                                }
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>