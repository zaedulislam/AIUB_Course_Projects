function searchUser()
{
    var info = document.getElementById("searchUserName").value;
    window.location = "showProfile.php?"+"userName="+info;
}

function searchUserByID()
{
    var dud = document.getElementById("searchUserID").value;
    ///alert("showProfileByID.php?"+"userID="+dud);
    window.location = "showProfileByID.php?"+"userID="+dud;
}

function markProject(projectID, studentID)///recieve project ID and find mark
{
    alert();
    var mark = document.getElementById("mark"+projectID).value;
    alert(mark+"  + "+studentID);
    
    if(mark != "")
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() 
        {
            if (this.readyState == 4 && this.status == 200) 
            {
                alert(this.responseText);
                window.location.reload();///reload the page to adapt the changes
            }
        };
        xmlhttp.open("GET", "giveMark.php?projectID="+projectID+"&studentID="+studentID+"&mark="+mark, true);
        xmlhttp.send();
    }
    else
    {
        alert("Give mark")
    }
}