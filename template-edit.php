<?php
/*
  Template Name: edit page
 */
if (is_user_logged_in()) {
    /* Get user info. */
    global $current_user, $wp_roles;
//get_currentuserinfo(); //deprecated since 3.1

    /* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
    $error = array();
    /* If profile was saved, update profile. */
    if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['action']) && $_POST['action'] == 'update-user') {

        /* Update user password. */
        if (!empty($_POST['pass1']) && !empty($_POST['pass2'])) {
            if ($_POST['pass1'] == $_POST['pass2'])
                wp_update_user(array('ID' => $current_user->ID, 'user_pass' => esc_attr($_POST['pass1'])));
            else
                $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
        }

        /* Update user information. */
        if (!empty($_POST['url']))
            wp_update_user(array('ID' => $current_user->ID, 'user_url' => esc_url($_POST['url'])));
        if (!empty($_POST['email'])) {
            if (!is_email(esc_attr($_POST['email'])))
                $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
            elseif (email_exists(esc_attr($_POST['email'])) != $current_user->id)
                $error[] = __('This email is already used by another user.  try a different one.', 'profile');
            else {
                wp_update_user(array('ID' => $current_user->ID, 'user_email' => esc_attr($_POST['email'])));
            }
        }

        if (!empty($_POST['first-name']))
            update_user_meta($current_user->ID, 'first_name', esc_attr($_POST['first-name']));
        if (!empty($_POST['last-name']))
            update_user_meta($current_user->ID, 'last_name', esc_attr($_POST['last-name']));
        if (!empty($_POST['phone']))
            update_user_meta($current_user->ID, 'phone', esc_attr($_POST['phone']));
        if (!empty($_POST['contact_person']))
            update_user_meta($current_user->ID, 'contact_person', esc_attr($_POST['contact_person']));
        if (!empty($_POST['sport_disciplines']))
            update_user_meta($current_user->ID, 'sport_disciplines', $_POST['sport_disciplines']);
        if (!empty($_POST['description_tags']))
            update_user_meta($current_user->ID, 'description_tags', $_POST['description_tags']);
        
        if (count($error) == 0) {
            do_action('edit_user_profile_update', $current_user->ID);
            wp_redirect(get_permalink());
            exit;
        }
    }
    get_header();
    ?>

    <div id="content">

        <div id="inner-content" class="row">

            <main id="main" class="large-12 medium-12 columns" role="main">
                <?php
                if (have_posts()) : while (have_posts()) : the_post();

                        get_template_part('parts/loop', 'edit-page');

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
