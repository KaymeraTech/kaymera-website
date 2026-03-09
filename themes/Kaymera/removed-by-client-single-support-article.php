<?php get_header(); ?>

<main class="main">
        <section class="section-simple">
            <div class="wrap">
                <?php breadcrumbs(); ?>
            </div>
        </section>

        <section class="section-page">
            <div class="wrap">
                <div class="row section-blog-grid-row">
                    <div class="col col-8 col-lg-8 col-md">
                        <div class="single-content-block">
                            <h1 class="mdc-typography--headline4 single-title">
                                <?php the_title(); ?>
                            </h1>
                            
                            <div class="content">
                                <?php the_content(); ?>
                            </div>

                            <div class="content-question">
                                <?php 
                                    $taxonomy = get_post_taxonomies()[0];
                                    $terms = wp_get_object_terms( get_queried_object_id(), $taxonomy);
                                    $term = $terms[0];
                                ?>
                                <h2 class="content-question-title mdc-typography--subtitle1">
                                    <?php the_field('support_ticket_title', $term->taxonomy . '_' . $term->term_id); ?>
                                </h2>
                                <span class="content-question-text mdc-typography--body2">
                                    <?php the_field('support_ticket_text', $term->taxonomy . '_' . $term->term_id); ?>
                                    <a href="#" class="open-support-modal">
                                        <?php the_field('support_ticket_modal_link_text', $term->taxonomy . '_' . $term->term_id); ?>
                                    </a>
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="col col-4 col-lg-4 col-md">
                        <div class="aside-title-top">
                            <span class="mdc-typography--headline5 underlined-title aside-title">Other</span>
                            <a href="<?= get_term_link($term->term_id); ?>" class="mdc-button mdc-button--touch">
                                <div class="mdc-button__ripple"></div>
                                <span class="mdc-button__label">More</span>
                                <div class="mdc-button__touch"></div>
                            </a>
                        </div>
                        <div class="aside-download">
                            <?php 
                                $popular_posta = array(
                                    'post_type' => 'support-article',
                                    'taxonomy' => $term->taxonomy,
                                    'showposts' => 3,
                                    'orderby' => 'rand',
                                    'order' => 'DESC',
                                    'post__not_in' => array(get_the_ID())
                                );
                                $query = new WP_Query( $popular_posta );
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                                    get_template_part('partials/loop-popular-support');
                                }
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php 
get_template_part('partial/modal-support');
get_footer(); ?>