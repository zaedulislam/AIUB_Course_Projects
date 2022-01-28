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
                window.alert("Invalid Teacher Not Found");
            }
            else  window.alert("Teacher Found"); 
        }
    };
    xhttp.open("GET", "checkTeacherName.php?"+"teacherID="+teacherID, true);
    xhttp.send();

}

function teacherIdCheck() 
{
    ///alert("Ok");
    dude()
    
}

function gitLinkCheck() 
{
    var userName = document.getElementById("gitLink").value;
    var prin = "";
    /// window.alert(userName);

    for(var i=0; i<userName.length; i++)
    {
        if(userName.charAt(i) != ' ') prin = prin + userName.charAt(i);
    }
    document.getElementById("gitLink").value = prin;
    
}