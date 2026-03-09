<?php
/*
Template Name: Downloads
*/
?>
<?php get_header(); ?>
<main class="main">
	<?php 
		//get_template_part('page_templates/home_page/block-1');
    ?>

    <section class="page-title">
        <div class="wrap">
            <?php breadcrumbs(); ?>
            <?php if( have_rows('first_screen') ):
		        while( have_rows('first_screen') ): the_row(); ?>
                    <div class="row page-title-main-row jc-space-between">
                        <div class="col">
                            <span class="mdc-typography--overline overline">
                                <?php the_sub_field('before'); ?>
                            </span>
                        </div>
                        <div class="col-6 col-md">    
                            <h1 class="mdc-typography--headline3 title">
                                <?php the_sub_field('title'); ?>
                            </h1>
                        </div>
                        <div class="col-5 col-md">
                            <div class="mdc-typography--body2 subtitle">
                                <?php the_sub_field('introduction'); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif; ?>
        </div>
    </section>

    <section class="section-grid">
        <div class="wrap">
            <?php
                //Get data for loop
                $terms = get_terms( array(
                    'taxonomy' => 'downloads-tax',
                    'hide_empty' => true,
                    'order' => 'DESC'
                ));
                foreach ($terms as $term) : ?>
                    
                        <div class="grid-full-set">
                            <div class="grid-full-title">
                                <h2 class="mdc-typography--headline5 title">
                                    <?= $term->name; ?>
                                </h2>
                                <span class="mdc-typography--body2">
                                    <?= $term->count; ?>
                                </span>
                            </div>
                            <div class="inner grid-full-group">
                                <?php
                                    //Get post for current term
                                    $posts_per_page = 3;
                                    $result = loop_download( $posts_per_page, 0, $term->slug, 1);
                                    echo $result;
                                ?>
                            </div>
                            <button
                                type="button"
                                data-button-name="<?php the_field('button_more'); ?>"
                                data-per-page-count="<?= $posts_per_page ?>"
                                data-count="<?= $term->count; ?>"
                                data-offset="<?= $posts_per_page ?>"
                                data-term="<?= $term->slug; ?>" 
                                style="<?= $term->count > 3 ? 'display: block' : 'display: none' ?>"
                                class="load-more-button mdc-button mdc-button-full mdc-button--outlined">
                                <span class="mdc-button__ripple"></span>
                                <span class="mdc-button__label dark">
                                    <span class="button-more-text"><?php the_field('button_more'); ?></span>
                                </span>
                            </button>
                        </div>
                <?php endforeach; ?>           
        </div>
    </section>

</main>
<?php get_template_part('partials/modal-download');
get_footer(); ?>