<?php if( have_rows('device') ):
		while( have_rows('device') ): the_row(); ?>
            <section class="section-large-img" id="section-large-img">
                <?php echo wp_get_attachment_image(
                        get_sub_field('image'),
                        'full', ''); ?>
            </section>
            <section class="section-center-info">
                <?php echo wp_get_attachment_image(
                        get_sub_field('image_bg'),
                        'full', '', ['class'=>'center-bg']); ?>
                <div class="wrap">
                    <h2 class="center-title mdc-typography--headline3"><?php the_sub_field('title'); ?></h2>
                    <div class="btns-centered">
<!--                         <a data-analytics='{"form":"send_modal_form","type":"get_now_footer"}' data-set="Smartphone: <?php the_sub_field('button_get'); ?>"  href="#" class="modal-contact-button btn mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded"> -->
							
                        <a data-analytics='{"form":"send_modal_form","type":"get_now_footer"}' data-set="Smartphone: <?php the_sub_field('button_get'); ?>"  href="https://kaymera.com/app/#contacts" class="btn mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded" target="_blank">
                            <span class="mdc-button__label dark"><?php the_sub_field('button_get'); ?></span>
                            <div class="mdc-button__ripple"></div>
                        </a>
                        <a href="<?php the_sub_field('link_more'); ?>" class="btn mdc-button mdc-button--outlined">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label"><?php the_sub_field('button_more'); ?></span>
                        </a>
                    </div>
                </div>
            </section>
        <?php
	endwhile;
endif; ?>
