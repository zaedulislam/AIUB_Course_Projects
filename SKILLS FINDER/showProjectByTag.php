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

        <style>
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

            .home
            {
                font-family: "Segoe UI";
            }

            h2
            {
                text-align: center;
                font-family: "Segoe UI";
            }

        </style>

    </head>
    
    <body>

    
    <?php

        $tags = "";
        // Loop to store and display values of individual checked checkbox.
        foreach($_POST['tagList'] as $selected)
        {
            if($tags != "") $tags = $tags.",".$selected;
            else $tags = $selected;
        }

        /* Checking in the 'project' table, if the 'teacherID' and notchecked project match */
        $query = "SELECT * FROM `project` WHERE `tagList` LIKE '%$tags%' ORDER BY `project`.`rating` DESC";
        //$query = "SELECT * FROM project ORDER BY `project`.`rating` DESC";///change username to * to use in cookie
        $queryRun = mysqli_query($conn, $query);
        $queryNumRows = mysqli_num_rows($queryRun);

        if($queryNumRows == 0)
        {
                echo '<br><br><center><h3>No Project Found!</h3></center>'.'<br/>';
                $space = "          ";
                echo "<center><a href=\"companyDashboard.php\">Back to dashboard</a>$space <a href='logout.php'>Logout</a></center>";
            
        }
        else
        {   
            
            echo '<div class="home">
                <a href="index.php">Home</a> <!returns to index.php than forwarded to dashboard>
            </div>';

            echo '<h2>Project List by Your Selected Tags</h2>';
        }



        if($queryNumRows > 0)
        {
            
    ?>

            <table id="projectTable">
                
                <tr>
                <th>Project ID</th>
                <th>Student ID</th>
                <th>Teacher ID</th>
                <th>Github Link</th>
                <th>Mark</th>
                <th>Project Tags</th>
                </tr>

                <?php
                    ///echo $queryNumRows."<br>";
                    $i = 9;
                    while($info = mysqli_fetch_assoc($queryRun)) ////needs to break table into multiple page
                    {
                        if($i == 0) break;
                        $i--;
                        $visitStudentProfile = "showProfileByID.php?userID=".$info['studentID'];
                        $visitTeacherProfile = "showProfileByID.php?userID=".$info['teacherID'];
                ?>

                <?php

                    if($info['checkedByTeacher'] == 1)
                    {
                
                ?>

                    <tr>
                        <td> <?php echo $info['projectID'] ?> </td>
                        <td> <a href=<?php echo $visitStudentProfile ?> target="_blank" > <?php echo $info['studentID'] ?> </a>  </td>
                        <td> <a href=<?php echo $visitTeacherProfile ?> target="_blank" > <?php echo $info['teacherID'] ?> </a>  </td>
                        <td> <a href=<?php echo $info['githubLink'] ?> target="_black"> <?php echo $info['githubLink'] ?> </a> </td>
                        <td> <?php echo $info['rating'] ?> </td>
                        <td> <?php echo $info['tagList'] ?> </td>
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