<?php
$current_user = $_GET['userid'];
$single = true;
$size = 'full';
$image = get_user_meta($current_user, 'featured_image', $single);

$user = $user ? new WP_User($user) : wp_get_current_user();
$member = $user->roles ? $user->roles[0] : false;
?>
<div class="content-container myaccount">
    <ul class="tabs" data-tabs id="example-tabs">
        <li class="tabs-title-per"><a data-tabs-target="pane1" href="./my-account/" class="button-ta">dashboard</a></li>
        <li class="tabs-title-per"><a data-tabs-target="pane2" href="./membership-directory/" class="button-ta">member directory</a></li>
        <li class="tabs-title"><a data-tabs-target="pane3" href="#pane3">annual meetings</a></li>
        <li class="tabs-title"><a data-tabs-target="pane4" href="#pane4">whatsapp group</a></li>
        <li class="tabs-title"><a data-tabs-target="pane5" href="#pane5">claims and reports</a></li>
        <li class="tabs-title"><a data-tabs-target="pane6" href="#pane6">suggestions</a></li>
    </ul>
   
    <div class="row">
        <div class="large-3 columns mbm-profile">
            <h2 class="my-account-title">Member proile</h2>
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
            <div class="large-6 columns view-profile first-disp"> 
                <h2 class="my-account-title">Sport disciplines</h2>
                <?php
                $disciplines = get_user_meta($current_user, 'sport_disciplines', $single);

                foreach ($disciplines as $discipline) {
                    ?>
                    <p class="discipline"> <?= $discipline ?></p>
                <?php } ?>
            </div>
            <div class="large-6 columns view-profile sec-disp"> 
                <h2 class="my-account-title">Other description tags</h2>
                <?php
                $description_tags = get_user_meta($current_user, 'description_tags', $single);

                foreach ($description_tags as $tag) {
                    ?>
                    <p class="discipline"> <?= $tag ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>