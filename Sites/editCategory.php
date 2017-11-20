<?php
  $page_title = 'Edit Category';
  require_once('use/load.php');
  // Requires Admin Level Access
  checkUserAccessLevel(1);
?>
<?php
  //Display all categories.
  $category = find_by_id('categories',(int)$_GET['id']);
  if(!$category){
    $session->message("d","Missing parameter or category id");
    goToPage('category.php');
  }
?>

<?php

   //$checkCategoryExists = $db->query("select name FROM categories where name={'$category_name'}");
if(isset($_POST['edit_cat'])){
  $req_field = array('category_name');
  isBlank($req_field);
  $category_name = cleanseHTML($db->cleanse_SQL($_POST['category_name']));
  if(empty($errors)){
        $sql = "UPDATE categories SET name='{$category_name}'";
       $sql .= " WHERE id='{$category['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->message("s", "Successfully updated ".$category_name);
       goToPage('category.php',false);
     } else {
       $session->message("d", "Failed to update ".$category_name);
       goToPage('category.php',false);
     }
  } else {
    $session->message("d", $errors);
    goToPage('category.php',false);
  }
}
?>
<?php include_once('webpage_full_layout/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo displayMessage($msg); ?>
   </div>
   <div class="col-md-5">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editing <?php echo cleanseHTML(ucfirst($category['name']));?></span>
        </strong>
       </div>
       <div class="panel-body">
         <form method="post" action="editCategory.php?id=<?php echo (int)$category['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="category_name" value="<?php echo cleanseHTML(ucfirst($category['name']));?>">
           </div>
           <button type="submit" name="edit_cat" class="btn btn-primary">Update Category</button>
       </form>
       </div>
     </div>
   </div>
</div>



<?php include_once('webpage_full_layout/footer.php'); ?>
