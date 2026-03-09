<?php if( have_rows('usability') ):
		while( have_rows('usability') ): the_row(); ?>
            <section class="section-three-images">
                <div class="wrap">
                    <div class="center-text">
                        <h2 class="title mdc-typography--headline3">
                            <?php the_sub_field('title'); ?>
                        </h2>
                        <p class="text mdc-typography--body1">
                            <?php the_sub_field('text'); ?>
                        </p>
                        <div class="row three-images-row">
                            <div class="col-4 col-img col-md-3">
                                <?php echo wp_get_attachment_image(
                                                get_sub_field('image_1'),
                                                'full', '', array('class'=>'three-images-item')); ?>
                            </div>
                            <div class="col-4 col-img col-md-4">
                                <?php echo wp_get_attachment_image(
                                                get_sub_field('image_2'),
                                                'full', '', array('class'=>'three-images-item')); ?>
                            </div>
                            <div class="col-4 col-img col-md-3">
                                <?php echo wp_get_attachment_image(
                                                get_sub_field('image_3'),
                                                'full', '', array('class'=>'three-images-item')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
	endwhile;
endif; ?>