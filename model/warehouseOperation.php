<?php
require_once 'connect.php';
include 'PinController.php';
class warehouseOperation
{
	function addWarehouse($name,$contact_no,$address,$city,$pin,$state,$country)
	{
		$query="insert into warehouse(name,contact_no,address,pin) values('$name',$contact_no,'$address',$pin)";
		$obj=new PinController();
		$r=$obj->getpin($city);
		$status=false;
		if(mysql_num_rows($r)>0)
		{
			while ($a=mysql_fetch_array($r))
			{
				if($pin!=$r[0])
				{$status=true;}
					
				if($status)
				{
					$query2="insert into pin_city_rel values($pin,'$city','$state','$country')";
					mysql_query($query2);
				}
			
				
			}
		}
		else 
		{
		$query2="insert into pin_city_rel values($pin,'$city','$state','$country')";
		mysql_query($query2);
		}
		$res=mysql_query($query) or die(mysql_error());
		echo $res;
	}
	
	function deleteWarehouse()
	{
		
	}
	function updateWarehouse()
	{
		
	}
	
	function showWarehouseDetail($id)
	{
		$query="select * from warehouse_overview where id=$id";
		$res=mysql_query($query);
		return $res=mysql_fetch_array($res);
	}
	
	function showWarehouse($pin)
	{
		$query="select id,name from warehouse where pin=$pin";
		$res=mysql_query($query);
		return $res;
	}
	function showAllWarehouse()
	{
		$query="SELECT * FROM warehouse_overview";
		$res=mysql_query($query);
		return $res;
	}
	
}


?>