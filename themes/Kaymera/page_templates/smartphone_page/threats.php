<?php if( have_rows('threats') ): ?>
            <section class="section-draggable">
               <!--  <div class="wrap"> -->
                    <div class="draggable-container">
                        <div class="draggable-block">
                            <?php while( have_rows('threats') ): the_row();
                                include('threats-inner.php');
                                $next = true; //Color condition for next element
                            endwhile; ?>
                            <div class="draggable-next-block">
                                <div class="draggable-next-block-inner">
                                <?php while( have_rows('threats_red') ): the_row();
                                    include('threats-inner.php');
                                endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="divider" id="divider">
                            <div class="divider-control">
                                <svg class="icon prev">
                                    <use xlink:href="<?= get_template_directory_uri() ?>/img/icons/svgmap.svg#prev" />
                                </svg>
                                <svg class="icon next">
                                    <use xlink:href="<?= get_template_directory_uri() ?>/img/icons/svgmap.svg#next" />
                                </svg>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </section>
        <?php
endif; ?>