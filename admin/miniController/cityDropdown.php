
<?php
class formHelpers
{
	function cityDropdowns()
	{
				
		require_once '../../model/PinController.php';
		$obj=new PinController();
		$state=$_REQUEST['state'];
		$res=$obj->getCity($state);
		while ($r=mysql_fetch_array($res))
		{
			echo "<option value='".$r['city']."'>".$r['city']."</option>";

		}
		}
	}



$obj=new formHelpers();


?>
<option value="0">--select city--</option>
<?php $obj->cityDropdowns()?>