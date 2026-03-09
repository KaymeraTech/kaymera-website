<?php if( have_rows('block_2') ):
		while( have_rows('block_2') ): the_row(); ?>

    <?php if( have_rows('section_1') ):
		    while( have_rows('section_1') ): the_row(); ?>
                <section class="section-text-image">
                    <div class="wrap">
                        <div class="row ai-center">
                            <div class="col-6 col-sm">
                                <div class="text-block">
                                    <h2 class="mdc-typography--headline4 text-block-title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                    <div class="mdc-typography--body1 text-block-description">
                                        <p>
                                        <?php the_sub_field('text'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm">
                                <div class="image-block brown-rect image-rect">
                                    <?php echo wp_get_attachment_image(
                                        get_sub_field('image'),
                                        'full', '', array('class'=>'large-image')); ?>
                                    <?php echo wp_get_attachment_image(
                                        get_sub_field('image_top'),
                                        'full', '', array('class'=>'small-image bottom-right')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
        endwhile;
    endif; ?>

    <?php if( have_rows('section_2') ):
		    while( have_rows('section_2') ): the_row(); ?>
                <section class="section-text-image">
                    <div class="wrap">
                        <div class="row ai-center row-reverse">
                            <div class="col-6 col-sm">
                                <div class="text-block">
                                    <h2 class="mdc-typography--headline4 text-block-title">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                    <div class="mdc-typography--body1 text-block-description">
                                        <p>
                                            <?php the_sub_field('text'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm">
                                <div class="image-block green-rect image-rect">
                                    <?php echo wp_get_attachment_image(
                                        get_sub_field('image'),
                                        'full', '', array('class'=>'large-image more-large')); ?>
                                    <?php echo wp_get_attachment_image(
                                        get_sub_field('image_top'),
                                        'full', '', array('class'=>'small-image bottom-left')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
        endwhile;
    endif; ?>

    <?php if( have_rows('section_3') ):
		    while( have_rows('section_3') ): the_row(); ?>
            <section class="section-text-image padding-bottom">
                <div class="wrap">
                    <div class="row ai-center">
                        <div class="col-6 col-sm">
                            <div class="text-block">
                                <h2 class="mdc-typography--headline4 text-block-title">
                                    <?php the_sub_field('title'); ?>
                                </h2>
                                <div class="mdc-typography--body1 text-block-description">
                                    <p>
                                        <?php the_sub_field('text'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm">
                            <div class="image-block grey-rect image-rect">
                                <?php echo wp_get_attachment_image(
                                        get_sub_field('image'),
                                        'full', '', array('class'=>'large-image')); ?>
                                    <?php echo wp_get_attachment_image(
                                        get_sub_field('image_top'),
                                        'full', '', array('class'=>'small-image bottom-right-second')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        endwhile;
    endif; ?>

    <?php
	endwhile;
endif; ?>