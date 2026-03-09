<div class="blog-panel">
    <div class="blog-panel-info">
        <h3 class="blog-panel-title mdc-typography--headline5">
            <?php the_title(); ?>
        </h3>
        <span class="blog-panel-date mdc-typography--body2"><?php echo get_the_date('d.m.Y'); ?></span>
        <span class="blog-panel-description mdc-typography--body2">
            <?php get_template_part('partials/constructor_excerpt'); ?>
        </span>
    </div>
    <div class="blog-panel-image">
        <?php the_post_thumbnail('thumbnail', array('class'=>'cover')); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="blog-panel-link"></a>
</div>