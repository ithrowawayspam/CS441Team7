<?php
  require_once('use/load.php');
  //Require User or Admin
  checkUserAccessLevel(2);
?>
<?php
  $product = find_by_id('products',(int)$_GET['id']);
  if(!$product){
    $session->message("d","Missing Product id.");
    goToPage('product.php');
  }
?>
<?php
  $delete_id = delete_by_id('products',(int)$product['id']);
  if($delete_id){
      $session->message("s",$product['name']."has been removed from store.");
      goToPage('product.php');
  } else {
      $session->message("d","Failed to remove ".$product['name']." from the store.");
      goToPage('product.php');
  }
?>
