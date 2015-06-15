<?php include '../model/stockOperation.php';
$cats=new stockOperation();
$catsResult=$cats->showAllCategory();
while($r=mysql_fetch_array($catsResult))
{
?>
<option value="<?php echo $r[0]?>">
<?php echo
$r[1];
?>
</option>
<?php }?>