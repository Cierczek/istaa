<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
    <section class="entry-content" itemprop="articleBody">
        <div class="content-container">
            <form method="post" id="edituser" action="<?php the_permalink(); ?>">
                <h1 class="login-title">Edit your profile</h1>
                <?php
                $current_user = get_current_user_id();
                $all_meta = get_user_meta($current_user);
                $keys = array('first_name', 'last_name', 'user_email', 'url', 'contact_person', 'phone');

                foreach ($keys as $key) {
                    ?>
                    <p class="form-<?= $key ?>">

                        <input class="text-input" name="<?= $key ?>" type="text" id="<?= $key ?>" value="<?php the_author_meta($key, $current_user); ?>" />
                    </p>
                <?php } ?>

                <!-- new code-->
                 <h2 class="my-account-edit-title">Sport disciplines</h2>
                <?php
                $field = get_field_object('field_5a0c01a7ca44e', $current_user);
                echo '<select name="sport_disciplines[]" multiple>';
                foreach ($field['choices'] as $k => $v) {
                    echo '<option value="' . $k . '">' . $v . '</option>';
                }
                echo '</select>';
                ?>

                <h2 class="my-account-edit-title">Other description tags</h2>
                <?php
                $field_des = get_field_object('field_5a0c0262686e5', $current_user);
                echo '<select name="description_tags[]"  multiple>';
                foreach ($field_des['choices'] as $k => $v) {
                    echo '<option value="' . $k . '">' . $v . '</option>';
                }
                echo '</select>';
                ?>
                <!-- new code-->

                <p class="form-password">
                    <label for="pass1"><?php _e('Password *', 'profile'); ?> </label>
                    <input class="text-input" name="pass1" type="password" id="pass1" placeholder="Password"/>
                </p><!-- .form-password -->
                <p class="form-password">
                    <label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label>
                    <input class="text-input" name="pass2" type="password" id="pass2" placeholder="Repeat Password"/>
                </p><!-- .form-password -->

<?php
//action hook for plugin and extra fields
do_action('edit_user_profile', $current_user);
?>
                <p class="form-submit">
                <?php echo $referer; ?>
                    <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
                    <?php wp_nonce_field('update-user') ?>
                    <input name="action" type="hidden" id="action" value="update-user" />
                </p><!-- .form-submit -->
            </form><!-- #adduser -->
        </div><!-- .entry-content -->


    </section> <!-- end article section -->

    <footer class="article-footer">


    </footer> <!-- end article footer -->

</article> <!-- end article -->