<?php
    // Start the session
    error_reporting(E_ERROR | E_PARSE);  
    session_start();
?>


<?php
    
    require 'connect.inc.php';
    

    // Check if the 'userName' and 'password' is set, meaning the form has been submitted
    if(isset($_POST['userName']) && isset($_POST['password']))
    {
        $userName = $_POST['userName'];
        $password = $_POST['password'];

        if(!empty($userName) && !empty($password))
        {

            /* Checking in the 'student' table, if the 'userName' exists */
            $query = "SELECT * FROM student WHERE userName = '$userName' AND password = '$password'";///change username to * to use in cookie
            $queryRun = mysqli_query($conn, $query);
            $queryNumRows = mysqli_num_rows($queryRun);

            if($queryNumRows == 1)
            {
                
                $info = mysqli_fetch_assoc($queryRun);
                
                
                $_SESSION["userName"] = $info["userName"];///assigning userName in session
                $_SESSION["userType"] = $info["userType"];///assigning userType in session
                $_SESSION["userID"] = $info["studentID"];///assigning userType in session
               
                
                if($info["userType"] == 1)header("location:studentDashboard.php");
                if($info["userType"] == 2)header("location:teacherDashboard.php");
                if($info["userType"] == 3)header("location:companyDashboard.php");
                if($info["userType"] == 4)header("location:adminDashboard.php"); 

                echo $info["userType"];

            }
            else
            {
                header("location:index.php");
            }
            /* Checking in the 'student' table, if the 'userName' exists */


            /* If the userName/Password doesn't match */
            //close the db connection here
            mysqli_close($conn);

            $_SESSION["loginError"] = 1;
            
            /* If the userName/Password doesn't match */

        }
 
    }
    else
    {
        header("location:index.php");
    }


?>

