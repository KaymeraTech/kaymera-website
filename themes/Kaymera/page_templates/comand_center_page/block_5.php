<?php if( have_rows('block_5') ):
        while( have_rows('block_5') ): the_row(); ?>
            <section class="section-choose-panels">
                <div class="wrap">
                    <div class="choose-panels-title-block">
                        <h2 class="mdc-typography--headline3 choose-panels-title">
                            <?php the_sub_field('title'); ?>
                        </h2>
                        <span class="choose-panels-desc">
                            <?php the_sub_field('text'); ?> <a data-item="<?php the_sub_field('link_title'); ?>" class="choose-data choose-button" href="#"><?php the_sub_field('link_title'); ?></a>
                        </span>
                    </div>
                    <div class="choose-panels-grid row">
                        <?php if( have_rows('items') ):
                                while( have_rows('items') ): the_row(); ?>
                                    <div class="col col-4 col-md">
                                        <div class=" choose-panel">

                                            <?php if (get_sub_field('link_or_modal')=='link' && !empty(get_sub_field('url'))): ?>
                                                <a data-analytics='{"form":"send_modal_form","type":"choose_solution"}' data-item="<?php the_sub_field('text'); ?>" href="<?php the_sub_field('url'); ?>" class="choose-panel-image-block" target="_blank">
                                            <?php else: ?>
                                                <a data-analytics='{"form":"send_modal_form","type":"choose_solution"}' data-item="<?php the_sub_field('text'); ?>" href="#" class="choose-button choose-panel-image-block">
                                            <?php endif ?>
                                                    <?= wp_get_attachment_image( get_sub_field('image'), 'full' ); ?>
                                                </a>
                                            
                                            <h3 class="choose-panel-text mdc-typography--subtitle1">
                                                <?php the_sub_field('text'); ?>
                                            </h3>

                                            <?php if (get_sub_field('link_or_modal')=='link' && !empty(get_sub_field('url'))): ?>
                                                <a data-analytics='{"form":"send_modal_form","type":"choose_solution"}' data-item="<?php the_sub_field('text'); ?>" href="<?php the_sub_field('url'); ?>" class="mdc-button mdc-button--outlined" target="_blank">
                                            <?php else: ?>
                                                <a data-analytics='{"form":"send_modal_form","type":"choose_solution"}' data-item="<?php the_sub_field('text'); ?>" href="#" class="choose-button mdc-button mdc-button--outlined">
                                            <?php endif ?>
                                                    <span class="mdc-button__label"><?php the_field('block_5_buttons_text'); ?></span>
                                                </a>
                                        </div>
                                    </div>
                                <?php
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php
    endwhile;
    get_template_part('partials/modal-contact-form-choose-dark');
endif; ?>