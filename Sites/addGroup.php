<?php
$page_title = 'Group Creation';
require_once('use/load.php');
checkUserAccessLevel(1); //checks page requirement
?>

<?php
if (isset($_POST['add'])) {

    $req_fields = array('group-name', 'group-level');
    isBlank($req_fields);

    if (getGroupName($_POST['group-name']) === false) {
        $session->message('d', '<b>Please Try Again.</b>already exists!');
        goToPage('addGroup.php', false);
    } elseif (getGroupLevel($_POST['group-level']) === false) {
        $session->message('d', '<b>Try again,</b> level already exists!');
        goToPage('addGroup.php', false);
    }
    if (empty($errors)) {
        $name = cleanseHTML($db->cleanse_SQL($_POST['group-name']));
        $level = cleanseHTML($db->cleanse_SQL($_POST['group-level']));
        $status = cleanseHTML($db->cleanse_SQL($_POST['status']));

        $query = "INSERT INTO user_groups (";
        $query .= "group_name,group_level,group_status";
        $query .= ") VALUES (";
        $query .= " '{$name}', '{$level}','{$status}'";
        $query .= ")";
        if ($db->query($query)) {
            //success
            $session->message('s', "Group ".$name."has been created! ");
            goToPage('addGroup.php', false);
        } else {
            //failed
            $session->message('d', ' Failed to create '.$name.', please try again!');
            goToPage('addGroup.php', false);
        }
    } else {
        $session->message("d", $errors);
        goToPage('addGroup.php', false);
    }
}
?>
<?php include_once('webpage_full_layout/header.php'); ?>

<div class="login-page">
    <div class="text-center">
        <h3>Add new user Group</h3>
    </div>
    <?php echo displayMessage($msg); ?>
    <form method="post" action="addGroup.php" class="clearfix">
        <div class="form-group">
            <label for="name" class="control-label">Group Name</label>
            <input type="name" class="form-control" name="group-name" placeholder="Name of Group">
        </div>
        <div class="form-group">
            <label for="level" class="control-label">Group Level</label>
            <input type="number" class="form-control" name="group-level" placeholder="1 for Admin, 2 for User">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option value="1">Active</option>
                <option value="0">Deactivate</option>
            </select>
        </div>
        <div class="form-group clearfix">
            <button type="submit" name="add" class="btn btn-info">Update</button>
        </div>
    </form>
</div>

<?php include_once('webpage_full_layout/footer.php'); ?>
