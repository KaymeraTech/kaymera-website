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
                                <?php the_field('before_text', get_queried_object()); ?>
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
        </div>
    </section>
    <section class="section-grid">
        <div class="wrap">
            <?php 
                if(have_posts()) : while(have_posts()) : the_post();
                    get_template_part( 'partials/loop-custumer' );
                endwhile;
                else :
                    echo "Is empty";
                endif;  
                navigation();
            ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>