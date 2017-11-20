<?php
$page_title = 'Product';
require_once('use/load.php');

// Must be admin to view page
checkUserAccessLevel(2);
$all_categories = getEverythingInDB('categories');

?>

//need to allow addin
<?php
if (isset($_POST['add_product'])) {
    $req_fields = array('product-title', 'product_category', 'product-quantity', 'buying-price', 'sale_price');
    isBlank($req_fields);
    if (empty($errors)) {
        $p_name = cleanseHTML($db->cleanse_SQL($_POST['product-title']));
        $p_cat = cleanseHTML($db->cleanse_SQL($_POST['product_category']));
        $p_qty = cleanseHTML($db->cleanse_SQL($_POST['product-quantity']));
        $p_buy = cleanseHTML($db->cleanse_SQL($_POST['buying-price']));
        $p_sale = cleanseHTML($db->cleanse_SQL($_POST['sale_price']));
        $p_created_by_user = get_current_user();
        $date = makeDate();

        $query = "INSERT INTO products (";
        $query .= " name,quantity,buy_price,sale_price,category_id, user_created_id, date";
        $query .= ") VALUES (";
        $query .= " '{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$p_created_by_user}' , '{$date}'";
        $query .= ")";
        $query .= " ON DUPLICATE KEY UPDATE name='{$p_name}'";
        if ($db->query($query)) {
            $session->message('s', "Product " . $p_name . " was added! ");
            goToPage('addProduct.php', false);
        } else {
            $session->message('d', 'Failed to add ' . $p_name . '!');
            goToPage('product.php', false);
        }

    } else {
        $session->message("d", $errors);
        goToPage('addProduct.php', false);
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
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Add New Product</span>
                </strong>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form method="post" action="addProduct.php" class="clearfix">
                        <div class="form-group">
                            <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                                <input type="text" class="form-control" name="product-title"
                                       placeholder="Product Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" name="product_category">
                                        <option value="">Select Product Category</option>
                                        <?php foreach ($all_categories as $categories): ?>
                                            <option value="<?php echo (int)$categories['id'] ?>">
                                                <?php echo $categories['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                                        <input type="number" class="form-control" name="product-quantity"
                                               placeholder="Product Quantity">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-usd"></i>
                     </span>
                                        <input type="number" class="form-control" name="buying-price"
                                               placeholder="Buying Price">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                                        <input type="number" class="form-control" name="sale_price"
                                               placeholder="Selling Price">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-danger">Add product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('webpage_full_layout/footer.php'); ?>
