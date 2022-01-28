<?php
    // Start the session
    session_start();
?>

<?php

    echo $_GET['$userID'];
    $userID = $_GET['$userID'];

?>

<!DOCTYPE html>

<html>

    <head>

        <title>Update Profile</title>

        <script src=validate.js></script>

        <style>

           
        </style>

        <script>

            function Parse(info)
            {
                //alert(info);
                var len = info.length;
                
                var userName, fullName, email, phone, S = "";
                
                var comma = 0;
                for(var I = 0; I < len; I++)
                {
                    if(info[I] == ',')
                    {
                        comma++;
                        if(comma == 1)
                            userName = S;
                        else if(comma == 2)
                            fullName = S;
                        else if(comma == 3)
                            password = S;
                        else if(comma == 4)
                            email = S;
                        else if(comma == 5)
                            phone = S;

                        S = "";
                    }
                    else
                        S += info[I];

                }

                instituitionName = S;
                
                window.location.href="updateProfile.php?userName="+userName+"&fullName="+fullName+"&password="+password+"&email="+email+"&phone="+phone+"&instituitionName="+instituitionName;
                //alert(userName + fullName + password + email + phone + instituitionName);

            }


            /*  Ajax Query */
            function FetchUserInfo()
            {
                //alert("It's checked");
                var info = "";
                var userID = <?php echo $userID ?>;
                //alert("It's checked" + " = " + userID)
               
                var xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function()
                {
                    
                    if(this.readyState == 4 && this.status == 200)
                    {
                        info = this.responseText;  
                        Parse(info);
                        //alert(info);
                    }

                }

                xhttp.open("GET", "checkUserID_Update.php?"+"userID="+userID, true);
                xhttp.send();

            }
            /*  Ajax Query */

            
        </script>
        

    </head>

        <body onload="FetchUserInfo()">
        

    </body>

</html>
