<?php

 include 'dbConnection.php';
    
 $connection = getDatabaseConnection("final_project");
    
 $sql = "DELETE FROM firearm_product WHERE Id =  " . $_GET['productId'];
 $statement = $connection->prepare($sql);
 $statement->execute();
 
 header("Location: admin.php");
?>