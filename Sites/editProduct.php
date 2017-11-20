<?php
$page_title = 'Edit product';
require_once('use/load.php');
// Admin or manager
checkUserAccessLevel(2);
?>
<?php
$product = find_by_id('products', (int)$_GET['id']);
$all_categories = getEverythingInDB('categories');
if (!$product) {
    $session->message("d", "Missing product id.");
    goToPage('product.php');
}
?>
<?php
if (isset($_POST['product'])) {
    $req_fields = array('product-title', 'product_category', 'product-quantity', 'buying-price', 'sale_price');
    isBlank($req_fields);

    if (empty($errors)) {
        $product_name = cleanseHTML($db->cleanse_SQL($_POST['product-title']));
        $product_category = (int)$_POST['product_category'];
        $p_qty = cleanseHTML($db->cleanse_SQL($_POST['product-quantity']));
        $p_buy = cleanseHTML($db->cleanse_SQL($_POST['buying-price']));
        $p_sale = cleanseHTML($db->cleanse_SQL($_POST['sale_price']));

        $query = "UPDATE products SET";
        $query .= " name ='{$product_name}', quantity ='{$p_qty}',";
        $query .= " buy_price ='{$p_buy}', sale_price ='{$p_sale}', category_id ='{$product_category}'";
        $query .= " WHERE id ='{$product['id']}'";
        $result = $db->query($query);
        if ($result && $db->affected_rows() === 1) {
            $session->message('s', $product_name," updated ");
            goToPage('product.php', false);
        } else {
            $session->message('d', ' Failed to update'.$product_name);
            goToPage('editProduct.php?id=' . $product['id'], false);
        }

    } else {
        $session->message("d", $errors);
        goToPage('editProduct.php?id=' . $product['id'], false);
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
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                <span>Add New Product</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-7">
                <form method="post" action="editProduct.php?id=<?php echo (int)$product['id'] ?>">
                    <div class="form-group">
                        <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                            <input type="text" class="form-control" name="product-title"
                                   value="<?php echo cleanseHTML($product['name']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <select class="form-control" name="product_category">
                                    <option value=""> Select a Category</option>
                                    <?php foreach ($all_categories as $cat): ?>
                                        <option value="<?php echo (int)$cat['id']; ?>" <?php if ($product['category_id'] === $cat['id']): echo "selected"; endif; ?> >
                                            <?php echo cleanseHTML($cat['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <div class="input-group">
                      <span class="input-group-addon">
                       <i class="glyphicon glyphicon-shopping-cart"></i>
                      </span>
                                        <input type="number" class="form-control" name="product-quantity"
                                               value="<?php echo cleanseHTML($product['quantity']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Buying price</label>
                                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                                        <input type="number" class="form-control" name="buying-price"
                                               value="<?php echo cleanseHTML($product['buy_price']); ?>">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="qty">Selling price</label>
                                    <div class="input-group">
                       <span class="input-group-addon">
                         <i class="glyphicon glyphicon-usd"></i>
                       </span>
                                        <input type="number" class="form-control" name="sale_price"
                                               value="<?php echo cleanseHTML($product['sale_price']); ?>">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="product" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('webpage_full_layout/footer.php'); ?>
