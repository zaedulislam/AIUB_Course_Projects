<?php
    require 'connect.inc.php';
    
    session_start();
    ob_start();

    // Check if the 'username' and 'password' is set, meaning the form has been submitted
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //echo $username.' '.$password;

        if(!empty($username) && !empty($password))
        {
            //echo $username;
            $query = "SELECT username FROM users WHERE username = '$username' AND pass = '$password'";
            
            $queryRun = mysqli_query($conn, $query);

            // Mysqli_num_row is counting table row
            $queryNumRows = mysqli_num_rows($queryRun);

           // if()
            //echo "OK".' '.$queryNumRows;

            // If result matched $un and $pw, table row must be 1 row

            if($queryNumRows == 1)
            {
                // Create session for the user
                $_SESSION['un']= $username;
                
                $query = "SELECT username FROM users WHERE username = '$username' AND pass = '$password' AND type = '1'";
                $queryRun = mysqli_query($conn, $query);
                $queryNumRows = mysqli_num_rows($queryRun);

                if($queryNumRows == 1)
                    $_SESSION['typeOfUser'] = '1';
                else
                    $_SESSION['typeOfUser'] = '2';
                
                //close the db connection here
                mysqli_close($conn);

                header("location:dashboard.php");

            }
            else 
            {
                //close the db connection here
                mysqli_close($conn);

                echo "Invalid username/password Combination."; 

                //close the db connection here
                //header("location:index.php");

            }

        }
        else
            echo "mile nai";
            
    }
    
?>



<!DOCTYPE html>

<html>
    <body>
        
        <form action="" method="POST">
				
            <br> <br>
            PLEASE LOGIN TO CONTINUE

            <br> <br>
            
            Username <br>
            <input type="text" name="username" required> <br><br>

            Password <br>
            <input type="password" name="password" required><br><br>

            
            <input type="submit" value="Log in">
            
            <br><br><br><br>
            
            <p align="left"> DON'T HAVE AN ACCOUNT?</p>
            <a href = "register.php" style = "color:black">Register</a>
				
    </body>

</html>