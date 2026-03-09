<?php if( have_rows('block_6') ):
		while( have_rows('block_6') ): the_row(); ?>

        <section class="section-items-grid">
            <div class="wrap">
                <div class="row">
                    <div class="col-6 col-xl-5 col-lg">
                        <div class="section-items-grid-title-block">
                            <h2 class="mdc-typography--headline3 items-grid-title">
                                <?php the_sub_field('title'); ?>
                            </h2>
                            <div class="mdc-typography--body1 items-grid-text">
                                <p>
                                    <?php the_sub_field('text'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ml-col col-xl-7 col-lg">
                    
                    <div class="list-item-row row">
                        <?php if( have_rows('items') ):
                            while( have_rows('items') ): the_row(); ?>
                                <div class="col col-6 col-xs">
                                    <div class="list-item">
                                        <?php echo wp_get_attachment_image(
                                                        get_sub_field('icon'),
                                                        'full', '', array('class'=>'list-item-icon')); ?>
                                       <span class="list-item-text mdc-typography--body1">
                                            <?php the_sub_field('text'); ?>
                                        </span>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        endif; ?>
                    </div>

                    </div>
                </div>
            </div>
        </section>

    <?php
	endwhile;
endif; ?>