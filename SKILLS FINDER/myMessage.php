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

        <title>My Messages</title>

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

            h2
            {
                text-align: center;
                font-family: "Segoe UI";
            }

        </style>

    </head>
    
    <body>

    <a class="button" href="index.php">Home</a>
    <a class="button" href="leaderboard.php">Leaderboard</a>
    <a class="button" href="logout.php">Log out</a>
    <hr>
    
    <h2> All Messages </h2>
    
    <?php
        require 'connect.inc.php';
        if(!isset($_SESSION["userID"])) ///if not a student type user  
        {
            header("location:index.php"); /// go back to index page
        }
        $studentID = $_SESSION["userID"];
        /* Checking in the 'project' table, if the 'teacherID' and notchecked project match */
        $query = "SELECT * FROM `message` WHERE `fromUserID` = '$studentID' OR  `toUserID` = '$studentID'";///change username to * to use in cookie
        $queryRun = mysqli_query($conn, $query);
        $queryNumRows = mysqli_num_rows($queryRun);
        if($queryNumRows > 0)
        {
    ?>

            <table id="projectTable">

            <tr>
                <th>From ID</th>
                <th>To ID</th>
                <th>Message</th>
                <th>Date</th>
            </tr>

            <?php
                ///echo $queryNumRows."<br>";
                $i = 100;
                while($info = mysqli_fetch_assoc($queryRun)) ////needs to break table into multiple page
                {
                    if($i == 0) break;
                    $i--;
                    $fromUserID = "showProfileByID.php?userID=".$info['fromUserID'];
                    $toUserID = "showProfileByID.php?userID=".$info['toUserID'];
                    $textID = "showMessageByID.php?textID=".$info['textID'];
                    $message = $info['text'];
                    if(strlen($message) <= 10);
                    else
                    {
                        $message = substr($message, 0, 10) . '...';
                    }
                    
            ?>
                    <tr>
                        <td> <a href=<?php echo $fromUserID ?> > <?php echo $info['fromUserID'] ?> </a></td>
                        <td> <a href=<?php echo $toUserID ?> > <?php echo $info['toUserID'] ?> </a></td>
                        <td> <a href=<?php echo $textID ?> > <?php echo $message ?> </a></td>
                        <td> <?php echo $info['date'] ?> </td>
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