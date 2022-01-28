<?php

    session_start();
    ob_start();

    if (!(isset($_SESSION['un'])))
        header("location:index.php");
    else 
    {
        // Connect to db here
        require_once 'connect.inc.php';
        

        $bookName = $_GET['search'];
        //echo $bookName."HERE";

        $query = "SELECT * FROM books WHERE bookname = '$bookName'";
        $queryRun = mysqli_query($conn, $query);
        $queryNumRows = mysqli_num_rows($queryRun);
        
        //echo $queryNumRows;

        date_default_timezone_set("Asia/Dhaka");
        $currDate = date("Y-m-d");

        $cnt = 0;
        while($res = mysqli_fetch_array($queryRun)) 
        {
            $dueDate = $res['duedate'];
            
            if($currDate == $dueDate)
                $cnt++;
            
        }


    }

?>



<html>

    <body>

        <a href="dashboard.php">Dashboard</a>

        <?php
            if(isset($_SESSION['un']) && $_SESSION['typeOfUser'] == '1')
            {
                $space = "          ";
                echo '<a href="add.php">Add New Books</a>';
                echo $space.'<a href="borrow.admin.php">View Current Borrow List</a>';
            
            }

        ?>
        
        <a href="logout.php">Logout</a>


        <br>

        <center><h2>Search Results</h2></center>
        
        
        <?php
        
            if(isset($_SESSION['un']) && $_SESSION['typeOfUser'] == '1')
            {
                if($cnt > 0)
                    echo "<center><h4>Notice: $cnt books must be returned to the library by today.</h4></center>";
            }
            

        ?>
        
            
        <style>
            table, th, td 
            {
                border: 1px solid black;
                border-collapse: collapse;
            }

            th, td 
            {
                padding: 15px;
            }

            th 
            {
                text-align: center;
            }

            td 
            {
                text-align: center;
            }

        </style>

        <table>

        <tr>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>ISBN</th>
            <th>Category</th>
            <th>Status</th>
            <th>Entry Date & Time</th>
            <th>Issue Date & Time</th>
            <th>Due Date & Time</th>
            <th>User Name</th>
            <th>Action</th>
        </tr>

        <?php

            $query = "SELECT * FROM books WHERE bookname = '$bookName'";
            $queryRun = mysqli_query($conn, $query);
            $queryNumRows = mysqli_num_rows($queryRun);

            while($res = mysqli_fetch_array($queryRun)) 
            {

                echo "<tr>";
                echo "<td>".$res['bookname']."</td>";
                echo "<td>".$res['author']."</td>";
                echo "<td>".$res['isbn']."</td>";
                echo "<td>".$res['category']."</td>";

                if($res['status'] == 0)
                    echo "<td>"."Not available now"."</td>";
                else
                    echo "<td>"."Available"."</td>";
                
                echo "<td>".$res['entrydate']."</td>";
                
                if($res['issuedate'] == NULL)
                    echo "<td>"."NA"."</td>";
                else
                    echo "<td>".$res['issuedate']."</td>";
                
                if($res['duedate'] == NULL)
                    echo "<td>"."NA"."</td>";
                else
                    echo "<td>".$res['duedate']."</td>";

                if($res['issuedate'] == NULL)
                    echo "<td>"."NA"."</td>";
                else
                    echo "<td>".$res['username']."</td>";
                
                if($res['status'] == 0)
                    echo "<td>"."Not possible right now"."</td>";
                else
                {
                    
                    echo "<td><a href=\"borrow.php?id=$res[id]\">Borrow</a></td>";
                }
                
                echo "</tr>";
                
                //echo "<td><a href=./".$res['file_link']." target='_blank'><span class='glyphicon glyphicon-paperclip'></span></a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><span class='glyphicon glyphicon-remove-circle'></span></a></td>";
            }

        ?>
    
        </table>

        
        <?php

            // Close db connection here
            mysqli_close($conn);

        ?>
        

    </body>

</html>
