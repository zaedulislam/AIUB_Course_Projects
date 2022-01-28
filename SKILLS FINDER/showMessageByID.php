<?php
    // Start the session
    session_start();
?>

<!DOCTYPE html>
<html>

    <head> 

        <style>

            body 
            {
                background-image: url("dashboard.jpg");
                
            }

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

            #projectTable {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #projectTable td, #projectTable th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #projectTable tr:nth-child(even){background-color: #f2f2f2;}

            #projectTable tr:hover {background-color: #ddd;}

            #projectTable th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
            
        </style>

        <script src="userValidate.js"> </script>

    </head>

    <body>

    <a class="button" href="index.php">Home</a>
    <a class="button" href="leaderboard.php">Leaderboard</a>
    <a class="button" href="logout.php">Log out</a>

    <br><hr>

    <?php
        
        if(!isset($_SESSION["userType"])) ///if not a student type user  
        {
            header("location:index.php"); /// go back to index page
        }
        else
        {
            error_reporting(E_ERROR | E_PARSE);///remove waring message
            $usedID = $_SESSION["usedID"]; ///in case we need too show profile
        }

        require 'connect.inc.php';
    
        if(isset($_GET['textID'])) 
        {
            $textID = $_GET['textID'];
            $query = "SELECT * FROM `message` WHERE `textID` = '$textID' ";
            /// echo $query."<br>";
            $queryRun = mysqli_query($conn, $query);
            $queryNumRows = mysqli_num_rows($queryRun);
   
           if($queryNumRows > 0)
           {
                $info = mysqli_fetch_assoc($queryRun);
                echo "SENDER  :"."      ".$info['fromUserID']."<br>";
                echo "TO  :"."      ".$info['toUserID']."<br>";
                echo "Message  :"."      ".$info['text']."<br>";
                echo "Date  :"."      ".$info['date']."<br>";
           }
        }

        //close the db connection here
        mysqli_close($conn);

    ?>
    
    

    
    </body>
</html>