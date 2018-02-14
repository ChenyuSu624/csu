<!DOCTYPE html>
<html>
    <head>
        <title> Lab2 : 777 Slot Machine </title>
        <meta charset = "utf-8"/>
    </head>
    <body>
          <!---
          ../   ---one folder above
          ../../   ---as many folders above
          width only changes the display size
          --->
                
                <?php
                    /*
                    //ways to show images
                    // ?php must be connected
                    //$symbol17 but not $17symbol
                    //combain html and php
                    
                    $randomValue = rand(0,3);
                    echo $randomValue;
                    

                    $symbol ="seven";
                    //echo "<img src='img/cherry.png' alt='cherry' title='Cherry'  width='70' />";
                    //echo"<img src=\"img/cherry.png\" alt=\"cherry\" title=\"Cherry\"  width=\"70\" /> ";
                    echo "<img src='img/$symbol.png' alt='$symbol' title='$symbol'  width='70' />";
                    
                    $symbol ="orange";
                    echo "<img src='img/$symbol.png' alt='$symbol' title='$symbol'  width='70' />";
                    
                    $symbol ="cherry";
                    echo "<img src='img/$symbol.png' alt='$symbol' title='$symbol'  width='70' />";
                    */
                    
                    
                    function displaySymbol($randomValue){
                        //using conditions
                        //$randomValue = rand(0,4);
                        echo $randomValue;
                        
                        /*
                        if($randomValue == 0){
                            $symbol ="cherry";
                        }
                        else if($randomValue == 1){
                            $symbol ="grapes";
                        }
                        else if($randomValue == 2){
                            $symbol ="lemon";
                        }
                        else if($randomValue == 3){
                            $symbol ="orange";
                        }
                        else {
                            $symbol ="seven";
                        }
                        */
                        
                        //trhee or more if statements
                        switch ($randomValue){
                            case 0 :
                                $symbol ="cherry";
                                break;
                            case 1 :
                                $symbol ="grapes";
                                break;
                            case 2 :
                                $symbol ="lemon";
                                break;
                            case 3 :
                                $symbol ="orange";
                                break;
                            case 4 :
                                $symbol ="seven";
                                break;
                        }
                        echo "<img src='img/$symbol.png' alt='$symbol' title='". ucfirst($symbol) ."'  width='70' >";
                    }
                    
                    $randomValue1= rand(0,4);
                    displaySymbol($randomValue1);
                    
                    $randomValue2= rand(0,4);
                    displaySymbol($randomValue2);
                    
                    $randomValue3= rand(0,4);
                    displaySymbol($randomValue3);
                    
                    echo "<br/><hr>Values: $randomValue1 $randomValue2 $randomValue3";

                    /*
                    for($i=0; $i< 3; $i++)
                    {
                        displaySymbol();
                        
                    }
                    */
                    
                    function displayPoints($randomValue1,$randomValue2,$randomValue3)
                    {
                        echo"<div id = 'output'>";
                        if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3)
                        {
                            switch($randomValue1){
                                case 0: $totalPoints = 1000;
                                    echo "<h1>Jackpot!!!</h1>";
                                    break;
                                case 1:
                                    $totalPoints = 500;
                                    break;
                                case 2:
                                    $totalPoints = 250;
                                    break;
                            }
                            
                            echo "<h2>You won $totalPoints points!!!</h2>";
                            
                        }
                        else {
                            echo "<h3> Try Again...</h3>";
                        }
                        echo"</div>";
                    }
                ?>
<!--
            
            <img src="img/cherry.png" alt="cherry" title="Cherry"  width="70" /> 
            <img src="img/grapes.png" alt="grapes" title="Grapes"  width="70" />
            <img src="img/lemon.png" alt="lemon" title="Lemon"  width="70" /> 
            <img src="../../img/csumblogo.png"  />
-->
    </body>
</html>