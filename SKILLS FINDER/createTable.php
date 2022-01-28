<?php

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "mydb";

    $conn = new mysqli($serverName, $userName, $password, $dbName);

    if($conn->connect_error)
    {
        die("Connection Failed: ".$conn->connect_error)."<br>";
    }
    echo "Connected successfully"."<br>";

    $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
        )";
    
    if ($conn->query($sql) === TRUE) 
    {
        echo "Table MyGuests created successfully";
    } 
    else 
    {
        echo "Error creating table: ".$conn->error;
    }
    
    $conn->close();
?>