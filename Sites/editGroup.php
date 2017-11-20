<?php
$page_title = 'Edit Group';
require_once('use/load.php');
//Need admin level access
checkUserAccessLevel(1);
?>
<?php
$e_group = find_by_id('user_groups', (int)$_GET['id']);
if (!$e_group) {
    $session->message("d", "Missing Group id.");
    goToPage('groups.php');
}
?>
<?php
if (isset($_POST['update'])) {

    $req_fields = array('group-name', 'group-level');
    isBlank($req_fields);
    if (empty($errors)) {
        $name = cleanseHTML($db->cleanse_SQL($_POST['group-name']));
        $level = cleanseHTML($db->cleanse_SQL($_POST['group-level']));
        $status = cleanseHTML($db->cleanse_SQL($_POST['status']));

        $query = "UPDATE user_groups SET ";
        $query .= "group_name='{$name}',group_level='{$level}',group_status='{$status}'";
        $query .= "WHERE ID='{$db->cleanse_SQL($e_group['id'])}'";
        $result = $db->query($query);
        if ($result && $db->affected_rows() === 1) {
            //sucess
            $session->message('s', $name . " has been updated! ");
            goToPage('editGroup.php?id=' . (int)$e_group['id'], false);
        } else {
            //failed
            $session->message('d', ' Failed to updated ' . $name);
            goToPage('editGroup.php?id=' . (int)$e_group['id'], false);
        }
    } else {
        $session->message("d", $errors);
        goToPage('editGroup.php?id=' . (int)$e_group['id'], false);
    }
}
?>
<?php include_once('webpage_full_layout/header.php'); ?>
<div class="login-page">
    <div class="text-center">
        <h3>Edit Group</h3>
    </div>
    <?php echo displayMessage($msg); ?>
    <form method="post" action="editGroup.php?id=<?php echo (int)$e_group['id']; ?>" class="clearfix">
        <div class="form-group">
            <label for="name" class="control-label">Group Name</label>
            <input type="name" class="form-control" name="group-name"
                   value="<?php echo cleanseHTML(ucwords($e_group['group_name'])); ?>">
        </div>
        <div class="form-group">
            <label for="level" class="control-label">Group Level</label>
            <input type="number" class="form-control" name="group-level"
                   value="<?php echo (int)$e_group['group_level']; ?>">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status">
                <option <?php if ($e_group['group_status'] === '1') echo 'selected="selected"'; ?> value="1"> Active
                </option>
                <option <?php if ($e_group['group_status'] === '0') echo 'selected="selected"'; ?> value="0">Deactivate
                </option>
            </select>
        </div>
        <div class="form-group clearfix">
            <button type="submit" name="update" class="btn btn-info">Update</button>
        </div>
    </form>
</div>

<?php include_once('webpage_full_layout/footer.php'); ?>
