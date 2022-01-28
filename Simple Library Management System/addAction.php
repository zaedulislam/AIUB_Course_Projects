<?php

	// Connect to db here
	require 'connect.inc.php';
	
	session_start();
	ob_start();


	if (!(isset($_SESSION['un'])))
		header("location:index.php");
        
	if (isset($_POST['submit'])) 
	{   

		$bookName = $_POST['bookName'];
		$authorName = $_POST['authorName'];
		$category = $_POST['category'];
        $isbn = $_POST['isbn'];
        
        date_default_timezone_set("Asia/Dhaka");
        $currDateTime = date("Y-m-d").' & '.date("h:i:sa");
        
        //echo $bookName.' '.$authorName;

		$flag=0;
        
        $status = "status";

		//insert data to database
        $query = "INSERT INTO books(bookname, author, isbn, category, $status, entrydate) VALUES('$bookName', '$authorName', '$isbn', '$category', '1' , '$currDateTime')";
        mysqli_query($conn, $query) or die("Something went wrong.");
        
        // Display success message
        echo "<br/>"."<br/>";
        echo "<center><h3><font color='green'> Book added successfully.</h3></center>";
        
        $space = "          ";
		echo "<center><br/><a href='dashboard.php'>View Result</a> $space||$space <a href='add.php'>Add New Book</a> $space||$space <a href='borrow.admin.php'>View Current Borrow List</a> $space||$space <a href='logout.php'>Logout</a></center>";
		
	}

	// Close db connection here
	mysqli_close($conn);


?>

