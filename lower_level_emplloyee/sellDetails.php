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
    <div id="printablediv">
    <center><h1>Reciept for Customer</h1></center>
<?php
require '../model/sellBuymodel.php';
$obj= new sellBuymodel();
$r=$obj->show_detail($_REQUEST['id'], $_REQUEST['type']);

echo "<br>";
$listarr=$obj->extract_arry($r['list']);
?><br>
order id:-<?php echo $r['id']?><br>
order created by:-<?php echo $r['user_by']?><br>

warehouse:-<?php echo $r['warehouse_id']?><br>

<input type="hidden" name="w_id" value="<?php echo $r['warehouse_id']?>">
<table border="1">
<caption>Items List</caption>
<tr>
<td>item</td>
<td>quantity</td>
<td>price</td>
</tr>

<?php 
for($i=0;$i<sizeof($listarr)-1;$i++)
{
?>
<tr>
<td><input type="hidden" name="total_id[]" value="<?php echo $listarr[$i][0][0][0]."_".$listarr[$i][0][1][0]."_".$listarr[$i][0][2][0];?>"><?php echo $listarr[$i][0][0][1]." ".$listarr[$i][0][1][1]." ".$listarr[$i][0][2][1];?></td>
<td><input type="hidden" name="quant[]" value="<?php echo $listarr[$i][1][0]?>"> <?php echo $listarr[$i][1][0]?></td>
<td><?php echo $listarr[$i][1][1]?></td>
</tr>
<?php }?>
</table>
Total Price=<?php echo $obj->exploitSell($_REQUEST['id'], 3)?>
</div>
<input type="button" value="Print" onclick="javascript:printDiv('printablediv')" />

