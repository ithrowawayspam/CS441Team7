<?php
  $page_title = 'My Account';
  require_once('use/load.php');
  // Anybody above regular user
   checkUserAccessLevel(3);
?>
  <?php
  $user_id = (int)$_GET['id'];
  if(empty($user_id)):
    goToPage('homepage.php',false);
  else:
    $user_p = find_by_id('users',$user_id);
  endif;
?>
<?php include_once('webpage_full_layout/header.php'); ?>
<div class="row">
   <div class="col-md-4">
       <div class="panel profile">
           <h3><?php echo toUpper($user_p['name']); ?></h3>
        <?php if( $user_p['id'] === $user['id']):?>
         <ul class="nav nav-pills nav-stacked">
          <li><a href="editAccount.php"> <i class="glyphicon glyphicon-edit"></i> Edit profile</a></li>
         </ul>
       <?php endif;?>
       </div>
   </div>
</div>
<?php include_once('webpage_full_layout/footer.php'); ?>
