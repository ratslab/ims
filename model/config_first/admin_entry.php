<?php
require '../connect.php';
$id=111; //enter id for admin as your will but must be an INTEGER VALUE by replacing 111
$uname="admin@ims.com";
$password=md5("admin");
$type=1;
if(mysql_query("insert into login values($id,'$uname','$password',$type)"))
	echo "Done ";
else 
	echo "Something went wrong";

 
?>