<div class="blog-main-panel">
    <div class="blog-main-info">
        <h2 class="mdc-typography--headline4 blog-main-title">
            <?php the_title(); ?>
        </h2>
        <span class="blog-main-date mdc-typography--body2">
            <?php echo get_the_date('d.m.Y'); ?>
        </span>
        <a href="<?php the_permalink(); ?>" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
            <span class="mdc-button__label">Read</span>
            <div class="mdc-button__ripple"></div>
        </a>
    </div>
    <?php the_post_thumbnail('big', array('class'=>'blog-main-img cover')); ?>
    <a href="<?php the_permalink(); ?>" class="blog-main-link"></a>
</div>