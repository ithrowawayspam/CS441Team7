  <!DOCTYPE html>
         <html>
         <head><title>IMS</title> 
         <link rel="stylesheet" href="peopl.css"/>                                                                             
         <meta charset="utf-8">                                                                                               
         <meta http-equiv="X-UA-Compatible" content="IE=edge">                                                                
         <title>Project Aquarius</title>
         <div class="nav"> 
          <a class='active' href="IMS.php">Inventory Management System</a>          
          <a href="LeaveIMS.php" style="float: right">logout</a></div>
        </head>

<?php
echo<<<_MNU

<link rel="stylesheet" href="IMS.css"/>   
<body> 
<div class="container4">
<div class="dropdown">
  <button class="dropbtn">Add an item</button>
  <div class="dropdown-content">
    <a href="#">Add a book</a>
    <a href="#">Add electronics</a>
    <a href="#">Add supplies</a>
    <a href="#">Add miscellaneous</a>
  </div>
</div><br>
<div class="dropdown">
  <button class="dropbtn">Remove an item</button>
  <div class="dropdown-content">
    <a href="#">Remove quantity from item</a>
    <a href="#">Remove by name</a>
  </div>
</div><br>
<div class="dropdown">
  <button class="dropbtn">Search for an item</button>
  <div class="dropdown-content">
    <a href="#">Search by Quantity</a>
    <a href="#">Search by name</a>
    <a href="#">Search by type</a>
  </div>
</div><br>
<div class="dropdown">
  <button class="dropbtn">Update an item</button>
  <div class="dropdown-content">
    <a href="#">Update quantity</a>
    <a href="#">Update name</a>
    <a href="#">Update price</a>
  </div>
  </div><br>
  <div class="dropdown">
  <button class="dropbtn">Display Inventory info</button>
  <div class="dropdown-content">
    <a href="#">All book info</a>
    <a href="#">All item info</a>
  </div>
</div><br>

  </div>
  <div class="container5"><div class="container6"></div><div class="container7"></div></div>
 

_MNU


?>

</body>
</html>
