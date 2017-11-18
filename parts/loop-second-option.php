<?php
session_start();
$_SESSION['role'] = $_POST['role'];
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['last_name'] = $_POST['last_name'];
$_SESSION['description_tags'] = $_POST['description_tags'];
$_SESSION['sport_disciplines'] = $_POST['sport_disciplines'];

$args = array(
    'role' => $_POST['role'],
    'order' => 'ASC',
    'orderby' => 'display_name',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'sport_disciplines',
            'value' => $_POST['sport_disciplines'],
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'description_tags',
            'value' => $_POST['description_tags'],
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'first_name',
            'value' => $_POST['first_name'],
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'last_name',
            'value' => $_POST['last_name'],
            'compare' => 'LIKE'
        ),
    )
);

$single = true;
$size = 'full';
$user_query = new WP_User_Query($args);
$users = $user_query->get_results();
?>


<div class="filter-container">

    <form method="post" action="" name="form" id="filter-form">
        <select name="role" class="select_mem" id="role">
            <?php
            if ($_SESSION['role'] != '') {
                ?>
                <option value="<?= $_SESSION['role'] ?>"><?= substr($_SESSION['role'], 0, -5); ?></option>
                <option value="">Membership</option>
            <?php } else {
                ?>
                <option value="">Membership</option>  
            <?php }
            ?>
            <option value="active_role">Active</option>
            <option value="asociate_role">Associate</option>
            <option value="partner_role">Partner</option>
            <option value="affiliated_role">Affiliated</option>
        </select>

        <?php
        echo '<select name="first_name" class="select_mem">';
        if ($_SESSION['first_name'] != '') {
            ?>
            <option value="<?= $_SESSION['first_name'] ?>"><?= $_SESSION['first_name'] ?></option>
            <option value="">Country</option> 
        <?php } else {
            ?>
            <option value="">Country</option>  
            <?php
        }
        foreach ($users as $user) {
            $first_name = get_user_meta($user->ID, 'first_name', $single);
            echo' <option value="' . $first_name . '">' . $first_name . '</option>';
        }
        echo '</select>';

        echo '<select name="last_name" class="select_mem">';
        if ($_SESSION['last_name'] != '') {
            ?>
            <option value="<?= $_SESSION['last_name'] ?>"><?= $_SESSION['last_name'] ?></option>
            <option value="">Company</option>  
        <?php } else {
            ?>
            <option value="">Company</option>  
            <?php
        }
        foreach ($users as $user) {
            $lastName = get_user_meta($user->ID, 'last_name', $single);
            echo' <option value="' . $lastName . '">' . $lastName . '</option>';
        }
        echo '</select>';

        echo '<select name="sport_disciplines" class="select_mem">';
        if ($_SESSION['sport_disciplines'] != '') {
            ?>
            <option value="<?= $_SESSION['sport_disciplines'] ?>"><?= $_SESSION['sport_disciplines'] ?></option>
            <option value="">Discipline</option>
        <?php } else {
            ?>
            <option value="">Discipline</option>  
            <?php
        }
        foreach ($users as $user) {
            $disciplines = get_user_meta($user->ID, 'sport_disciplines', $single);
            foreach ($disciplines as $discipline) {
                echo '<option value="' . $discipline . '">' . $discipline . '</option>';
            }
        }
        echo '</select>';

        echo '<select name="description_tags" class="select_mem">';
        if ($_SESSION['description_tags'] != '') {
            ?>
            <option value="<?= $_SESSION['description_tags'] ?>"><?= $_SESSION['description_tags'] ?></option>
            <option value="">Description Tag</option>
        <?php } else {
            ?>
            <option value="">Description Tag</option>  
            <?php
        }
        foreach ($users as $user) {
            $descriptionTags = get_user_meta($user->ID, 'description_tags', $single);
            foreach ($descriptionTags as $tag) {
                echo '<option value="' . $tag . '">' . $tag . '</option>';
            }
        }
        echo '</select>';
        ?>
    </form>
</div>


<div class="member-directory">
    <?php
    if (!empty($users)) {
        foreach ($users as $user) {
            $member = $user->roles ? $user->roles[0] : false;
            echo '<div class="large-3 columns mbm-profile-list ' . $member . '">';
            ?>
            <h2 class="my-account-title member-tit">
                <?= ucfirst(substr($member, 0, -5)); ?> member 
                <span class="mem-logo">
                    <img src="<?= home_url() ?>/wp-content/themes/istaa/assets/images/<?= $member ?>"/>
                </span>
            </h2>
            <div class="user-image-list">
                <?php
                $image = get_user_meta($user->ID, 'featured_image', $single);
                echo wp_get_attachment_image($image, $size);
                ?>               
            </div>
            <p class="user-data member">Member: <?= substr($member, 0, -5); ?> </p>
            <p class="user-data">Country: <?= get_user_meta($user->ID, 'first_name', $single); ?></p>
            <p class="user-data">Company: <?= get_user_meta($user->ID, 'last_name', $single); ?></p>
            <p class="user-data">Website: <a href="<?php the_author_meta('url', $user->ID); ?>"><?php the_author_meta('url', $user->ID); ?></a></p>
            <p class="user-data">E-mail: <a href="mailto:<?php the_author_meta('user_email', $user->ID); ?>"><?php the_author_meta('user_email', $user->ID); ?></a></p>
            <p class="user-data">Contact person: <?= get_user_meta($user->ID, 'contact_person', $single); ?></p>
            <p class="user-data">Phone: <?= get_user_meta($user->ID, 'phone', $single); ?></p>
            <?php
            echo '</div>';
        }
    } else {
        echo 'No users found';
    }
    ?>
</div>





<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.select_mem').on('change', function () {
            document.forms['form'].submit();
        });
    });
</script>