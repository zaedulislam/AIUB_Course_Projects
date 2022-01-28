<?php
    // Start the session
    error_reporting(E_ERROR | E_PARSE);  //remove waring message
    session_start();
?>

<?php

    require 'connect.inc.php';

    if( !isset($_SESSION['userType']) ) ///if already logged in
    {
        header("location:teacherDashboard.php");
    }
    if(isset($_SESSION['userType'])) ///check teacher type naki
    {
        if($_SESSION['userType'] != 2) header("location:index.php");
    }


    // get the q parameter from URL
    $studentID = $_REQUEST["studentID"];
    $projectID = $_REQUEST["projectID"];
    $mark = $_REQUEST["mark"];
    ///echo $userID;

    $query = "UPDATE `project` SET `rating` = '$mark' WHERE `project`.`projectID` = $projectID;";///change rating 
   // echo $query;
    $queryRun = mysqli_query($conn, $query);

    $query = "UPDATE `project` SET `checkedByTeacher` = '1' WHERE `project`.`projectID` = $projectID;";///mark that rating has been changed
  ///  echo $query;
    $queryRun = mysqli_query($conn, $query);

    $query = "UPDATE `student` SET `totalProjects` = `totalProjects` + '1', `overallRating` = `overallRating` + '$mark' WHERE `student`.`studentID` = '$studentID';";
    ///echo $query;
    $queryRun = mysqli_query($conn, $query);
   
    mysqli_close($conn);

?>
