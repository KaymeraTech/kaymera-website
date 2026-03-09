<a href="<?php the_permalink(); ?>" class="download-link">
    <span class="download-link-title mdc-typography--body1">
        <?php the_title(); ?>
    </span>
    <svg class="icon">
        <use xlink:href="<?= get_template_directory_uri() ?>/img/icons/svgmap.svg#download"/>
    </svg>
</a>