<?php
function extract_items($data) {
	$data = str_replace ( "<tr>", "", $data );
	$data = str_replace ( "<td>", "", $data );
	$data = explode ( "</tr>", $data );
	for($i = 0; $i < sizeof ( $data ) - 1; $i ++) {
		$data [$i] = explode ( "</td>", $data [$i] );
	}
	for($i = 0; $i < sizeof ( $data ) - 1; $i ++) {
		$str = $data [$i] [0] . "_" . $data [$i] [1] . "_" . $data [$i] [2];
		$str = $str . "=>(" . $data [$i] [4] . ")" . $data [$i] [5];
		$data [$i] = $str;
	}
	$str = implode ( ";", $data );
	return $str;
}

if (isset($_REQUEST ['submit'])) {
	switch ($_REQUEST ['submit']) {
		case 'sell' :
			echo "selling items <br>";
			include '../model/sellBuymodel.php';
			$date = $_REQUEST ['date'];
			$by_user_id = $_REQUEST ['userby'];
			$list = extract_items ( $_REQUEST ['data'] );
			echo $by_user_id."<br>";
			echo $list."<br>";
			echo $date."<br>";
			$obj = new sellBuymodel ();
			$obj->sell ( $by_user_id, $list, $date );
			
			break;
		case 'Buy' :
			echo "buying items <br>";
			include '../model/sellBuymodel.php';
			$date = $_REQUEST ['date'];
			$by_user_id = $_REQUEST ['userby'];
			$vendor = $_REQUEST ['vendor'];
			$list = extract_items ( $_REQUEST ['data'] );
			$obj = new sellBuymodel ();
			$obj->gen_buy_order ( $by_user_id, $list, $date, $vendor );
			break;
			case 'add_to_stock':
			include '../model/sellBuymodel.php';
			$by_user_id = $_REQUEST ['userby'];
			$list = extract_items ( $_REQUEST ['data'] );
			
			
			$obj = new sellBuymodel ();
			$obj->add_to_stock ( $by_user_id, $list);
			break;
	}
}
if (isset($_REQUEST ['status_update'])) {
	switch ($_REQUEST ['status_update']) {
		case 'processing' :
			
			include '../model/sellBuymodel.php';
			$obj = new sellBuymodel ();
			$obj->update_status ( $_REQUEST ['id'], $_REQUEST ['status_update'] );
			break;
		case "complete" :
			include '../model/sellBuymodel.php';
			$obj = new sellBuymodel ();
			$obj->update_status ( $_REQUEST ['id'], $_REQUEST ['status_update'] );
			//status set to completed
			echo "status updated adding to stock";
			$obj->buy_approved($_REQUEST ['id'],$_REQUEST['w_id'],$_REQUEST['total_id'],$_REQUEST['quant']);
			echo "addedd to stock";
			break;
	}
}
if(isset($_REQUEST['add_y_cat']))
{
    include '../model/connect.php';
    $name=$_REQUEST['name'];
    $price=$_REQUEST['price'];
    $cat=$_REQUEST['cat'];
    $cat_item=$_REQUEST['cat_item'];
    $query="insert into ".$cat."_".$cat_item."_item(item_name,price,currency) values('$name',$price,'inr')";
    $res=mysql_query($query) or die(mysql_error());
    echo $res;
}

?>