<?php
include  'connect.php';
class stockOperation
{
	function addItem($id,$itemName, $aname,$size,$datatype)
	{
		$query3="insert into ".$id."_cat(iname) values('$itemName')";
		
		echo mysql_query($query3) or die(mysql_error());
		$res2=mysql_query("select id from ".$id."_cat where iname='$itemName'");
		$res2=mysql_fetch_array($res2);
		$iid=$res2[0];
		$str="";
		for($i=0;$i<sizeof($aname);$i++)
		{
		$str=$str." ".$aname[$i]." ".$datatype[$i]."(".$size[$i]."),";
		}
				$str=rtrim($str,",");
				$query4="create table ".$id."_".$iid."_item(item_id int primary key auto_increment,item_name varchar(30),price int,currency varchar(4),$str)";
							
				echo mysql_query($query4) or die(mysql_error());
		
	}
	
	function deleteItem()
	{
		
	}
	function addCategory($category,$itemName, $aname,$size,$datatype)
	{
		$query1="insert into category(name) values('$category')";
		
		echo mysql_query($query1) or die(mysql_error());
		
		$res1=mysql_query("select id from category where name='$category'");
		$res1=mysql_fetch_array($res1);
		$id=$res1[0];
		$query2="create table ".$id."_cat(id int primary key AUTO_INCREMENT,iname varchar(10))";
		
		echo mysql_query($query2) or die(mysql_error());
		$query3="insert into ".$id."_cat(iname) values('$itemName')";
		
		echo mysql_query($query3) or die(mysql_error());
		$res2=mysql_query("select id from ".$id."_cat where iname='$itemName'");
		$res2=mysql_fetch_array($res2);
		$iid=$res2[0];	
			$str="";
			for($i=0;$i<sizeof($aname);$i++)
			{
				$str=$str." ".$aname[$i]." ".$datatype[$i]."(".$size[$i]."),";
			}
			$str=rtrim($str,",");
			$query4="create table ".$id."_".$iid."_item(item_id int primary key auto_increment,item_name varchar(30),price int,currency varchar(4) ,$str)";
			
			echo mysql_query($query4) or die(mysql_error());
		
	}
	function deleteCategory()
	{
		
	}
	function showAllCategory()
	{
		$query="select * from category";
		$res=mysql_query($query);
		
		return $res;
				
	}
	function showItem($cat_id,$item_id,$s_item_id,$switch)
	{
		switch ($switch)
		{
			case 1:
				// shows no. of items in category
				$query="select * from ".$cat_id."_cat";
				$res=mysql_query($query);
				return $res;
				break;
			case 2:
				//shows item_name list	
				$query="select * from ".$cat_id."_".$item_id."_item";
				$res=mysql_query($query);
				return $res;
				break;
			case 3:
				//shows actual item
				$query="select * from ".$cat_id."_".$item_id."_item where item_id=$s_item_id";
				$res=mysql_query($query);
				return mysql_fetch_array($res);
				break;
			case 4:
				//shows category name
				$query="select * from category where id=$cat_id";
				$r=mysql_query($query);
				return mysql_fetch_array($r);
				break;
			case 5:
				//show single item name in _cat tables
				$query="select * from ".$cat_id."_cat where id=$item_id";
				$res=mysql_query($query);
				return mysql_fetch_array($res);
				break;
		}		
		
		
	}
	
	
	function addStock($w_id,$item_id,$quant)
	{
		$item_id=trim($item_id);
		$check="select * from warehouse_stock where warehouse_id=$w_id and item_id='$item_id'";
		$res=mysql_query($check);
		if(mysql_num_rows($res)>0)
		{
			$r=mysql_fetch_array($res);
			
			$new_count=$quant+$r[2];
		$query="update warehouse_stock set stock=$new_count where  warehouse_id=$w_id and item_id='$item_id'";
		echo "i am in if ".mysql_query($query) or die(mysql_error());
			
		}
		else
		{
		$query="insert into warehouse_stock value($w_id,'$item_id',$quant)";
		echo "i am in else ".mysql_query($query) or die(mysql_error());
		}
	}
	function deleteStock($w_id,$item_id,$quant)
	{
		$item_id=trim($item_id);
		$check="select * from warehouse_stock where warehouse_id=$w_id and item_id='$item_id'";
		$res=mysql_query($check);
		
			$r=mysql_fetch_array($res);
			if($r[2]==0)
			{
				echo "no items of $r[1] in stock";
			}
			else
			{
			$new_count=$r[2]-$quant;
			$query="update warehouse_stock set stock=$new_count where  warehouse_id=$w_id and item_id='$item_id'";
			echo mysql_query($query) or die(mysql_error());
			}	
		
	}
	
	function showStock()
	{
		
	}
	
	function showStockOf($w_id,$item_id)
	{
		$query="select * from warehouse_stock where warehouse_id=$w_id and item_id='$item_id'";
		$res=mysql_query($query);
		return mysql_fetch_array($res);
	}
	
	function transferStock()
	{
		
	}
	
	function exploitSell($id,$switch)
	{
		// switc 1 for no. of item, 2 for total quantity of all items,3 for total price
		$query="select * from sell where id=$id";
		$res=mysql_query($query);
		$res=mysql_fetch_array($res);
		switch($switch)
		{
			case 1:
				$list=$res[2];//list
				$list=explode(";", $list);
				return sizeof($list)-1;
				break;
			case 2:
				$total=0;
				$list=$res[2];//list
				$list=explode(";", $list);
				for($i=0;$i<sizeof($list)-1;$i++)
				{
					$list[$i]=explode("=>(", $list[$i]);
					$list[$i][1]=explode(")", $list[$i][1]);
					$total=$total+$list[$i][1][0];
				}
				return $total;
					break;
			case 3:
				$total=0;
				$list=$res[2];//list
				$list=explode(";", $list);
				for($i=0;$i<sizeof($list)-1;$i++)
				{
				$list[$i]=explode("=>(", $list[$i]);
						$list[$i][1]=explode(")", $list[$i][1]);
						$total=$total+$list[$i][1][1];
				}
				return $total;
				break;		
				
		}
		
		
		
	}
}



?>