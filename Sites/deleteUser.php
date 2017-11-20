<?php
  require_once('use/load.php');
  //Require admin
   checkUserAccessLevel(1);
?>
<?php
  $delete_id = delete_by_id('users',(int)$_GET['id']);
  if($delete_id){
      $session->message("s",$delete_id['name']." has been deleted.");
      goToPage('users.php');
  } else {
      $session->message("d","Please try again, error occured when removing user.");
      goToPage('users.php');
  }
?>
