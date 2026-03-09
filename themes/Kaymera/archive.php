<?php get_header();
    isset($wp_query->query['paged']) ? $paged = $wp_query->query['paged'] : $paged = null;
?>

<main class="main">
    
    <section class="page-title">
        <div class="wrap">
            <?php breadcrumbs(); ?>
            <?php if (!isset($paged)) : ?>
                <div class="row page-title-main-row jc-space-between">
                    <div class="col">
                        <span class="mdc-typography--overline overline">
                            <?php the_field('before_title', get_queried_object()); ?>
                        </span>
                    </div>
                    <div class="col-6 col-md">  
                        <h1 class="mdc-typography--headline3 title">
                            <?php the_field('introduction', get_queried_object()); ?>
                        </h1>
                    </div>
                    <div class="col-5 col-md">
                        <div class="mdc-typography--body2 subtitle">
                            <?php echo term_description(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="section-blog-grid">  
        <div class="wrap">
            <div class="row section-blog-grid-row">
                
                <div class="col col-8 col-md">
                    <div class="blog-panels-amount">
                        <?php 
                        if ( have_posts() ) :
                            while ( have_posts() ) :
                                the_post();
                                if (!isset($first) && !isset($paged)) :
                                    get_template_part( 'partials/loop-first-post' );
                                    $first = true;
                                else :
                                    get_template_part( 'partials/loop-post' );
                                endif;
                            endwhile;
                        else :
                            echo "Blog is empty";
                        endif; ?>
                    </div>
                    <?php navigation(); ?>
                </div>
                <?php
                    $popular_posts = array(
                        'post_type' => 'post',
                        'category' => get_the_category()[0]->cat_ID,
                        'showposts' => 3,
                        'meta_key' => 'post_views_count',
                        'order' => 'DESC',
                        'orderby' => 'meta_value_num'
                    );
                    $query = new WP_Query( $popular_posts );
                if ($query->have_posts()) : ?>
                    <div class="col col-4 col-md aside-col">
                        <span class="mdc-typography--headline5 underlined-title aside-title">Popular</span>
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

<?php get_footer(); ?>