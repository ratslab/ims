<?php
include '../model/m_change_password.php';
class ChangePass extends ChangePassword
{
function Change_Pass($newpass1,$newpass2)
{ 
  $pass1=$newpass1;
  $pass2=$newpass2;	
  $null_result="";
  if($pass1==$pass2)        //checking password is correct or not
  {
  $password=md5($pass1);
  $result=$this->change_password($password);       //here password will be changed
  return $result;
  }
  else                     //if both entered passwords are incorrect
  {
  $null_result=0;
  return $null_result;
  }
 
}
}

/* if(isset($_REQUEST['submit']))
{
$newpass1=$_REQUEST['newpass1'];
$newpass2=$_REQUEST['newpass2'];
if($newpass1==$newpass2)
{
$password=md5($newpass1);
$query="update login set password='$password' where id=".$_SESSION['id'];
$res=mysql_query($query) or die(mysql_error());
header("location:../admin/Profile.php");
}
else
{
echo "Password did not match.......!!!!";
}
if($res)
{
echo "Password Changed Successfully.......!!!";
}
} */
?>