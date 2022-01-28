<?php
    // Start the session
    session_start();
    require 'connect.inc.php';
?>

<?php


    if(isset($_POST['submit'])) 
    {
        
        // Assigning values from the input form
        $userID = $_SESSION['userID'];

        $fullName = $_POST['fullName'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $showEmail = $_POST['showEmail'];
        $mobile = $_POST['mobileNumber'];
        $showMobileNumber = $_POST['showmobileNumber'];
        $InstituitionName = $_POST["instituitionName"];
        
    
        $query = "UPDATE `student` SET `fullName` = '$fullName', `university` = ' $InstituitionName', 
        `password` = '$password', `email` = '$email', `showEmail` = ' $showEmail', 
        `phone` = '$mobile', `showPhone` = '$showMobileNumber' WHERE `student`.`studentID` =  $userID;";

        mysqli_query($conn, $query) or die("Something went wrong.");
        echo "Profile successfully updated. Click Back to return to home page";
        echo "<br/>";
        echo "<a href=\"index.php\">Back</a> <br/>";
    }

    //close the db connection here
    mysqli_close($conn);

?>
