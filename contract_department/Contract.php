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
                	<h2><span>Sample table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
									 <th style="width:10%">Title Id</th>
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
							$res=$obj->showReport();
							//print_r(mysql_fetch_array($res));
							$i=1;
							while($r=mysql_fetch_array($res))
							{
							?>							
							
                                <tr>
                                    <td class="align-center"><?php echo $i;?></td>
									<td><?php echo $r['id'];?></td>
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
                        <div class="table-apply">
                            <form action="">
                            <div>
                            <span>Apply action to selected:</span> 
                            <select class="input-medium">
                                <option value="1" selected="selected">Select action</option>
                                <option value="2">Publish</option>
                                <option value="3">Unpublish</option>
                                <option value="4">Delete</option>
                            </select>
                            </div>
                            </form>
                        </div>
                        <div style="clear: both"></div>
                  </div> <!-- End .module-table-body -->
          </div> <!-- End .module --></div> 
            <!-- End .grid_12 -->
                
            <!-- Categories list -->
            <div class="grid_6"><!-- module -->
              <div style="clear:both;"></div>
		  </div> <!-- End .grid_6 -->
            
            <!-- To-do list -->
            <div class="grid_6"><!-- module -->
              <div style="clear:both;"></div>
            
          </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
            
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                  <div class="module-body"></div> 
                  <!-- End .module-body -->

              </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
                
            <!-- Settings-->
            <div class="grid_6">
                <div class="module"><!-- End .module-body -->
                </div> <!-- End .module -->
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
	<?php include 'CreateContract.html';?>
</div>
    </body>
</html>