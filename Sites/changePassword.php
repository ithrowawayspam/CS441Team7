<?php
$page_title = 'Change Account Password';
require_once('use/load.php');
//Any level change
checkUserAccessLevel(3);
?>
<?php $user = getCurrentUser(); ?>
<?php
if (isset($_POST['update'])) {

    $req_fields = array('new-password', 'old-password', 'id');
    isBlank($req_fields);

    if (empty($errors)) {

        if (sha1($_POST['old-password']) !== getCurrentUser()['password']) {
            $session->message('d', "Please try again, your old password not match");
            goToPage('changePassword.php', false);
        }

        $id = (int)$_POST['id'];
        $new = cleanseHTML($db->cleanse_SQL(sha1($_POST['new-password'])));
        $sql = "UPDATE users SET password ='{$new}' WHERE id='{$db->cleanse_SQL($id)}'";
        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1):
            $session->logout();
            $session->message('s', "You have been logged out and you  need to login with your new password.");
            goToPage('index.php', false);
        else:
            $session->message('d', ' Failed to update password.');
            goToPage('changePassword.php', false);
        endif;
    } else {
        $session->message("d", $errors);
        goToPage('changePassword.php', false);
    }
}
?>
<?php include_once('webpage_full_layout/header.php'); ?>
<div class="login-page">
    <div class="text-center">
        <h3>Change your password</h3>
    </div>
    <?php echo displayMessage($msg); ?>
    <form method="post" action="changePassword.php" class="clearfix">
        <div class="form-group">
            <label for="oldPassword" class="control-label">Old password</label>
            <input type="password" class="form-control" name="old-password" placeholder="Old password">
        </div>

        <div class="form-group">
            <label for="newPassword" class="control-label">New password</label>
            <input type="password" class="form-control" name="new-password" placeholder="New password">
        </div>

        <div class="form-group clearfix">
            <input type="hidden" name="id" value="<?php echo (int)$user['id']; ?>">
            <button type="submit" name="update" class="btn btn-info">Change</button>
        </div>
    </form>
</div>
<?php include_once('webpage_full_layout/footer.php'); ?>
