<?php
/*
  Template Name: user profile (No Sidebar)
 */
if (is_user_logged_in()) {
    get_header();
    ?>

    <div id="content">

        <div id="inner-content" class="row">

            <main id="main" class="large-12 medium-12 columns" role="main">
                <?php
                if (have_posts()) : while (have_posts()) : the_post();

                        get_template_part('parts/loop', 'view-profile');

                    endwhile;
                endif;
                ?>							
            </main> <!-- end #main -->

        </div> <!-- end #inner-content -->

    </div> <!-- end #content -->

    <?php
    get_footer();
}
else {
    header('Location: /istaa/wp-login.php');
}
?>
