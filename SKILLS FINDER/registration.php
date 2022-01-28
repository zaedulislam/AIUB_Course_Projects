<?php
    // Start the session
    session_start();
?>

<?php

    if(isset($_SESSION['userType'])) ///if already logged in
    {
        if($_SESSION['userType'] == 1) header("location:studentDashboard.php");
        else if($_SESSION['userType'] == 3) header("location:companyDashboard.php");
        else header("location:teacherDashboard.php");
    }

?>

<!DOCTYPE html>

<html>

    <head>
        <title>Registration</title>
        <script src=validate.js></script>

        <style>

            .registration
            {
                width: 400px;
                margin: 50px auto;
                margin-top: 50px;
                border: 2px solid #ccc;
                border-radius: 10px;
                padding: 2px 30px 5px;
                font-family: "Segoe UI";
                
            }
            
            input[type=text],input[type=password],input[type=email] 
            {
                width: 300px;
                margin: 10px auto;
                margin-top: 2px;
                border: 1px solid #ccc;
                padding: 10px;
                padding-left: 5px;
                font-size: 16px;
                font-family: "Segoe UI";
            }

            input[type=submit]
            {
                width: 200px;
                margin: 10px auto;
                margin-bottom: 15px;
                border: 2px solid #06f;
                border-radius: 5px;
                padding: 5px;
                background-color: #009;
                color: #fff;
                cursor: pointer;
                font-size: 20px;
                font-family: "Segoe UI";
            }

            .login
            {
                text-align: right;
            }

            pre
            {

                font-size: 15px;
                font-family: "Segoe UI";
                    
            }


        </style>



    </head>

    <body>
        
    
        <div class="registration">
            
                <div class="login">

                    <a href="index.php">Log In</a>

                </div>

            <h2 align="center">Create an Account</h2>

                <form method = "post" action="addUser.php" onsubmit="return confirmInput()" style="text-align:center;">

                    
                    <pre><b>Username </b><input required type="text"  id="userName" onchange="userNameCheck()" name="userName" size = "40" placeholder="Special characters will be ignored"></pre>
                    
                    <pre><b>Fullname </b><input required type="text"  id="fullName" onchange="fullNameCheck()" name="fullName" size = "40" placeholder="Special characters or digit will be ignored"> </pre>

                    <pre><b>Password </b><input required type="password"  id="password" name="password" size = "40" placeholder="Can contains only 3 - 16 input"></pre>

                    <pre><b>Email    </b><input required type="email"  id="email" name="email" size = "40" placeholder="something@gmail.com"></pre>

                    Show Email   <input required type="radio"  id="showEmail" name="showEmail" value = "yes"> Yes <input required type="radio"  id="showEmail" name="showEmail" value = "no"> No

                    <pre><b>Phone    </b><input required type="text"  id="mobileNumber" onchange="mobileNumberCheck()" name="mobileNumber" size = "40" placeholder="only digit like(01794341690)"></pre>

                    Show Number  <input required type="radio"  id="showmobileNumber" name="showmobileNumber" value = "yes"> Yes <input required type="radio"  id="showmobileNumber" name="showmobileNumber" value = "no" >No <br> <br>


                <fieldset>

                    <b>Account type:</b>
                    <input required onchange="upInstituition('University')" type="radio"  id="accountType" name="accountType" value = "student" checked>Student
                    <input required onchange="upInstituition('University')" type="radio"  id="accountType" name="accountType" value = "teacher" >Teacher
                    <input required onchange="upInstituition('Company')" type="radio"  id="accountType" name="accountType" value = "recruiter" >Recruiter<br>

                    <br>
                    <b><span id="typeOfInstituition">University Name</span></b>  <input required type="text"  id="instituitionName" onchange="instituitionNameCheck()" name="instituitionName" size = "40" placeholder="Special characters or digit will be ignored"><br>

                </fieldset>
            
         
                <input type="submit" name="submit" value="Register" >        
                
                
            </div>

        </form>

    </body>
</html>
