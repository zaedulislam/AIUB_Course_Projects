<?php
    // Start the session
    session_start();
?>

<?php

    require 'connect.inc.php';
    
    if(isset($_POST['submit'])) 
    {
        // Assigning values from the input form
        $studentID = $_SESSION["userID"];
        $teacherID = $_POST['teacherID'];
        $gitLink = $_POST['gitLink'];
        $projectDescription   = $_POST['projectDescription'];

        
        $tags = "";
            // Loop to store and display values of individual checked checkbox.
        foreach($_POST['tagList'] as $selected)
        {
            if($tags != "") $tags = $tags.",".$selected;
            else $tags = $selected;
        }

        //echo $tags."<br>".$studentID."<br>";
        

        
        $query = "INSERT INTO `project`(`tagList`, `projectDescription`, `githubLink`, `rating`, `studentID`, `teacherID`) 
        VALUES ('$tags','$projectDescription','$gitLink','0','$studentID','$teacherID')";
        //echo $tags."<br>".$studentID."<br>";

        mysqli_query($conn, $query) or die("Something went wrong.");
        
        echo "Uploaded successfully.";
        echo "<br/>";
        echo "<a href=\"index.php\">Back</a> <br/>";
    }

    //close the db connection here
    mysqli_close($conn);

?>
