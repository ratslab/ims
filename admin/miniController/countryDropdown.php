
<?php
//hello
class formHelpers
{
	function countryDropdowns()
	{
		require_once '../../model/PinController.php';
		$obj=new PinController();
		$res=$obj->getCountry();
		while ($r=mysql_fetch_array($res))
		{
			echo "<option value='".$r[0]."'>".$r[0]."</option>";

		}
	}


}
$obj=new formHelpers();


?>
<option value="0">--select country--</option>
<?php $obj->countryDropdowns()?>