<!-- By default, this menu will use off-canvas for small
     and a topbar for medium-up -->
<div class="top-bar" id="top-bar-menu">
    <div class="header-container">
        <div class="top-bar-left float-left">
            <a href="<?php echo home_url(); ?>" class="ista_logo">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/istaa_logo.svg">
            </a>
        </div>
        <div class="top-bar-right show-for-large" id="main-menu">
            <?php joints_top_nav(); ?>	
        </div>
        <?php if (is_user_logged_in()) { ?>
        <div class="login show-for-large">
            <a href="<?= home_url(); ?>/my-account/" class="my-account">my account</a>
        </div>
        <?php }else{?>
        <div class="login show-for-large">
            <a href="<?= home_url(); ?>/wp-admin/" class="login-home">log in</a>
        </div>
        <?php }?>
        <div class="social-media show-for-large">
            <a href="" class="facebook"><img src="<?= get_template_directory_uri(); ?>/assets/images/fb.png" /></a>
            <a href="" class="instagram"><img src="<?= get_template_directory_uri(); ?>//assets/images/instagram.png" /></a>
        </div>
        <div class="top-bar-right hide-for-large">
            <a data-toggle="off-canvas">
                <div class="hamburger hamburger--3dx">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<script>
    jQuery('.top-bar-right.hide-for-large').click(menuMobi);
    function menuMobi() {
        jQuery('.hamburger').toggleClass("is-active");
        console.log('GO!!');
    }
</script>