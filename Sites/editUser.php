<?php
$page_title = 'Edit User';
require_once('use/load.php');
// Checkin What level user has permission to view this page
checkUserAccessLevel(1);
?>
<?php
$e_user = find_by_id('users', (int)$_GET['id']);
$groups = getEverythingInDB('user_groups');
if (!$e_user) {
    $session->message("d", "Missing user id.");
    goToPage('users.php');
}
?>

<?php
//Update User basic info
if (isset($_POST['update'])) {
    $req_fields = array('name', 'username', 'level');
    isBlank($req_fields);
    if (empty($errors)) {
        $id = (int)$e_user['id'];
        $name = cleanseHTML($db->cleanse_SQL($_POST['name']));
        $username = cleanseHTML($db->cleanse_SQL($_POST['username']));
        $level = (int)$db->cleanse_SQL($_POST['level']);
        $status = cleanseHTML($db->cleanse_SQL($_POST['status']));
        $sql = "UPDATE users SET name ='{$name}', username ='{$username}',user_level='{$level}',status='{$status}' WHERE id='{$db->cleanse_SQL($id)}'";
        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $session->message('s', "Account Updated ");
            goToPage('editUser.php?id=' . (int)$e_user['id'], false);
        } else {
            $session->message('d', ' Sorry failed to updated!');
            goToPage('editUser.php?id=' . (int)$e_user['id'], false);
        }
    } else {
        $session->message("d", $errors);
        goToPage('editUser.php?id=' . (int)$e_user['id'], false);
    }
}
?>
<?php
// Update user password
if (isset($_POST['update-pass'])) {
    $req_fields = array('password');
    isBlank($req_fields);
    if (empty($errors)) {
        $id = (int)$e_user['id'];
        $password = cleanseHTML($db->cleanse_SQL($_POST['password']));
        $h_pass = sha1($password);
        $sql = "UPDATE users SET password='{$h_pass}' WHERE id='{$db->cleanse_SQL($id)}'";
        $result = $db->query($sql);
        if ($result && $db->affected_rows() === 1) {
            $session->message('s', "User password has been updated ");
            goToPage('editUser.php?id=' . (int)$e_user['id'], false);
        } else {
            $session->message('d', ' Sorry failed to updated user password!');
            goToPage('editUser.php?id=' . (int)$e_user['id'], false);
        }
    } else {
        $session->message("d", $errors);
        goToPage('editUser.php?id=' . (int)$e_user['id'], false);
    }
}

?>
<?php include_once('webpage_full_layout/header.php'); ?>
<div class="row">
    <div class="col-md-12"> <?php echo displayMessage($msg); ?> </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    Update <?php echo cleanseHTML(ucwords($e_user['name'])); ?> Account
                </strong>
            </div>
            <div class="panel-body">
                <form method="post" action="editUser.php?id=<?php echo (int)$e_user['id']; ?>" class="clearfix">
                    <div class="form-group">
                        <label for="name" class="control-label">Name</label>
                        <input type="name" class="form-control" name="name"
                               value="<?php echo cleanseHTML(ucwords($e_user['name'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" class="form-control" name="username"
                               value="<?php echo cleanseHTML(ucwords($e_user['username'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="level">User Role</label>
                        <select class="form-control" name="level">
                            <?php foreach ($groups as $group): ?>
                                <option <?php if ($group['group_level'] === $e_user['user_level']) echo 'selected="selected"'; ?>
                                        value="<?php echo $group['group_level']; ?>"><?php echo ucwords($group['group_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status">
                            <option <?php if ($e_user['status'] === '1') echo 'selected="selected"'; ?>value="1">
                                Active
                            </option>
                            <option <?php if ($e_user['status'] === '0') echo 'selected="selected"'; ?> value="0">
                                Deactive
                            </option>
                        </select>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="update" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Change password form -->
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    Change <?php echo cleanseHTML(ucwords($e_user['name'])); ?> password
                </strong>
            </div>
            <div class="panel-body">
                <form action="editUser.php?id=<?php echo (int)$e_user['id']; ?>" method="post" class="clearfix">
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" name="password"
                               placeholder="Type user new password">
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="update-pass" class="btn btn-danger pull-right">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php include_once('webpage_full_layout/footer.php'); ?>
