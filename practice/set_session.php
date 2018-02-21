<?php
    session_start();  //starts or resume a session
    $_SESSION['course'] = "CST336 Internet Programming";
?>


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?= $SESSION['course']?>
    </body>
</html>