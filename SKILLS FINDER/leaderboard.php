<?php
    require 'connect.inc.php';

    if(!isset($_SESSION)) 
    { 
        error_reporting(E_ERROR | E_PARSE);  //remove waring message
        session_start(); 
    }

    if(!isset($_SESSION["userType"])) ///if not a student type user  
    {
        header("location:index.php"); /// go back to index page
    }
   
?>

<!DOCTYPE html>
<html>

    <head> 

        <title>Leaderborad</title>

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

            .home
            {
                font-family: "Segoe UI";
            }

            h2
            {
                text-align: center;
                font-family: "Segoe UI";
            }

            .pagination a 
            {
                
                display: inline-block;
                color: black;
                margin: 0 4px;
                border: 1px solid #ddd; /* Gray */
                float: left;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color .3s;
                font-family: "Segoe UI";
            }

            .pagination a.active 
            {
                background-color: dodgerblue;
                color: white;
            }

        </style>

    </head>
    
    <body>



    <a class="button" href="index.php">Home</a>
    <a class="button" href="leaderboard.php">Leaderboard</a>
    <a class="button" href="logout.php">Log out</a>
    <hr>

 

    <h2>Leaderboard </h2>

    <?php

        
        $studentID = $_GET["userID"];

        /* Pagination */
        $limit = 11;
        if(isset($_GET["page"]))
            $page = $_GET["page"];
        else
            $page = 1;

        $startFrom = ($page - 1) * $limit;

        /* Pagination */


        /* Checking in the 'project' table, if the 'teacherID' and notchecked project match */
        $query = "SELECT * FROM project ORDER BY `project`.`rating` DESC LIMIT $startFrom, $limit";///change username to * to use in cookie
        $queryRun = mysqli_query($conn, $query);
        $queryNumRows = mysqli_num_rows($queryRun);
        //echo $queryNumRows;

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
                <th>Checked Or Not</th>
                <th>Project Tags</th>
                </tr>

                <?php
                ///echo $queryNumRows."<br>";
                $i = 100;
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
                
                
                        <td> <?php echo "checked" ?> </td>
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

        <?php

            require 'connect.inc.php';

            // This is for counting the number of rows

            $query = "SELECT * FROM project WHERE checkedByTeacher = 1";
            $queryRun = mysqli_query($conn, $query);
            $queryNumRows = mysqli_num_rows($queryRun);
            //echo $queryNumRows;

            $totalPages = ceil($queryNumRows / $limit);
            //echo $totalPages;
            echo "<br>";

            for($I = 1; $I <= $totalPages; $I++)
            {
                ?>
                
                <?php
                  
                    if($_GET["page"] == $I)
                    {
                ?>
                        <div = class="pagination">
                        <a class=active href="leaderboard.php?page=<?php echo $I ?>"> <?php echo $I ?></a>
                        </div>

                <?php
                    }
                    else
                    {
                ?>
                        <div = class="pagination">
                        <a href="leaderboard.php?page=<?php echo $I ?>"> <?php echo $I ?></a>
                        </div>
                
                <?php
                    }
                ?>

                <?php
  
            }

        ?>

    

    </body>
    
</html>