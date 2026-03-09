<?php if( have_rows('adventages') ):
		while( have_rows('adventages') ): the_row(); ?>
        <section class="section-big-image" id="section-big-image">
            <div class="wrap">
                <?php echo wp_get_attachment_image(
                                get_sub_field('image_bg'),
                                'full', '', array('class'=>'bg-big-image')); ?>
                <div class="row row-top">
                    <div class="col-3 col-md-4 col-fe col-list col-xs-6">
                        <ul class="double-list left">
                            <?php if( have_rows('list_left') ):
                                        while( have_rows('list_left') ): the_row(); ?>
                                        <li>
                                            <?php echo wp_get_attachment_image(
                                                            get_sub_field('image'),
                                                            'full', '', array('class'=>'icon')); ?>
                                            <span class="text mdc-typography--body1">
                                                <?php the_sub_field('text'); ?>
                                            </span>
                                        </li>
                                        <?php
                                endwhile;
                            endif; ?>
                        </ul>
                    </div>

                    <div class="col-6 col-md-4 col-xs col-phone">
                        <?php echo wp_get_attachment_image(
                                        get_sub_field('image'),
                                        'full', '', array('class'=>'phone-big-image')); ?>
                    </div>

                    <div class="col-3 col-md-4 col-fe col-list col-xs-6">
                        <ul class="double-list right">
                            <?php if( have_rows('list_right') ):
                                        while( have_rows('list_right') ): the_row(); ?>
                                        <li>
                                            <?php echo wp_get_attachment_image(
                                                            get_sub_field('image'),
                                                            'full', '', array('class'=>'icon')); ?>
                                            <span class="text mdc-typography--body1">
                                                <?php the_sub_field('text'); ?>
                                            </span>
                                        </li>
                                        <?php
                                endwhile;
                            endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php
	endwhile;
endif; ?>