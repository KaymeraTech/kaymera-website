<?php if( have_rows('block_2') ):
		while( have_rows('block_2') ): the_row(); ?>


    <section class="section-full-text">
        <div class="wrap">
            <div class="full-text">
                <img src="<?php echo get_template_directory_uri(); ?>/img/kaymera-logo-sm.png" alt="" class="icon">
                <div class="text mdc-typography--headline5">
                    <p>
                        <?php the_sub_field('introduction'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="section-colored-block"> 
        <?php if( have_rows('items') ):
            while( have_rows('items') ): the_row(); ?>

            <div class="colored-block-item">
                <div class="wrap">
                    <div class="colored-block-item-inner">
                        <div class="colored-block-icon">
                            <?php echo wp_get_attachment_image(
                                    get_sub_field('image'),
                                    'full', '', array('class'=> 'icon' )); ?>
                        </div>
                        <h2 class="colored-block-title mdc-typography--headline3">
                            <?php the_sub_field('title'); ?>
                        </h2>
                        <div class="colored-block-text mdc-typography--body1">
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
    </section>


    <?php
		endwhile;
	endif; ?>