
<?php 
require '../model/stockOperation.php';
$obj= new stockOperation();
$cat=$obj->showAllCategory();

?>
<script>
function show_Items(cat_id)
{
	var abc=null;
	if(window.XMLHttpRequest)
	abc=new XMLHttpRequest();
	else
	alert("Your Browser do not support ajax");
	abc.open("GET","show_Item.php?input="+cat_id,true);
	abc.send(null);
	abc.onreadystatechange=function()
	{
		if(abc.readyState==4)
			document.getElementById('cat_item').innerHTML=abc.responseText;
	};
}


</script>

<div align="center">
<form method="post" action="../controller/lleOpsControl.php">
  <table width="420" border="0">
  <tr><td>Category</td>
<td ><select id="cat" name="cat" onchange="show_Items(this.value)">
<option value="none">select category</option>
<?php 
while($r=mysql_fetch_array($cat))
{
	echo "<option value='$r[0]'>".$r[1]."</option>";
}

?>
</select>
</td></tr>
<tr>
<td>Item Goup</td>
<td><select id="cat_item" name="cat_item"><option value="none">select item</option></select></td></tr>
    <tr>
      <td height="72">Name</td>
      <td>
        
        <input type="text" name="name"  />
      </td>
    </tr>
    <tr>
      <td height="78">Price</td>
      <td>
      
        <input type="text" name="price" />
      </td>
    </tr>
    
     <tr>
      <td height="53">&nbsp;</td>
      <td><input type="submit" name="add_y_cat" id="submit" value="Submit" />
       
      </td>
    </tr>
  </table>
  <div id="y_cat">
  </div>
  </form>
</div>
