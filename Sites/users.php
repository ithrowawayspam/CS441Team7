<?php
$page_title = 'User Management';
require_once('use/load.php');
?>
<?php
//Must be admin to view page
checkUserAccessLevel(1);
//gets all users
$all_users = getAllUsers();
?>
<?php include_once('webpage_full_layout/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo displayMessage($msg); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Users</span>
                </strong>
                <a href="addUser.php" class="btn btn-info pull-right">Add New User</a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th class="text-center" style="width: 15%;">User Role</th>
                        <th class="text-center" style="width: 10%;">Status</th>
                        <th style="width: 20%;">Last Login Time</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_users as $a_user): ?>
                        <tr>
                            <td class="text-center"><?php echo countID(); ?></td>
                            <td><?php echo cleanseHTML(ucwords($a_user['name'])) ?></td>
                            <td><?php echo cleanseHTML(ucwords($a_user['username'])) ?></td>
                            <td class="text-center"><?php echo cleanseHTML(ucwords($a_user['group_name'])) ?></td>
                            <td class="text-center">
                                <?php if ($a_user['status'] === '1'): ?>
                                    <span class="label label-success"><?php echo "Active"; ?></span>
                                <?php else: ?>
                                    <span class="label label-danger"><?php echo "Deactivate"; ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo formatReadableDate($a_user['last_login']) ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="editUser.php?id=<?php echo (int)$a_user['id']; ?>"
                                       class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a href="deleteUser.php?id=<?php echo (int)$a_user['id']; ?>"
                                       class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('webpage_full_layout/footer.php'); ?>
