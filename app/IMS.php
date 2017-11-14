   <!DOCTYPE html>
   <html>
   <head><title>IMS</title> 
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>                                                                             
    <meta charset="utf-8">                                                                                               
    <meta http-equiv="X-UA-Compatible" content="IE=edge">                                                                
    <title>Project Aquarius</title>         
  </head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" type="text/css" href="csshake.min.css">
<!-- or from surge.sh -->
<link rel="stylesheet" type="text/css" href="http://csshake.surge.sh/csshake.min.css">

  <link rel="stylesheet" type="text/css" href="dashboard.css">


  <body>

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
    echo "<p id='demo'></p>";

    
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

  <div class="container5"><div class="container6"></div><div class="container7"></div></div>

  <script>
    function AddBook() {
      var txt;
      var book_Name = prompt("Please enter the Book name:", "Harry Potter");
      var book_ISBN = prompt("Please enter ISBN number :", "97800000000");
      var book_Author = prompt("Please enter your Author last name:", "robbins");
      if (book_Name == null || book_Name == "") {
        txt = "User cancelled the prompt.";
      } else {
        txt = "Book " + book_Name + " Was added to the inventory!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>

<script>
    function AddElectronic() {
      var txt;
      var Elec_Name = prompt("Please enter the product name:", "Harry Potter");
      var Elec_SKU = prompt("Please enter SKU number :", "178652");
      var Elec_Price = prompt("Please enter product price:", "5.99");

      if (Elec_Name == null || Elec_Name == "") {
        txt = "User cancelled the prompt.";
      } else {
        txt = "Product " + Elec_Name + " Was added to the inventory!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>

  <script>
    function AddSupplies() {
      var txt;
      var Supply_Name = prompt("Please enter the product name:", "Harry Potter");
      var Supply_SKU = prompt("Please enter SKU number :", "178652");
      var Supply_Price = prompt("Please enter product price:", "5.99");
      if (Supply_Name == null || Supply_Name == "") {
        txt = "User cancelled the prompt.";
      } else {
        txt = "Product " + Supply_Name + " Was added to the inventory!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>

  <script>
    function RemoveBook() {
      var txt;
      var book_Name = prompt("Please enter the Book name:", "Harry Potter");
      var book_ISBN = prompt("Please enter ISBN number :", "97800000000");
      var book_Author = prompt("Please enter your Author last name:", "robbins");
      if (book_Name == null || book_Name == "") {
        txt = "User cancelled the prompt.";
      } else {
        txt = "Book " + book_Name + " Was Removed from inventory!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>

<script>
    function RemoveElectronic() {
      var txt;
      var Elec_Name = prompt("Please enter the product name:", "Harry Potter");
      var Elec_SKU = prompt("Please enter SKU number :", "178652");
      var Elec_Price = prompt("Please enter product price:", "5.99");
      if (Elec_Name == null || Elec_Name == "") {
        txt = "User cancelled the prompt.";
      } else {
        txt = "Product " + Elec_Name + " Was Removed from inventory!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>

  <script>
    function RemoveSupplies() {
      var txt;
      var Supply_Name = prompt("Please enter the product name:", "Harry Potter");
      var Supply_SKU = prompt("Please enter SKU number :", "178652");
      var Supply_Price = prompt("Please enter product price:", "5.99");
      if (Supply_Name == null || Supply_Name == "") {
        txt = "User cancelled the prompt.";
      } else {
        txt = "Product " + Supply_Name + " Was Removed from inventory!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>

 <script>
    function SearchName() {
      var txt;
      var product_Name = prompt("Please enter the Book name:", "Harry Potter");
      if (Product_Name == null || Product_Name == "") {
        txt = "User cancelled the prompt.";
      } else {
        txt = "Item " + product_Name + " Was Removed from inventory!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>

<script>
    function SearchSKU() {
      var txt;
      var product_SKU = prompt("Please enter SKU number :", "178652");
      if (product_Name == null || product_Name == "") {
        txt = "User cancelled the prompt.";
      } else {
        txt = "Item " + Elec_Name + " Was Removed from inventory!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>

  <script>
    function SearchISBN() {
      var txt;
  
      var product_ISBN = prompt("Please enter ISBN number :", "97800000000");
      
      if (product_ISBN == null || product_ISBN == "") {
        txt = "User cancelled the prompt.";
      } else {
        txt = "Item " + product_ISBN + " Was Removed from inventory!";
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>


</body>
</html>