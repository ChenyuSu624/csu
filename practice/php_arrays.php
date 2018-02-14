<?php

    $cards = array("ace","one",2);
    //print_r($cards); //for debugging purposes, shows all elements in array    
    
    //echo $cards[1];
    //echo $cards[0];
    
    
    //adding the new element at the end of the array
    $cards[] = "jack";
    //array_push($cards, "queen");
    //array_push($cards, "knight","king"); //Only in this line of order, also could add another array
    //print_r($cards);
    array_push($cards, "queen","king");

    $cards[2] ="ten";
    //print_r($cards);
     
     //echo "<img src = '../img/cards/clubs/ace.png' />"; //print the image that in the different folder
     //echo "<img src = '../img/cards/clubs/$cards[0].png' />"; 
     //echo "<img src = '../img/cards/clubs/$cards[1].png' />"; 
     //echo "<img src = '../img/cards/clubs/$cards[2].png' />"; 
     
    //  displayCards();
    //  function displayCards()
    //  {
    //     //global $cards; //using variable that is outside of the function
    //      //echo "<img src = '../img/cards/clubs/$cards[2].png' />"; 
    //      //the variable in the function has different memory allocation than the variable outside
    //  }
     displayCards($cards[2]);
     echo "<hr>";
    print_r($cards);
    echo "<hr>";
    $lastCard = array_pop($cards);//retrieves and REMOVE the last item of the array
    
    
    displayCards($lastCard);
    echo "<hr>";
    print_r($cards);
     
    unset($cards[1]); // remove the element from array
    echo "<hr>";
    print_r($cards);
    
    $cards = array_values($cards);// re-indexes the array, resigned to the same variable name to save the changes
    echo "<hr>";
    print_r($cards);
    
    shuffle($cards);// to show array in random order
    echo "<hr>";
    print_r($cards);
    
    echo "<hr>";
    //$randomIndex = rand(0,3);
    $randomIndex = rand(0,count($cards)-1); //count the size of array
    displayCards($cards[$randomIndex]);
    echo "<hr>";
    $randomIndex = array_rand($cards);//display the element by given random index
    displayCards($cards[$randomIndex]);
     
     function displayCards($cards)
     {
         echo "<img src = '../img/cards/clubs/$cards.png' />"; 
     }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>