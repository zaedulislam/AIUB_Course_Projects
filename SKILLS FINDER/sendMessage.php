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
        <a class="button" href="leaderboard.php">LeaderBoard</a>
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
    
        if(isset($_POST['toUser'])) 
        {
            // Assigning values from the input form
            $toUserID = $_POST['toUser'];
            $messageBody = $_POST['messageBody'];
            $sender = $_SESSION['userID'];
            
            // Change the line below to your timezone!
            date_default_timezone_set('Asia/Dhaka');
            $date = date('m/d/Y h:i:s a', time());
            //echo $date;
            

            $query = "INSERT INTO `message`(`fromUserID`, `toUserID`, `date`, `text`) VALUES ('$sender', '$toUserID', '$date','$messageBody')";
           /// echo $query."<br>";
            mysqli_query($conn, $query) or die("Something went wrong.");

            echo "Message sent successfully"; 
            //echo "<br/>";
            //echo "<a href=\"index.php\">Back</a> <br/>";
        }

        //close the db connection here
        mysqli_close($conn);

    ?>
    
    

    
    </body>
</html>