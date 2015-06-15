<?php
if(isset($_REQUEST['submit']))
{
	switch ($_REQUEST['submit'])
	{
		case 'AddTask':
			include '../model/userDo.php';
			$title=$_REQUEST['titleAT'];
			$subject=$_REQUEST['subjectAT'];
			$description=$_REQUEST['descriptionAT'];
			$task_for=$_REQUEST['selectTF'];
			$task_to=$_REQUEST['selectTT'];
			$obj=new userDo();
			$res=$obj->createTask($title,$subject,$description,$task_for,$task_to);
			if($res)
			{
				header("location:../higher_authority/HTask.php");
			}
			
			break;
		
		
	}
	
	
	
	
  
}
if($_REQUEST['new_status'])
{
	include '../model/sellBuymodel.php';
	$obj=new sellBuymodel();
	$obj->update_status($_REQUEST['id'], $_REQUEST['new_status']);
}

?>