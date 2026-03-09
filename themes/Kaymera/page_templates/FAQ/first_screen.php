<section class="page-title">
        <div class="wrap">
            <?php breadcrumbs(); ?>
                <div class="row page-title-main-row jc-space-between">
                    <div class="col">
                        <span class="mdc-typography--overline overline">
                            <?php the_field('before'); ?>
                        </span>
                    </div>
                    <div class="col-6 col-md">    
                        <h1 class="mdc-typography--headline3 title">
                            <?php the_field('title'); ?>
                        </h1>
                    </div>
                    <div class="col-5 col-md">
                        <div class="mdc-typography--body2 subtitle">
                            <?php the_field('introduction'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>