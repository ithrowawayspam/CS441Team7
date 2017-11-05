  <!DOCTYPE html>
         <html>
         <head><title>IMS</title> 
         <link rel="stylesheet" href="peopl.css"/>                                                                             
         <meta charset="utf-8">                                                                                               
         <meta http-equiv="X-UA-Compatible" content="IE=edge">                                                                
         <title>Project Aquarius</title>
         <div class="nav"> 
          <a class='active' href="IMS.php">Inventory Management System</a>          
          <a href="H.php" style="float: right">logout</a></div>
          

<?php
echo<<<_MNU
<style>
.dropbtn {
    background-color: #333342;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: solid;
    border-color: #94b0a8; 
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: relative;
    border: solid;
    border-color: #94b0a8;
    background-color: #333342;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    border: solid:
    border-color: #94b0a8;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover 
{
  background-color: #53786d;
  color: white;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #53786d;
    color: white;
}
</style>
</head>
<body>

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
<
_MNU


?>