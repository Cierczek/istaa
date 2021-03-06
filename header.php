<!doctype html>

<html class="no-js"  <?php language_attributes(); ?>>

    <head>
        <meta charset="utf-8">

        <!-- Force IE to use the latest rendering engine available -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta class="foundation-mq">

        <!-- If Site Icon isn't set in customizer -->
        <?php if (!function_exists('has_site_icon') || !has_site_icon()) { ?>
            <!-- Icons & Favicons -->
            <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
            <link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
            <!--[if IE]>
                <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
            <![endif]-->
            <meta name="msapplication-TileColor" content="#f01d4f">
            <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">
        <?php } ?>

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/custom.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/hamburgers.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php wp_head(); ?>

        <!-- Drop Google Analytics here -->
        <!-- end analytics -->
        <?php
        $user = wp_get_current_user();
        $role = $user->roles;
        if ($role[0] == 'administrator') {
            echo '
                <style type="text/css">
                #wpadminbar{ 
                    display:block; 
                }
                html {
                    margin-top: 32px;
                }
                </style>';
        } else {
            echo '
            <style type="text/css">
                #wpadminbar{ 
                    display:none; 
                }
                html {
                    margin-top: 0px!important;
                }
            </style> ';
        }
        ?>
    </head>

    <!-- Uncomment this line if using the Off-Canvas Menu --> 

    <body <?php body_class(); ?>>

        <div class="off-canvas-wrapper">

            <?php get_template_part('parts/content', 'offcanvas'); ?>

            <div class="off-canvas-content" data-off-canvas-content>

                <header class="header" role="banner">

                    <!-- This navs will be applied to the topbar, above all content 
                         To see additional nav styles, visit the /parts directory -->
                    <?php get_template_part('parts/nav', 'offcanvas-topbar'); ?>


                </header> <!-- end .header -->