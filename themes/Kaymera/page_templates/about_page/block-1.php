<?php if( have_rows('block_1') ):
		while( have_rows('block_1') ): the_row(); ?>
        <section class="section-double">
                <div class="wrap">
                    <div class="row-w row-double">
                        <div class="col-6-w col-md-w center-col">
                            <?php get_template_part('partials/breadcrumbs'); ?>
                            <div class="double-column">
                                <span class="double-overline mdc-typography--overline green">
                                    <?php the_sub_field('before_title'); ?>
                                </span>
                                <h1 class="double-title mdc-typography--headline3">
                                    <?php the_sub_field('title'); ?>
                                </h1>
                                <div class="double-description mdc-typography--body2">
                                    <p>
                                        <?php the_sub_field('after_title'); ?>
                                    </p>
                                </div>

                                <div class="row-numbers">
                                    <?php if( have_rows('adventages') ):
		                                    while( have_rows('adventages') ): the_row(); ?>
                                            <div class="numbers-item">
                                                <span class="number mdc-typography--headline5"><?php the_sub_field('title'); ?></span>
                                                <span class="number-text mdc-typography--caption"><?php the_sub_field('text'); ?></span>
                                            </div>
                                    <?php endwhile;
                                    endif; ?>
                                </div>

                            </div>
                            <div class="scroll-element">
                                <span class="mdc-typography--caption"><?php the_sub_field('scroll'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="double-image-col">
                    <?php echo wp_get_attachment_image(
								get_sub_field('image'),
								'full', '', array('class'=> 'cover' )); ?>
                </div>
            </section>
            <?php
		endwhile;
	endif; ?>