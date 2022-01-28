<?php

    require 'connect.inc.php';

    error_reporting(E_ERROR | E_PARSE);  //remove waring message
    session_start(); 
?>

<!DOCTYPE html>
<html>

    <head> 

    <title>Upload Project</title>

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

            .or
            {
                font-size: 15px;
                font-family: "Segoe UI";
            }
            

        </style>
    
    <script src="projectValidate.js"> </script>

    </head>
    
    <body>

    <a class="button" href="index.php">Home</a>
    <a class="button" href="leaderboard.php">Leaderboard</a>
    <a class="button" href="logout.php">Log Out</a>
    <hr>

    <?php

        if(!isset($_SESSION["userName"])) ///ami get method a pathaisi seesion r ta user korbo naah bcz random profile r jonno 
        {
            header("location:index.php"); /// go back to index page
        }
        if($_SESSION["userType"] != 1) ///ami get method a pathaisi seesion r ta user korbo naah bcz random profile r jonno 
        {
            header("location:index.php"); /// go back to index page
        }

    ?>
    
    <div>
    <form method = "post" action="addproject.php" id="nigga" >


                <pre><b>TeacherID    :</b><!used ajax query to check teacher name ase naki> <input class="btn" required type="number"  id="teacherID" onchange="teacherIdCheck()" name="teacherID"  placeholder="Enter teacherId"> </pre>
            
                <pre><b>Github Link  :</b><input class="btn" required type="text"  id="gitLink" onchange="gitLinkCheck()" name="gitLink" size = "40" placeholder="Place link here"> <span style="color:blue;"> <b> *Spaces will be ignored </b> </span></pre>
                
                <br><span class="or"><b>Select Tag:</b></span><br>
                    
                    
                    <?php

                        $query = "SELECT * FROM `tag` WHERE 1";///find all tag
                        $queryRun = mysqli_query($conn, $query);
                        $queryNumRows = mysqli_num_rows($queryRun);

                        

                        while( $info = mysqli_fetch_assoc($queryRun)) ///showing all tags in checkbox
                        {
                    ?>
                            <input type="checkbox" name="tagList[]" value="<?php echo $info["tagName"]?>"><label class="btn"><?php echo $info["tagName"]?></label><br/>
  
                    <?php
                           /// echo $info["tagName"]."<br>";
                        }

                    ?>
                    
                    <br><span class="or"><b>Project Description:</b></span><br>
                    <textarea form="nigga" name="projectDescription" style="margin: 0px; width: 688px; height: 244px;">Enter text here...</textarea><br>

 
                    <input class="btn" type="submit" name="submit" value="Upload" >        
             


        </form>
    </div>

    

    </body>
</html>