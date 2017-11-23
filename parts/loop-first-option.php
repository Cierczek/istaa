<?php
$current_user = get_current_user_id();
$single = true;
$size = 'full';
$image = get_user_meta($current_user, 'featured_image', $single);

$user = $user ? new WP_User($user) : wp_get_current_user();
$member = $user->roles ? $user->roles[0] : false;
?>
<div class="row">
    <div class="large-3 columns mbm-profile">
        <h2 class="my-account-title">Member proile <a href="./edit-page/">Edit profle</a></h2>
        <div class="user-image">
            <?php
            echo wp_get_attachment_image($image, $size);
            ?>               
        </div>
        <p class="user-data member">Member: <?= substr($member, 0, -5); ?> </p>
        <p class="user-data">Country: <?= get_user_meta($current_user, 'first_name', $single); ?></p>
        <p class="user-data">Company: <?= get_user_meta($current_user, 'last_name', $single); ?></p>
        <p class="user-data">Website: <a href="<?php the_author_meta('url', $current_user); ?>"><?php the_author_meta('url', $current_user); ?></a></p>
        <p class="user-data">E-mail: <a href="mailto:<?php the_author_meta('user_email', $current_user); ?>"><?php the_author_meta('user_email', $current_user); ?></a></p>
        <p class="user-data">Contact person: <?= get_user_meta($current_user, 'contact_person', $single); ?></p>
        <p class="user-data">Phone: <?= get_user_meta($current_user, 'phone', $single); ?></p>
        <div class="mbm-img">
            <img src="<?= home_url() ?>/wp-content/themes/istaa/assets/images/<?= $member ?>.png"/>
        </div>
    </div>
    <div class="large-9 columns usr-notif-container">
        <h2 class="my-account-title">Notifications</h2>
        <?php
        $post_object = get_field($member);

        if ($post_object) {
            $post = $post_object;
            setup_postdata($post);
            ?>
            <div class="notif-post">
                <span class="date-notif"><?php the_date('d/m/Y') ?></span>
                <h3 class="post-title-notif"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="notif_excerpt"><?php the_excerpt(); ?></div>
            </div>
            <?php
            wp_reset_postdata();
        }
        ?>
        <div class="large-6 columns disciplines first-disp"> 
            <h2 class="my-account-title">Sport disciplines <a href="./edit-page/">Edit</a></h2>
            <?php
            $disciplines = get_user_meta($current_user, 'sport_disciplines', $single);

            foreach ($disciplines as $discipline) {
                ?>
                <p class="discipline"> <?= $discipline ?></p>
            <?php } ?>
        </div>
        <div class="large-6 columns disciplines sec-disp"> 
            <h2 class="my-account-title">Other description tags <a href="./edit-page/">Edit</a></h2>
            <?php
            $description_tags = get_user_meta($current_user, 'description_tags', $single);

            foreach ($description_tags as $tag) {
                ?>
                <p class="discipline"> <?= $tag ?></p>
            <?php } ?>
        </div>
    </div>
</div>