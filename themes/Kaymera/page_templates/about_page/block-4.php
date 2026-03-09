    
<?php if( have_rows('block_4') ):
		while( have_rows('block_4') ): the_row(); ?>
        <section class="section-video">
            <div id="player" class="video-inner">

            <?php echo wp_get_attachment_image(
                                get_sub_field('image'),
                                'full', '', array('class'=> 'cover' )); ?>
                
                <?php
                    $video = get_sub_field( 'video_id' );
                    preg_match('/src="(.+?)"/', $video, $matches_url );
                    $src = $matches_url[1];	
                    preg_match('/embed(.*?)?feature/', $src, $matches_id );
                    $id = $matches_id[1];
                    $id = str_replace( str_split( '?/' ), '', $id );
                    var_dump( $id );
                ?>

                <button data-video="<?php echo $id; ?>" class="btn-play">
                    <svg class="icon">
                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/icons/svgmap.svg#play-button" />
                    </svg>
                </button>


            </div>




        </section>
    <?php
	endwhile;
endif; ?>