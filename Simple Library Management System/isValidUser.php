<?php

    require 'connect.inc.php';

    if(isset($_POST['submit'])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userType = $_POST['typeOfUser'];
        
        //echo $userType;

        $query = "SELECT username FROM users WHERE username = '$username'";
        $queryRun = mysqli_query($conn, $query);

        // Mysqli_num_row is counting table row
        $queryNumRows = mysqli_num_rows($queryRun);

        if($queryNumRows == 1)
        {
            //die("Username is not available.");
            echo "The username ".$username." already exists."."<br/>";
            echo "<a href=\"register.php\">Back</a> <br/>";
        }
        else
        {
            if($userType == 'admin')
                $userType = '1';
            else
                $userType = '2';

            $query = "INSERT INTO users(username, pass, type) VALUES('$username', '$password', '$userType')";
            mysqli_query($conn, $query) or die("Something went wrong.");

            echo "Registration successfully done. Click Back for login Now.";
            echo "<br/>";
            echo "<a href=\"index.php\">Back</a> <br/>";
            
        }

    } 
    
    //close the db connection here
    mysqli_close($conn);

?>

