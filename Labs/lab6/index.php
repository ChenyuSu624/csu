
<?php

    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");

    function displayCategories(){
        global $conn;
        
        $sql = "SELECT catId, catName FROM `om_category` ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
        foreach ($records as $record) {
            
            echo "<option value='".$record["catId"]."' >" . $record["catName"] . "</option>";
            
        }
    }
    
    function displaySearchResults(){
        global $conn;
        
        if (isset($_GET['searchForm'])) { //checks whether user has submitted the form
            
            echo "<h3>Products Found: </h3>"; 
            
            //following sql works but it DOES NOT prevent SQL Injection
            //$sql = "SELECT * FROM om_product WHERE 1
            //       AND productName LIKE '%".$_GET['product']."%'";
            
            //Query below prevents SQL Injection
            
            $namedParameters = array();
            
            $sql = "SELECT * FROM om_product WHERE 1";
            
            if (!empty($_GET['product'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND productName LIKE :productName";
                 $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
            }
                  
                  
             if (!empty($_GET['category'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND catId = :categoryId";
                 $namedParameters[":categoryId"] =  $_GET['category'];
             }    
            
             if (!empty($_GET['priceFrom'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND price >= :priceFrom";
                 $namedParameters[":priceFrom"] =  $_GET['priceFrom'];
             }
             
            if (!empty($_GET['priceTo'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND price <= :priceTo";
                 $namedParameters[":priceTo"] =  $_GET['priceTo'];
             }
             
             if(isset($_GET['orderBy'])){
                 if($_GET['orderBy'] == "price"){
                     $sql .= " ORDER BY price";
                 }
                 else {
                     $sql .= " ORDER BY productName";
                 }
             }
            
            //echo $sql; //for debugging purposes
            
             $stmt = $conn->prepare($sql);
             $stmt->execute($namedParameters);
             $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($records as $record) {
                
                echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";
                 echo  $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "<br /><br />";
            }
        }
        
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Product Search </title>
        <style>@import "css/style.css";</style>
        
    </head>
    <body>

        <h1>  OtterMart Product Search </h1>
        
        <form>
            
            Product :  <input type="text" class="resizedTextbox1" name="product" value = "Input text"/><br /><br />

            Category: 
                <select name="category" class="resizedTextbox1">
                    <option value=""> Select One </option>
                    <?=displayCategories()?>
                </select>
            <br /><br />
            
            Price:  From <input type="text" class="resizedTextbox2" name="priceFrom" size="7"/>
                    To  <input type="text"  class="resizedTextbox2"name="priceTo" size="7"/>
                    
            <br /><br />
            
             Order result by:
             <div class="radiobox">
            
             <input type="radio" name="orderBy" value="name"/> Product Name<br/>
             <input type="radio" name="orderBy" value="price"/> Price <br />
             </div>
             <br /><br />
             <div class="submit">
             
             <input type="submit" value="Search" name="searchForm" />
             
        </form>
        
        <br />
        <hr>
        
        <?= displaySearchResults() ?>

    </body>
</html>