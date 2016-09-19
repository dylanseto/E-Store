function checkRegister()
{
	if(document.getElementById("fname").value == "")
	{
		alert("Please Enter Your First Name!");
	}
	else if(document.getElementById("lname").value == "")
	{
		alert("Please Enter Your Last Name!");
	}
	else if(document.getElementById("email").value == "")
	{
		alert("Please Enter Your Email!");
	}
	else if(document.getElementById("phone").value == "")
	{
		alert("Please Enter Your Phone Number!");
	}
	else if(document.getElementById("pass").value == "")
	{
		alert("Please Enter A Password!");
	}
	else if(document.getElementById("check").value == "")
	{
		alert("Please Enter A Confirmation Password!");
	}
	else
	{
		if(document.getElementById("pass").value != (document.getElementById("check").value))
		{
			alert("The Passwords Don't Match!");
		}
	}
	return false;
}