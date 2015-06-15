<?php
require_once 'connect_ims_prototype.php';
class AddUser
{
function addUser($name,$gender,$dob,$ContactNoAU,$StreetAddressAU)
{
	$query="insert into user_details(name,gender,dob,contact_no,address) values('$name','$gender','$dob',$ContactNoAU,'$StreetAddressAU');";
	mysql_query($query) or die(mysql_error());
}
}
?>