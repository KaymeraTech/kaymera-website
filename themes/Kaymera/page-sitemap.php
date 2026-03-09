<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>
    <main class="main">
        <div class="wrap">
        <div class="sitemap">
        <h1 class="content-tabs-title mdc-typography--headline3"><?php the_title(); ?></h1>
            <h2 class="content-tabs-title mdc-typography--headline4" id="pages">Pages</h2>
            <ul class='links-list'>
            <?php
            // Add pages you'd like to exclude in the exclude here
            wp_list_pages(
            array(
                'exclude' => '',
                'title_li' => '',
            )
            );
            ?>
            </ul>

            <h2 class="content-tabs-title mdc-typography--headline4" id="posts">Posts</h2>
            <ul class="title-list">
            <?php
            // Add categories you'd like to exclude in the exclude here
            $cats = get_categories('exclude=');
            foreach ($cats as $cat) {
            echo "<li><h3 class='content-tabs-title mdc-typography--headline5' >".$cat->cat_name."</h3>";
            echo "<ul class='links-list'>";
            query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
            while(have_posts()) {
                the_post();
                $category = get_the_category();
                // Only display a post link once, even if it's in multiple categories
                if ($category[0]->cat_ID == $cat->cat_ID) {
                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                }
            }
            echo "</ul>";
            echo "</li>";
            }
            ?>

        <?php
            
            $cats = ['event', 'presscenter'];
            $cats_names = ['Events', 'Press Center'];
            $counter = 0;
            foreach ($cats as $cat) {
                $the_query = new WP_Query( array(
                    'post_type' => $cat,
                    
                ) );
            
            $cat_name = $cats_names[$counter];

            echo "<li><h3 class='content-tabs-title mdc-typography--headline5'>$cat_name</h3>";
            echo "<ul class='links-list'>";
            while ( $the_query->have_posts() ) :
                $the_query->the_post();
                // Show Posts ...
            
                $category = get_the_category();
                // Only display a post link once, even if it's in multiple categories
                if ($category[0]->cat_ID == $cat->cat_ID) {
                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                }
            endwhile;
        
            
            echo "</ul>";
            echo "</li>";
            $counter++;
            }
            ?>
            </ul>
        </div>
        </div>
<?php get_footer(); ?>

