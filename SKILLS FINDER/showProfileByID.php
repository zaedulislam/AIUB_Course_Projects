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

            $userID = $_GET["userID"];
            $query = "SELECT * FROM student WHERE studentID = '$userID'";///change username to * to use in cookie
            $queryRun = mysqli_query($conn, $query);
            $queryNumRows = mysqli_num_rows($queryRun);
            ///echo $query;

            if($queryNumRows == 1)
            {
                //close the db connection here
                $info = mysqli_fetch_assoc($queryRun);
            
    ?>          
            <p id="userName" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> User Name: </span> <span class="btn"><?php echo $info['userName'] ?> </span>
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
            <p id="university" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> University Name:   </span> <span class="btn"> <?php echo $info['university'] ?> </span>
            </p>

    <?php
        
        if($info["userType"] == 1)
        {
    ?>
            <p id="overallRating" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> Over All Rating:   </span> <span class="btn"> <?php echo $info['overallRating'] ?></span> </p>
            <p id="totalProjects" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> Total Projects:   </span> <span class="btn"> <?php echo $info['totalProjects'] ?> </span> </p>
    <?php
        }
    ?>
        <?php 
            if($info["showEmail"] == "yes" || $_GET["userName"] == $_SESSION["userName"]) 
            {   
        ?>
            <p id="email" style="color:#81834A; font-size: 20px;"><span class="btn" style="color:darkblue; font-size: 25px;"> Email:   </span> <span class="btn"><?php echo $info['email'] ?> </span></p>
        
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

            <center> <img src="404.jpg" alt="404 page is not found" height="470" width="1300"> </center>

        <?php
                
            }
        ?>
        

        <br><br><br><br><br><br>
        <?php

            require 'connect.inc.php';
            $studentID = $_GET["userID"];

            /* Checking in the 'project' table, if the 'teacherID' and notchecked project match */
            $query = "SELECT * FROM project WHERE studentID = '$studentID' ORDER BY `project`.`rating` DESC";///change username to * to use in cookie
            $queryRun = mysqli_query($conn, $query);
            $queryNumRows = mysqli_num_rows($queryRun);

            if($queryNumRows > 0)
            {
                ?>

                <table align="center" id="projectTable">
                <tr>
                    <th>Project ID</th>
                    <th>Teacher ID</th>
                    <th>Github Link</th>
                    <th>Mark</th>
                    <th>Checked Or Not</th>
                    </tr>

                    <?php
                    ///echo $queryNumRows."<br>";
                    $i = 10;
                    while($info = mysqli_fetch_assoc($queryRun)) ////needs to break table into multiple page
                    {
                        if($i == 0) break;
                        $i--;
                    ?>
                        <tr>
                            <td> <?php echo $info['projectID'] ?> </td>
                            <td> <?php echo $info['teacherID'] ?> </td>
                            <td> <a href=<?php echo $info['githubLink'] ?> target="_black"> <?php echo $info['githubLink'] ?> </a> </td>
                            <td> <?php echo $info['rating'] ?> </td>
                    <?php
                        if($info['checkedByTeacher'] == 1)
                        {
                    ?>
                            <td> <?php echo "Checked" ?> </td>
                    <?php
                        }
                    ?>
                    <?php
                        if($info['checkedByTeacher'] == 0)
                        {
                    ?>
                            <td> <?php echo "Not Checked" ?> </td>
                    <?php
                        }
                    ?>

                        </tr> 


                    <?php       

                    }
                    mysqli_close($conn);

                    ?>
                    </table>
            <?php
            }
            ?>

    </body>

</html>