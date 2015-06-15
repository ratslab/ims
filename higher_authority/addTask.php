<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Adding Your Task</title>
<link rel="stylesheet" type="text/css" href="../my css/style.css">
<link rel="stylesheet" type="text/css" href="../my css/jquery-ui-1.9.2.custom.css">
<script>
	 
       function a(str)
       {
        var abc;
        if(window.XMLHttpRequest)
        {
            abc=new XMLHttpRequest();
        }
        else
        {
            abc= new ActiveXObject("Microsoft.XMLHTTP");
        }  
        var strur1="miniController/getuser.php?selectTT="+str;
        abc.open('GET',strur1,true);
        abc.send();
        abc.onreadystatechange=function()
        {
            if(abc.readyState==4)
            {
                document.getElementById('selectEmp').innerHTML=abc.responseText;
            }
        }      
       }    
 </script>
</head>

<body>

<div  id="accordion" class="ui-accordion ui-widget ui-helper-reset">
  <form method="post" action="../controller/haOpsController.php">
    <table width="30%" border="0" align="center">
      <tr>
    
    <td width="18%" class="attribute">Title</td>
    <td width="70%"><label for="title"></label>
      <input type="text" name="titleAT" id="titleAT" required class="txtbox" placeholder="tite_name"></td>
  </tr>
  <tr>
    
    <td height="47" class="attribute">Subject</td>
    <td><label for="subjectAT"></label>
      <input type="text" name="subjectAT" id="subjectAT" class="txtbox" placeholder="subject"></td>
  </tr>
  <tr>
   
    <td height="29" class="attribute">Description</td>
    <td><label for="textarea2"></label></td>
  </tr>
  <tr>
   
    <td colspan="2" class="attribute"><textarea name="descriptionAT" id="descriptionAT" cols="62" rows="15" placeholder="describe about your task"></textarea></td>
    </tr>
  <tr>
    
    <td class="attribute">Task for</td>
    <td><label for="select"></label>
      <select name="selectTF" id="selectTF" >
      <option value="0">Select</option>
      <option value="3">Account Department</option>
      <option value="4">Contract Department</option>
      <option value="5">Lower Level Employee</option>
      </select></td>
  </tr>
  <tr>
  
    <td class="attribute">Task To</td>
    <td><label for="select2"></label>
       
      <select name="selectTT" id="selectTT" onChange="a(this.value)">
       <option value="0">Select</option>
      <option value="3">Account Department</option>
      <option value="4">Contract Department</option>
      <option value="5">Lower Level Employee</option>
      </select>
      <select name="selectEmp" id="selectEmp">
      
      </select>
      </td>
      
     
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
<td>&nbsp;</td>

<td><input type="submit" id="submit" name="submit" value="Submit" class="ui-button"></td>
</tr>  
</table>


</form>
</div>
</body>
</html>
