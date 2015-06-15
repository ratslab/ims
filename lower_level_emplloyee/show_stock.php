<?php

include '../model/userOperation.php';
$obj=new userOperation();
$r=$obj->showUserDetail($_REQUEST['uid']);
$w_id=$r['w_id'];
include '../model/stockOperation.php';
$obj= new stockOperation();
$r=$obj->showStockOf($w_id, $_REQUEST['cat']."_".$_REQUEST['item_id']."_".$_REQUEST['s_item_id']);
echo $r['stock'];
?>