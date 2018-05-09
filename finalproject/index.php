<?php
    include 'inc/header.php';
    include 'inc/functions.php';
?>
    <style type="text/css" >
        .modal .modal-dialog .modal-content{  
            background-color: gray;
        }
    </style>

    <script>
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

    <body>
        <form>
            <div class="container">
                <h1>Gun Search</h1>
                <hr>
                <b>Search By Name: </b><input type="text" name="product" /><br> <br>
                <b>Search By Category: </b>
                <Select name="category">
                    <option value="">Select One </option>
                    <?=displayCategories()?>
                </Select> <br> <br>
                
                <b>Search By Caliber: </b>
                <Select name="caliber">
                    <option value="">Select One </option>
                    <?=displayCalibers()?>
                </Select> <br> <br>
                <b>   
                Price:  From <input type="text" class="resizedTextbox2" name="priceFrom" size="7"/>
                    To  <input type="text"  class="resizedTextbox2"name="priceTo" size="7"/></b>
                 <br> <br>
                <b>Order result by:</b>
                 <div class="radiobox">
                     <input type="radio" name="orderBy" value="name"/> Product Name<br/>
                     <input type="radio" name="orderBy" value="price"/> Price <br />
                 </div>
                 <br /><br /><hr>
                     <div class="submit">
                         <!--<input type="submit" value="Search" name="searchForm" />-->
                         <input type="submit" class="btn btn-secondary btn-lg" value="Search" name="searchForm"></input>
            </div>
        </form>
        <?php displayResults(); ?>
        
        
        
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
