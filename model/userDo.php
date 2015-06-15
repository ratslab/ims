<?php
include 'connect.php';
class userDo
{
	
	function createTask($title,$subject,$description,$task_for,$task_to)
	{
		session_start();
		$id=$_SESSION['id'];
		$d=date('d/m/y');
		$query="insert into task(title,subject,description,task_for,task_to,by_user_id,date) values ('$title','$subject','$description','$task_for','$task_to',$id,'$d')";
		$res=mysql_query($query) or die(mysql_error());
		return $res;
	}
	function createFinancialReport($title,$duration,$subject,$description)     //Account department financial report
	{
	    session_start();
		$id=$_SESSION['id'];
		$d=date('d/m/y');
		$query="insert into acc_contracts(title,duration,subject,description,by_user_id,date) values ('$title','$duration','$subject','$description',$id,'$d');";
		$res=mysql_query($query) or die(mysql_error());
		return $res;
	}
	function createReport($title,$subject,$description,$type)     //Contract department financial report
	{
	    session_start();
		$id=$_SESSION['id'];
		$d=date("d/m/y");
		$query="insert into acc_contracts(title,subject,description,by_user_id,by_employee_type,date) values ('$title','$subject','$description',$id,$type,'$d');";
		$res=mysql_query($query) or die(mysql_error());
		return $res;
	}
	function showFinancialReport()
	{
	    //session_start();
	    $id=$_SESSION['id'];
	    $query="select * from acc_contracts";
	    $res=mysql_query($query) or die(mysql_error());
	    return $res;
	}
	
	function transportGood()
	{
		
	}
	
	function showTask()
	{
		
	}
	function showAllTask()
	{
		
	}
	function showReport()
	{
	    $id=$_SESSION['id'];
	    $query="select * from acc_contracts where by_user_id=$id";
	    $res=mysql_query($query) or die(mysql_error());
	    return $res;
	}
	function showAllReport()
	{
	
	}
	function showTransportLog()
	{
		
	}
	
}

?>