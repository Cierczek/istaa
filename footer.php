<?php
//Get the images ids from the post_metadata
$images = acf_photo_gallery('partners', $post->ID);

$pageid = get_the_ID();
if ($pageid == "6") {
    ?>
    <div class="our-partners">
        <div class="partners-container">
            <h2 class="our-partners">our partners</h2>
            <div class="container-images">
                <?php
                if (count($images)) {
                    foreach ($images as $image) {
                        $full_image_url = $image['full_image_url']; //Full size image url
                        ?>
                        <div class="img-partners">
                            <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" class="img-partner">
                        </div>
                        <?php
                    }
                }
            } elseif ($pageid == "174") {
                ?>
                <div class = "form-active-member">
                    <div class = "container-form-active-member">
                        <?= do_shortcode('[contact-form-7 id = "185" title = "active-members"]'); ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<footer class="footer" role="contentinfo">
    <div id="inner-footer" class="row">
        <div class="large-12 medium-12 columns">
            <nav role="navigation">
                <?php joints_footer_links(); ?>
            </nav>
        </div>
        <div class="large-12 medium-12 columns footer-info">
            <p class="source-org copyright"> ISTAA | International Sports Travel Agencies Association.</p>
            <p class="social-footer">
                <a href="#" class="contact-footer">Contact</a> 
                <a href="" class="facebook social-icon"><img src="<?= get_template_directory_uri(); ?>/assets/images/fb_wh.png" /></a>
                <a href="" class="instagram social-icon"><img src="<?= get_template_directory_uri(); ?>//assets/images/instagram_wh.png" /></a>
            </p>
        </div>
    </div> <!-- end #inner-footer -->
</footer> <!-- end .footer -->
</div>  <!-- end .main-content -->
</div> <!-- end .off-canvas-wrapper -->

<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function () {
    var a = location.pathname;
    if( a == "/istaa/my-account/" ){ 
    jQuery( "a.my-account" ).addClass( "active");
    }
    else{
    jQuery( "a.my-account" ).removeClass( "active" );
    } 
    });
</script>
</body>
</html> <!-- end page -->