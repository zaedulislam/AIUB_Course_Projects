<?php

    // Connect to db here
    require 'connect.inc.php';

    session_start();
    ob_start();

    if (!(isset($_SESSION['un'])))
        header("location:index.php");
    else
    {
        
        $id = $_GET['id'];
        //echo "ID = ".$id;

        $query = "SELECT * FROM books WHERE id = '$id'";
        $queryRun = mysqli_query($conn, $query);

        // Mysqli_num_row is counting table row
        $queryNumRows = mysqli_num_rows($queryRun);
        //echo $queryNumRows;

        if($queryNumRows == 1)
        {
            date_default_timezone_set("Asia/Dhaka");
            //echo date("Y-m-d").' '.date("h:i:sa")."<br/>";
            
            $issueDateTime = date("Y-m-d").' & '.date("h:i:sa");
            //echo $issueDateTime."<br/>";

            $dt = date("Y-m-d");
            $dueDate = date( "Y-m-d", strtotime( "$dt +7 day" ) );
            
            
            $username = $_SESSION['un'];
            //echo $username;

            $status = "status";
            $query = "UPDATE books SET $status = '0', issuedate = '$issueDateTime', duedate = '$dueDate', username = '$username' WHERE id = '$id'";
                      
            $queryRun = mysqli_query($conn, $query);
            
            if($queryRun)
            {
                echo '<br/>'.'<br/>';
                echo '<center><h3>Successfully borrowed.</h3></center>'.'<br/>';
                echo '<center>You have to return this book within '.$dueDate.'</center>'.'<br/>';
                $space = "          ";
                echo "<center><a href=\"dashboard.php\">Back to dashboard</a>$space <a href='logout.php'>Logout</a></center>";

            }

        }
        
    }
    
?>