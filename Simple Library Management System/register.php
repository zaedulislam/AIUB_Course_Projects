
<html>

    <body>

        <br/>

        <a href="index.php">Back</a> <br/>

        <center><h2>New User Registration</h2><hr></center>
        <form name = "form1" method = "post" action = "isValidUser.php">
            
            <table class="table table-striped table-bordered table-condensed">			
                
                <tr> 
                    <td>Username</td>
                    <td><input type="text" name="username" class="form-control" required></td>
                </tr>
                
                <tr> 
                    <td>Password</td>
                    <td><input type="password" name="password" class="form-control" required></td>
                </tr>
                
                <tr>
				    <td><input type = "radio" name="typeOfUser" value="admin"> Admin</td>
                </tr>

                <tr>
                    <td><input type = "radio" name="typeOfUser" value="general"> General</td>
                </tr>
                
                <tr>
                    <td colspan="2"><br></td>
                </tr>
                
                <tr>
                    <td colspan="2"> <input type="submit" name="submit" value="Register"></td>
                </tr>

                
				

            </table>
            
        </form>


    </body>

</html>
