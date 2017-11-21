<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

    <section class="entry-content" itemprop="articleBody">

        <div class="content-container myaccount">
            <ul class="tabs" data-tabs id="example-tabs">
                <li class="tabs-title is-active"><a href="#panel" aria-selected="true">dashboard</a></li>
                <li class="tabs-title-per"><a href="http://dev.robertcierczek.es/istaa/membership-directory/" class="button-ta">members directory</a></li>
                <li class="tabs-title"><a data-tabs-target="pane3" href="#pane3">annual meetings</a></li>
                <li class="tabs-title"><a data-tabs-target="pane4" href="#pane4">whatsapp group</a></li>
                <li class="tabs-title"><a data-tabs-target="pane5" href="#pane5">claims and reports</a></li>
                <li class="tabs-title"><a data-tabs-target="pane6" href="#pane6">suggestions</a></li>
            </ul>

            <?php get_template_part('parts/loop', 'first-option'); ?>

        </div>
    </section> <!-- end article section -->

    <footer class="article-footer">


    </footer> <!-- end article footer -->

</article> <!-- end article -->