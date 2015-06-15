<?php
session_start();
include '../model/m_login.php';
$obj=new m_login();
$result=$obj->check($_POST['username'], $_POST['password']);
if($result!=null)
	{print_r($result);
	$_SESSION['id']=$result[0];
	$_SESSION['name']=$result[1];
	switch ($result[3])
	{
		case 1:	header("location:../admin/Dashboard.php"); break;
		case 2:	header("location:../higher_authority/Home.php"); break;
		case 3:	header("location:../account_department/Home.php"); break;
		case 4:	header("location:../contract_department/Home.php"); break;
		case 5:	header("location:../lower_level_emplloyee/Home.php"); break;
	}}
else 
{
echo "wrong uname or passworrd";
session_destroy();
}
?>