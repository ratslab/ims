<!doctype html>
<html>
<head>
<script src="ajax.js"></script>
<link rel="stylesheet" type="text/css" href="../my css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="../my css/style.css">

<script src="../my js/jquery-1.9.1.js"></script>
<script src="../my js/jquery-ui-1.9.2.custom.js"></script>
<script src="../my js/validateForm.js"></script>

<script>
$(function (){$( "#datepicker" ).datepicker({
			changeYear: true,
			changeMonth: true
		});})
		
$(function (){$( "#datepicker2" ).datepicker({
			
			changeMonth: true
		});})		
</script>
        
</head>

<body onLoad="showALL();" >
<div  id="accordion" class="ui-accordion ui-widget ui-helper-reset">
  <form method="post"  name="AddUser" id="AddUser" action="../controller/adminOpsControl.php">
 <!--  action="../controller/addForm.php" -->
  <table width="362" class="table">
  <tr>
    <td width="35%"  class="attribute" >Name</td>
   
    <td width="65%">
      <input type="text" name="fnameAU" id="fnameAU" class="txtbox" required placeholder="First Name"> </td>
      </tr>
      <tr>
      <td rowspan="2">&nbsp;</td>
     <td> 
      <input type="text" name="mnameAU" id="mnameAU" placeholder="Middle Name" class="txtbox" >   </td>
      </tr>
      <tr>
      <td height="49">
        <input type="text" name="lnameAU" id="lnameAU" required placeholder="Last Name"  class="txtbox" >
      </td>
    </tr>
  <tr>
    <td class="attribute" valign="middle">Gender</td>
    
    <td><table width="204">
      <tr>
        <td width="96" ><label class="attribute">
          <input type="radio" required name="gender" value="Male" >
           Male</label></td>
     
        <td width="96" ><label class="attribute">
          <input type="radio" required name="gender" value="Female" >
          Female</label></td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td class="attribute">Date of Birth</td>
   
    <td>
<input type="text" id="datepicker" required name="dob" class="txtbox" ></td>
    </tr>
  <tr>
    <td class="attribute">Email Id</td>
    
    <td><label for="textfield"></label>
      <input type="text" name="EmailIdAU"  required id="EmailIdAU" class="txtbox" placeholder="xyz@hotmail.com"></td>
    </tr>
  <tr>
    <td class="attribute">Contact No.</td>
   
    <td><input type="text" name="ContactNoAU" required id="ContactNoAU" class="txtbox" ></td>
    </tr>
  <tr>
    <td class="attribute">Street Adress</td>
  
    <td><input type="text" name="StreetAddressAU" id="StreetAddressAU" class="txtbox"></td>
    </tr>
  <tr>
    <td class="attribute">Pin</td>
    <td><select class="txtbox" name="pinAU" id="PDrop" onChange="showW(this.value)"></select></td>
  </tr>
  <tr>
    <td class="attribute">City</td>
    
    <td><select class="txtbox" name="cityAU" id="CDrop" onChange="showP(this.value)"></select></td>
    </tr>
  <tr>
    <td class="attribute">State</td>
   
    <td><select class="txtbox" name="stateAU" id="SDrop" onChange="showC(this.value)"></select></td>
    </tr>
  <tr>
    <td class="attribute">Country</td>
    <td><select class="txtbox" name="countryAU" onChange="showS(this.value)" id="CountryDrop"></select></td>
  </tr>
  <tr>
    <td class="attribute">Working At</td>
    <td>


    <select id="WDrop" class="txtbox" name="WorkingAtAU"> </select>
 </td>
  </tr>
  <tr>
    <td class="attribute">Working As</td>
    <td><input type="text" name="WorkingAsAU" id="WorkingAsAU" class="txtbox" placeholder="Designation"></td>
  </tr>
  <tr>
    <td class="attribute">Working In</td>
    <td><select name="type">
         <option value="">Select</option>
         <option value="3">Account Department</option>
         <option value="4">Contract Department</option>
         <option value="2">Higher Authority</option>
         <option value="5">Lower Level Employee</option>
         <option value="1">Admin</option>
        </select>
    </td>
  </tr>
  <tr>
    <td class="attribute">Qualification</td>
    
    <td><input type="text" name="qualificationAU" id="qualificationAU" class="txtbox" placeholder="Qualification" ></td>
    </tr>
    <tr>
      <td>Joining Date</td>
      <td><input type="text" id="datepicker2" required name="jd" class="txtbox" ></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td><input type="submit" id="submit" name="submit" value="addUser"></td>
    </tr>
    </table>
  </form>
</div>
</body>
</html>
