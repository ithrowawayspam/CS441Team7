<?php
$page_title = 'Product Manager';
require_once('use/load.php');
//Require Admin or manager access
checkUserAccessLevel(2);
$products = joinProductTable();
?>
<?php include_once('webpage_full_layout/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo displayMessage($msg); ?>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="pull-right">
                    <a href="addProduct.php" class="btn btn-primary">Add New</a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th class="text-center" style="..."> Product</th>
                        <th class="text-center" style="width: 10%;"> Category</th>
                        <th class="text-center" style="width: 10%;"> Current Stock</th>
                        <th class="text-center" style="width: 10%;"> Buying Price</th>
                        <th class="text-center" style="width: 10%;"> Sale Price</th>
                        <th class="text-center" style="width: 10%;"> Product Added</th>
                        <th class="text-center" style="..."> Created by</th>
                        <th class="text-center" style="width: 100px;"> Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td class="text-center"><?php echo countID(); ?></td>
                            <td class="text-center"> <?php echo cleanseHTML($product['name']); ?></td>
                            <td class="text-center"> <?php echo cleanseHTML($product['categories']); ?></td>
                            <td class="text-center"> <?php echo cleanseHTML($product['quantity']); ?></td>
                            <td class="text-center"> <?php echo cleanseHTML($product['buy_price']); ?></td>
                            <td class="text-center"> <?php echo cleanseHTML($product['sale_price']); ?></td>
                            <td class="text-center"> <?php echo formatReadableDate($product['date']); ?></td>
                            <td class="text-center"> <?php echo cleanseHTML($product['user'])?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="editProduct.php?id=<?php echo (int)$product['id']; ?>"
                                       class="btn btn-info btn-xs" title="Edit" data-toggle="tooltip">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="deleteProduct.php?id=<?php echo (int)$product['id']; ?>"
                                       class="btn btn-danger btn-xs" title="Delete" data-toggle="tooltip">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    </tabel>
            </div>
        </div>
    </div>
</div>
<?php include_once('webpage_full_layout/footer.php'); ?>
