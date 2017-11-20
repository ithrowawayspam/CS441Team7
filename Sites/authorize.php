<?php include_once('use/load.php'); ?>
<?php
$req_fields = array('username', 'password');
isBlank($req_fields);
$username = cleanseHTML($_POST['username']);
$password = cleanseHTML($_POST['password']);

if (empty($errors)) {

    $user = authenticate($username, $password);

    if ($user):
        //create session with id
        $session->login($user['id']);
        //Update Sign in time
        updateLastLoginTime($user['id']);
        // redirect user to group home page by user level
        if ($user['user_level'] === '1'):
            $session->message("s", "Hello " . $user['username'] . ", Welcome to CS441 IMS System. You're in the Admin Control Panel");
            goToPage('admin.php', false);
        elseif ($user['user_level'] === '2'):
            $session->message("s", "Hello " . $user['username'] . ", Welcome to CS441 IMS System. You're in the Sales System");
            goToPage('index.php', false);
        else:
            $session->message("s", "Hello " . $user['username'] . ", Welcome to CS441 IMS System.");
            goToPage('homepage.php', false);
        endif;

    else:
        $session->message("d", "Username/Password incorrect.");
        goToPage('index.php', false);
    endif;

} else {

    $session->message("d", $errors);
    goToPage('index.php', false);
}

?>
