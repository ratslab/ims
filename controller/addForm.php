<?php 
include '../model/model_add_user.php';

class formController extends AddUser
{
function formController()
{

	$fnameAU=$_REQUEST['fnameAU'];
	$mnameAU=$_REQUEST['mnameAU'];
	$lnameAU=$_REQUEST['lnameAU'];
	$name=$fnameAU." ".$mnameAU." ".$lnameAU;   //a full name saved in $name
	
	$gender = $_REQUEST['gender'];
	$dob = $_REQUEST['datepicker'];
	$EmailIdAU = $_REQUEST['EmailIdAU'];
	$ContactNoAU = $_REQUEST['ContactNoAU'];
	$StreetAddressAU = $_REQUEST['StreetAddressAU'];
	$cityAU = $_REQUEST['cityAU'];
	$stateAU = $_REQUEST['stateAU'];
	$countryAU = $_REQUEST['countryAU'];
	$workingAs = $_REQUEST['workingAs'];
	$workingAt=$_REQUEST['workingAt'];
	$this->addUser($name,$gender,$dob,$ContactNoAU,$StreetAddressAU);
	/* $this->addCityPinRelation($cityAU,$stateAU,$countryAU); */
}
}

if(isset($_REQUEST['submit']))
{
	$obj=new formController();
}

?>