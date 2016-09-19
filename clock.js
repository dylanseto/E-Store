
function getCurrentDate()
{
	var d = new Date();
	var month = "";
	switch(d.getMonth())
	{
	case 0: month="Jan"; break;
	case 1: month="Feb"; break;
	case 2: month="Mar"; break;
	case 3: month="Apr"; break;
	case 4: month="May"; break;
	case 5: month="Jun"; break;
	case 6: month="Jul"; break;
	case 7: month="Aug"; break;
	case 8: month="Sept"; break;
	case 9: month="Oct"; break;
	case 10: month="Nov"; break;
	case 11: month = "Dec"; break;
	}
	if(d.getMinutes() < 10)
	{
		return month + " " + d.getDate() + ", " + (d.getYear()+1900) + " " + d.getHours() + ":0" + d.getMinutes();
	}
	return month + " " + d.getDate() + ", " + (d.getYear()+1900) + " " + d.getHours() + ":" + d.getMinutes();
}

function updateClock()
{
	//alert(getCurrentDate());
	document.getElementById("clock").innerHTML = getCurrentDate();
	setTimeout(updateClock, 1000);
}