   <!DOCTYPE html>
         <html>
         <head><title>IMS</title> 
          <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>                                                                             
         <meta charset="utf-8">                                                                                               
         <meta http-equiv="X-UA-Compatible" content="IE=edge">                                                                
         <title>Project Aquarius</title>         
        </head>

<?php
echo<<<_MNU
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" type="text/css" href="dashboard.css">
<body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
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
            <li><a href="#" style="float: left;">LOGO</a></li>                       
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
<div class="modal_container" id="modal">
    <div class="modal">
      <a href="#" class="close">X</a>
      <span class="modal_heading">
        UPDATE_USER_INFO
      </span>
      <form action="#">
        <input type="text" placeholder="Enter Email"><br>
        <input type="text" placeholder="Enter A Username"><br>
        <input type="password" placeholder="Enter A Password"><br>
        <input type="submit" placeholder="submit" class="btnAdd" value="ADD">
        
      </form>

    <a href="#" class="signin">Have an Account Already?</a>
    <a href="#" class="forgotpassword">Forgot Password?</a>
    </div>
  </div>
  <div class="dropdown-content">
    <a class="ADD" href="#">Add a book</a>    
    <a href="#">Add electronics</a>
    <a href="#">Add supplies</a>
    <a href="#">Add miscellaneous</a>
  </div>
</div><br>
<div class="dropdown">
 <button class="icon-button"><span style="color:white;" class="glyphicon glyphicon-minus-sign"></span></button>
  <div class="dropdown-content">
    <a href="#">Remove quantity from item</a>
    <a href="#">Remove by name</a>
  </div>
</div><br>
<div class="dropdown">
  <button class="icon-button"><span style="color:white;" class="glyphicon glyphicon-search"></span></span></button>
  <div class="dropdown-content">
    <a href="#">Search by Quantity</a>
    <a href="#">Search by name</a>
    <a href="#">Search by type</a>
  </div>
</div><br>
<div class="dropdown">
    <button class="icon-button"><span style="color:white" class="glyphicon glyphicon-tag"></span></button>
  <div class="dropdown-content">
    <a href="#">Update quantity</a>
    <a href="#">Update name</a>
    <a href="#">Update price</a>
  </div>
  </div><br>
  <div class="dropdown">
    <button class="icon-button"><span style="color:white;" class="glyphicon glyphicon-barcode"></span></button>
  <div class="dropdown-content">
    <a href="#">All book info</a>
    <a href="#">All item info</a>
  </div>
</div><br>
      </div>
    </div>
  </div>
      <div class="col-sm-8 text-left"> 
        <h1>Welcome</h1>
        <p>Testing 1,2,3 calling agent white. report in agent white. 
          Testing 1,2,3 calling agent white. report in agent white.
          Testing 1,2,3 calling agent white. report in agent white.
          Testing 1,2,3 calling agent white. report in agent white.
          Testing 1,2,3 calling agent white. report in agent white.
          Testing 1,2,3 calling agent white. report in agent white.
          Testing 1,2,3 calling agent white. report in agent white.
          Testing 1,2,3 calling agent white. report in agent white.
          Testing 1,2,3 calling agent white. report in agent white.
          Testing 1,2,3 calling agent white. report in agent white.
          Testing 1,2,3 calling agent white. report in agent white.
        Testing 1,2,3 calling agent white. report in agent white.</p>
        <hr>
        <h3>Test</h3>
        <p>Agent white repoting in...</p>
        
      </div>      
    </div>
  </div>

  <footer class="container-fluid text-center">

    <div class="container">

      <ul class="list-inline">                      
      <li><a href="#" style="color:red;"><span class="glyphicon glyphicon-log-out"></span> Sign-Out</a></li>
     </ul>

   </div>
  </footer>

 <div class="container5"><div class="container6"></div><div class="container7"></div></div>
 
_MNU
?>

</body>
</html>