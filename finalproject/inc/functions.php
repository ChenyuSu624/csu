<?php
    session_start();
    unset($_SESSION["error"]);
    
      include 'dbConnection.php';
      $conn = getDatabaseConnection('final_project');
     
    function getAllGuns(){
      global $conn;
      
      $sql = "SELECT Name, Category, Image, Price, Finish, Action, Caliber, Barrel_Length, Safety, Rating FROM firearm_product ORDER BY Name";
    
      $stmt = $conn->prepare($sql);  
      $stmt->execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $records;  
    }
      

    function displayCategories(){
        global $conn;
        $sql="SELECT catId, catName FROM firearm_category order by catName";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record)
            echo "<option value='".$record["catId"]."'>" . $record["catName"] . "</option> " ;
    }
    
      function displayCalibers(){
        global $conn;
        $sql="SELECT calId, calName FROM firearm_caliber order by calName";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record)
            echo "<option value='".$record["calId"]."'>" . $record["calName"] . "</option> " ;
    }
    function displayAllProducts(){
        global $conn;
        $sql="SELECT * FROM firearm_product";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($records)){
         echo "<br /><table class='table' > ";
           echo "   <tr><th><h3>Image</h3></th>
                        <th><h3>Product</h3></th>
                        <th><h3>Update</h3></th>
                        <th><h3>Remove</h3></th></tr>";
            foreach($records as $record) {
                echo "<td id='td-img'><img src='img/". $record['Image']. "'width='100'></td>" ;
                echo "<td id='td-text'><a href='#' class='gunLink' id='". $record['Id']. "'  >". $record['Name']. "</a></td>" ;
                echo "<td id='td-cell'><a href='updateProduct.php?productId=".$record['Id']."'>Update</a></td>";
                echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='productId' value= " . $record['Id'] . " />";
                echo "<td id='td-cell'><input type= 'submit' value = 'Remove'></td>";
                echo "</form></tr>";
            }
            echo "</table>";
        }
    }
    
    function displayResults(){
        global $conn;
        if(isset($_GET['searchForm'])){
            $namedParameters= array();
            $sql= "SELECT * FROM `firearm_product` WHERE 1";
             if(!empty($_GET['product'])){
                $sql.=" and Name LIKE :name" ;
                $namedParameters[":name"]= "%" . $_GET['product'] . "%";
            }
            if(!empty($_GET['category'])){
                $sql.="  and CatId= :CategoryId" ;
                $namedParameters[":CategoryId"] = $_GET['category'];
            }
            if(!empty($_GET['caliber'])){
                $sql.="  and CalId = :CaliberId" ;
                $namedParameters[":CaliberId"] = $_GET['caliber'] ;
            }
            if (!empty($_GET['priceFrom'])) { 
                 $sql .=  " AND Price >= :priceFrom";
                 $namedParameters[":priceFrom"] =  $_GET['priceFrom'];
             }
             
            if (!empty($_GET['priceTo'])) { 
                 $sql .=  " AND Price <= :priceTo";
                 $namedParameters[":priceTo"] =  $_GET['priceTo'];
             }
             
             if(isset($_GET['orderBy'])){
                 if($_GET['orderBy'] == "price"){
                     $sql .= " ORDER BY Price";
                 }
                 else {
                     $sql .= " ORDER BY Name";
                 }
             }
            $stmt=$conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($records)){
                echo "<br /><table class='table' > ";
                echo "<tr><th><h3>Image</h3></th>
                      <th><h3>Name</h3></th>
                      <th><h3>Price</h3></th>
                      <th><h3>Info</h3></th></tr>";
                foreach($records as $record){
                    $itemName=$record['Name'];
                    $itemPrice=$record['Price'];
                    $itemImage=$record['Image'];
                    $itemId=$record['Id'];
                    echo "<tr><td><img src='img/". $record['Image']. "'  id='$itemId'  width='100' ></td>" ;
                    echo "<td id='td-text'><a href='#' class='gunLink' id='$itemId'  > $itemName </a></td>" ;
                    echo "<td id='td-text'>$$itemPrice</td>" ;
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='itemName' value='$itemName'>";
                    echo "<input type='hidden' name='itemId' value='$itemId'> ";
                    echo "<input type='hidden' name='itemImage' value='$itemImage'>";
                    echo "<input type='hidden' name='itemPrice' value='$itemPrice'>";
                    echo "<td id='td-text'><a href=\"productInfo.php?Id=".$record["Id"]."\"><h3>More Info</h3></a></td>";
                    echo "</form>" ;
                    echo '</tr>' ;
                }
                echo "</table>";
            } else
                echo "<br/><h2 id='error' color:'red'>No firearms found!</h2>";
        }
    }
    
    
    function displayInfo(){
        global $conn;
        $productId=$_GET['Id'];
        $sql="SELECT * FROM `firearm_product` WHERE 1 and Id= $productId";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class = 'details'>";
        echo "<hr>";
        echo "<img id='infoimg' src= 'img/".$records[0]['Image']."' width='200'/>";
        echo "<table class='tableinfo'>";
        echo "<tr><td id='td-info'>Name: </td>";
        echo "<td id='td-info'>". $records[0]['Name'] ."</td></tr>";
        echo "<hr>";
        echo "<td id='td-info'>Category: </td>"; 
        echo "<td id='td-info'>". $records[0]['Category'] ."</td></tr>";
        echo "<td id='td-info'>Price: </td>"; 
        echo "<td id='td-info'>". $records[0]['Price'] ."</td></tr>";
        echo "<td id='td-info'>Finish: </td>"; 
        echo "<td id='td-info'>". $records[0]['Finish'] ."</td></tr>";
        echo "<td id='td-info'>Action: </td>"; 
        echo "<td id='td-info'>". $records[0]['Action'] ."</td></tr>";
        echo "<td id='td-info'>Caliber: </td>"; 
        echo "<td id='td-info'>". $records[0]['Caliber'] ."</td></tr>";
        echo "<td id='td-info'>Barrel_Length: </td>"; 
        echo "<td id='td-info'>". $records[0]['Barrel_Length'] ."</td></tr>";
        echo "<td id='td-info'>Safety: </td>"; 
        echo "<td id='td-info'>". $records[0]['Safety'] ."</td></tr>";
        echo "<td id='td-info'>Rating: </td>"; 
        echo "<td id='td-info'>". $records[0]['Rating'] ."</td></tr></table>";
        echo "<hr>";
        echo "</div>";
    }
    
    function getCounter(){
    global $conn;
      
      $sql = "SELECT COUNT(Id) AS NumberOfProducts FROM firearm_product";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $records['NumberOfProducts'];
    }


    function getSum(){
    global $conn;
      $sql = "SELECT SUM(Price) AS Sum FROM firearm_product";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $records['Sum'];
    }
    
    function getAve(){
        global $conn;
      $sql = "SELECT Sum(Price)/COUNT(Id) AS average FROM firearm_product";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $records['average'];
    }
?>