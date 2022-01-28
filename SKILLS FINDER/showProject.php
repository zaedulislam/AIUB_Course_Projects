<?php

    if(!isset($_SESSION)) 
    { 
        error_reporting(E_ERROR | E_PARSE);  //remove waring message
        session_start(); 
    } 
?>

<!DOCTYPE html>
<html>

    <head> 

        <title>Project by ID</title>
        
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


            .btn
            {
                font-family: "Segoe UI";
            }   


            p, pre
            {
                font-family: "Segoe UI";
                text-align: center;
            }

        

        </style>
    
    
    
    </head>
    
    <body background="A.gif">

    <a class="button" href="index.php">Home</a>
    <a class="button" href="leaderboard.php">Leaderboard</a>
    <a class="button" href="logout.php">Log out</a>
    <hr>

    <?php
         require 'connect.inc.php';
        
        if(!isset($_GET["projectID"])) ///ami get method a pathaisi seesion r ta user korbo naah bcz random profile show kora lagte pare if anyonr use profile search 
        {
            header("location:index.php"); /// go back to index page
        }

            $projectID = $_GET["projectID"];
            $query = "SELECT * FROM project WHERE projectID = '$projectID'";///change username to * to use in cookie
            $queryRun = mysqli_query($conn, $query);
            $queryNumRows = mysqli_num_rows($queryRun);


            if($queryNumRows == 1)
            {
                //close the db connection here
                $info = mysqli_fetch_assoc($queryRun);
                $tagList = $info['tagList'];
            
    ?>          
            <p id="projectID" style="color:#81834A; font-size: 20px;"><span style="color:darkblue; font-size: 20px;"> Project ID: </span> <?php echo $info['projectID'] ?> </p>
            <p id="studentID" style="color:#81834A; font-size: 20px;"><span style="color:darkblue; font-size: 20px;"> Student ID: </span> <?php echo $info['studentID'] ?> </p>
            <p id="teacherID" style="color:#81834A; font-size: 20px;"><span style="color:darkblue; font-size: 20px;"> Teacher ID: </span> <?php echo $info['teacherID'] ?> </p>
           
            <p id="teacherID" style="color:#81834A; font-size: 20px;"><span style="color:darkblue; font-size: 20px;"> Github Link: </span>
            <a href=<?php echo $info['githubLink'] ?> > <?php echo $info['githubLink'] ?> </a> </p>
            
            <p id="rating" style="color:#81834A; font-size: 20px;"><span style="color:darkblue; font-size: 20px;"> Rating: </span> <?php echo $info['rating'] ?> </p>
            <pre id="projectDescription" style="color:#81834A; font-size: 20px;"><span style="color:darkblue; font-size: 20px;">Project Description: </span> <?php echo $info['projectDescription'] ?> </pre>
            <p id="tagList" style="color:#81834A; font-size: 20px;"><span style="color:darkblue; font-size: 20px;"> Project Tags: </span> <?php echo $info['tagList'] ?> </p>
          
        <?php 
                mysqli_close($conn);
            }
            else
            {
        ?>

            <center> <img src="404.jpg" alt="404 page is not found" height="550" width="1350"> </center>

        <?php
                
            }
        ?>

    

    </body>
</html>