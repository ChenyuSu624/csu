<?php
    session_start();
    include 'inc/functions.php';
    include 'inc/header.php';
?>

    <body>
        <h1>Firearm Information</h1>
        <div id="box">
            <?php displayInfo(); ?>
        </div>
    </body>
    
    <?php
    include 'inc/footer.php';
?>