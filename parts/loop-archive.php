<?php
$title = get_the_title();
$excerpt = substr(get_the_excerpt(), 0, 150);
?>
<article id="post-<?php the_ID(); ?>"  role="article" class="large-6 columns blog-posts">
    <div class="container-article">
        <header class="article-header">
            <span class="date"><?= the_time("j/n/Y"); ?></span>
            <h2 class="recent-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?= $title ?></a></h2>
            <?php
            $excerpt
            ?>
        </header> <!-- end article header -->

        <section class="entry-content" itemprop="articleBody" >
            <div class="post-image">
                <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail('full'); ?>
                </a>
            </div>

            <p class="post_excerpt_last"><?= $excerpt ?><a href="<?php the_permalink() ?>" class="read-more"> read more</a></p>

        </section> <!-- end article section -->

        <footer class="article-footer">
            <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
        </footer> <!-- end article footer -->				    						
    </div><!-- end container -->
    <div class="separator-div"></div>
</article> <!-- end article -->