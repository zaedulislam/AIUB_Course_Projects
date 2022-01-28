
<?php

    // This file connects to the database 
    // and will be 'declared' or 'required' at the top of everywhere it's needed to connect  
    

    // Default settings
    $host = 'localhost';
    $user = 'root'; 
    $pass = '';

    // The database that is going to be connected
    $db = 'skills_finder';

    // Create connection
    $conn = @mysqli_connect($host, $user, $pass);

    // Check connection
    if (!$conn || !mysqli_select_db($conn, $db))
    {
        // If any of these is unsuccessful, the page will be killed and the specified error will be shown
        die("Connection failed");
    }
    //else
       // echo "Connected";


?>
