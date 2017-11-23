<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

    <?php
    $feature_image = get_the_post_thumbnail($post->ID, 'full');
    ?>

    <section class="entry-content" itemprop="articleBody">
        <div class="fd-img">
            <?= $feature_image ?>
        </div>
        <div class="content-container">
            <?php
            the_content();
            $pageid = get_the_ID();
           
            if($pageid=="6"){
                ?>
                <h2 class="latest-news">latest news <a href=""><span>see more <i class="fa fa-angle-right" aria-hidden="true"></i></span></a></h2>
                <div class="recent-posts">
                    <?php
                    $args = array('numberposts' => '4');
                    $recent_posts = wp_get_recent_posts($args);

                    foreach ($recent_posts as $recent) {
                        $i++;
                        echo '<div class="large-6 columns recent-post-' . $i . ' last-post">'
                        . '<span class="date">' . date('j/n/Y', strtotime($recent['post_date'])) . '</span><br>'
                        . '<div class="news-recent-title"><a href="' . get_permalink($recent["ID"]) . '" class="recent-title">' . $recent["post_title"] . '</a></div>'
                        . '<p class="post_excerpt_last">' . $recent["post_excerpt"]
                        . '<a hrerf="' . get_permalink($recent["ID"]) . '" class="read-more"> read more</a></p>'
                        . ' </div> ';
                    }
                    wp_reset_query();
                    ?>
            </div>
            <?php }?>
        </div>
       

    </section> <!-- end article section -->

    <footer class="article-footer">


    </footer> <!-- end article footer -->

</article> <!-- end article -->