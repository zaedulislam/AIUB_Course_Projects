<?php
    // Start the session
    session_start();
    require 'connect.inc.php';
?>


<!DOCTYPE html>
<html>

    <head> 

        <title>Admin Dashboard</title>

        <! CSS starts Here >
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

            input[type=checkbox]
            {
               
                font-family: "Segoe UI";
            }

   

        </style>
        <! CSS Ends Here >
        
        
        <! JavaScripts starts Here >

        <! Way of writing PHP in JS. Kind of AJAX query>
        <body onload="myFunction()"> <!call on loading time>

        <script>

            function myFunction() 
            {
                var jojo ='<?php echo $_SESSION["userName"]; ?>';
                ///alert(jojo);
                document.getElementById("userName").innerHTML = jojo;
            }

        </script>
        <! JavaScripts ends Here >
        
        
        <! JavaScripts starts Here >
        <script src='search.js'></script>
        <script> 
        
            function searchProject()
            {
                var info = document.getElementById("projectID").value;
                window.location = "showProject.php?"+"projectID="+info;
            }

            function deleteUserByID()
            {
                var info = document.getElementById("deleteUserID").value;
                window.location = "deleteUser.php?"+"userID="+info;
            }

        </script>
        <! JavaScripts ends Here >


    </head>


    <body>
        
        <h1 style="color:darkblue"> <b> SKILLS FINDER <b> </h1>

        <! PHP starts Here >
        <?php
        
            if(!isset($_SESSION["userType"])) /// If the session is not set
            {
                header("location:index.php"); /// Go back to index.php page
            }
            else
            {
                error_reporting(E_ERROR | E_PARSE); /// Removes waring message
                $getInfo = "showProfile.php?"."userName=".$_SESSION["userName"]; /// In case we need too show profile
                $getUp = "uploadProject.php";
                /// echo $getInfo;

            }

        ?>
        <! PHP ends Here >



        <!forwarding 'userName' to showprofile.php using GET method>
        <tr>
            <th><a class="button" href=<?php echo $getInfo ?>> <span  id="userName"> Profile Name  will be assign on loading time </span> </a></th> 
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
        
        <span class="text"> Delete User </span> <br><br>
        <button class="btn" onclick="deleteUserByID()">Delete</button> 
        <input class="btn" type="text" id="deleteUserID" placeholder="Delete using User ID"> <br><br><br><br>
        
        
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

            <input type="checkbox" name="tagList[]" value="<?php echo $info["tagName"]?>"><label class="btn" ><?php echo $info["tagName"]?></label><br/>

            <?php
                /// echo $info["tagName"]."<br>";
                }

            ?>

            <br>
            <input class="btn" type="submit" name="submit" value="Search" >            


        </form>

        
 

    </body>
        

</html>