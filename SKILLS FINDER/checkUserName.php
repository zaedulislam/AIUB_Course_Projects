<?php
    // Start the session
    error_reporting(E_ERROR | E_PARSE);  //remove waring message
    session_start();
?>

<?php

    ////for reuseability i used teacherID her instead of student ID
    require 'connect.inc.php';

    if(!isset($_SESSION['userType'])) ///if already logged in
    {
        header("location:teacherDashboard.php");
    }
    // get the q parameter from URL
    $userID = $_REQUEST["teacherID"];
    $userID = strtolower($userID);
    ///echo $userID;

    $query = "SELECT * FROM student WHERE studentID = '$userID'";///change username to * to use in cookie
    ///echo $query;
    $queryRun = mysqli_query($conn, $query);
    $hint = mysqli_num_rows($queryRun);
    mysqli_close($conn);

    // Output "no suggestion" if no hint was found or output correct values 
    echo  $hint;

?>
