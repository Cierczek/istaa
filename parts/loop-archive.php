<article id="post-<?php the_ID(); ?>"  role="article" class="large-6 columns blog-posts">
    <div class="container-article">
        <header class="article-header">
            <span class="date"><?= the_time("j/n/Y"); ?></span>
            <h2 class="recent-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <?php
            //get_template_part( 'parts/content', 'byline' ); 
            $excerpt = get_the_excerpt()
            ?>
        </header> <!-- end article header -->

        <section class="entry-content" itemprop="articleBody" >
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>

            <p class="post_excerpt_last"><?= $excerpt ?><a hrerf="<?php the_permalink() ?>" class="read-more"> read more</a></p>

        </section> <!-- end article section -->

        <footer class="article-footer">
            <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
        </footer> <!-- end article footer -->				    						
    </div><!-- end container -->
    <div class="separator-div"></div>
</article> <!-- end article -->
