<?php

$Img_array = array("paper","rock","scissor");

function choose_ges()
{
    global $Img_array;
    $rand_ges = rand(0,2);
    echo "<img src='img/$Img_array[$rand_ges].png' alt='$rand_ges' title='". ucfirst($rand_ges) ."'  width='200' >";
    echo "<br/>";
    
    return $Img_array[$rand_ges];
}

function displayWinner($human, $computer) {
    
    if ($human == "rock" && $computer == "scissor" ) {
        echo "<h2> Human Wins </h2>";
    }
    else if ($human == "scissor" && $computer == "paper" ) {
        echo "<h2> Human Wins </h2>";   
    }
    else if ($human == "paper" && $computer == "rock" ) {
        echo "<h2> Human Wins </h2>";   
    }else if  ($human == "paper" && $computer == "scissor") {
        echo "<h2> Computer Wins </h2>";
    } 
    else if  ($human == "scissor" && $computer == "rock") {
        echo "<h2> Computer Wins </h2>";
    }
    else if  ($human == "rock" && $computer == "paper") {
        echo "<h2> Computer Wins </h2>";
    }else {
        echo "<h2>Tie Game!</h2>";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Homework2  </title>
        <meta charset = "utf-8"/>
        <style>
            @import url("css/style.css");
        </style>
    </head>
    <body>
            <h1>Rock! Paper! Scissor!</h1>

        <hr>
        <img src = "img/lobo.png" id="lobo"  alt = "Picture of lobo" width = 300/>
        <div>
            <h2>Human</h2>
            <?php
                $human = choose_ges();
                echo "<h3>$human</h3>"
            ?>
        </div>
        <div>
            <h2>Computer</h2>
            <?php
                $computer = choose_ges();
                echo "<h3>$computer</h3>";
            ?>
            
        </div>
         <img src = "img/lobo.png" id="lobo"  alt = "Picture of lobo" width = 300/>
        
        <br>
        <hr>
        <div id="winner"> <h2><?=displayWinner($human, $computer)?> </h2></div>
        <br>


    </body>
</html>