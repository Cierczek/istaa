<?php
$stmembers = acf_photo_gallery('1st-members', $post->ID);
$ndmembers = acf_photo_gallery('2nd-members', $post->ID);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

    <section class="entry-content" itemprop="articleBody">

        <div class="content-container">

            <h2 class="members-title">1st kind of members</h2>
            <?php
            if (count($stmembers)) {
                foreach ($stmembers as $stmember) {
                    $full_image_url = $stmember['full_image_url']; //Full size image url
                    ?>
                    <div class="img-members">
                        <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" class="img-member">
                    </div>
                    <?php
                }
            }
            ?>

            <h2 class="members-title">2nd kind of members</h2>
            <?php
            if (count($ndmembers)) {
                foreach ($ndmembers as $ndmember) {
                    $full_image_url = $ndmember['full_image_url']; //Full size image url
                    ?>
                    <div class="img-members">
                        <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" class="img-member">
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        
    </section> <!-- end article section -->

    <footer class="article-footer">


    </footer> <!-- end article footer -->

</article> <!-- end article -->