<?php if( have_rows('security') ):
		while( have_rows('security') ): the_row(); ?>
            <section class="section-security-panel">
                <div class="wrap">
                    <div class="security-panel">
                        <div class="security-panel-inner">
                            <div class="security-panel-info">
                                <h3 class="security-panel-title mdc-typography--headline4">
                                    <?php the_sub_field('title'); ?>
                                </h3>
                                <div class="mdc-typography--body2 security-panel-text">
                                        <?php the_sub_field('text'); ?>
                                    <!-- <p>
                                    </p>  -->
                                </div>
                                <div class="security-chars">
                                    <?php if( have_rows('Chars') ):
                                                while( have_rows('Chars') ): the_row(); ?>
                                                    <div class="security-char-col">
                                                        <span class="char-value"><?php the_sub_field('title'); ?></span>
                                                        <span class="char-desc mdc-typography--caption"><?php the_sub_field('text'); ?></span>
                                                    </div>
                                                <?php
                                        endwhile;
                                    endif; ?>
                                </div>
                            </div>
                            <div class="round"></div>
                        </div>
                        <?php echo wp_get_attachment_image(
                                        get_sub_field('image'),
                                        'full', '', array('class'=>'security-image')); ?>
                    </div>
                </div>
            </section>
        <?php
	endwhile;
endif; ?>