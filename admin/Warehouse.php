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
               
        
        
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="../jquery/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="../jquery/jquery.pstrength-min.1.2.js"></script>
        <script type="text/javascript" src="../jquery/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="../jquery/jquery.tablesorter.pager.js"></script>
        <script type="text/javascript" src="../jquery/jquery.wysiwyg.js"></script>
        <script type="text/javascript" src="../jquery/thickbox.js"></script>
         <!-- open dialog -->
<script src="../my js/myjs.js"></script>
	</head>
	<body>
    	<!-- Header --><?php include 'header.php';?><!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons --><!-- End .grid_7 -->
            
            <!-- Account overview --><!-- End .grid_5 -->
            
          <div style="clear:both;"></div>
            
            
            
            <div class="grid_12">
                
                <!-- Notification boxes -->

                <div class="bottom-spacing">
                
                    <!-- Button -->
                    <div class="float-right">
                        <button id="opener">Add Warehouse</button>
                    </div>
                    
                    <!-- Table records filtering -->
                    Filter: 
                    <select class="input-short">
                    	<option value="1" selected="selected">Select filter</option>
                        <option value="2">Created last week</option>
                        <option value="3">Created last month</option>
                        <option value="4">Edited last week</option>
                        <option value="5">Edited last month</option>
                    </select>
                    
                </div>
                
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Sample table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">Warehouse Id</th>
                                    <th style="width:13%">Warehouse Name</th>
                                    <th style="width:13%">Address</th>
                                    <th style="width:13%">Contact No</th>
                                    </tr>
                            </thead>
                            <tbody>
                               <?php include '../model/warehouseOperation.php';
                               $obj=new warehouseOperation();
                               $res=$obj->showAllWarehouse();
                               $i=1;
                               while($r=mysql_fetch_array($res))
                               {
                               ?>
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><a href="warehouseDetail.php?warehouseId=<?php echo $r[0] ?>"><?php echo $r[0]?></a></td>
                                    <td><?php echo $r[1]?></td>
                                    <td><?php echo $r[3].", ".$r[4].", ".$r[5].", ".$r[6]."-".$r[7]?></td>
                                    <td><?php echo $r[2]?></td>
                                    </tr>
                                <?php $i=$i+1; }?>
                            </tbody>
                        </table>
                        </form>
                    	<div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module --></div> <!-- End .grid_12 -->
                
            <!-- Categories list --><!-- End .grid_6 -->
            
            <!-- To-do list --><!-- End .grid_6 -->
            <div style="clear:both;"></div>
            
            <!-- Form elements --><!-- End .grid_12 -->
                
            <!-- Settings--><!-- End .grid_6 -->
                
            <!-- Password --><!-- End .grid_6 -->
            <div style="clear:both;"></div><!-- End .grid_3 --><!-- End .grid_3 --><!-- End .grid_6 -->

            
          <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
       <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p>&copy; 2014. @IMS.com</p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div><!-- End #footer -->
        
        <div id="dialog" title="Add Warehouse">
	<?php include 'AddWarehouse.html';?>
</div>
	</body>
</html>