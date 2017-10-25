<!DOCTYPE html>
         <html>
         <head><title>login</title> 
         <link rel="stylesheet" href="peopl.css"/>                                                                             
         <meta charset="utf-8">                                                                                               
         <meta http-equiv="X-UA-Compatible" content="IE=edge">                                                                
         <title>Project Aquarius</title>
         <div class="nav"> 
          <a href="H.php">Home</a>                                
          <a href="#news">News</a>                                
          <a href="#contact">Contact</a>                          
          <a href="add_people.php">Register</a>    
          <a class="active"href="ifUser.php">login</a></div>                        
         <div style="padding-left:16px"><br>
<?php
  require_once 'functions.php';
  $loggedin = FALSE;
  $error = $empID = $password = '';
  /*if(isset($_SESSION['empID']) &&
     isset($_SESSION["password"])) destroySession();*/

  if (isset($_POST["empID"])       &&
      isset($_POST["password"]))
  { /*stores the user inputs into variables*/
    $empID       = sanitizeString($_POST["empID"]);
    $password    = sanitizeString($_POST["password"]);
    
      if($empID == ''   || $password == '')
      {
        $error1 = "Not all fields were entered:<br></br>";
      }
      else
      {
     
          /*search database to see if login is there*/
          $sql1="SELECT * FROM people WHERE empID LIKE '%$empID%'";
          $sql2="SELECT * FROM people WHERE password LIKE '%$password%'";
          $result1=$conn->query($sql1);
          $result2=$conn->query($sql2);
              
          if($row=$result1->fetch_assoc())
            {
              $result1 = TRUE;
            }      
            else
            {
              $result1 = FALSE;
            }

          if($row=$result2->fetch_assoc())
            {
              $result2 = TRUE;
            }      
          else
            {
              $result2 = FALSE;
            }
            
            
            if ($result1 === TRUE && $result2 === TRUE) 
            {

                $_SESSION['empID'] = $empID;
                $_SESSION['password'] = $password;
                $loggedin  = TRUE;
                
                
            } 
            else
            {
                $P1 = "Login was unsuccessful";
                $P2 = "Employee Id/Password do not match:";
                echo"<p style='width:300px; margin: auto; border: 2px solid #a39b4d; color: #333342;'> '$P1'<br> '$P2' </p>" ;
                $loggedin = FALSE;
            }
      }

}
   if($loggedin === FALSE)
   {
    echo "<br><form action='ifUser.php' method='post'>" .
         "<div class='container'>"                                                            .
         "<label>Employee ID: </label>"                                                   .                            
         "<input type='text' placeholder='Enter Employee ID' name='empID' required>"          .
         "<label><br>Password:</br></label>"                                                  .
         "<input type='password' placeholder='Enter Password' name='password' required><span id ='info'></span>"      .
         "<button onClick='H.php' type='submit'>Login</button>"                   .
         "<p> Not yet registerd?  <a href='add_people.php'>Register</a></p>";
 }
 else
 {
   echo "<p>You are logged in:</p>" .
         "<p>continue to IMS application:</p><a href= 'IMS.php'>IMS app</a>";
 }
 
$conn->close();
?>
