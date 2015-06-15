<?php
include '../../model/connect.php';
include '../../model/userOperation.php';

if(isset($_REQUEST['selectTT']))
{
  $obj=new userOperation();
  $res=$obj->showAllUser();   
  $query2="select * from user_overview where type=".$_REQUEST['selectTT'];
  $ans=mysql_query($query2) or die(mysql_error());
     while($res2=mysql_fetch_array($ans))
     {
	 ?>
	 <option value="<?php echo $res2[0].' '.$res2['name'];?>"><?php echo "($res2[0])".$res2['name'];?></option>
	 <?php
     
     }  
}  
  
?>
