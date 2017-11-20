<?php
  ob_start();

  require_once('use/load.php');
  if($session->isUserLoggedIn(true)){
      goToPage('homepage.php', false);
  }
?>

<?php include_once('webpage_full_layout/header.php'); ?>

<div class="login-page">
    <div class="text-center">
        <h1>Welcome to CS441 IMS</h1>
        <p>Sign in or contact your Administrator to create an account.</p>
    </div>
    <?php echo displayMessage($msg); ?>
    <form method="post" action="authorize.php" class="clearfix">
        <div class="form-group">
            <label for="username" class="control-label">Username</label>
            <input type="name" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info  pull-right">Login</button>
        </div>
    </form>
</div>
<?php include_once('webpage_full_layout/footer.php'); ?>
