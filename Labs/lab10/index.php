<?php
    include 'inc/header.php';
    include '../../dbConnection.php';
    
    
?>
        <style>
          #carouselExampleIndicators
        {
            width:500px;
            height:auto;
            margin: 0 auto; /* center a div container*/
        }
        </style>
        <!-- Add Carousel here -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <?php for ($i=1; $i < 10; $i++) { ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i?>"></li>
        <?php }?> 
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/alex.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/bear.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/carl.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/charlie.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/lion.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/otter.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/sally.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/samantha.jpg" alt="Third slide">
            </div>           
            <div class="carousel-item">
              <img class="d-block w-100" src="img/ted.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/tiger.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        <br>
        
        <a href="pets.php"  class="btn btn-outline-primary" role="button" aria-pressed="true"> Adopt Now! </a>
        
        
        <br>
        

<?php
    include 'inc/footer.php';
?>