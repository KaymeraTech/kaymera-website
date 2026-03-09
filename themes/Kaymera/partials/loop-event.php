<?php if( have_rows('event_date') ):
        while( have_rows('event_date') ): the_row(); 
        $date = get_sub_field('date');
        $time_start = get_sub_field('time_start');
        $time_end = get_sub_field('time_end');
        $button = get_sub_field('button');
	endwhile;
endif; ?>
<div class="full-grid-panel-event">  
    <div class="event-date">
        <span class="event-day mdc-typography--headline2"><?= date_format(date_create($date),'d') ?></span>
        <span class="event-month mdc-typography--subtitle1"><?= date_format(date_create($date),'F') ?></span>
    </div>
    <div class="event-info">
        <h2 class="event-title mdc-typography--headline5">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <span class="event-time mdc-typography--body2">
            <?= $time_start != null ? $time_start : '',
                $time_end != null ? ' - '.$time_end : ''?>
        </span>
        <div class="event-info-text mdc-typography--body2">
            <?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="mdc-button mdc-button--outlined">
            <span class="mdc-button__ripple"></span>
            <span class="mdc-button__label">
                <?= $button == true ? 'Book your spot' : 'More' ?>
            </span>
        </a>
    </div>
    <a href="<?php the_permalink(); ?>" class="event-image">
        <?php the_post_thumbnail('thumbnail', array('class'=>'cover')); ?>
    </a>
</div>
        