<!DOCTYPE html>
<html>
<head><title>IMS</title> 
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>                                                                             
  <meta charset="utf-8">                                                                                               
  <meta http-equiv="X-UA-Compatible" content="IE=edge">   
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<link rel="stylesheet" type="text/css" href="csshake.min.css">
<link rel="stylesheet" type="text/css" href="http://csshake.surge.sh/csshake.min.css">
<script type="text/javascript" src="JS.js"></script>
<link rel="stylesheet" type="text/css" href="dashboard.css">
<link rel="stylesheet" type="text/css" href="Loader.css">                                                             
  <title>Project Aquarius</title>         
</head>




<body onload="myFunction()" style="margin:0;">

  <div id="loader"></div>

  <div style="display:none;" id="myDiv" class="animate-bottom">

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div  class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#">

          </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">  
            <li><a class="shake-slow" href="#" style="float: left;">LOGO</a></li>                       
            <li><a style="background-color:#CDCDCD; float: left; height: auto; " href="#">Home</a></li>
            <li><a href="#">Tasks</a></li>
            <li><a href="#">Control</a></li>
            <li><a href="#">Admin</a></li>
          </ul>                           
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid text-center">    
    <div class="row content">
      <div class="col-sm-2 sidenav">
       <div class="dropdown">
        <button class="icon-button" class="Add"><span style="color:white;" class="glyphicon glyphicon-plus-sign"></span></button>  
        <div class="dropdown-content">
          <a onclick="AddBook()" href="#">Add a Book</a>    
          <a onclick="AddElectronic()" href="#">Add Electronics</a>
          <a onclick="AddSupplies()" href="#">Add Supplies</a>          
        </div>
      </div><br>
      <div class="dropdown">
       <button class="icon-button"><span style="color:white;" class="glyphicon glyphicon-minus-sign"></span></button>
       <div class="dropdown-content">
         <a onclick="RemoveBook()" href="#">Remove a Book</a>    
         <a onclick="RemoveElectronic()" href="#">Remove Electronics</a>
         <a onclick="RemoveSupplies()" href="#">Remove supplies</a> 
       </div>
     </div><br>
     <div class="dropdown">
      <button class="icon-button"><span style="color:white;" class="glyphicon glyphicon-search"></span></span></button>
      <div class="dropdown-content">       
        <a onclick="SearchName()" href="#">Search by Name</a>
        <a onclick="SearchSKU()" href="#">Search by SKU</a>
        <a onclick="SearchISBN()" href="#">Search by ISBN</a>
      </div>
    </div><br>
    <div class="dropdown">
      <button class="icon-button"><span style="color:white" class="glyphicon glyphicon-tag"></span></button>
      <div class="dropdown-content">
        <a onclick="myFunction()" href="#">Update Quantity</a>
        <a onclick="myFunction()" href="#">Update Name</a>
        <a onclick="myFunction()" href="#">Update Price</a>
      </div>
    </div><br>
    <div class="dropdown">
      <button class="icon-button"><span style="color:white;" class="glyphicon glyphicon-barcode"></span></button>
      <div class="dropdown-content">
        <a onclick="myFunction()" href="#">All book Info</a>
        <a onclick="myFunction()" href="#">All item Info</a>
      </div>
    </div><br>
  </div>

  <div> 
    <h1>Welcome</h1>
    <p id='demo'></p>

    
    <br>
    <br>
    <hr>
    <h3>Test</h3>
    <p>Agent white repoting in...</p>
  </div>      


  <footer class="container-fluid text-center">
    <div class="container">
      <ul class="list-inline">                      
        <li><a class="shake-slow" href="#" style="color:red;"><span class="glyphicon glyphicon-log-out"></span> Sign-Out</a></li>
      </ul>
    </div>
  </footer>
</div>




</body>
</html>