<?php
 require_once 'L.php';
 
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_POST['itemName']))
  { /*stores the user inputs into variables*/
    $itemName  = $_POST['itemName'];

 $sql="SELECT * FROM add_item WHERE itemName LIKE '%$itemName%'";

        $result=$conn->query($sql);

        if($row=$result->fetch_assoc())
        {
            echo 'Found the item named: '.$row["itemName"];
        }      
        else
        {
        	  echo "Error couldn't find $itemName" . "<br>" . $conn->error;
        }


}
echo <<<EOT
<form action="search_item.php" method="post"<pre>
Item name:   <input type="text" name="itemName"><br>
<input type="submit" name="search item" value="submit">
</pre></form>
EOT;
$conn->close();
?>