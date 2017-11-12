<?php

// Calling your own login css so you can style it
function joints_login_css() {
    wp_enqueue_style('joints_login_css', get_template_directory_uri() . '/assets/css/login.css', false);
}

// changing the logo link from wordpress.org to your site
function joints_login_url() {
    return home_url();
}

// changing the alt text on the logo to show your site name
function joints_login_title() {
    $header = get_header();
    return $header;
}

function joints_login_footer() {
    echo '<script>
        jQuery(document).ready(function(){
            jQuery("#user_login").attr("placeholder", "User");
            jQuery("#user_pass").attr("placeholder", "Password");
        });
        jQuery(document).ready(function () {
        var resizeBox = function () {
            var hi = jQuery(window).height();
            var rez = hi - 90;
            jQuery(".off-canvas-content").css("height", rez);
        };
            resizeBox();
            jQuery(window).resize(resizeBox);
        });
        </script>';
    return get_footer();
}

function new_wp_login_title() {
    if ($GLOBALS['pagenow'] === 'wp-login.php' && empty($_REQUEST['action'])) {
        $x = '<h1 class="login-title">Please Log in</h1>';
    } else {
        $x = '<h1 class="login-title">Reset your password</h1>';
    }
    return $x;
}

function hide_logo() {
    echo '<style type="text/css">                                                                   
               form#loginform p label br, h1 a, p.forgetmenot, p#backtoblog { display:none!important; }
                h1.login-title {
                    font-size: 18px;
                    text-align: center;
                    font-weight: 400;
                    font-family: "Roboto", sans-serif;
                }
                form#loginform p label input, form#lostpasswordform p label input{
                    text-align:center;
                }
                .off-canvas-content {
                    background:#F8F7F7;
                }
                p.submit {
                    text-align: center;
                }
                input#wp-submit{
                    border: 2px solid #000!important;
                    padding: 10px 40px;
                    color: #000!important;
                    border-radius: 28px;
                    font-size: 14px;
                    font-weight: 700;
                    background:#F8F7F7;
                 }
            </style>';
}

// calling it only on the login page
add_filter('login_message', 'new_wp_login_title');
add_action('login_head', 'hide_logo');
add_action('login_enqueue_scripts', 'joints_login_css', 10);
add_filter('login_headerurl', 'joints_login_url');
add_filter('login_headertitle', 'joints_login_title');
add_filter('login_footer', 'joints_login_footer');


add_filter('gettext', 'wpse17709_gettext', 10, 2);

function wpse17709_gettext($custom_translation, $login_texts) {

    if ('Log In' == $login_texts) {
        return 'enter';
    } // Login Button

    if ('Lost your password?' == $login_texts) {
        return 'Forgot password ?';
    } // Lost Password Link

    if ('Get New Password' == $login_texts) {
        return 'submit';
    } // Button
    

    return $translation;
}