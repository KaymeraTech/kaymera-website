<?php if( have_rows('mode') ):
        while( have_rows('mode') ): the_row(); 
        $icon = get_sub_field('icon');
        ?>
            <section class="section-scrollable-mode green" id="section-scrollable-mode">
                <div class="wrap">
                    <div class="row row-scrollable-mode">
                        <div class="col-6 col-sm">
                            <div class="scrollable-mockup">
                                <?php echo wp_get_attachment_image(
                                get_sub_field('mockup'),
                                'full', ''); ?>
                                <div class="scrollable-inner">
                                    <?php  if( have_rows('content') ):
                                    while( have_rows('content') ): the_row(); ?>
                                        <?php echo wp_get_attachment_image(
                                            get_sub_field('mockup_inner'),
                                            'full', ''); ?>
                                    <?php endwhile;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-text col-sm">
                            <div class="scrollable-text-block">
                            <?php  if( have_rows('content') ):
                                    while( have_rows('content') ): the_row(); ?>
                                        <div class="scrollable-text">
                                            <?php echo wp_get_attachment_image(
                                                    $icon,
                                                    'full', '',
                                                    array( "class" => "icon" )); ?>
                                            <h3 class="title mdc-typography--headline4">
                                                <?php the_sub_field('title'); ?>
                                            </h3>   
                                            <div class="text mdc-typography--subtitle1">
                                                    <?php the_sub_field('text'); ?>
                                                <!-- <p>
                                                </p> -->
                                            </div>
                                        </div>
                                    <?php endwhile;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
	endwhile;
endif; ?>