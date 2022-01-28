function dude()
{
    var teacherID = document.getElementById("teacherID").value;
    var x = 0;
    var xhttp = new XMLHttpRequest();
    
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            ///alert(this.responseText);
            if(this.responseText != 1) 
            {
                document.getElementById("teacherID").value = "";
                window.alert("Invalid User Not Found");
            }
            else  window.alert("User Found"); 
        }
        
    };
    xhttp.open("GET", "checkUserName.php?"+"teacherID="+teacherID, true); ////to resue previous code i used teacher ID instead of studentID
    xhttp.send();

}

function teacherIdCheck() 
{
    //alert("Ok");
    dude();
    
}