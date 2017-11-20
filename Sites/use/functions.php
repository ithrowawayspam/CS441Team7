<?php
date_default_timezone_set('America/Los_Angeles');
$errors = array();


/* Removes special characters in a string for use in an SQL statement*/

function real_escape($str)
{
    global $con;
    $escape = mysqli_real_escape_string($con, $str);
    return $escape;
}

/* Removes HTML formatting for database use */
function cleanseHTML($str)
{
    $str = nl2br($str);
    $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
    return $str;
}


/* changes first letter form lower to upper case*/
function toUpper($str)
{
    $val = str_replace('-', " ", $str);
    $val = ucfirst($val);
    return $val;
}


/* Checks if fields is blank*/
function isBlank($var)
{
    global $errors;
    foreach ($var as $field) {
        $val = cleanseHTML($_POST[$field]);
        if (isset($val) && $val == '') {
            $errors = $field . " can't be blank.";
            return $errors;
        }
    }
}


/* Displays the current session message.*/
function displayMessage($msg = '')
{
    $output = array();
    if (!empty($msg)) {
        foreach ($msg as $key => $value) {
            $output = "<div class=\"alert alert-{$key}\">";
            $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
            $output .= cleanseHTML(toUpper($value));
            $output .= "</div>";
        }
        return $output;
    } else {
        return "";
    }
}


/* Moves to appropriate webpage*/
function goToPage($url, $permanent = false)
{
    if (headers_sent() === false) {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}


/* Formats reading the date for tables*/
function formatReadableDate($str)
{
    if ($str)
        return date('F j, Y, g:i:s a', strtotime($str));
    else
        return null;
}


/* Function to make date*/
function makeDate()
{
    return strftime("%Y-%m-%d %H:%M:%S", time());
    //return date_default_timezone_set('UTC'); NO LONGER WORKS
}


/* Increments count, used for product display*/
function countID()
{
    static $count = 1;
    return $count++;
}

?>
