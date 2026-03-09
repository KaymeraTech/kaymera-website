<?php if( have_rows('block_5') ):
		while( have_rows('block_5') ): the_row(); ?>
            <section class="section-round-blocks">
                <div class="wrap">
                    <h2 class="section-round-block-title mdc-typography--headline4">
                    <?php the_sub_field('title'); ?>
                    </h2>
                    <div class="round-blocks-row row">      
                        <?php if( have_rows('items') ):
                                while( have_rows('items') ): the_row(); ?>
                                    <div class="col col-4 col-md">
                                        <div class="round-block">
                                            <?php echo wp_get_attachment_image(
                                                        get_sub_field('image'),
                                                        'full', '', array('class'=> 'round-block-img' )); ?>
                                            <div class="round-block-bottom">
                                                <h3 class="round-block-title mdc-typography--headline6">
                                                    <?= get_sub_field('page')['title']; ?>
                                                </h3>
                                                <a href="<?= get_sub_field('page')['url']; ?>" class="mdc-fab round-block-link">
                                                    <div class="mdc-fab__ripple"></div>
                                                    <svg class="icon">
                                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/icons/svgmap.svg#arrow-right" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <a href="<?= get_sub_field('page')['url']; ?>" class="round-full-link"></a>
                                        </div>
                                    </div>
                                <?php
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php
	endwhile;
endif; ?>