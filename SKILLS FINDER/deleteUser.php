<?php

    require 'connect.inc.php';
    
    if(!isset($_SESSION)) 
    { 
        error_reporting(E_ERROR | E_PARSE);  //remove waring message
        session_start(); 
    } 
?>

<!DOCTYPE html>
<html>

    <head> 
    
    <title>Profile by ID</title>
        
        <style>
            
            .button 
            {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 6px 12px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                font-family: "Segoe UI";
            }

            pre
            {
                font-size: 15px;
                font-family: "Segoe UI";
            }

            .btn
            {
                font-family: "Segoe UI";
            }   


            p
            {
                text-align: center;
            }

            
            table, th, td 
            {
                border: 1px solid black;
                
            }

            th, td 
            {
                padding: 15px;
                font-family: "Segoe UI";
                text-align: center;
            }


        </style>

    
    
    </head>
    
    <body>

    <a class="button" href="index.php">Home</a>
    <a class="button" href="leaderboard.php">Leaderboard</a>
    <a class="button" href="logout.php">Log out</a>
    <hr>

    
    <?php
         
        
        if(!isset($_GET["userID"])) ///ami get method a pathaisi seesion r ta user korbo naah bcz random profile show kora lagte pare if anyonr use profile search 
        {
            header("location:index.php"); /// go back to index page
        }

            require 'connect.inc.php';
            $studentID = $_GET["userID"];

            /* Checking in the 'project' table, if the 'teacherID' and notchecked project match */
            $query = "DELETE FROM `student` WHERE `student`.`studentID` = $studentID";///change username to * to use in cookie

            /*
            //$queryRun = mysqli_query($conn, $query);
            //$queryNumRows = mysqli_num_rows($queryRun);

            //echo $queryNumRows."OK";
            //echo mysqli_query($conn, $query);
            */

            if(mysqli_query($conn, $query))
            {
                echo "Command successfully executed. Click Back.";
                echo "<br/>";
            }
            else
                echo "Something went wrong.";
            
            

            echo "<a href=\"index.php\">Back</a> <br/>";

            
    ?>

    </body>

</html>