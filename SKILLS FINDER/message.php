<?php
    // Start the session
    session_start();
?>

<!DOCTYPE html>
<html>

    <head> 

        <title>Send Message</title>

        <style>
            body 
            {
                
                
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

            pre
            {

                font-size: 15px;
                font-family: "Segoe UI";
            }

            .btn
            {
                font-family: "Segoe UI";
            }

        </style>

        <script src="userValidate.js"> </script>

    </head>

    <body>

    
    <a class="button" href="index.php">Home</a>
    <a class="button" href="leaderboard.php">Leaderboard</a>
    <a class="button" href="logout.php">Log out</a>
    <hr>
    

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
    ?>
    
    <form action="sendMessage.php" method="POST" id="nigga" >

        <br>
        <pre><b>To:  </b><input class="btn" required type="number"  id="teacherID" onchange="teacherIdCheck()" name="toUser"  placeholder="Enter userID"><br><!to resue previous code of projectValidate i used teacherID></pre>
   
        <pre><b>Message:</b><br><textarea required form="nigga" name="messageBody" style="margin: 0px; width: 688px; height: 244px;">Enter text here...</textarea></pre>
        
        <input class="btn" type="Submit" value="Send">

    </form>

    
    </body>
</html>