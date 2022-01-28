<?php
    // Start the session
    session_start();
?>

<?php
    
    if(isset($_SESSION['userType'])) ///if already logged in
    {
        if($_SESSION['userType'] == 1) header("location:studentDashboard.php");
        else if($_SESSION['userType'] == 2) header("location:teacherDashboard.php");
        else if($_SESSION['userType'] == 4) header("location:adminDashboard.php");
        else header("location:companyDashboard.php");
    }

?>

<!DOCTYPE html>

<html>

    <head>
        
        <title>Log In</title>

        <style>


            .login
            {
                width: 300px;
                margin: 50px auto;
                margin-top: 78px;
                border: 2px solid #ccc;
                border-radius: 10px;
                padding: 10px 40px 25px;
                font-family: "Segoe UI";
                
            }

            input[type=text],input[type=password] 
            {
                width: 250px;
                margin: 10px auto;
                margin-top: 10px;
                border: 1px solid #ccc;
                padding: 10px;
                padding-left: 5px;
                font-size: 16px;
                font-family: "Segoe UI";
            }
            
            
            input[type=submit]
            {
                width: 268px;
                margin: 10px auto;
                margin-bottom: 15px;
                border: 2px solid #06f;
                border-radius: 5px;
                padding: 10px;
                background-color: #009;
                color: #fff;
                cursor: pointer;
                font-size: 20px;
                font-family: "Segoe UI";
            }
            
            .signup
            {
                text-align: center;
            }
            

        </style>

    </head>

    <body>

        
        <div class="login">
            
            <h1 align="center">Log In </h1>

            <form method = "post" action="isValidUser.php" style="text-align : center;">

                <div style="color:red">

                    <?php

                        if(isset($_SESSION["loginError"]))
                        {
                            if($_SESSION["loginError"] == 1) echo "*Invalid Username/Password combination"."<br>";
                            $_SESSION["loginError"] = ""; 
                            // Remove all session variables
                            // Delete Cookie
                        }
                    ?>

                </div>

                <input type="text" name="userName" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Log In"><br><br>

                

            </form>
            

            <br>
            <div class="signup">

                Don't have an account?
                <a href="registration.php">Sign Up</a>

            </div>

        </div>

    </body>

</html>
