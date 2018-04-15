<?php

session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:index.php");
}
include '../../dbConnection.php';
$conn = getDatabaseConnection("ottermart");

function displayAllProducts(){
    global $conn;
    $sql="SELECT * FROM om_product";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);

//     return $records;
// }
        if(!empty($records)){
         echo "<br /><table class='table' > ";
           echo "   <tr><th><h3>Product</h3></th>
                        <th><h3>Update</h3></th>
                        <th><h3>Remove</h3></th></tr>";
            foreach($records as $record) {
                echo "<td id='td-text'>".$record['productName']."</td>";
                echo "<td id='td-cell'><a href='updateProduct.php?productId=".$record['productId']."'>Update</a></td>";
                //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
                echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='productId' value= " . $record['productId'] . " />";
                echo "<td id='td-cell'><input type= 'submit' value = 'Remove'></td>";
                echo "</form></tr>";
            }
            echo "</table>";
        }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/login_styles.css" rel="stylesheet" type="text/css" />
        <title> Admin Main Page </title>
        <style>
            form{
                display: inline;
            }
        </style>
        <script>
            function confirmDelete()
            {
                return confirm("Are you sure you want to delete it ? ");
            }
        </script>
    </head>
    <body>
        <h1> Admin Main Page </h1>
        <h3> Welcome <?=$_SESSION['adminName']?>! </h3>
        <br />
        <form  id = "buttons" action="addProduct.php">
            <input type="submit" name="addproduct" value="Add Product"/>
        </form>
        
        <form  id = "buttons" action="logout.php">
            <input type="submit" value="Logout"/>
        </form>
        <hr>
        <?php
            displayAllProducts();
        ?>
    </body>
    <hr>
    <div id="foot">
        <footer>
            <br /><strong>CST336 Internet Programming. By: Chenyu Su</strong><br />
            <strong>DISCLAIMER: The information in this webpage is fictitious. <br />
            It is used for academic purposes only.</strong>
            <br /><img id="otter" src="img/otter.png" alt="CSUMB Logo" />
        </footer>
    </div>
</html>