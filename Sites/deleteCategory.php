<?php

  require_once('use/load.php');
  //require admin
  checkUserAccessLevel(1);
?>
<?php
  $category = find_by_id('categories',(int)$_GET['id']);
  if(!$category){
    $session->message("d","Missing Category ID");
    goToPage('category.php');
  }
?>
<?php
  $category_name = get_name('categories', (int)$_GET['id']);
  $delete_id = delete_by_id('categories',(int)$category['id']);
  if($delete_id){
      $session->message("s","Category ".$category_name." has been deleted.");
      goToPage('category.php');
  } else {
      $session->message("d","Failed to remove ".$category_name.".");
      goToPage('category.php');
  }
?>
