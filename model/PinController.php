<?php
require 'connect.php';
class PinController
{
function getallpin()
{	
	$query="select pin from pin_city_rel";
	$res=mysql_query($query);
	return $res;
}
function getpin($city)
{
	$query="select pin from pin_city_rel where city='$city'";
	$res=mysql_query($query);
	return $res;
}
function getCity($state)
{
	
	$query="select distinct(city) from pin_city_rel where state='$state'";
	$res=mysql_query($query);
	return $res;
}
function getState($country)
{
	$query="select distinct(state) from pin_city_rel where country='$country'";
	$res=mysql_query($query);
	return $res;
}
function getCountry()
{
	$query="select distinct(country) from pin_city_rel";
	$res=mysql_query($query);
	return $res;
}
}
?>