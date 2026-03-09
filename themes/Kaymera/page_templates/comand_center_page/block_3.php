<?php if( have_rows('block_3') ):
		while( have_rows('block_3') ): the_row(); ?>
            <section class="section-list">
                <div class="wrap">
                    <div class="section-list-title">
                        <span class="mdc-typography--overline overline-text">
                            <?php the_sub_field('before_title'); ?>
                        </span>
                        <h2 class="mdc-typography--headline3 list-title">
                            <?php the_sub_field('title'); ?>
                        </h2>
                    </div>

                    <?php if( have_rows('scheme') ):
								while( have_rows('scheme') ): the_row(); ?>
                                <div class="list-amount">
                                    <div class="list-title-block">

                                        <?php echo wp_get_attachment_image(
                                            get_sub_field('icon'),
                                            'full', '', array('class'=>'list-title-icon')); ?>
                                            
                                        <div class="list-title-column">
                                            <h3 class="mdc-typography--headline4 list-title">
                                                <?php the_sub_field('title'); ?>
                                            </h3>
                                            <span class="mdc-typography--caption">
                                                <?php the_sub_field('after_title'); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="list-grid row">
                                        
                                        
                                    <?php if( have_rows('card') ):
								            while( have_rows('card') ): the_row(); ?>


                                        <div class="col col-4 col-md-6 col-xs">
                                            <div class="list-block">
                                                <svg class="list-block-icon">
                                                    <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/icons/svgmap.svg#check" />
                                                </svg>
                                                <div class="list-block-content">
                                                    <h4 class="mdc-typography--body2 list-block-title">
                                                        <?php the_sub_field('title'); ?>
                                                    </h4>
                                                    <div class="mdc-typography--caption list-block-desc">
                                                        <p>
                                                            <?php the_sub_field('text'); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <?php
                                        endwhile;
                                    endif; ?>



                                    </div>
                                </div>
                        <?php
                        endwhile;
                    endif; ?>


                </div>
            </section>

    <?php
	endwhile;
endif; ?>