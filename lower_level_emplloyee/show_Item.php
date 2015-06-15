<option value="none">select item</option>
<?php
include '../model/stockOperation.php';
$o=new stockOperation();
$r=$o->showItem($_REQUEST['input'],0,0,1);
while($re=mysql_fetch_array($r))
{
?>

<option value="<?php echo $re[0] ?>"><?php echo $re[1]?></option>
<?php }

?>