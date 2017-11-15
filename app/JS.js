var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

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



function SearchName() {
  var txt;
  var product_Name = prompt("Please enter the Book name:", "Harry Potter");
  if (product_Name == null || product_Name == "") {
    txt = "User cancelled the prompt.";
  } else {
    txt = "Item " + product_Name + " Was found!";
  }
  document.getElementById("demo").innerHTML = txt;
}



function SearchSKU() {
  var txt;
  var product_SKU = prompt("Please enter SKU number :", "178652");
  if (product_SKU == null || product_SKU == "") {
    txt = "User cancelled the prompt.";
  } else {
    txt = "Item " + product_SKU + " Was found!";
  }
  document.getElementById("demo").innerHTML = txt;
}



function SearchISBN() {
  var txt;
  var product_ISBN = prompt("Please enter ISBN number :", "97800000000");  
  if (product_ISBN == null || product_ISBN == "") {
    txt = "User cancelled the prompt.";
  } else {
    txt = "Item " + product_ISBN + " Was found!";
  }
  document.getElementById("demo").innerHTML = txt;
}

function ShowBookInfo() {
  var txt;
  var product_ISBN = prompt("Please enter ISBN number :", "9780000000");
  if (product_ISBN == null || product_ISBN == "") {
    txt = "User cancelled the prompt.";
  } else {
    txt = "Item " + product_ISBN + " Info below!";
  }
  document.getElementById("demo").innerHTML = txt;
}



function ShowProductInfo() {
 var txt;
 var product_SKU = prompt("Please enter SKU number :", "9780000000");
 if (product_SKU == null || product_SKU == "") {
  txt = "User cancelled the prompt.";
} else {
  txt = "Item " + product_SKU + " Info below!!";
}
document.getElementById("demo").innerHTML = txt;
}

function UpdateInfo() {
  var txt;
  var product_ISBN = prompt("Please enter ISBN number :", "9780000000");
  if (product_ISBN == null || product_ISBN == "") {
    txt = "User cancelled the prompt.";
  } else {
    txt = "Item " + product_ISBN + " Book info was updated!";
  }
  document.getElementById("demo").innerHTML = txt;
}



function UpdateQauntity() {
 var txt;
 var product_SKU = prompt("Please enter SKU number :", "1786534");
 if (product_SKU == null || product_SKU == "") {
  txt = "User cancelled the prompt.";
} else {
  txt = "Item " + product_SKU + " Quantity was updated!";
}
document.getElementById("demo").innerHTML = txt;
}
