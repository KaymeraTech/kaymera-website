<?php get_header();
gt_set_post_view();
if( have_rows('event_date') ):
    while( have_rows('event_date') ): the_row(); 
        $date = get_sub_field('date');
        $time_start = get_sub_field('time_start');
        $time_end = get_sub_field('time_end');
        $button = get_sub_field('button');
    endwhile;
endif;
?>
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
                              <div class="single-info-top">
                                <div class="single-info-top-col">
                                    <h1 class="mdc-typography--headline4 single-title">
                                        <?php the_title(); ?>
                                    </h1>
                                    <div class="single-info-row">
                                        <span class="single-info-desc">    
                                            <span class="text">
                                            <?= $time_start != null ? $time_start : '',
                                            $time_end != null ? ' - '.$time_end : ''?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="single-info-top-date">
                                    <span class="day mdc-typography--headline2"><?= date_format(date_create($date),'d') ?></span>
                                    <span class="month mdc-typography--subtitle1"><?= date_format(date_create($date),'F') ?></span>
                                </div>
                            </div>
                            <div class="article-img">
                                <?php the_post_thumbnail('big'); ?>
                            </div>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>

                            <?php if ($button == true) : ?> 
                                <button type="button" class="button-registration open-registration-modal mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                                    <span class="mdc-button__label">Registration</span>
                                    <div class="mdc-button__ripple"></div>
                                </button>
                            <?php endif; ?>
                            
                        </div>
                    </div>

                    <?php
                    $popular_posts = array(
                        'post_type' => 'post',
                        'category' => 'blog',
                        'showposts' => 3,
                        'orderby' => 'rand',
                        'order' => 'DESC',
                        'post__not_in' => array(get_the_ID())
                    );
                    $query = new WP_Query( $popular_posts );
                    if ($query->have_posts()) : ?>
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
                                    while ( $query->have_posts() ) {
                                        $query->the_post();
                                        get_template_part('partials/loop-popular');
                                    }
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    </main>
<?php get_template_part('partials/modal-registration');
get_footer(); ?>