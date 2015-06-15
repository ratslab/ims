<?php
class formHelpers
{
function pinDropdowns()
{
	require_once '../../model/PinController.php';
	$obj=new PinController();
	$city=$_REQUEST['city'];
	$res=$obj->getpin($city);
	while ($r=mysql_fetch_array($res))
	{
		echo "<option value='".$r['pin']."'>".$r['pin']."</option>";
				
	}
}


}
$obj=new formHelpers();


?>
<option value="0">--select pin--</option>
<?php $obj->pinDropdowns()?>