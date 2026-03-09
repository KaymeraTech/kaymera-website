<section class="section-links">
    <div class="wrap">
        <div class="row">
            <?php if( have_rows('help') ):
                    while( have_rows('help') ): the_row(); ?>
                        <div class="col-4 col-sm">
                            <div class="section-link">
                                <?php echo wp_get_attachment_image(
                                        get_sub_field('image'),
                                        'full', '', array('class'=>'section-link-icon')); ?>
                                <span class="section-link-text mdc-typography--body1">
                                    <?php the_sub_field('text'); ?>
                                </span>
                                <a href="<?php the_sub_field('link'); ?>" class="mdc-button mdc-button--outlined">
                                    <div class="mdc-button__ripple"></div>
                                    <span class="mdc-button__label"><?php the_sub_field('button_text'); ?></span>
                                </a>
                            </div>
                        </div>
                    <?php
                    endwhile;
            endif; ?>
            </div>
        </div>
</section>