<?php
$page_title = 'User Creation';
require_once('use/load.php');
// Must be admin to view this page
checkUserAccessLevel(1);
$groups = getEverythingInDB('user_groups');
?>
<?php
if (isset($_POST['add_user'])) {

    $req_fields = array('full-name', 'username', 'password', 'level');
    isBlank($req_fields);

    if (empty($errors)) {
        $name = cleanseHTML($db->cleanse_SQL($_POST['full-name']));
        $username = cleanseHTML($db->cleanse_SQL($_POST['username']));
        $password = cleanseHTML($db->cleanse_SQL($_POST['password']));
        $user_level = (int)$db->cleanse_SQL($_POST['level']);
        $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .= "name,username,password,user_level,status";
        $query .= ") VALUES (";
        $query .= " '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
        $query .= ")";
        if ($db->query($query)) {
            //success
            $session->message('s', "User ".$username." has been created! ");
            goToPage('addUser.php', false);
        } else {
            //failed
            $session->message('d', ' Failed to create'.$username.'!');
            goToPage('addUser.php', false);
        }
    } else {
        $session->message("d", $errors);
        goToPage('addUser.php', false);
    }
}
?>
<?php include_once('webpage_full_layout/header.php'); ?>
<?php echo displayMessage($msg); ?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                <span>Add New User</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="addUser.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="full-name" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="level">User Role</label>
                        <select class="form-control" name="level">
                            <?php foreach ($groups as $group): ?>
                                <option value="<?php echo $group['group_level']; ?>"><?php echo ucwords($group['group_name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

<?php include_once('webpage_full_layout/footer.php'); ?>
