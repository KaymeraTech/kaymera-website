<?php echo wp_get_attachment_image(
    get_sub_field('image_bg'),
    'full', '', array('class'=>'draggable-back')); ?>
<h3 class="draggable-title <?= $next ? 'red' : '' ?> mdc-typography--body1">
    <?php the_sub_field('title'); ?>
</h3>
<div class="draggable-row row">
    <div class="col-4 col-fc">
        <ul class="draggabe-list left">
            <?php if( have_rows('list_left') ):
                    while( have_rows('list_left') ): the_row(); ?>
                        <li>
                            <span class="text"><?php the_sub_field('title'); ?></span>
                                <?php echo wp_get_attachment_image(
                                            get_sub_field('image'),
                                            'full', '', array('class'=>'icon')); ?>
                        </li>
                    <?php
                    endwhile;
                endif; ?>
        </ul>
    </div>
    <div class="col-4">
            <?php echo wp_get_attachment_image(
                            get_sub_field('image'),
                                'full', '', array('class'=>'draggable-image', 'loading' => 'eager')); ?>
    </div>
    <div class="col-4 col-fc">
        <ul class="draggabe-list right">
            <?php if( have_rows('list_right') ):
                        while( have_rows('list_right') ): the_row(); ?>
                        <li>
                            <span class="text"><?php the_sub_field('title'); ?></span>
                                    <?php echo wp_get_attachment_image(
                                                    get_sub_field('image'),
                                                        'full', '', array('class'=>'icon')); ?>
                        </li>
                    <?php
                        endwhile;
                    endif; ?>
        </ul>
    </div>
</div>