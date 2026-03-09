<?php if( have_rows('first_screen') ):
		while( have_rows('first_screen') ): the_row(); ?>
        <section class="section-text-center">
            <div class="wrap">
                <div class="block-text-center">
                    <span class="mdc-typography--overline overline">
                        <?php the_title(); ?>
                    </span> 
                    <h1 class="mdc-typography--headline3 title-center">
                        <?php the_sub_field('title'); ?>
                    </h1>
                    <div class="mdc-typography--body1 text-center">
                        <p>
                            <?php the_sub_field('text'); ?>
                        </p>
                    </div>
                    <div class="t-center btn-center-block">
<!--                         <a data-analytics='{"form":"send_modal_form","type":"get_now_header"}' data-set="<?php the_title(); ?>" href="#" class="mdc-button modal-contact-button mdc-button--raised inline-demo-button mdc-ripple-upgraded"> -->
                        <a href="https://kaymera.com/app/#contacts" target="_blank" data-analytics='{"form":"send_modal_form","type":"get_now_header"}' data-set="<?php the_title(); ?>" href="#" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                            <span class="mdc-button__label dark"><?php the_sub_field('button'); ?></span>
                            <div class="mdc-button__ripple"></div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <?php
	endwhile;
endif; ?>
