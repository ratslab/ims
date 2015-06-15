<?php

if(isset($_REQUEST['submit']))
{
include '../model/userDo.php';
$title=$_REQUEST['titleFS'];
$duration=$_REQUEST['durationFS'];
$subject=$_REQUEST['subjectFS'];
$description=$_REQUEST['descriptionFS'];
$obj=new userDo();
$res=$obj->createFinancialReport($title,$duration,$subject,$description);

move_uploaded_file($_FILES['file']['tmp_name'],"../account_department/attachment/".$_FILES['file']['name']);

if($res)
{
echo "successful";
}
}
?>