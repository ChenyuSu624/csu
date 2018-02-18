<?php

        function getRamdonColor(){
            echo"background-color: rgba($red,$green,$blue,$alpha);";
        }
?>
                



<!DOCTYPE html>
<html>
    <head>
        <title> Ramdon Color</title>
        
        <style>
        
            body{
                
                <?php
                    $red = rand(0,255);
                    $green = rand(0,255);
                    $blue = rand(0,255);
                    $alpha = rand(0,10)/10;
                    echo"background-color: rgba($red,$green,$blue,$alpha);";
                    echo"background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
                    
                ?>
                
            }
            
            
            h1{
                
                <?php
                    $red = rand(0,255);
                    $green = rand(0,255);
                    $blue = rand(0,255);
                    $alpha = rand(0,10)/10;
                    echo"background-color: rgba($red,$green,$blue,$alpha);";
                    //echo"color: rgba($red,$green,$blue,$alpha);";
                ?>
            }
            
            h2
            {
                color:<?php getRamdonColor() ?>;
                background-color; <?= getRamdonColor() ?>;
            }
        </style>
    </head>
    
    <body>
            <h1> Welcome! </h1>
            
            <h2> Ramdon Background Color! </h2>
    </body>
</html>