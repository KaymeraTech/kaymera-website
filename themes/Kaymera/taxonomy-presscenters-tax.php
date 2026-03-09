<?php get_header();
    isset($wp_query->query['paged']) ? $paged = $wp_query->query['paged'] : $paged = null;
    //Get currect object
    $object = get_queried_object();
    //Get term id
    $current_id = $object->term_id;
    //Get id parent tax if exist and build tags menu
    if (get_term($current_id)->parent != 0) :
        $id = get_term($current_id)->parent;
    else :
        $id = $current_id;
    endif;
    $terms = get_term_children( $id, $object->taxonomy );
?>
<main class="main">

    <section class="page-title">
        <div class="wrap">
            <?php breadcrumbs(); ?>
            <?php if (  get_term($current_id)->parent == 0 && !isset($paged) ) : ?>
                <div class="row page-title-main-row jc-space-between">
                    <div class="col">
                        <span class="mdc-typography--overline overline">
                            <?php the_field('before', $object); ?>
                        </span>
                    </div>
                    <div class="col-6 col-md">    
                        <h1 class="mdc-typography--headline3 title">
                            <?php the_field('title', $object); ?>
                        </h1>
                    </div>
                    <div class="col-5 col-md">
                        <div class="mdc-typography--body2 subtitle">
                            <?php echo term_description(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="section-grid">
        <div class="wrap">
            <div class="row">
                <div class="col-4 col-md">
                    <div class="tag-links">
                        <?php 
                        foreach ($terms as $term_id) :
                            $term = get_term($term_id); ?> 
                             <?php $term_link = get_term_link($term->term_id);
                                    //   $parse_url = parse_url($term_link);
                                    //   $exploded_url = explode('/', $parse_url['path']);
                                    //   unset($exploded_url[1]);
                                    //   unset($exploded_url[2]);
                                    //     $imploded_url = implode($exploded_url);
                                    //   print_r($exploded_url);
                                        // $parse_url['path'] = $imploded_url;
                                        // print_r($parse_url);

                                       
                                      
                                      
                                      ?>

                            <a <?php if($term_id !== $current_id){ echo 'href="'.$term_link.'"'; }  ?> class="tag-link <?= $term_id == $current_id ? 'current' : ''; ?>"> <!--current-->
                                <span class="mdc-typography--body2 tag-title"><?= $term->name; ?></span>
                               
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-8 col-md">
                    <?php
                        if(have_posts()) : while(have_posts()) : the_post();
                            get_template_part( 'partials/loop-press-release' );
                        endwhile;
                        else :
                            echo "Events is empty";
                        endif;  
                        navigation();
                    ?>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>