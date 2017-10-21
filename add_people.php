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
          <a class="active" href="add_people.php">Register</a>    
          <a href="ifUser.php">login</a></div>                        
         <div style="padding-left:16px"><br>
<?php
  require_once 'functions.php';
  $error = $empID = $password = '';
  if(isset($_SESSION['empID'])) destroySession();

  if (isset($_POST['firstName'])   &&
      isset($_POST['lastName'])    &&
      isset($_POST['email'])       &&
      isset($_POST['empID'])       &&
      isset($_POST['password']))
  { /*stores the user inputs into variables*/
    $firstName   = sanitizeString($_POST['firstName']);
    $lastName    = sanitizeString($_POST['lastName']);
    $email       = sanitizeString($_POST['email']);
    $empID       = sanitizeString($_POST['empID']);
    $password    = sanitizeString($_POST['password']);
    
      if($firstName == '' || $lastName == '' || $email == '' || $empID == ''   || $password == '')
      {
        $error1 = "Not all fields were entered:<br></br>";
      }
      else
      {
     
          /*puts the users input into the table in our database*/
          $sql = "INSERT INTO people (firstName, lastName, email, empID, password)VALUES ('$firstName', '$lastName', '$email', '$empID', '$password')";
           
            if ($conn->query($sql) === TRUE) 
            {
            $P1 = "Registered '$firstName' '$lastName' successfully:";
            $P2 = " Your Employee ID: is '$empID'";
                echo"<p style='width:300px; margin: auto; border: 2px solid #a39b4d; color: #333342;'> '$P1'<br> '$P2' </p>" ;
            } 
            else
            {
            $P1 = "Regestration was unsuccessful";
            $P2 = "The Employee ID: '$empID' is already taken";
             echo"<p style='width:300px; margin: auto; border: 2px solid #a39b4d; color: #333342;'> '$P1'<br> '$P2' </p>" ;
            }
      }
       
  }

echo "<br><form action='add_people.php' method='post'>" .
     "<div class='container'>"                                                            .
     "<label><br>First name:</br></label>"                                                .
     "<input type='text' placeholder='Enter first name' name='firstName' required>"       .
        "<label><br>Last name:</br></label>"                                              .
     "<input type='text' placeholder='Enter last name' name='lastName' required>"         .
        "<label><br>Email:</br></label>"                                                  .
     "<input type='text' placeholder='Enter email' name='email' required>"                .
         "<label>Employee ID: </label>"  .                            
     "<input type='text' placeholder='Enter Employee ID' name='empID' required>"          .
     "<label><br>Password:</br></label>"                                                  .
     "<input type='password' placeholder='Enter Password' name='password' required><span id ='info'></span>"      .
     "<button type='submit'>Register</button><br>"                                            .
     "<p> Already registerd?  <a href='ifUSer.php'>Login</a></p>";

$conn->close();
