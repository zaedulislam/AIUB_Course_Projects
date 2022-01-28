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
        
        <title>Profile</title>
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

        </style>


    </head>
    
    <body background=A.gif>

    <?php
        
        if(isset($_SESSION))
        {
            $userID = $_SESSION["userID"];
            //echo $userID;
        }
        else
            header("location:index.php");

    ?>
    
    <a class="button" href="index.php">Home</a>
    <a class="button" href="updateProfile_fetch.php?$userID=<?php echo $userID ?>">Update</a>
    <a class="button" href="leaderboard.php">Leaderboard</a>
    <a class="button" href="logout.php">Log out</a>
    <hr>

    <?php
         
        
        if(!isset($_GET["userName"])) ///ami get method a pathaisi seesion r ta user korbo naah bcz random profile show kora lagte pare if anyonr use profile search 
        {
            header("location:index.php"); /// go back to index page
        }

            $userName = $_GET["userName"];
            $query = "SELECT * FROM student WHERE userName = '$userName'";///change username to * to use in cookie
            $queryRun = mysqli_query($conn, $query);
            $queryNumRows = mysqli_num_rows($queryRun);

            if($queryNumRows == 1)
            {
                //close the db connection here
                $info = mysqli_fetch_assoc($queryRun);
            
    ?>      
            
            <p id="userName" style="color:#81834A; font-size: 25px;"><span class="btn" style="color:darkblue; font-size: 25px;"> User Name: </span> <span class="btn"><?php echo $info['userName'] ?> </span>
            <?php echo "(ID-".$info['studentID'].")" ?>
            </p>
            
            <p id="fullName" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> Full Name: </span> <span class="btn"> <?php echo $info['fullName'] ?> </span> 
            
            <?php
                
                if($info["userType"] == 1) 
                    echo "(Student)";
                else if($info["userType"] == 2) 
                    echo "(Teacher)";    
                else if($info["userType"] == 3) 
                    echo "(Recruiter)";
                
                    
            ?> </p>
            
            <?php
        
                if($info["userType"] == 1 || $info["userType"] == 2)
                {
            ?>

                <p id="university" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> University Name:   </span> <span class="btn"><?php echo $info['university'] ?> </span></p>
            
            <?php
                }
                else
                {
            ?>


            <p id="university" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> Company Name:   </span> <span class="btn"><?php echo $info['university'] ?> </span></p>
            
            <?php
                }   
            ?>


    <?php
        
        if($info["userType"] == 1)
        {
    ?>
            <p id="overallRating" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> Over All Rating:   </span> <span class="btn"><?php echo $info['overallRating'] ?> </span></p>
            <p id="totalProjects" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> Total Projects:   </span> <span class="btn"> <?php echo $info['totalProjects'] ?> </span> </p>
    <?php
        }
    ?>
        <?php 
            if($info["showEmail"] == "yes" || $_GET["userName"] == $_SESSION["userName"]) 
            {   
        ?>
            <p id="email" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> Email:   </span> <span class="btn"> <?php echo $info['email'] ?> </span> </p>
           
            <?php 
            }
                
                if($info["showPhone"] == "yes" || $_GET["userName"] == $_SESSION["userName"]) 
                {   
            ?>
            <p id="phone" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> Phone:   </span> <span class="btn"><?php echo $info['phone'] ?> </span></p>
            

        <?php
            }  
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