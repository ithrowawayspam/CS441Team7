<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>


<div class="col-sm-8 text-left">
    <h1>Pull Sheet:"This should pull job name from database" </h1>

    <form action="" method="post">
        <input type="text" value="Customer" name="Customer" onfocus="if(this.value=='Customer') this.value='';">
        <input type="text" value="Barcode" name="Barcode" onfocus="if(this.value=='Barcode') this.value='';">
        <input type="submit">
    </form>
    <hr>

    <table id="myTable">
        <tr>
            <th>ID</th>
            <th>PART NUMBER</th>
            <th>Barcode</th>
            <th>Customer</th>
        </tr>


</div>


<?php

// Create connection
$mysqli = new mysqli("localhost","root","root","INVENTORY");

// Check connection
if ($mysqli->connect_errno)
{
    printf("Failed to connect to MySQL: ", $mysqli->connect_eror);
    exit();
}

$barcode = $_POST["Barcode"];
$customer = $_POST["Customer"];


    $sql = "SELECT * FROM `INVENTORY_ITEM` WHERE `barcode` LIKE '$barcode'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
//update scanned item if it is found
        $sql = "UPDATE `INVENTORY_ITEM` SET `isScanned` = '1' , `customer` = '$customer' WHERE `INVENTORY_ITEM`.`barcode` = '$barcode' ";
        $mysqli->query($sql);

        // output data of each row

        $sql = "SELECT * FROM `INVENTORY_ITEM` WHERE `isScanned` =  '1' AND `customer` = '$customer'";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo " <tr> 
         <td> " . $row["id"] . " </td>
         <td> " . $row["part_number"] . " </td>
         <td> " . $row["barcode"] . " </td>
         <td> " . $row["customer"] . " </td>

                </tr> ";
        }

    }

    $mysqli->close();


?>

</table>



</body>
</html>
