<?php 
session_start();
include'../model/stockOperation.php';
$obj= new stockOperation();
$cat=$obj->showAllCategory();

?>
<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
Vhtlj8q0
          
        }
    </script>

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
	abc.open("GET","show_Item_name.php?&cat="+cat+"&item_id="+item_id,true);
	abc.send(null);
	abc.onreadystatechange=function()
	{
		if(abc.readyState==4)
			document.getElementById('item_name').innerHTML=abc.responseText;
	};
}
function show_stock(cat,item_id,s_item_id)
{
	var cat=document.getElementById('cat').value;
	var item_id=document.getElementById('cat_item').value;
	var uid=document.getElementById('userby').value
		var abc=null;
	if(window.XMLHttpRequest)
	abc=new XMLHttpRequest();
	else
	alert("Your Browser do not support ajax");
	abc.open("GET","show_stock.php?cat="+cat+"&item_id="+item_id+"&s_item_id="+s_item_id+"&uid="+uid,true);
	abc.send(null);
	abc.onreadystatechange=function()
	{
		if(abc.readyState==4)
			document.getElementById('a_quant').innerHTML=abc.responseText;
	};
	var str="<button onclick='add_to_table()'>add</button>"
	document.getElementById('add_btn').innerHTML=str;
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
	//abc.open("GET","show_Item_name.php?showp=true&cat="+cat+"&item_id="+item_id+"&s_item_id="+s_item_id,true);
	//abc.send(null);
	/*abc.onreadystatechange=function()
	{
		if(abc.readyState==4)
			document.getElementById('price').innerHTML=abc.responseText;
	};*/
	show_stock(cat,item_id,s_item_id)
}
function showTotal(quant)
{
	var price=document.getElementById('price').innerHTML;
	quant=parseInt(quant);
	document.getElementById('total_price').innerHTML=quant*price;
	var a_quant=document.getElementById('a_quant').innerHTML;
	
	a_quant=parseInt(a_quant);
	if(quant>a_quant)
	{
		document.getElementById('add_btn').innerHTML="Quantity excedds than available stock"
	}
	else if(quant==0 || !quant)
	{
		document.getElementById('add_btn').innerHTML="Enter quantity"
	}
	else
	{
		var str="<button onclick='add_to_table()'>add</button>"
			document.getElementById('add_btn').innerHTML=str;
	}
}
function add_to_table()
{
	
	var quant=document.getElementById('a_quant').innerHTML
	var cat=document.getElementById('cat').value
	var item=document.getElementById('cat_item').value
	var item_name=document.getElementById('item_name').value
	var temp=document.getElementById('list').innerHTML;
	document.getElementById('list').innerHTML=temp+"<tr><td>"+cat+"</td><td>"+item+"</td><td>"+item_name+"</td><td>"+quant+"</td>";
	document.getElementById('data').value=document.getElementById('list').innerHTML;
	document.getElementById('date').value=getDate();
}

function reset_table()
{
	document.getElementById('list').innerHTML="";
}

function getDate()
{
	var d= new Date();
	var yy=d.getFullYear();
	var mm=d.getMonth()+1;
	var dd=d.getDate();
	return yy+"-"+mm+"-"+dd;
}
</script>



<table>
<tr>
<th>Category</th><th>Item</th><th>specific item</th><th>available quantity</th><th> add</th></tr>

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
<td><select id="item_name" onchange="show_price(this.value)">
<option value="none">select specific item</option></select></td>

<td><span id="a_quant"></span></td>


<td><span id="add_btn"></span></td>
</tr>
</table>

<table border="1" >
<tr>
<th>Category</th><th>Item</th><th>specific item</th><th>quantity</th></tr>
<tbody id="list">

</tbody>

<caption><button onclick="reset_table()">reset table</button></caption>
</table>

<input type="hidden" id="userby" name="userby" value="<?php echo $_SESSION['id']?>">
