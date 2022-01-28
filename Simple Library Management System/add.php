<?php

    session_start();
    ob_start();


    // Connect to db here
    require 'connect.inc.php';

    if (!(isset($_SESSION['un'])))
        header("location:index.php");
 
?>


<html>

    <body>

        <br>
        <a href="dashboard.php">Dashboard</a>
        <a href="search.php?search="><span class="btn btn-success">Search</span></a>
        <a href="logout.php">Logout</a>

        <br/><br/>

        <center><h2>Add New Book</h2><hr></center>
        <form name = "form1" method = "post" action = "addAction.php">
            
            <table>			
                
                <tr> 
                    <td>Book Name</td>
                    <td><input type="text" name="bookName" required></td>

                </tr>
                
                <tr> 
                    <td>Author Name</td>
                    <td><input type="text" name="authorName" required></td>

                </tr>
                
                <tr> 
                    <td>Category</td>
                    <td><input type="text" name="category" required></td>

                </tr>

                <tr> 
                    <td>ISBN</td>
                    <td><input type="text" name="isbn" required></td>

                </tr>

                <tr>
                    <td colspan="2"><br></td>

                </tr>
                
                <tr> 
                    <td colspan="2"> <input type="submit" name="submit" value="Save Details"></td>

                </tr>

                 <tr> 
                    <td><input type="reset" name="reset" value="Reset Details"></td>

                </tr>
                    


            </table>
            
        </form>



        <?php

            // Close db connection here
            mysqli_close($conn);
        ?>

    </body>

</html>

