<?php 
session_start();
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

function show_Item_name(item_id)
{
	var cat =document.getElementById('cat').value;
	var abc=null;
	if(window.XMLHttpRequest)
	abc=new XMLHttpRequest();
	else
	alert("Your Browser do not support ajax");
	abc.open("GET","show_Item_name.php?cat="+cat+"&item_id="+item_id,true);
	abc.send(null);
	abc.onreadystatechange=function()
	{
		if(abc.readyState==4)
			document.getElementById('item_name').innerHTML=abc.responseText;
	};
}
function show_price(s_item_id)
{
	var cat=document.getElementById('cat').value;
	var item_id=document.getElementById('cat_item').value;
		var abc=null;
	if(window.XMLHttpRequest)
	abc=new XMLHttpRequest();
	else
	alert("Your Browser do not support ajax");
	abc.open("GET","show_Item_name.php?showp=true&cat="+cat+"&item_id="+item_id+"&s_item_id="+s_item_id,true);
	abc.send(null);
	abc.onreadystatechange=function()
	{
		if(abc.readyState==4)
			document.getElementById('price').innerHTML=abc.responseText;
	};
}
function showTotal(quant)
{
	var price=document.getElementById('price').innerHTML
	document.getElementById('total_price').innerHTML=quant*price;
}
function add_to_table()
{
	
	
	var quant=document.getElementById('quantity').value
	var cat=document.getElementById('cat').value
	var item=document.getElementById('cat_item').value
	var item_name=document.getElementById('item_name').value
	var temp=document.getElementById('list').innerHTML;
	document.getElementById('list').innerHTML=temp+"<tr><td>"+cat+"</td><td>"+item+"</td><td>"+item_name+"</td><td>NA</td><td>"+quant+"</td><td>NA</tr>"
	document.getElementById('data').value=document.getElementById('list').innerHTML;
	
}

function reset_table()
{
	document.getElementById('list').innerHTML="";
}


</script>



<table>
<tr>
<th>Category</th><th>Item</th><th>specific item</th><th>quantity</th><th> add</th></tr>

<tr>
<td ><select id="cat" onchange="show_Items(this.value)">
<option value="none">select category</option>
<?php 
while($r=mysql_fetch_array($cat))
{
	echo "<option value='$r[0]'>".$r[1]."</option>";
}

?>


</select></td>
<td><select id="cat_item" onchange="show_Item_name(this.value)"><option value="none">select item</option></select></td>
<td><select id="item_name">
<option value="none">select specific item</option></select></td>
<td><input type="number" id="quantity" name="quantity" value="0"</td>

<td><button onclick="add_to_table()">add</button></td>
</tr>
</table>

<table >
<tr>
<th>Category</th><th>Item</th><th>specific item</th><th>Price (NA)</th><th>quantity</th><th>Total Price (NA)</th></tr>
<tbody id="list">

</tbody>

<caption><button onclick="reset_table()">reset table</button></caption>
</table>
<form action="../controller/lleOpsControl.php">
<input type="hidden" id="data" name="data">
<input type="hidden" name="userby" value="<?php echo $_SESSION['id']?>">
<input type="submit" id="submit" name="submit" value="add_to_stock">


</form>
