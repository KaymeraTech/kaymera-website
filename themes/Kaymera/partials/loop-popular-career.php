<div class="panel-link">
    <div class="panel-link-inner">
        <h3 class="panel-link-title mdc-typography--headline6">
            <?php the_title(); ?>
        </h3>
        <span class="panel-link-info mdc-typography--body2">
            <?php the_field('city'); ?>
        </span>
        <p class="panel-link-text mdc-typography--body2">
            <?= wp_trim_words(get_the_content(), 18, '...'); ?>
        </p>
    </div>
    <a href="<?php the_permalink(); ?>" class="panel-link-full"></a>
</div>