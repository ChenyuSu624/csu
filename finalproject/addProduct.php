<?php
 include 'inc/header.php';
    include 'dbConnection.php';
    session_start();
    if(!isset( $_SESSION['adminName']))
    {
      header("Location:index.php");
    }
    
    $conn = getDatabaseConnection("final_project");
    
    function getCategories() {
        global $conn;
        $sql="SELECT catId, catName FROM firearm_category order by catName";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record)
            echo "<option value='".$record["catId"]."'>" . $record["catName"] . "</option> " ;
    }
    
    function getCalibers() {
        global $conn;
        
        $sql="SELECT calId, calName FROM firearm_caliber order by calName";
        
       $stmt=$conn->prepare($sql);
        $stmt->execute();
        $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option value='".$record["calId"] ."'>". $record['calName'] ." </option>";
        }
    }



if (isset($_GET['submitProduct'])) {

        $productName = $_GET['productName'];
        $productImage = $_GET['productImage'];
        $price = $_GET['price'];
        $catId = $_GET['catId'];
        $productFinish = $_GET['finish'];
        $productAction = $_GET['action'];
        $productCalId = $_GET['calId'];
        $productSafety = $_GET['safety'];
        $productRating = $_GET['rating'];
        $productBarrel_Length = $_GET['barrel_Length'];
    
    
    $sql = "INSERT INTO om_product
            ( `productName`, `productDescription`, `productImage`, `price`, `catId`) 
             VALUES ( :productName, :productDescription, :productImage, :price, :catId)";
     $sql = "INSERT INTO `firearm_product` (`Name`,`Image`,`Price`, `Finish`, `Action`, `Barrel_Length`, `Safety`, `Rating`,`CatId`,`CalId`) VALUES
                                            (:productName,:productImage,:price,:finish,:action,:barrel_Length,:safety,:rating,:catId,:calId)";
    $namedParameters = array();
    $namedParameters[':productName'] = $productName;
    $namedParameters[':productImage'] = $productImage;
    $namedParameters[':price'] = $price;
    $namedParameters[':catId'] = $catId;
    $namedParameters[':finish'] = $productFinish;
    $namedParameters[':action'] = $productAction;
    $namedParameters[':calId'] = $productCalId;
    $namedParameters[':safety'] = $productSafety;
    $namedParameters[':rating'] = $productRating;
    $namedParameters[':barrel_Length'] = $productBarrel_Length;
     $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
}
?>

   <body>
        <h1> Add a product</h1>
        <hr>
        <div class ="edit-area">
        <form>
            Product name: <input type="text" name="productName"><br/><br/>
            Price: <input type="text" name="price"><br/><br/>
            Finish: <input type="text" name="finish" ><br/><br/>
            Action: <input type="text" name="action" ><br/><br/>
            Barrel_Length: <input type="text" name="barrel_Length" ><br/><br/>
            Rating: <input type="text" name="rating"><br/><br/>
            Safety: <input type="text" name="safety" ><br/><br/>
    
            Category: <select name="catId">
                <option>Select One</option>
                <?php getCategories(); ?>
            </select> <br/><br/>
            Category: <select name="calId">
                <option>Select One</option>
                <?php getCalibers(); ?>
            </select> <br/><br/>
            Set Image Url: <input type = "text" name = "productImage"><br/><br/>
            <input type="submit" name="submitProduct" value="Add Adoduct">
        </form>
        </div>
    </body>
<?php
    include 'inc/footer.php';
?>