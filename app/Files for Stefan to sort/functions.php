<?php
  $hn =  "localhost"; //Change later
  $db = "users";     //Name of databse
  $un = "ALex";       //User name 
  $pw = "doki123";    //password
 // $appname = "Project A";

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

function queryMysql($query)
{
  	global $conn;
  	$result = $conn->query($query);
  	if(!$result) die($conn->error);
  	return $result;
}

function destroySession()
{
  	$_SESSION=array();

  	if(session_id() != '' || isset($_COOKIE[session_name()]))
  	{
  		setcookie(session_name(), '', time()-2592000, '/');
  	}
  	session_destroy();
}

function sanitizeString($var)
{
	global $conn;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return $conn->real_escape_string($var);
}

function ConfrimR($var1)
{
        global $conn;
        $sql1="SELECT * FROM people WHERE empID LIKE '%$var1%'";

        $result1=$conn->query($sql1);
      
        if($row=$result1->fetch_assoc())
        {
            return TRUE;
        }      
        else
        {
            return FALSE;
        }
        
       
}

?>
