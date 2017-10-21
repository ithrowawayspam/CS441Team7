<!DOCTYPE html>
         <html>
         <head><title>login</title> 
         <link rel="stylesheet" href="peopl.css"/>                                                                             
         <meta charset="utf-8">                                                                                               
         <meta http-equiv="X-UA-Compatible" content="IE=edge">                                                                
         <title>Project Aquarius</title>
         <div class="nav"> 
          <a class='active' href="H.php">Home</a>                                
          <a href="#news">News</a>                                
          <a href="#contact">Contact</a>                          
          <a href="add_people.php">Register</a>    
          <a href="ifUser.php">login</a></div>                        
         <div style="padding-left:16px"><br>

<?php
	session_start();

	echo "<!DOCTYPE html>\n<html lang='en' ng.app='myApp' clas='no-js'><head>" .
         "<script src='javascript.js'></script>";

	require_once 'functions.php';

	$userstr = ' (Guest)';

	if(isset($_SESSION['user']))
	{
		$user 	   = $_SESSION['empID'];
		$loggedin  = TRUE;
		$userstr   = " ($user)";
	}
    else 
    {
    	 $loggedin = FALSE;
    }

                      
                       

    	 
    if($loggedin)
    {
        echo "<p>You are logged in $user</p>" .
    		 "<p>continue to IMS application:</p><a href= 'IMS.php'>IMS app</a>";
	}
    else
    {
    	 echo "<h2>INVENTORY MANAGEMENT SYSTEM</h2>".
              "<p>what we are about goes here.............</p>";
     

    }

?>