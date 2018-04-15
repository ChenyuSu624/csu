<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
        <title> Admin Login </title>
    </head>
    <body>
        <div class='header'>
            <h1> OtterMart - Admin Login </h1>
        </div>
        <br> <br >
        
        <form method="POST" action="loginProcess.php">
             <div class="container">
            Username: <input type="text" name="username"/> <br />
            <br />
            Password:  <input type="password" name="password"/> <br />
            <br />
            <br />
            <input type="submit" name="submitForm" value="Login!" />
            </div>
            <?php
            if(isset($_SESSION["error"])){
                $error = $_SESSION["error"];
                echo "<hr>";
                echo "<strong><span>$error</span></strong>";
            }
            ?> 
        </form>

    </body>
    
    <hr>
    <div id="foot">
        <footer>
            <br /><strong>CST336 Internet Programming. By: Chenyu Su</strong><br />
            <strong>DISCLAIMER: The information in this webpage is fictitious. <br />
            It is used for academic purposes only.</strong>
            <br /><img id="otter" src="img/otter.png" alt="CSUMB Logo" />
        </footer>
    </div>
</html>
<?php
unset($_SESSION["error"]);
?>