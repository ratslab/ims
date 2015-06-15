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
               <link rel="stylesheet" type="text/css" href="../my css/jquery-ui-1.9.2.custom.css"/>
        
        
        <!-- IE Hacks for the Fluid 960 Grid System -->
        <!--[if IE 6]><link rel="stylesheet" type="text/css" href="ie6.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="ie.css" tppabs="http://www.xooom.pl/work/magicadmin/css/ie.css" media="screen" /><![endif]-->
        
		<!-- JQuery engine script-->
		<script type="text/javascript" src="../my js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="../my js/jquery-ui-1.9.2.custom.js"></script>
        
        <!-- open dialog -->
<script src="../my js/myjs.js"></script>
	</head>
	<body>
	
<?php include 'header.php';?>
    	
		<div class="container_12">
        

            
            <!-- Dashboard icons -->
            l<!-- End .grid_7 -->
            
            <!-- Account overview --><!-- End .grid_5 -->
             <!-- End .grid_12 -->
                
            <!-- Categories list -->
          <div class="grid_6"><!-- module -->
            <div style="clear:both;"></div>
                
			</div>
          <div style="clear:both;"></div>
            
            
            
            <div class="grid_12">
                <h1>User details</h1>
                <p><?php echo $_REQUEST['employeeId'];?></p>
                <?php include '../model/userOperation.php';
                $obj=new userOperation();
                $info=$obj->showUserDetail($_REQUEST['employeeId']);
                print_r($info);
                for($i=0;$i<sizeof($info)/2;$i++)
                	echo "<p>".$info[$i]."</p>";
                ?>
                <!-- Notification boxes --><!-- Example table --><!-- End .module --></div><!-- End .grid_6 -->
            
            <!-- To-do list -->
             <!-- End .grid_6 -->
          <div style="clear:both;"></div>
            
            <!-- Form elements --><!-- End .grid_12 -->
                
            <!-- Settings-->
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
        
        <div id="dialog" title="Add New Employee">
	<?php include 'AddUser.php';?>
</div>



	</body>
</html>