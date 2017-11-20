<?php
$page_title = 'Admin Control Panel';
require_once('use/load.php');
// Checkin What level user has permission to view this page
checkUserAccessLevel(1);
?>
<?php
$category = countUsingID('categories');
$product = countUsingID('products');
$sale = countUsingID('sales');
$count_user = countUsingID('users');
$products_sold = displayCurrentHottestProducts('10');
$recent_products = displayRecentlyAddedProducts('5');
$recent_sales = displayRecentSales('5')
?>
<?php include_once('webpage_full_layout/header.php'); ?>

<div class="row">
    <div class="col-md-6">
        <?php echo displayMessage($msg); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="jumbotron text-center">
                <h1>CS441 Admin Portal</h1>
                <p><strong>Store Inventory Management System</strong><strong> Version Kenny.6.1</strong>.
                    </br></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-box clearfix">
            <div class="panel-icon pull-left bg-green">
                <i class="glyphicon glyphicon-user"></i>
            </div>
            <div class="panel-value pull-right">
                <h2 class="margin-top"> <?php echo $count_user['total']; ?> </h2>
                <p class="text-muted">Users</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-box clearfix">
            <div class="panel-icon pull-left bg-red">
                <i class="glyphicon glyphicon-list"></i>
            </div>
            <div class="panel-value pull-right">
                <h2 class="margin-top"> <?php echo $category['total']; ?> </h2>
                <p class="text-muted">Categories</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-box clearfix">
            <div class="panel-icon pull-left bg-blue">
                <i class="glyphicon glyphicon-shopping-cart"></i>
            </div>
            <div class="panel-value pull-right">
                <h2 class="margin-top"> <?php echo $product['total']; ?> </h2>
                <p class="text-muted">Products</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-box clearfix">
            <div class="panel-icon pull-left bg-yellow">
                <i class="glyphicon glyphicon-usd"></i>
            </div>
            <div class="panel-value pull-right">
                <h2 class="margin-bottom"> <?php echo $sale['total']; ?></h2>
                <p class="text-muted">Sales</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Hot Products</span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Total Sold</th>
                        <th>Total Quantity</th>
                    <tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products_sold as $product_sold): ?>
                        <tr>
                            <td><?php echo cleanseHTML(toUpper($product_sold['name'])); ?></td>
                            <td><?php echo (int)$product_sold['totalSold']; ?></td>
                            <td><?php echo (int)$product_sold['totalQty']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Recently Added Products</span>
                </strong>
            </div>
            <div class="panel-body">

                <div class="list-group">
                    <?php foreach ($recent_products as $recent_product): ?>
                        <a class="list-group-item clearfix"
                           href="editProduct.php?id=<?php echo (int)$recent_product['id']; ?>">
                            <h4 class="list-group-item-heading">
                                <?php echo cleanseHTML(toUpper($recent_product['name'])); ?>
                                <span class="label label-warning pull-right">
                 $<?php echo (int)$recent_product['sale_price']; ?>
                  </span>
                            </h4>
                            <span class="list-group-item-text pull-right">
                <?php echo cleanseHTML(toUpper($recent_product['categories'])); ?>
              </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Recent Sales</span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Product Name</th>
                        <th>Date</th>
                        <th>Total Sale</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($recent_sales as $recent_sale): ?>
                        <tr>
                            <td class="text-center"><?php echo countID(); ?></td>
                            <td>
                                <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
                                    <?php echo cleanseHTML(toUpper($recent_sale['name'])); ?>
                                </a>
                            </td>
                            <td><?php echo cleanseHTML(ucfirst($recent_sale['date'])); ?></td>
                            <td>$<?php echo cleanseHTML(toUpper($recent_sale['price'])); ?></td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<div class="row">

</div>

<?php include_once('webpage_full_layout/footer.php'); ?>
