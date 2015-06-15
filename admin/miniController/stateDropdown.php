
<?php
class formHelpers
{
	function stateDropdowns()
	{
		
		
		require_once '../../model/PinController.php';
		$obj=new PinController();
		$country=$_REQUEST['country'];
		$res=$obj->getState($country);
		while ($r=mysql_fetch_array($res))
		{
			echo "<option value='".$r['state']."'>".$r['state']."</option>";

		}
		
	}


}
$obj=new formHelpers();


?>
<option value="0">--select state--</option>
<?php 
$obj->stateDropdowns();?>