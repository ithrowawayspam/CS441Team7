<?php
$page_title = 'IMS User Groups';
require_once('use/load.php');
// Must be admin to view page
checkUserAccessLevel(1);
$all_groups = getEverythingInDB('user_groups');
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
                    <span>Groups</span>
                </strong>
                <a href="addGroup.php" class="btn btn-info pull-right btn-sm"> Add New Group</a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Group Name</th>
                        <th class="text-center" style="width: 20%;">Group Level</th>
                        <th class="text-center" style="width: 15%;">Status</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_groups as $group): ?>
                        <tr>
                            <td class="text-center"><?php echo countID(); ?></td>
                            <td><?php echo cleanseHTML(ucwords($group['group_name'])) ?></td>
                            <td class="text-center">
                                <?php echo cleanseHTML(ucwords($group['group_level'])) ?>
                            </td>
                            <td class="text-center">
                                <?php if ($group['group_status'] === '1'): ?>
                                    <span class="label label-success"><?php echo "Active"; ?></span>
                                <?php else: ?>
                                    <span class="label label-danger"><?php echo "Deactive"; ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="editGroup.php?id=<?php echo (int)$group['id']; ?>"
                                       class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                    <a href="deleteGroup.php?id=<?php echo (int)$group['id']; ?>"
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
