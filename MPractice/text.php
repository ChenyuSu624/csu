<?php
$letterArray = range("A","Z");
function lettersDropdown(){
    global $letterArray;
    foreach($letterArray as $letter){
        echo "<option value='$letter'>$letter</option>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <form>
            <strong> Select a Letter to Find:</strong>
    		<select name="letterToFind">
    			<?=lettersDropdown()?>
    		</select>
        </form>
    </body>
</html>