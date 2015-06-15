<?php
class formHelpers
{
function warehouseDropdowns()
{
	require_once '../../model/warehouseOperation.php';
	$obj=new warehouseOperation();
	
	$res=$obj->showWarehouse($_REQUEST['pin']);
	while ($r=mysql_fetch_array($res))
	{
		echo "<option value='".$r['id']."'>".$r['name']."</option>";
				
	}
}


}
$obj=new formHelpers();


?>
<option value="0">--select warehouse--</option>
<?php $obj->warehouseDropdowns()?>