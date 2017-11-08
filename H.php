<!DOCTYPE html>
         <html>
         <head><title>Home</title> 
         <link rel="stylesheet" href="peopl.css"/>                                                                            
         <meta charset="utf-8">                                                                                               
         <meta http-equiv="X-UA-Compatible" content="IE=edge">                                                                
         <title>Project Aquarius</title>
         <div class="nav"> 
          <a class='active' href="H.php">Home</a>             
          <a href="#news">News</a>                                
          <a href="Contact.html">Contact</a>                          
          <a href="add_people.php">Register</a>    
          <a href="ifUser.php">login</a></div>  
          <body>                      
         <div class="Hpara"><br>


<?php
session_start();

if ($_SESSION['logged_in'] == TRUE)
{
  echo  "<br><br><p style='font-size: 50px; color: block;'>IMS FOR ALL YOUR INVENTORY NEEDS!</p>" .
        "<p style='font-size: 50px; color: block;'>Go to <a href='IMS.php'>IMS</a></p>";
          
}
else
{
  echo  "<br><br><P style='font-size: 50px; color: block;'>IMS FOR ALL YOUR INVENTORY NEEDS!</p>" .
        "<p style='font-size: 50px; color: block;'>Go to <a href='ifUser.php'>Login</a></p>";
}

?>

</div>
</body>
</head>
</html>
