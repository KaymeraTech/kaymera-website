<div class="panel-back-text">
    <h2 class="back-text-title mdc-typography--headline5">
        <?php the_title(); ?>
    </h2>
    <span class="back-text-date mdc-typography--body2">
        <?= get_the_date('d.m.Y'); ?>
    </span>
    <div class="back-text-info mdc-typography--body2">
        <?php the_excerpt(); ?>
    </div>
    <a href="<?php the_permalink(); ?>" class="link"></a>
</div>