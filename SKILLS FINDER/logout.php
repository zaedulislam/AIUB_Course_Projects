<?php
    // Start the session
    session_start();
?>

<!DOCTYPE html>
<html>
    <body>

    <?php
        // remove all session variables
        session_unset(); 
        // destroy the session 
        session_destroy(); 
        //DELETE COOKIE
        setcookie("userInfo", "", time() - (86400 * 30), "/");
       
        header("location:index.php");
    ?>

    </body>
</html>