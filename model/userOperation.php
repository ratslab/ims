<?php
require_once 'connect.php';
class userOperation
{
	function addUser($name,$gender,$dob,$contact_no,$address,$pin,$warehouse_id,$role,$qualification,$date_joined,$email,$type)
	{
		$id=null;
		$password=null;
		
		//making new id for new employee
		$res=mysql_query("select * from login");
		
		while($r=mysql_fetch_array($res))
		{
			echo $r[0];
			$id=$r[0]+1;
			echo $id;
		}				
				
		//new id made
		
		//making random password
		$length=8;
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$count = mb_strlen($chars);
		
		for ($i = 0, $password = ''; $i < $length; $i++) {
			$index = rand(0, $count - 1);
			$password .= mb_substr($chars, $index, 1);
		}
		//password made
		$epassword=md5($password);
		//insert login and password in login table
		$query1="insert into login values($id,'$email','$epassword','$type')";
		$res1=mysql_query($query1) ;
		//inserted completed
		
		
		// inserting user details...
		$query2="insert into user_details values($id,'$name','$gender','$dob',$contact_no,'$address',$pin,$warehouse_id,'$role','$qualification','$date_joined')";
		$res=mysql_query($query2) or die(mysql_error());
		
		//inserted user_details...data...
		
		//getting user id and password of new user.
		$query3 ="select * from login where email_id='$email'";
		$result=mysql_query($query3);
		$lres=mysql_fetch_array($result);
		$lres[2]=$password;
		return $lres;
		//got user id and password
		
	}
	
	function deleteUser()
	{
		
	}
	
	function showUserDetail($id)
	{
		$query="SELECT * FROM fullUserDetail where id='$id'";
		$res=mysql_query($query);
		$res=mysql_fetch_array($res);
		return $res;
	}
	
	function showAllUser()
	{
	$query="select * from user_overview";
	$res=mysql_query($query);
	return $res;	
		
	}
	
}






?>