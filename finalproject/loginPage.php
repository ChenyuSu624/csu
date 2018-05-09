<?php
    session_start();
    include 'inc/header.php';
?>

    <body>
        <div class='header'>
            <h1>Admin Login </h1>
        </div>
        <br>
        <form method="POST" action="loginProcess.php">
             <div class="container">
            Username: <input type="text" name="username"/> <br />
            <br />
            Password: <input type="password" name="password"/> <br />
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

<?php
unset($_SESSION["error"]);
include 'inc/footer.php';
?>