<?php
  require_once('use/load.php');
  //require admin
   checkUserAccessLevel(1);
?>
<?php
  $delete_id = delete_by_id('user_groups',(int)$_GET['id']);
  if($delete_id){
      $session->message("s",$delete_id." has been deleted.");
      goToPage('groups.php');
  } else {
      $session->message("d","Failed to delete".$delete_id);
      goToPage('groups.php');
  }
?>
