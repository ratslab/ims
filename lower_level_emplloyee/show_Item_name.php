
<?php
include '../model/stockOperation.php';
$o=new stockOperation(); 
if ($_REQUEST['showp'])
{
	$r=$o->showItem($_REQUEST['cat'],$_REQUEST['item_id'],$_REQUEST['s_item_id'], 3);
	echo $r[2];
	
}
else {
	
	?>


<option value="none">select item</option>
<?php

$r=$o->showItem($_REQUEST['cat'],$_REQUEST['item_id'],0, 2);
while($re=mysql_fetch_array($r))
{
?>

<option value="<?php echo $re[0] ?>"><?php echo $re[1]?></option>
<?php }
}
?>
