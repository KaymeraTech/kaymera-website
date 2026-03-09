<?php if( have_rows('block_4') ):
		while( have_rows('block_4') ): the_row(); ?>
            <section class="section-app">
                <div class="wrap">
                    <h3 class="section-app-title mdc-typography--headline2">
                        <?php the_sub_field('title'); ?>
                    </h3>
                    <div class="section-app-amount">
                        <a href="<?php the_sub_field('link_google'); ?>" class="app-link">
                            <?php
                                echo wp_get_attachment_image(
                                        get_sub_field('image_google'),
                                        'full', '');
                            ?>
                        </a>
                        <a href="<?php the_sub_field('link_app'); ?>" class="app-link">
                            <?php
                                echo wp_get_attachment_image(
                                        get_sub_field('image_app'),
                                        'full', '');
                            ?>
                        </a>
                    </div>
                </div>
            </section>
        <?php
	endwhile;
endif; ?>