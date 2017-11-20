<?php
$page_title = 'Edit Account Information';
require_once('use/load.php');
checkUserAccessLevel(3);
?>

<?php
//update user other info
if (isset($_POST['update'])) {
    $req_fields = array('name', 'username');
    isBlank($req_fields);
    if (empty($errors)) {
        $id = (int)$_SESSION['user_id'];
        $name = cleanseHTML($db->cleanse_SQL($_POST['name']));
        $username = cleanseHTML($db->cleanse_SQL($_POST['username']));
        $sql = "UPDATE users SET name ='{$name}', username ='{$username}' WHERE id='{$id}'";
        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $session->message('s', "Account information updated ");
            goToPage('editAccount.php', false);
        } else {
            $session->message('d', ' Failed to update!');
            goToPage('editAccount.php', false);
        }
    } else {
        $session->message("d", $errors);
        goToPage('editAccount.php', false);
    }
}
?>
<?php include_once('webpage_full_layout/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo displayMessage($msg); ?>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <span class="glyphicon glyphicon-edit"></span>
                <span>Edit My Account</span>
            </div>
            <div class="panel-body">
                <form method="post" action="editAccount.php?id=<?php echo (int)$user['id']; ?>" class="clearfix">
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="name" class="form-control" name="name"
                               value="<?php echo cleanseHTML(ucwords($user['name'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" class="form-control" name="username"
                               value="<?php echo cleanseHTML(ucwords($user['username'])); ?>">
                    </div>
                    <div class="form-group clearfix">
                        <a href="changePassword.php" title="change password" class="btn btn-danger pull-right">Change
                            Password</a>
                        <button type="submit" name="update" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include_once('webpage_full_layout/footer.php'); ?>
