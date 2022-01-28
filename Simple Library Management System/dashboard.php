<?php

    session_start();
    ob_start();

    if (!(isset($_SESSION['un'])))
        header("location:index.php");
    else 
    {
        // Connect to db here
        require_once 'connect.inc.php';
        
        
        // Fetching data in descending order (lastest entry first)
        //$limit = 25;  
        //if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
        //$start_from = ($page-1) * $limit;  
        
        //$sql = "SELECT * FROM books where deleted_at is NULL order by booking_id DESC LIMIT $start_from, $limit"; 
        //$rs_result = mysqli_query ($conn,$sql);

        $query = "SELECT * FROM books";
        $queryRun = mysqli_query($conn, $query);


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

        <center><h1>Book Information</h1></center>
        
        
        <?php
        
            if(isset($_SESSION['un']) && $_SESSION['typeOfUser'] == '1')
            {
                if($cnt > 0)
                    echo "<center><h4>Notice: $cnt books must be returned to the library by today.</h4></center>";
            }
            

        ?>

        <form method="GET" action="search.php">
            <input type="text" name="search" placeholder="Book Name"/>
            <input type="submit" value="Search"/>
        </form>


        <table>
            
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

            $query = "SELECT * FROM books";
            $queryRun = mysqli_query($conn, $query);

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
            /*
            $sql = "SELECT COUNT(id) FROM info";  
            $rs_result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];  
            $total_pages = ceil($total_records / $limit);  
            $pagLink = "<ul class='pagination pagination-lg'>";
            for ($i=1; $i<=$total_pages; $i++) {  
                    $pagLink .= "<li class='page-item'><a href='admin.php?page=".$i."'>".$i."</a></li>";
                };  
            echo $pagLink . "</ul>";
            */
            
            // Close db connection here
            mysqli_close($conn);

        ?>
        

    </body>

</html>
