<?php
session_start();
$fileName=__FILE__;
$nameArr=explode("\\", $fileName);
$fileName=$nameArr[sizeof($nameArr)-1];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Magic Admin. Advanced, Beautiful and Customizable Admin Template.</title>
       <link rel="stylesheet" type="text/css" href="../css/grid.css"/>
        <link rel="stylesheet" type="text/css" href="../css/ie.css"/>
        <link rel="stylesheet" type="text/css" href="../css/ie6.css"/>
        <link rel="stylesheet" type="text/css" href="../css/jquery.wysiwyg.css"/>
        <link rel="stylesheet" type="text/css" href="../css/reset.css"/>
        <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="../css/tablesorter.css"/>
        <link rel="stylesheet" type="text/css" href="../css/theme-blue.css"/>
        <link rel="stylesheet" type="text/css" href="../css/thickbox.css"/>
        
        <link rel="stylesheet" type="text/css" href="../my css/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="../my css/style.css"/>
        <link rel="stylesheet" href="../my css/jquery-ui.css" />
        <!-- JQuery engine script-->
		<script type="text/javascript" src="../jquery/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="../jquery/jquery.pstrength-min.1.2.js"></script>
        <script type="text/javascript" src="../jquery/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="../jquery/jquery.tablesorter.pager.js"></script>
        <script type="text/javascript" src="../jquery/jquery.wysiwyg.js"></script>
        <script type="text/javascript" src="../jquery/thickbox.js"></script>
        
        <script type="text/javascript" src="../my js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="../my js/jquery-ui-1.9.2.custom.js"></script>
        <script src="../my js/myjs.js"></script>
        
        
        
	</head>
	<body>
    	<!-- Header --><?php include 'header.php'?><!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons --><!-- End .grid_7 -->
            
            <!-- Account overview --><!-- End .grid_5 -->
            
          <div style="clear:both;"></div>
            
            
            
            <div class="grid_12"><div class="bottom-spacing">
                	  <!-- Button -->
                	  <div class="float-right">
                	    <button id="opener">Sell/Buy</button>
              	    </div>
                	  <!-- Table records filtering -->
                	  Filter:
  <select name="select" class="input-short">
    <option value="1" selected="selected">Select filter</option>
    <option value="2">Created last week</option>
    <option value="3">Created last month</option>
    <option value="4">Edited last week</option>
    <option value="5">Edited last month</option>
  </select>
               	  </div>
                
              <!-- Notification boxes --><!-- Example table -->
                <div class="module">
                	
                	<h2><span>Sample table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">id</th>
                                    <th style="width:21%">date time</th>
                                    <th style="width:13%">Total items</th>
                                    <th style="width:13%">type</th>
                                    <th style="width:13%">total Price</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php include '../model/sellBuymodel.php';
                            	
                            	$obj=new sellBuymodel();
                            	$res=$obj->show_all_sell(1, $_SESSION['id']);
                            	while($r=mysql_fetch_array($res))
                            	{
                            		
                            ?>
                                <tr>
                                    <td class="align-center">1</td>
                                    <td><a href="sellDetails.php?id=<?php echo $r[0]?>&type=sell"><?php echo $r[0]?></a></td>
                                    <td><?php echo $r[5]?></td>
                                    <td><?php echo $obj->exploitSell($r[0], 2)?></td>
                                    <td>Sold</td>
                                    <td><?php echo $obj->exploitSell($r[0], 3)?></td>
                                   
                                </tr>
                                 <?php }?>
                            </tbody>
                        </table>
                        </form>
                        <div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="../images/arrow-stop-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180.gif" alt="first"/>
                                <img class="prev" src="../images/arrow-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180.gif" alt="prev"/> 
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="../images/arrow.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow.gif" alt="next"/>
                                <img class="last" src="../images/arrow-stop.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop.gif" alt="last"/> 
                                <select class="pagesize input-short align-center">
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                </div>
                            </form>
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module --></div> <!-- End .grid_12 -->
                
            <!-- Categories list --><!-- End .grid_6 -->
            
            <!-- To-do list --><!-- End .grid_6 -->
            <div style="clear:both;"></div>
            
            <!-- Form elements --><!-- End .grid_12 -->
                
            <!-- Settings-->
            <div class="grid_6"><!-- End .module -->
            </div> <!-- End .grid_6 -->
                
            <!-- Password --><!-- End .grid_6 -->
          <div style="clear:both;"></div><!-- End .grid_3 --><!-- End .grid_3 --><!-- End .grid_6 -->

            
          <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p>&copy; 2010. <a href="http://www.templatescreme" title="Visit For More Free Website Templates">Free Website Templates</a></p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
        <div id="dialog" title="any">
        <?php include 'sellBuy.php'?>
        </div>
	</body>
</html>