<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
    <section class="entry-content" itemprop="articleBody">
        <div class="content-container">
            <form method="post" id="edituser" action="<?php the_permalink(); ?>">
                <h1 class="login-title">Edit your profile</h1>
                <?php $current_user = get_current_user_id(); ?>
                <p class="form-country">
                    <label for="first-name"><?php _e('Country', 'profile'); ?></label>
                    <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta('first_name', $current_user); ?>" />
                </p><!-- .form-username -->
                <p class="form-company">
                    <label for="last-name"><?php _e('Company', 'profile'); ?></label>
                    <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta('last_name', $current_user); ?>" />
                </p><!-- .form-username -->
                <p class="form-email">
                    <label for="email"><?php _e('E-mail *', 'profile'); ?></label>
                    <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta('user_email', $current_user); ?>" />
                </p><!-- .form-email -->
                <p class="form-url">
                    <label for="url"><?php _e('Website', 'profile'); ?></label>
                    <input class="text-input" name="url" type="text" id="url" value="<?php the_author_meta('user_url', $current_user); ?>" />
                </p><!-- .form-url -->
                <p class="form-contact">
                    <label for="url"><?php _e('Contact Person', 'profile'); ?></label>
                    <input class="text-input" name="contact_person" type="text" id="url" value="<?php the_author_meta('contact_person', $current_user); ?>" />
                </p><!-- .contact-person-->
                <p class="form-phone">
                    <label for="url"><?php _e('Phone', 'profile'); ?></label>
                    <input class="text-input" name="phone" type="text" id="url" value="<?php the_author_meta('phone', $current_user); ?>" />
                </p><!-- .phone-url -->
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