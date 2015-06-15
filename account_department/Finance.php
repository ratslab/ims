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
        
        
        
        <script src="../my js/myjs.js"></script>
	</head>
	<body>
    	<!-- Header --><?php include 'header.php' ?><!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons -->
            <div class="grid_7">
              <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            
            <!-- Account overview -->
            <div class="grid_5">
                <div class="module"></div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
            <div style="clear:both;"></div>
            
            
            
            <div class="grid_12">
                
                <!-- Notification boxes -->
                <div class="bottom-spacing">
                
                    <!-- Button -->
                    <div class="float-right">
                       <button id="opener">Report</button>
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
                	<h2><span>Financial Reports </span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">Title</th>
                                    <th style="width:21%">Author</th>
                                    <th style="width:13%">Subject</th>
                                    <th style="width:13%">Status</th>
                                    <th style="width:13%">Dated</th>
                                 
                                </tr>
                            </thead>
							<tbody>
							<?php
							$id=$_SESSION['id'];
							include "../model/userDo.php";
							include "../model/userOperation.php";
							$obj1=new userOperation();
							$res1=$obj1->showUserDetail($id);
							
							$obj=new userDo();
							$res=$obj->showFinancialReport();
							//print_r(mysql_fetch_array($res));
							$i=1;
							while($r=mysql_fetch_array($res))
							{
							?>							
							
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
                                    <td><?php echo $r['title'];?></td>
                                    <td><?php echo $res1['name'];?></td>
									<td><?php echo $r['subject'];?></td>
									<td>None</td>
									<td><?php echo $r['date'];?></td>
								</tr>
								<?php $i=$i+1;?>
								
							<?php	
							}
							?>
							</tbody>
                            <?php /*<tbody>
                                <tr>
                                    <td class="align-center">1</td>
                                    <td><a href="">Don Quixote</a></td>
                                    <td>Cervantes</td>
                                    <td>adventure</td>
                                    <td>992</td>
                                    <td>$11.55</td>
                                    
                                </tr>
                                <tr>
                                    <td class="align-center">2</td>
                                    <td><a href="">Lord Jim</a></td>
                                    <td>Joseph Conrad</td>
                                    <td>thriller</td>
                                    <td>400</td>
                                    <td>$6.95</td>
                                    
                                </tr>
                                <tr>
                                    <td class="align-center">3</td>
                                    <td><a href="">Inferno</a></td>
                                    <td>Dante</td>
                                    <td>drama</td>
                                    <td>528</td>
                                    <td>$8.76</td>
                                    
                                </tr>
                                
                            </tbody>*/?>
                        </table>
                        </form>
                    	<div style="clear: both"></div>
                  </div> <!-- End .module-table-body -->
          </div> <!-- End .module --></div> 
            <!-- End .grid_12 -->
                
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
	<div id="dialog" title="Report">
	<?php include 'AddFS.html';?>
</div>
    </body>
</html>