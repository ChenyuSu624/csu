<?php
    include 'inc/header.php';
    include 'dbConnection.php';
    $conn = getDatabaseConnection("final_project");
        function getCategories($catId) {
        global $conn;
        
        $sql="SELECT catId, catName FROM firearm_category order by catName";
        
       $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option  ";
            echo ($record["catId"] == $catId)? "selected": ""; 
            echo " value='".$record["catId"] ."'>". $record['catName'] ." </option>";
        }
    }
    
    function getCalibers($calId) {
        global $conn;
        
        $sql="SELECT calId, calName FROM firearm_caliber order by calName";
        
       $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option  ";
            echo ($record["calId"] == $calId)? "selected": ""; 
            echo " value='".$record["calId"] ."'>". $record['calName'] ." </option>";
        }
    }
    function getGunInfo()
    {
        global $conn;
        $sql = "SELECT * FROM firearm_product WHERE Id = " . $_GET['productId'];
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    if (isset($_GET['updateProduct'])) {
        
        
        $sql = "UPDATE firearm_product
                SET Name = :productName,
                    Image = :productImage,
                    Price = :price,
                    CatId = :catId,
                    Finish = :productFinish,
                    Action = :productAction,
                    CalId = :productCalId,
                    Safety = :productSafety,
                    Rating = :productRating,
                    Barrel_Length = :productBarrel_Length
                WHERE Id = :productId";
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":price"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        
        $np[":productFinish"] = $_GET['finish'];
        $np[":productAction"] = $_GET['action'];
        $np[":productCalId"] = $_GET['calId'];
        $np[":productSafety"] = $_GET['safety'];
        $np[":productRating"] = $_GET['rating'];
        $np[":productBarrel_Length"] = $_GET['barrel_Length'];

        $np[":productId"] = $_GET['productId'];
                
        $statement = $conn->prepare($sql);
        $statement->execute($np);
    }
    
    
    if(isset ($_GET['productId']))
    {
        $product = getGunInfo();
    }
?>
    <body>
        <h1>Update Product</h1>
        <hr>
        <div class ="edit-area">
        <form>
            <input type="hidden" name="productId" value= "<?=$product['Id']?>"/>
            Product name: <input type="text" value = "<?=$product['Name']?>" name="productName"><br/><br/>
            Price: <input type="text" name="price" value = "<?=$product['Price']?>"><br/><br/>
            Finish: <input type="text" name="finish" value = "<?=$product['Finish']?>"><br/><br/>
            Action: <input type="text" name="action" value = "<?=$product['Action']?>"><br/><br/>
            Barrel_Length: <input type="text" name="barrel_Length" value = "<?=$product['Barrel_Length']?>"><br/><br/>
            Rating: <input type="text" name="rating" value = "<?=$product['Rating']?>"><br/><br/>
            Safety: <input type="text" name="safety" value = "<?=$product['Safety']?>"><br/><br/>
    
            Category: <select name="catId">
                <option>Select One</option>
                <?php getCategories( $product['CatId'] ); ?>
            </select> <br/><br/>
            Category: <select name="calId">
                <option>Select One</option>
                <?php getCalibers( $product['CalId'] ); ?>
            </select> <br/><br/>
            Set Image Url: <input type = "text" name = "productImage" value = "<?=$product['Image']?>"><br/><br/>
            <input type="submit" name="updateProduct" value="Update Product">
        </form>
        </div>
    </body>

<?php
    include 'inc/footer.php';
?>
