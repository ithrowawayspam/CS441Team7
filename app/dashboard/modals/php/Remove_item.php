<?php
 require_once 'L.php';

$conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  if (isset($_POST['itemName']))      
  { /*stores the user inputs into variables*/
    $itemName  = $_POST['itemName'];
   
 

/*puts the users input into the table in our database*/
$sql = "DELETE FROM add_item WHERE itemName LIKE '%$itemName%'";


if ($conn->query($sql) === TRUE) {
    echo "Removed item '$itemName' successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
echo <<<EOT
<form action="Remove_item.php" method="post"<pre>
Item name:   <input type="text" name="itemName"><br>
<input type="submit" name="Remove item" value="submit">
</pre></form>
EOT;

$conn->close();
?>