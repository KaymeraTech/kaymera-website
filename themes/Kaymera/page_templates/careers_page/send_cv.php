<?php if( have_rows('send_cv') ):
		while( have_rows('send_cv') ): the_row(); ?>
        <section class="section-wrap-panel">
            <div class="wrap">
                <div class="wrap-panel">
                    <h2 class="wrap-panel-title mdc-typography--headline4">
                        <?php the_sub_field('title'); ?>
                    </h2>
                    <span class="wrap-panel-text mdc-typography--body2">
                        <?= get_sub_field('text').' '.get_sub_field('email') ?>
                    </span>
                    <a href="mailto:<?php the_sub_field('email') ?>" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                        <span class="mdc-button__label">Send</span>
                        <div class="mdc-button__ripple"></div>
                    </a>
                </div>
            </div>
        </section>
        <?php
	endwhile;
endif; ?>