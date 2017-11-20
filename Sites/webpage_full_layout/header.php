<?php $user = getCurrentUser(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
            echo cleanseHTML($page_title);
        elseif (!empty($user))
            echo ucfirst($user['name']);
        else echo "CS441 IMS Login"; ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>
    <link rel="stylesheet" href="css/main.css"/>
</head>

<body>
<?php if ($session->isUserLoggedIn(true)): ?>
    <header id="header">
        <div class="logo pull-left"> Control Panel</div>
        <div class="header-content">
            <div class="header-date pull-left">
                <strong><?php echo date("F j, Y, g:i a"); ?></strong>
            </div>
            <div class="pull-right clearfix">
                <ul class="info-menu list-inline list-unstyled">
                    <li class="profile">
                        <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
                            <span><?php echo cleanseHTML(ucfirst($user['name'])); ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="myProfile.php?id=<?php echo (int)$user['id']; ?>">
                                    <i class="glyphicon glyphicon-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="editAccount.php" title="edit account">
                                    <i class="glyphicon glyphicon-cog"></i>
                                    Settings
                                </a>
                            </li>
                            <li class="last">
                                <a href="logout.php">
                                    <i class="glyphicon glyphicon-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="sidebar">
        <?php if ($user['user_level'] === '1'): ?>
            <ul>
                <li>
                    <a href="admin.php">
                        <i class="glyphicon glyphicon-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="submenu-toggle">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>User Management</span>
                    </a>
                    <ul class="nav submenu">
                        <li><a href="groups.php">Manage Groups</a></li>
                        <li><a href="users.php">Manage Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="category.php">
                        <i class="glyphicon glyphicon-indent-left"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="submenu-toggle">
                        <i class="glyphicon glyphicon-th-large"></i>
                        <span>Products</span>
                    </a>
                    <ul class="nav submenu">
                        <li><a href="product.php">Manage Products</a></li>
                        <li><a href="addProduct.php">Add Products</a></li>
                    </ul>
                </li>
            </ul>

        <?php elseif ($user['user_level'] === '2'): ?>
            <ul>
                <li>
                    <a href="home.php">
                        <i class="glyphicon glyphicon-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>

        <?php endif; ?>

    </div>
<?php endif; ?>

<div class="page">
    <div class="container-fluid">
