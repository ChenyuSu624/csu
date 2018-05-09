<?php
session_start();

include 'inc/functions.php';

?>

<!DOCTYPE html>
<html>
   <?php
    include 'inc/header.php';
    ?>
        <script>
            function confirmDelete()
            {
                return confirm("Are you sure you want to delete it ? ");
            }


    $(document).ready(function(){
            $(".gunLink").click(function(){
                
                //alert("hi");
                $('#gunModal').modal("show");
                //$("#gunInfo").html("<img src='img/loading.gif'>");
                $.ajax({
                    type: "GET",
                    url: "api/getGunInfo.php",
                    dataType: "json",
                    data: { "id": $(this).attr("id")},
                    success: function(data,status) {
                      //alert(data.Name);
                      //alert("hi");
                      //log.console(data.Image);
                      $("#gunModalLabel").html("<h3>" + data.Name +"</h3>");
                      $("#gunInfo").html("");
                      $("#gunInfo").append("Category: " + data.Category + "<br>");
                      $("#gunInfo").append("Price: " +data.Price + "<br>");
                      $("#gunInfo").append("Rating: " +data.Rating + "<br>");
                      $("#gunInfo").append("Finish: " +data.Finish + "<br>");
                      $("#gunInfo").append("Action: " +data.Action + "<br>");
                      $("#gunInfo").append("Safety: " +data.Safety + "<br>");
                      $("#gunInfo").append("<img src='img/" + data.Image +"' width='100'>");

                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                });//ajax
            });
    }); //document ready
    </script>
        <style type="text/css" >
        .modal .modal-dialog .modal-content{  
            background-color: gray;
        }
    </style>
    </head>
    <body>
        <h1> Admin Main Page </h1>
        <h3> Welcome </h3>
        <h5>You have <?=getCounter()?> guns.</h5>
        <h5>Total cost is $<?=getSum()?> .</h5>
        <h5>Average is $<?=getAve()?> .</h5>
        <br />
        <form  id = "buttons" action="addProduct.php">
            <input type="submit" name="addproduct" value="Add Product"/>
        </form>
        <form  id = "buttons" action="logout.php">
            <input type="submit" value="Logout"/>
        </form>

        <?php
            displayAllProducts();
        ?>
        <!-- Modal -->
            <div class="modal fade" id="gunModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="gunModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="gunInfo"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
    </body>
    <?php
    include 'inc/footer.php';
    ?>
</html>