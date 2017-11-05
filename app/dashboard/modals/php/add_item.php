 <!DOCTYPE html>
         <html>
         <head><title>login</title> 
         <link rel="stylesheet" href="Freg.css"/>                                                                             
         <meta charset="utf-8">                                                                                               
         <meta http-equiv="X-UA-Compatible" content="IE=edge">                                                                
         <title>Project Aquarius</title>
 <?php
	require_once 'L.php';
	$conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['firstName'])   &&
  	  isset($_POST['lastName'])    &&
      isset($_POST['email'])       &&
      isset($_POST['empID'])       &&
      isset($_POST['password']))
  { /*stores the user inputs into variables*/
    $firstName  = $_POST['firstName'];
    $lastame    = $_POST['lastName'];
    $email      = $_POST['email'];
    $empID      = $_POST['empID'];
    $password   = $_POST['password'];
$sql = "SELECT * FROM people WHERE empId LIKE '%$empID%'";
    $result=$conn->query($sql);

    if($result->num_rows)
    {
      echo "<span class='Taken'>&nbsp;&#x2718; " .
           "This employee ID is taken</span>";
    }
    else
    {
      echo "<span class='Available'>&nbsp;&#x2714; " .
           "This employee ID is available</span>";
    
/*puts the users input into the table in our database*/
$sql = "INSERT INTO people (firstName, lastName, email, empID, password)
VALUES ('$firstName', '$lastName', '$email', '$empID', '$password')";


if ($conn->query($sql) === TRUE) {
    echo "Registered '$firstName' '$lastName' successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}
echo "<form action='add_people.php' method='post'>" .
     "<div class='container'>"                                                            .
     "<label><br>firsName</br></label>"                                                     .
     "<input type='text' placeholder='Enter first name' name='firstName' required>"       .
        "<label><br>lastName</br></label>"                                                  .
     "<input type='text' placeholder='Enter last name' name='lastName' required>"         .
        "<label><br>email</br></label>"                                                     .
     "<input type='text' placeholder='Enter email' name='email' required>"                .
        "<label><br>empID</br></label>"                                                     .
     "<input type='text' placeholder='Enter employee ID' name='empID' required>"          .
     "<label><br>Password</br></label>"                                                     .
     "<input type='password' placeholder='Enter Password' name='password' required>"      .
     "<button type='submit'>Login</button>";
$conn->close();
?>