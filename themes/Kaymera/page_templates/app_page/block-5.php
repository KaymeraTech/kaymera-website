<?php if( have_rows('block_5') ):
		while( have_rows('block_5') ): the_row(); ?>
        <section id="contacts" class="section-contact-form">
            <div class="wrap">
                <div class="form-block">
                    <h3 class="form-title mdc-typography--headline4">
                        <?php the_sub_field('title') ?>
                    </h3>
                    <span class="form-text mdc-typography--body1">
                        <?php the_sub_field('text') ?>
                    </span>
                    <?php get_template_part('partials/contact_form'); ?>
                </div>
            </div>
            <?php
                echo    wp_get_attachment_image( 
                            get_sub_field('image_background'),
                            'full', '', array('class'=> 'bg-img')).
                        wp_get_attachment_image( 
                            get_sub_field('image'),
                            'full', '', array('class'=> 'img-mockup')); ?>
        </section>
        <?php
	endwhile;
endif; ?>