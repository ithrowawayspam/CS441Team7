<?php
require_once('use/load.php');

/*
function findByCategoryName($table, $categoryName){
    global $db;
    $category_name = $db->cleanse_SQL($categoryName);
    if(tableExists($table)){
        $sql = "SELECT name FROM categories";
        $sql .= " WHERE name=".$categoryName;
        $sql = $db->query($sql);
    }
}*/
/* Finds everything in database using name*/
function getEverythingInDB($table)
{
    global $db;
    if (tableExists($table)) {
        return find_by_sql("SELECT * FROM " . $db->cleanse_SQL($table));
    }
}


/* Performs sql*/
function find_by_sql($sql)
{
    global $db;
    $result = $db->query($sql);
    $result_set = $db->while_loop($result);
    return $result_set;
}


/*  Function to help find data by id*/
function find_by_id($table, $id)
{
    global $db;
    $id = (int)$id;
    if (tableExists($table)) {
        $sql = $db->query("SELECT * FROM {$db->cleanse_SQL($table)} WHERE id='{$db->cleanse_SQL($id)}' LIMIT 1");
        if ($result = $db->fetch_assoc($sql))
            return $result;
        else
            return null;
    }
}


/*  Function to get name from table by id*/
function get_name($table, $id)
{
    global $db;
    $id = (int)$id;
    if (tableExists($table)) {
        $sql = $db->query("SELECT name FROM {$db->cleanse_SQL($table)} where id='{$db->cleanse_SQL($id)}'");
        if ($result = $db->fetch_assoc($sql))
            return $result['name'];
        else
            return null;
    }
}



/* Function to delete data from table by id*/
function delete_by_id($table, $id)
{
    global $db;
    if (tableExists($table)) {
        $sql = "DELETE FROM " . $db->cleanse_SQL($table);
        $sql .= " WHERE id=" . $db->cleanse_SQL($id);
        $sql .= " LIMIT 1";
        $db->query($sql);
        return ($db->affected_rows() === 1) ? true : false;
    }
}


/* Function to count id by table name*/

function countUsingID($table)
{
    global $db;
    if (tableExists($table)) {
        $sql = "SELECT COUNT(id) AS total FROM " . $db->cleanse_SQL($table);
        $result = $db->query($sql);
        return ($db->fetch_assoc($result));
    }
}


/* Checks if the table exists*/
function tableExists($table)
{
    global $db;
    $table_exit = $db->query('SHOW TABLES FROM ' . DB_NAME . ' LIKE "' . $db->cleanse_SQL($table) . '"');
    if ($table_exit) {
        if ($db->num_rows($table_exit) > 0)
            return true;
        else
            return false;
    }
}


/*Authenticate login in index.php*/
function authenticate($username = '', $password = '')
{
    global $db;
    $username = $db->cleanse_SQL($username);
    $password = $db->cleanse_SQL($password);
    $sql = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if ($db->num_rows($result)) {
        $user = $db->fetch_assoc($result);
        $password_request = sha1($password);
        if ($password_request === $user['password']) {
            return $user;
        }
    }
    return false;
}


/* Find current user logged in by session id*/
function getCurrentUser()
{
    static $current_user;
    global $db;
    if (!$current_user) {
        if (isset($_SESSION['user_id'])):
            $user_id = intval($_SESSION['user_id']);
            $current_user = find_by_id('users', $user_id);
        endif;
    }
    return $current_user;
}


/* Find all user by joining the users table and user groups table*/
function getAllUsers()
{
    $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
    $sql .= "g.group_name ";
    $sql .= "FROM users u ";
    $sql .= "LEFT JOIN user_groups g ";
    $sql .= "ON g.group_level=u.user_level ORDER BY u.name ASC";
    $result = find_by_sql($sql);
    return $result;
}


/* Updates last login time */
function updateLastLoginTime($user_id)
{
    global $db;
    $date = makeDate();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
}

/* Query to find group names*/
function getGroupName($val)
{
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->cleanse_SQL($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return ($db->num_rows($result) === 0 ? true : false);
}


/* Find the group permission level*/
function getGroupLevel($level)
{
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->cleanse_SQL($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return ($db->num_rows($result) === 0 ? true : false);
}


/* Checks user access page*/
function checkUserAccessLevel($require_level)
{
    global $session;
    $current_user = getCurrentUser();
    $login_level = getGroupLevel($current_user['user_level']);
    //if user not login
    if (!$session->isUserLoggedIn(true)):
        $session->message('d', 'Please login.');
        goToPage('index.php', false);
    elseif ($login_level['group_status'] === '0'): //User has been banned
        $session->message('d', 'This user has been banned!');
        goToPage('homepage.php', false);
    elseif ($current_user['user_level'] <= (int)$require_level): //checks logs
        return true;
    else:
        $session->message("d", "You don't have permission to view the page.");
        goToPage('homepage.php', false);
    endif;

}


/* Function for finding all product name using JOIN with categories*/
function joinProductTable()
{
    global $db;
    $sql = " SELECT p.id,p.name,p.quantity,p.buy_price,p.sale_price,p.date,c.name";
    $sql .= " AS categories,";
    $sql .= " u.name AS user";
    $sql .= " FROM products p";
    $sql .= " LEFT JOIN categories c ON c.id = p.category_id";
    $sql .= " LEFT JOIN users u on u.id = p.category_id";
    $sql .= " ORDER BY p.id ASC";
    return find_by_sql($sql);

}



/* Function for Update product quantity*/
function updateProductQuanity($qty, $p_id)
{
    global $db;
    $qty = (int)$qty;
    $id = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    return ($db->affected_rows() === 1 ? true : false);

}


/* Display Recent product in admin page*/
function displayRecentlyAddedProducts($limit){
    global $db;
    $sql = " SELECT c.name AS categories,";
    $sql .=" p.id,p.name,p.sale_price FROM products p";
    $sql .=" LEFT JOIN categories c ON c.id = p.category_id";
    $sql .=" ORDER BY p.id DESC LIMIT " .$db->cleanse_SQL($limit);
    return find_by_sql($sql);
}


/* Function for Find Highest selling Product*/
function displayCurrentHottestProducts($limit)
{
    global $db;
    $sql = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
    $sql .= " FROM sales s";
    $sql .= " LEFT JOIN products p ON p.id = s.product_id ";
    $sql .= " GROUP BY s.product_id";
    $sql .= " ORDER BY SUM(s.qty) DESC LIMIT " . $db->cleanse_SQL((int)$limit);
    return $db->query($sql);
}


/* Display Recent sales*/
function displayRecentSales($limit)
{
    global $db;
    $sql = "SELECT s.id,s.qty,s.price,s.date,p.name";
    $sql .= " FROM sales s";
    $sql .= " LEFT JOIN products p ON s.product_id = p.id";
    $sql .= " ORDER BY s.date DESC LIMIT " . $db->cleanse_SQL((int)$limit);
    return find_by_sql($sql);
}


?>
