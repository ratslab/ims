<?php
require 'connect.php';
include 'userOperation.php';
class sellBuymodel
{
	function gen_buy_order($by_user_id,$list,$date,$vendor)
	{
		//send buy order for approval
		$obj=new userOperation();
		$r=$obj->showUserDetail($by_user_id);
		$w_id=$r['w_id'];
		$query="insert into buy(by_user_id,list,status,warehouse_id,date,vendor) values ($by_user_id,'$list','pending',$w_id,'$date','$vendor')";
		echo mysql_query($query);
	}
	function buy_approved($buy_id,$w_id,$total_id,$quant)
	{
		//Show +ve effects on stock
		$query="select * from buy where id=$buy_id";
		$r=mysql_query($query);
		$r=mysql_fetch_array($r);
		if($r[3]=="complete")
		{
			//adding goods into stock
			
			include '../model/stockOperation.php';
			$obj=new stockOperation();
			for($i=0;$i<sizeof($total_id);$i++)
			{
								
				$obj->addStock($w_id, $total_id[$i], $quant[$i]);
			}
		}
	}
	function sell($by_user_id,$list,$date)
	{
		
		$obj=new userOperation();
		$r=$obj->showUserDetail($by_user_id);
		$w_id=$r['w_id'];
		$query="insert into sell(user_by,list,warehouse_id,date) values ($by_user_id,'$list',$w_id,'$date')";
		echo mysql_query($query) or die(mysql_error());
		//Show -ve effects on stock
		$list=explode(";", $list);
		include '../model/stockOperation.php';
		$obj=new stockOperation();
		
		for($i=0;$i<sizeof($list)-1;$i++)
		{
			$list[$i]=explode("=>",$list[$i]);
			$list[$i][1]=explode(")", $list[$i][1]);
			$list[$i][1][0]=str_replace("(", "", $list[$i][1][0]);
			
			
			
		}
		for($i=0;$i<sizeof($list)-1;$i++)
		{
			$list[$i][0]=trim( $list[$i][0]);
			
			$obj->deleteStock($w_id, $list[$i][0], $list[$i][1][0]);
			
		}
		
		print_r($list);
	}
	
	
	function show_all_buy($switch,$user_id)
		{
			//to sell all set both parameters 0;
			switch ($switch)
			{	
				case 0:
					$query="select * from buy";
					return	$res=mysql_query($query);
					break;
				case 1:
					$query="select * from buy where by_user_id=$user_id";
					return $res=mysql_query($query);
			}
		}
	
	function show_all_sell($switch,$user_id)
	{
		switch ($switch)
		{
			case 0:
				$query="select * from sell";
				return	$res=mysql_query($query);
				break;
			case 1:
				$query="select * from sell where user_by=$user_id";
				return $res=mysql_query($query);
		}
	}
	
	function show_all()
	{}
	function show_detail($id,$switch)
	{
		switch ($switch)
		{
			case 'buy':
				$query="select * from buy where id=$id";
				$res=mysql_query($query);
				return mysql_fetch_array($res);
				break;
			
			case 'sell':
				$query="select * from sell where id=$id";
				$res=mysql_query($query);
				return mysql_fetch_array($res);
				break;
				break;	
		}
	}
	
	function update_status($id,$status)
	{
		$query="update buy set status='$status' where id=$id ";
		echo mysql_query($query) or die(mysql_error());
	}
	
	function extract_arry($list)
	{
		include 'stockOperation.php';
		$list=explode(";", $list);
		
		for($i=0;$i<sizeof($list)-1;$i++)
		{
			$list[$i]=explode("=>", $list[$i]);
			$list[$i][0]=explode("_", $list[$i][0]);
			$list[$i][1]=explode(")", $list[$i][1]);
			$list[$i][1][0]=str_replace("(", "",$list[$i][1][0]);

			$obj=new stockOperation();
			$list[$i][0][0]=$obj->showItem($list[$i][0][0], 0, 0, 4);
			$list[$i][0][1]=$obj->showItem($list[$i][0][0][0],$list[$i][0][1][0], 0, 5);;
			$list[$i][0][2]=$obj->showItem($list[$i][0][0][0],$list[$i][0][1][0], $list[$i][0][2], 3);;
		}
		
		return $list;
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
	
	function exploitBuy($id,$switch)
	{
		// switc 1 for no. of item, 2 for total quantity of all items,3 for total price
		$query="select * from buy where id=$id";
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
		function add_to_stock ( $by_user_id, $list)
	{	
	
		$obj=new userOperation();
		$r=$obj->showUserDetail($by_user_id);
		$w_id=$r['w_id'];
		$list=explode(";",$list);
		include '../model/stockOperation.php';
		$obj=new stockOperation();
		for($i=0;$i<sizeOf($list)-1;$i++)
		{
		$list[$i]=explode("=>",$list[$i]);
		$item_id=$list[$i][0];
		$temp=explode(")",$list[$i][1]);
		$quant=$temp[0];
		$quant=str_replace("(","",$quant);
		
		echo $obj->addStock($w_id, $item_id, $quant);
		}
	}
	
}

?>