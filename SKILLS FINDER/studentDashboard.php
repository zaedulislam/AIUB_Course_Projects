<?php
    // Start the session
    session_start();
    require 'connect.inc.php';
?>

<!DOCTYPE html>
<html>

    <head> 

        <title>Student Dashboard</title>

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
            
            h1
            {
                text-align: center;
                font-family: "Segoe UI";
            }
            
            .text
            {
                font-size: 20px;
                font-family: "Segoe UI";
            }

            .btn
            {
                font-family: "Segoe UI";
            }

            .or
            {
                font-size: 15px;
                font-family: "Segoe UI";
            }


        </style>

        <script>

            function searchUser()
            {
                var infoUser = document.getElementById("searchUserName").value;
                if(infoUser == "") alert("Fill the search bar");
                if(infoUser != "") window.location = "showProfile.php?"+"userName="+infoUser;
            }

            function searchUserByID()
            {
                var dud = document.getElementById("searchUserID").value;
                if(dud == "") alert("Fill the search bar");
                if(dud != "") window.location = "showProfileByID.php?"+"userID="+dud;
            }
        
            function searchProject()
            {
                var info = document.getElementById("projectID").value;
                if(info == "") alert("Fill the search bar");
                if(info != "") window.location = "showProject.php?"+"projectID="+info;
            }
        </script>

    </head>

    <body onload="myFunction()"> <!call on loading time>

    <script type="text/javascript">///way of writing php in js kind of ajax query

        function myFunction() 
        {
            var jojo ='<?php echo $_SESSION["userName"]; ?>';
            ///alert(jojo);
            document.getElementById("userName").innerHTML = jojo;
        }

    </script>

    

    <?php
        
        if(!isset($_SESSION["userType"]) || $_SESSION["userType"] != 1) ///if not a student type user  
        {
            header("location:index.php"); /// go back to index page
        }
        else
        {
            error_reporting(E_ERROR | E_PARSE);///remove waring message
            $getInfo = "showProfile.php?"."userName=".$_SESSION["userName"]; ///in case we need too show profile
            $getUp = "uploadProject.php";
           /// echo $getInfo;
        }
    ?>

    <h1 style="color:darkblue"> <b> SKILLS FINDER <b> </h1><br>
    
    
    
    
    <tr>
    <th><a class="button" href=<?php echo $getInfo ?>> <span  id="userName"> Profile Name  will be assign on loading time <span> </a></th> <!forwarding userName to showprofile.php using get method>
    <th><a class="button" href=<?php echo $getUp ?>>Upload Project</a></th> <! going to upload a project >
    </tr> 

    <a class="button" href="myMessage.php">My Message</a>
    <a class="button" href="message.php">Send Message</a>
    <a class="button" href="leaderboard.php">Leaderboard</a>
    <a class="button" href="logout.php">Log Out</a>
    <hr>

    <span class="text"> Seach User </span> <br><br>
    <button class="btn" onclick="searchUser()">Search</button> 
    <input class="btn" type="text" id="searchUserName" placeholder="Search using User Name">
    
    <span class="or"> or </span>
    
    <button class="btn" onclick="searchUserByID()">Search</button> 
    <input class="btn" type="text" id="searchUserID" placeholder="Search using User ID"> <br><br><br><br>
    
    
    <span class="text"> Seach Project </span> <br><br>
    <button class="btn" onclick="searchProject()">Search</button> 
    <input class="btn" type="text" id="projectID" placeholder="Search using ProjectID"> <br><br>


    <span class="or"> or </span>
        
        <form method = "POST" action="showProjectByTag.php" id="nigga" >


            <br><span class="or"><b>Select Tag:</b></span><br>
            
            <?php

                $query = "SELECT * FROM `tag`"; /// Finds all tag
                $queryRun = mysqli_query($conn, $query);
                $queryNumRows = mysqli_num_rows($queryRun);

                

                while( $info = mysqli_fetch_assoc($queryRun)) /// Showing all tags in checkbox
                {
            ?>

            <input type="checkbox" name="tagList[]" value="<?php echo $info["tagName"]?>"><label class="btn"><?php echo $info["tagName"]?></label><br/>

            <?php
                /// echo $info["tagName"]."<br>";
                }

            ?>

            <br>
            <input class="btn" type="submit" name="submit" value="Search" >            


        </form>
    

    <br>
    <center><h1 style="color:darkblue"> <b> My Project <b> </h1></center>


    <?php

        
        $studentID = $_SESSION["userID"];

        /* Checking in the 'project' table, if the 'teacherID' and notchecked project match */
        $query = "SELECT * FROM project WHERE studentID = '$studentID' ORDER BY `project`.`rating` DESC";///change username to * to use in cookie
        $queryRun = mysqli_query($conn, $query);
        $queryNumRows = mysqli_num_rows($queryRun);
        ?>

    <table id="projectTable">
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
            $visitTeacherProfile = "showProfileByID.php?userID=".$info['teacherID'];
        ?>
            <tr>
                <td> <?php echo $info['projectID'] ?> </td>
                <td> <a href=<?php echo $visitTeacherProfile ?> target="_blank" > <?php echo $info['teacherID'] ?> </a>  </td>
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

    </body>
</html>