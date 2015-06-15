<?php
include 'connect.php';
class ChangePassword
{
	function change_password($password)
	{
	$query="update login set password='$password' where id=".$_SESSION['id'];
	$res=mysql_query($query) or die(mysql_error());
	return $res;
	}
}
?>