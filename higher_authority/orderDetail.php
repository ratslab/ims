<?php
require '../model/sellBuymodel.php';
$obj= new sellBuymodel();
$r=$obj->show_detail($_REQUEST['id'], $_REQUEST['type']);
print_r($r);
echo "<br>";
$listarr=$obj->extract_arry($r['list']);
?><br>
order id:-<?php echo $r['id']?><br>
order created by:-<?php echo $r['by_user_id']?><br>
vendor:-<?php echo $r['vendor']?><br>
warehouse:-<?php echo $r['warehouse_id']?><br>
status:-<?php echo $r['status']?>
<table border="1">
<caption>Items List</caption>
<tr>
<td>item</td>
<td>quantity</td>
<td>price</td>
</tr>
<?php 
for($i=0;$i<sizeof($listarr)-1;$i++)
{
?>
<tr>
<td><?php echo $listarr[$i][0][0][1]." ".$listarr[$i][0][1][1]." ".$listarr[$i][0][2][1];?></td>
<td><?php echo $listarr[$i][1][0]?></td>
<td><?php echo $listarr[$i][1][1]?></td>
</tr>
<?php }?>
</table>

<?php if($r['status']!='completed')
{?>
<form action="../controller/haOpsController.php">
<input type="hidden" value="<?php echo $_REQUEST['id']?>" name="id">
<?php if( $r['status']=="pending" || $r['status']=="decline")
{?>
<input type="submit"  name="new_status" value="approve">
<?php }?>
<input type="submit"  name="new_status" value="decline">
</form>
<?php }?>