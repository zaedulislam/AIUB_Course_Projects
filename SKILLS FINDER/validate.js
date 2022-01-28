function userNameCheck() 
{
    var userName = document.getElementById("userName").value;
    var prin = "";
    // window.alert(userName);

    for(var i=0; i<userName.length; i++)
    {
        if(userName.charAt(i) >= 'a' && userName.charAt(i) <= 'z') prin = prin + userName.charAt(i);
        if(userName.charAt(i) >= 'A' && userName.charAt(i) <= 'Z') prin = prin + userName.charAt(i);
        if(userName.charAt(i) >= '0' && userName.charAt(i) <= '9') prin = prin + userName.charAt(i);
    }
    document.getElementById("userName").value = prin;
    
}

function fullNameCheck() 
{
    var fullName = document.getElementById("fullName").value;
    var prin = "";
    ///window.alert(fullName);

    for(var i=0; i<fullName.length; i++)
    {
        if(fullName.charAt(i) >= 'a' && fullName.charAt(i) <= 'z') prin = prin + fullName.charAt(i);
        if(fullName.charAt(i) >= 'A' && fullName.charAt(i) <= 'Z') prin = prin + fullName.charAt(i);
        if(fullName.charAt(i) == ' ' ) prin = prin + fullName.charAt(i);
    }
    document.getElementById("fullName").value = prin;
    
}

function instituitionNameCheck() 
{
    var instituitionName = document.getElementById("instituitionName").value;
    var prin = "";
    ///window.alert(fullName);

    for(var i=0; i<instituitionName.length; i++)
    {
        if(instituitionName.charAt(i) >= 'a' && instituitionName.charAt(i) <= 'z') prin = prin + instituitionName.charAt(i);
        if(instituitionName.charAt(i) >= 'A' && instituitionName.charAt(i) <= 'Z') prin = prin + instituitionName.charAt(i);
        if(instituitionName.charAt(i) == ' ' ) prin = prin + fullName.charAt(i);
    }
    document.getElementById("instituitionName").value = prin;
    
}

function upInstituition(x) 
{
   /// window.alert(x);
    document.getElementById("typeOfInstituition").innerHTML = x+" Name:";
    
}

function mobileNumberCheck() 
{
    var mobileNumber = document.getElementById("mobileNumber").value;
    var prin = "";
    ///window.alert(mobileNumber);
    
    for(var i=0; i<mobileNumber.length; i++)
    {
        if(mobileNumber.charAt(i) >= '0' && mobileNumber.charAt(i) <= '9') prin = prin + mobileNumber.charAt(i);
        /// window.alert(mobileNumber.length);
    }
    
    document.getElementById("mobileNumber").value = prin;
    
}

function confirmInput() 
{
    
    var userName = document.getElementById("userName").value;
    var fullName = document.getElementById("fullName").value;
    var password = document.getElementById("password").value;
    var instituitionName = document.getElementById("instituitionName").value;

        if(userName.length < 3 || userName.length > 16) 
        {
            window.alert("User Name must atleast be 3 and Atmost 16 input long");
            return false;
        }

        if(fullName.length < 3 || fullName.length > 16)
        {
            window.alert("Full Name must atleast be 3");
            return false;
        }

        if(password.length < 3 || password.length > 16)
        {
            window.alert("Password must atleast be 3");
            return false;
        }

        if(instituitionName.length < 3 || instituitionName.length > 28)
        {
            window.alert("Instituition Name must atleast be 3");
            return false;
        } 
    
    return true;
    
}


                
                