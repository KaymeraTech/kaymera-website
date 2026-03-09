<div class="aside-item">
    <svg class="icon">
        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/icons/svgmap.svg#news" />
    </svg>
    <div class="aside-item-info">
        <h3 class="mdc-typography--subtitle1 aside-item-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <span class="aside-item-date mdc-typography--caption">
            <?= get_the_date('d.m.Y'); ?>
        </span>
    </div>
</div>