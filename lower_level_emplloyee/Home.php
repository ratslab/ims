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
		<script type="text/javascript" src="jquery/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="jquery/jquery.pstrength-min.1.2.js"></script>
        <script type="text/javascript" src="jquery/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="jquery/jquery.tablesorter.pager.js"></script>
        <script type="text/javascript" src="jquery/jquery.wysiwyg.js"></script>
        <script type="text/javascript" src="jquery/thickbox.js"></script>
        
        
        
        
        
        
        
        <!-- Initiate WYIWYG text area -->
		<script type="text/javascript">
			$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
        </script>
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
        <!-- Initiate password strength script -->
		<script type="text/javascript">
			$(function() {
			$('.password').pstrength();
			});
        </script>
	</head>
	<body>
    	<!-- Header --><?php include 'header.php' ?> <!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons -->
            <div class="grid_7"><a href="" class="dashboard-module">
               	<img src="../images/Crystal_Clear_user.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/Crystal_Clear_user.gif" width="64" height="64" alt="edit" />
               	<span>My profile</span>
            </a>
              <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            
            <!-- Account overview -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>Account overview</span></h2>
                        
                        <div class="module-body">
                        
                        	<p>
                                <strong>User: </strong>User X<br />
                                <strong>Your last visit was on: </strong>20 January 2010,<br />
                        	</p>
                        	<div>                      	  </div>
                             
                        	<p><br />
                            </p>

                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
            <div style="clear:both;"></div>
            
            
            
            <div class="grid_12">
                
                <!-- Notification boxes --><!-- Example table --><!-- End .module --></div> <!-- End .grid_12 -->
                
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
            <div class="grid_12"><!-- End .module -->
       		  <div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
                
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
	</body>
</html>