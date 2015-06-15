<?php

if(isset($_REQUEST['submit']))
{
include '../model/userDo.php';
$title=$_REQUEST['titleCC'];
$subject=$_REQUEST['subjectCC'];
$description=$_REQUEST['descriptionCC'];
$type=4;
$obj=new userDo();
$res=$obj->createReport($title,$subject,$description,$type);

move_uploaded_file($_FILES['file']['tmp_name'],"../contract_department/attachment/".$_FILES['file']['name']);

if($res)
{
echo "successful";
}
}
?>
