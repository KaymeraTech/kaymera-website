<div class="full-grid-panel">
    <a <?= get_field('pdf') ? 'target="_blank" href="'.get_field('pdf').'"' : '' ?> class="full-grid-image">
        <?php the_post_thumbnail('thumbnail', array('class'=>'contain')); ?>
    </a>
    <div class="full-grid-info">
        <h2 class="full-grid-title mdc-typography--headline5">
            <a <?= get_field('pdf') ? 'target="_blank" href="'.get_field('pdf').'"' : '' ?>>
                <?php the_title(); ?>
            </a>
        </h2>
        <p class="full-grid-text mdc-typography--body2">
            <?= get_the_excerpt(); ?>
        </p>
    </div>
    <div class="full-grid-button">
        <?=  get_field('pdf') ?
            '<a target="_blank" href="'.get_field('pdf').'" class="mdc-button mdc-button--outlined">
                <span class="mdc-button__ripple"></span>
                <span class="mdc-button__label">View case study</span>
            </a>' : ''
        ?>
    </div>
</div>