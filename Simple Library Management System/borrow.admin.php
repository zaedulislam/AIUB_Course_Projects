<?php

    session_start();
    ob_start();

    if (!(isset($_SESSION['un'])))
        header("location:index.php");
    else 
    {
        // Connect to db here
        require_once 'connect.inc.php';

        $query = "SELECT * FROM books";
        $queryRun = mysqli_query($conn, $query);

    }

?>

<html>

    <body>

        <a href="dashboard.php">Dashboard</a>
        <a href="add.php">Add New Books</a>
        <a href="logout.php">Logout</a>
        
        <br>

        <center><h2>Borrowed Book Information</h2></center>

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
            <th>Entry Date & Time</th>
            <th>Issue Date & Time</th>
            <th>Due Date & Time</th>
            <th>User Name</th>

        </tr>

        <?php

            while($res = mysqli_fetch_array($queryRun)) 
            {
                if($res['status'] == 0)
                {
                    echo "<tr>";
                    echo "<td>".$res['bookname']."</td>";
                    echo "<td>".$res['author']."</td>";
                    echo "<td>".$res['isbn']."</td>";
                    echo "<td>".$res['category']."</td>";
                    echo "<td>".$res['entrydate']."</td>";
                    echo "<td>".$res['issuedate']."</td>";
                    echo "<td>".$res['duedate']."</td>";
                    echo "<td>".$res['username']."</td>";
                    echo "</tr>";
                }

            }

        ?>
    
        </table>

        
        <?php

            // Close db connection here
            mysqli_close($conn);

        ?>
        

    </body>

</html>
