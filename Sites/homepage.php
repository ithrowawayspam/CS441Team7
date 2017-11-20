<?php
  $page_title = 'Main Page';
  require_once('use/load.php');
  if (!$session->isUserLoggedIn(true)) { goToPage('index.php', false);}
?>
<?php include_once('webpage_full_layout/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo displayMessage($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
         <h1>Welcome, <?php echo get_current_user();?></h1>
         <p>This is the CS441 Inventory Management System</p>
      </div>
    </div>
 </div>
</div>
<?php include_once('webpage_full_layout/footer.php'); ?>
