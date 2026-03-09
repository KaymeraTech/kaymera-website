<section class="section-grid-list">
    <div class="wrap">
        <div class="grid-list-row row">
            <?php if( have_rows('adventages') ):
                    while( have_rows('adventages') ): the_row(); ?>
                    <div class="col col-4 col-sm-6 col-xs">
                        <div class="grid-list-item">                           
                            <?php echo wp_get_attachment_image( 
                                    get_sub_field('image'),
                                    'full', '', array('class'=>'grid-list-img')); ?>
                            <h3 class="mdc-typography--headline6 grid-list-title">
                                <?php the_sub_field('title'); ?>
                            </h3>
                            <p class="mdc-typography--body2 grid-list-text">
                                <?php the_sub_field('text'); ?>
                            </p>
                        </div>
                    </div>
                <?php
                endwhile;
            endif; ?>
        </div>
    </div>
</section>