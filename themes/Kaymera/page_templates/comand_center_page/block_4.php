
<?php if( have_rows('block_4') ):
		while( have_rows('block_4') ): the_row(); ?>
<section class="section-slider-row bg-white">
        <div class="wrap">


            <div class="slider-row-title-block">
                <span class="mdc-typography--overline slider-row-overline"><?php the_sub_field('before_title'); ?></span>
                <h2 class="mdc-typography--headline3 slider-row-title">
                    <?php the_sub_field('title'); ?>
                </h2>
            </div>


            <div class="slider-row">
                <?php if( have_rows('carousel') ):
                    while( have_rows('carousel') ): the_row(); ?>
                        <div class="slider-row-item">
                            <?php echo wp_get_attachment_image(
                                            get_sub_field('icon'),
                                            'full', '', array('class'=>'slider-row-icon')); ?>
                            <h3 class="mdc-typography--body1 slider-row-title">
                                <?php the_sub_field('title'); ?>
                            </h3>
                            <span class="mdc-typography--caption slider-row-text">
                                <?php the_sub_field('text'); ?>
                            </span>
                        </div>
                        <?php
                    endwhile;
                endif; ?>
            </div>

            <?php echo wp_get_attachment_image(
                            get_sub_field('image'),
                            'full', '', array('class'=>'slider-row-img')); ?>

        </div>
    </section>

    <?php
	endwhile;
endif; ?>