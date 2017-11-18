<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

    <section class="entry-content" itemprop="articleBody">

        <div class="content-container myaccount">
            <ul class="tabs" data-tabs id="example-tabs">
                <li class="tabs-title-per"><a data-tabs-target="pane2" href="http://dev.robertcierczek.es/istaa/my-account/" class="button-ta">dashboard</a></li>
                <li class="tabs-title is-active"><a data-tabs-target="pane2" href="#pane2" aria-selected="true">members directory</a></li>
                <li class="tabs-title"><a data-tabs-target="pane3" href="#pane3">annual meetings</a></li>
                <li class="tabs-title"><a data-tabs-target="pane4" href="#pane4">whatsapp group</a></li>
                <li class="tabs-title"><a data-tabs-target="pane5" href="#pane5">claims and reports</a></li>
                <li class="tabs-title"><a data-tabs-target="pane6" href="#pane6">suggestions</a></li>
            </ul>
            <div class="tabs-content" data-tabs-content="example-tabs">
                <div class="tabs-panel" id="panel">
                    <?php get_template_part('parts/loop', 'first-option'); ?>
                </div>
                <div class="tabs-panel is-active" id="pane2">
                    <?php get_template_part('parts/loop', 'second-option'); ?>
                </div>
                <div class="tabs-panel" id="pane3">
                    <p>Suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
                </div>
                <div class="tabs-panel" id="pane4">
                    <p>Suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
                </div>
                <div class="tabs-panel" id="pane5">
                    <p>Suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
                </div>
                <div class="tabs-panel" id="pane6">
                    <p>Suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
                </div>
            </div>
        </div>
    </section> <!-- end article section -->

    <footer class="article-footer">


    </footer> <!-- end article footer -->

</article> <!-- end article -->