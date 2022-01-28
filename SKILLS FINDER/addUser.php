<?php
    // Start the session
    session_start();
?>

<?php

    require 'connect.inc.php';
    
    if(isset($_POST['submit'])) 
    {
        // Assigning values from the input form
        $userName = $_POST['userName'];
        $fullName = $_POST['fullName'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $showEmail = $_POST['showEmail'];
        $mobile = $_POST['mobileNumber'];
        $showMobileNumber = $_POST['showmobileNumber'];
        $InstituitionName = $_POST["instituitionName"];
        $userType = $_POST['accountType'];
        
        
        /* For 'student' table  */
        $query = "SELECT userName FROM student WHERE userName = '$userName'";
        $queryRun = mysqli_query($conn, $query);
        // Mysqli_num_row is counting table row
        $queryNumRowsStd = mysqli_num_rows($queryRun);
        /* For 'student' table  */


        if($queryNumRowsStd >= 1)
        {
            echo "The username ".$userName." already exists."."<br/>";
            echo "<a href=\"registration.php\">Back</a> <br/>";
        }
        else
        {
            if($userType == 'student')  $userType = 1;    
            else if($userType == 'teacher') $userType = 2;
            else $userType = 3;

            $query = "INSERT INTO student(userName, fullName, university, password, email, showEmail, phone, showPhone, userType) VALUES('$userName', '$fullName', '$InstituitionName', '$password', '$email', '$showEmail', '$mobile', '$showMobileNumber', '$userType')";
            mysqli_query($conn, $query) or die("Something went wrong.");
            echo "Registration successfully done. Click Back for login Now.";
            echo "<br/>";
            echo "<a href=\"index.php\">Back</a> <br/>";
            
        }
    }

    //close the db connection here
    mysqli_close($conn);

?>
