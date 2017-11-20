<?php
$page_title = 'Category Manager';
require_once('use/load.php');
//Must be admin
checkUserAccessLevel(1);

$all_categories = getEverythingInDB('categories')
?>
<?php
if (isset($_POST['add_cat'])) {
    $req_field = array('category_name');
    isBlank($req_field);
    $category_name = cleanseHTML($db->cleanse_SQL($_POST['category_name']));
    if (empty($errors)) {
        $sql = "INSERT INTO categories (name)";
        $sql .= " VALUES ('{$category_name}')";
        if ($db->query($sql)) {
            $session->message("s", "Successfully added " . $category_name);
            goToPage('category.php', false);
        } else {
            $session->message("d", "Failed to insert " . $category_name);
            goToPage('category.php', false);
        }
    } else {
        $session->message("d", $errors);
        goToPage('category.php', false);
    }
}
?>
<?php include_once('webpage_full_layout/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <?php echo displayMessage($msg); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Add New Category</span>
                </strong>
            </div>
            <div class="panel-body">
                <form method="post" action="category.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="category_name" placeholder="Category Name">
                    </div>
                    <button type="submit" name="add_cat" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>All Categories for Products</span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Categories</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_categories as $category): ?>
                        <tr>
                            <td class="text-center"><?php echo countID(); ?></td>
                            <td><?php echo cleanseHTML(ucfirst($category['name'])); ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="editCategory.php?id=<?php echo (int)$category['id']; ?>"
                                       class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="deleteCategory.php?id=<?php echo (int)$category['id']; ?>"
                                       class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                                        <span class="glyphicon glyphicon-trash"></span>
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
</div>
<?php include_once('webpage_full_layout/footer.php'); ?>
