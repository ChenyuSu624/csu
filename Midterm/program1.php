<?php

$month = array('Select','November', 'December', 'Januray', 'Febuary');
$country = array('USA', 'Mexico','France');
function MonthDropDown(){
    global $month;
    foreach($month as $choice){
        echo "<option value= '$choice' >$choice</option>";
    }
}


function CountryDropDown(){
    global $country;
    foreach($country as $choice){
        echo "<option value= '$choice' >$choice</option>";
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Winter Vacation Planner</title>
        <meta charset = "utf-8"/>
        <h1>Winter Vacation Planner !</h1>
        <style>
            @import url("css/styles.css");
        </style>
        
    </head>
    <body>
        <div id="wrapper">
        	<form method='get'>
            	 Select a Month:
        		<select name="Select">
        			<?=MonthDropDown()?>
        		</select>
        		<br /><br />
        		<div id = "number"></div>
        		    Number of Locations:
    
                    <input type="radio" name="numberofLocation" value="Three" />
                     Three
                    <input type="radio" name="numberofLocation"  value="Four"/>
                    Four
                    <input type="radio" name="numberofLocation"  value="FIve"/>
                    FIve
                </div>
                <br /><br />
                Select a Country:
        		<select name="Select">
        			<?=CountryDropDown()?>
        		</select>
        		
        		 <div id = "orders">
                    Visit locations in alphabetical order:
    
                    <input type="radio" name="orders" value="A-Z" />
                     A-Z
                    <input type="radio" name="orders"  value="Z-A"/>
                    Z-A
                </div>
                    
            </form>
        </div>
        
        
        
        
        
        
    <hr>
    <table width="600" border="1">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>Errors are displayed if month or number of locations are not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>Header and Subheader are displayed with info submitted. </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:#FFC0C0">
      <td>4</td>
      <td>A table with days and weeks is displayed when submitting the form</td>
      <td align="center">5</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>The number of days in the table correspond to the month selected</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>Random images are displayed in random days</td>
      <td align="center">5</td>
    </tr>       
    <tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>The number of random images correspond to the number of locations and country submitted</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>8</td>
      <td>The proper name of the location is displayed below the image 
      		(e.g. "New York", "Las Vegas")</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>9</td>
      <td>The list of months submitted along with the country and number of locations is displayed below the table (using Sessions)</td>
      <td align="center">15</td>
    </tr>    
    <tr style="background-color:#FFC0C0">
      <td>10</td>
      <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
      <td align="center">15</td>
    </tr>        
    <tr style="background-color:#FFC0C0">
      <td>11</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="background-color:#99E999">
      <td>12</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">77</td>
    </tr> 
  </tbody></table>

    </body>
</html>