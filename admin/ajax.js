// JavaScript Document
function getXMLobj()
{
	if(window.XMLHttpRequest)
	return new XMLHttpRequest();
	else
	return new AcitiveXObject("Microsft.XMLHTTP");
}
function showW(pin)
{
	var X=new XMLHttpRequest();
	var url="miniController/warehouseDropdown.php?pin="+pin;
	X.open("GET",url,true);
	X.send(null);
	X.onreadystatechange=function() 
		{
		if(X.readyState==4)
		document.getElementById('WDrop').innerHTML=X.responseText;
		};
}

function showP(city)
{
	var X=new XMLHttpRequest();
	var url="miniController/pinDropdown.php?city="+city;
	X.open("GET",url,true);
	X.send(null);
	X.onreadystatechange=function() 
		{
		if(X.readyState==4)
		document.getElementById('PDrop').innerHTML=X.responseText;
		};}

function showC(state)
{
	var X=new XMLHttpRequest();
	var url="miniController/cityDropdown.php?state="+state;
	X.open("GET",url,true);
	X.send(null);
	X.onreadystatechange=function() 
		{
		if(X.readyState==4)
		document.getElementById('CDrop').innerHTML=X.responseText;
		};}

function showS(country)
{
	
	var X=new XMLHttpRequest();
	var url="miniController/stateDropdown.php?country="+country;
	X.open("GET",url,true);
	X.send(null);
	X.onreadystatechange=function() 
		{
		if(X.readyState==4)
		document.getElementById('SDrop').innerHTML=X.responseText;
		};}

function showCountry()
{var X=new XMLHttpRequest();
	var url="miniController/countryDropdown.php";
	X.open("GET",url,true);
	X.send(null);
	X.onreadystatechange=function() 
		{
		if(X.readyState==4)
		document.getElementById('CountryDrop').innerHTML=X.responseText;
		};}

function showALL()
{
showP();
showC(0);
showS(0);
showCountry();
showW();
}