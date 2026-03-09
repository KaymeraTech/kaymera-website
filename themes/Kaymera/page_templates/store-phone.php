<?php
/*
Template Name: Store - Phone
Template Post Type: store
*/
?>
<?php get_header(); ?>
<main class="main">
    <section class="section-text-center">
        <div class="wrap">
            <div class="block-text-center">
                <span class="mdc-typography--overline overline">
                    <?php the_title(); ?>
                </span> 
                <h1 class="mdc-typography--headline3 title-center">
                    <?php echo get_field('tagline'); ?>
                </h1>
                <h2 class="mdc-typography--body1 text-center">
                    <p><?php echo get_field('after_tag'); ?></p>
                </h2>
            </div>
        </div>
    </section>

    <section class="section-table-panels">
        <div class="wrap">
            <div class="table-panels-row row">     
                <?php if( have_rows('products') ):
                    while( have_rows('products') ) : the_row(); ?>   
                        <div class="col col-4">
                            <div class="table-panel-image">
                                <?php echo wp_get_attachment_image( get_sub_field('thumbnail'), 'full'); ?>
                            </div>
                            <div class="table-panel-content">
                                <span class="table-panel-text mdc-typography--body2">
                                    <?php the_sub_field('title'); ?> 
                                </span>
                                <?php if( have_rows('specifications') ): ?>
                                    <div class="table-char">
                                        <?php while( have_rows('specifications') ) : the_row(); ?>
                                            <div class="table-char-row">
                                                <span class="table-col-text mdc-typography--body2">
                                                    <?php the_sub_field('title'); ?>
                                                </span>
                                                <span class="table-col-text mdc-typography--body2">
                                                    <?php the_sub_field('value'); ?>
                                                </span>
                                            </div>          
                                        <?php
                                        endwhile; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="table-panel-btn">
                                    <a data-analytics='{"form":"send_modal_form","type":"get_a_quote"}' data-set="<?php the_field('button_text'); ?>: <?php the_sub_field('title'); ?>" href="#" class="modal-contact-button mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                                        <span class="mdc-button__label dark"><?php the_field('button_text'); ?></span>
                                        <div class="mdc-button__ripple"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif; ?>
            </div>
        </div>
    </section>
    <?php if( have_rows('tabs') ): ?>
    <section class="section-tabs">
        <div class="wrap">
            <div class="tabs-block">
                <div class="tabs-header">
                    <div class="mdc-tab-bar" role="tablist">
                        <div class="mdc-tab-scroller">
                            <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll">
                                <div class="mdc-tab-scroller__scroll-content">
                                    <?php
                                        $i = 0;
                                        while( have_rows('tabs') ) : the_row(); ?>
                                            <button role="tab" class="mdc-tab 
                                                <?= $i == 0 ? 'mdc-tab--active' : '' ?>
                                                aria-selected="<?= $i == 0 ? 'true' : '' ?>"
                                                tabindex="<?php echo $i ?>">
                                                <span class="mdc-tab__content">
                                                    <span class="mdc-tab__text-label"> <?php echo get_sub_field('tab_title'); ?></span>
                                                </span>
                                                <span class="mdc-tab-indicator <?= $i == 0 ? 'mdc-tab-indicator--active' : '' ?>">
                                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                                </span>
                                                <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                                            </button>
                                    <?php $i++; endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs-body">
                    <?php if( have_rows('tabs') ):
                        $i = 0;
                        while( have_rows('tabs') ) : the_row(); ?>
                            <div class="tab-content
                                <?= $i == 0 ? 'tab-content-active' : '' ?>
                                mdc-typography--body1" data-tab="<?php echo $i++ ?>">
                                <?php echo get_sub_field('tab'); ?>
                            </div>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php get_template_part('page_templates/contacts-form'); ?>

</main>

<?php 
get_template_part('partials/modal-contact-form');
get_footer(); ?>