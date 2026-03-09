<?php if( have_rows('image') ):
		while( have_rows('image') ): the_row(); ?>
            <section class="section-full-image">
                <?php echo wp_get_attachment_image( 
                    get_sub_field('image'),
                    'full', '', array('class'=>'full-image cover')); ?>
                <div class="wrap">
                    <div class="full-image-inner">
                        <h2 class="full-image-title mdc-typography--headline3">
                            <?php the_sub_field('introduction'); ?>
                        </h2>
                    </div>
                </div>
            </section>
        <?php
	endwhile;
endif; ?>