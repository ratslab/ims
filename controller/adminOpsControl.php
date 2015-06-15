<?php
if (isset ( $_REQUEST ['submit'] )) {
	switch ($_REQUEST ['submit']) {
		// adding user
		case 'addUser' :
			include_once '../model/userOperation.php';
			echo "adding user";
			$name = $_REQUEST ['fnameAU'] . "  " . $_REQUEST ['mnameAU'] . " " . $_REQUEST ['lnameAU'];
			$gender = $_REQUEST ['gender'];
			$dob = $_REQUEST ['dob'];
			$email = $_REQUEST ['EmailIdAU'];
			$contact_no = $_REQUEST ['ContactNoAU'];
			$address = $_REQUEST ['StreetAddressAU'];
			$pin = $_REQUEST ['pinAU'];
			// $city=$_REQUEST['cityAU'];
			// $state=$_REQUEST['stateAU'];
			// $country=$_REQUEST['countryAU'];
			$warehouse_id = $_REQUEST ['WorkingAtAU'];
			$role = $_REQUEST ['WorkingAsAU'];
			$type = $_REQUEST ['type'];
			$qualification = $_REQUEST ['qualificationAU'];
			$date_joined = $_REQUEST ['jd'];
			$obj = new userOperation ();
			$res = $obj->addUser ( $name, $gender, $dob, $contact_no, $address, $pin, $warehouse_id, $role, $qualification, $date_joined, $email, $type );
			echo "user added<br>id=$res[0]<br>password=$res[2]<br>";
			break;
		// end of add user case.
		case 'addItem' :
			echo 'adding items';
			$catExist=$_REQUEST['catType'];
			$category=$_REQUEST['category'];
			$itemName=$_REQUEST['itemName'];
			$aname = $_REQUEST ['aname'];
			$size= $_REQUEST['size'];
			$datatype=$_REQUEST['datatype'];
			include '../model/stockOperation.php';
			$obj=new stockOperation();
			if($catExist=="yes")
			{
				$id=$category;
				$obj->addItem($id,$itemName, $aname,$size,$datatype);
			}
			else if($catExist=="no") {
				
				$obj->addCategory($category, $itemName, $aname,$size,$datatype);
					
			}
			else {
				echo "something went wrong";
			}
				
			
			break;
		case 'Add' :
			include_once '../model/warehouseOperation.php';
			$name = $_REQUEST ['nameAW'];
			$contact_no = $_REQUEST ['ContactNoAW'];
			$address = $_REQUEST ['addressAW'];
			$city = $_REQUEST ['cityAW'];
			$pin = $_REQUEST ['pinAW'];
			$state = $_REQUEST ['stateAW'];
			$country = $_REQUEST ['countryAW'];
			$obj = new warehouseOperation ();
			$obj->addWarehouse ( $name, $contact_no, $address, $city, $pin, $state, $country );
			
			echo "warehouse added";
			break;
	}
} else
	echo "sumething goes wrong";

?>
98594