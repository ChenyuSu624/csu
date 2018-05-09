<?php
    session_start();
    
    unset($_SESSION["error"]);
    
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("final_project");
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $error = "Username/Password incorrect... Please enter again.";
    
    $sql = "SELECT * 
            FROM admin
            WHERE username = :username
            AND   password = :password";    
            
    $np = array();
    $np[":username"] = $username;
    $np[":password"] = $password;
    
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (empty($record)) {
        $_SESSION["error"] = $error;
        header("location: loginPage.php"); 
    } else {
    
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        header("Location:admin.php");
        
    }
?>