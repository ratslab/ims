<?php
class formHelpers
{
function warehouseDropdowns()
{
	require_once '../model/warehouseOperation.php';
	$obj=new warehouseOperation();
	$res=$obj->showAllWarehouse();
	while ($r=mysql_fetch_array($res))
	{
		echo "<option value='".$r['id']."'>".$r['name']."</option>";
				
	}
}


}
$obj=new formHelpers();


?>
<select class="txtbox" name="WorkingAtAU"><?php $obj->warehouseDropdowns()?></select>