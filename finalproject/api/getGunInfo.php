<?php

   include '../dbConnection.php';
      $conn = getDatabaseConnection('final_project');
      $gunId = $_GET['id'];
      $sql = "SELECT * FROM firearm_product WHERE Id = :id";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute(array(":id"=>$gunId));
      $record = $stmt->fetch(PDO::FETCH_ASSOC);
      //print_r($record);
    
     echo json_encode($record);
?>