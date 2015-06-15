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
    	<!-- Header --><?php include 'header.php' ?><!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons --><!-- End .grid_7 -->
            
            <!-- Account overview -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>User Details</span></h2>
                        
                        <div class="module-body">
                        
                        	<p>
							<?php include '../model/userOperation.php';
							$id=$_SESSION['id'];
							$obj=new userOperation();
							$res=$obj->showUserDetail($id)
							?>
                                <strong>User: </strong><?php echo $res['name'];?><br />
                                <strong>Email Id: <?php echo $res['email_id'];?></strong><br />
                                <strong>Address: </strong><?php echo $res['address'];?>                       	</p>
                        	<p><br />                            </p>

                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
            <div style="clear:both;"></div>
            
            
            
            <div class="grid_12">
                
                <!-- Notification boxes --><!-- Example table -->
                <div class="module"><!-- End .module-table-body -->
              </div> <!-- End .module --></div> <!-- End .grid_12 -->
                
            <!-- Categories list --><!-- End .grid_6 -->
            
            <!-- To-do list --><!-- End .grid_6 -->
          <div style="clear:both;"></div>
            
            <!-- Form elements -->    
            <div class="grid_12"><!-- End .module -->
       		  <div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
                
            <!-- Settings-->
            <div class="grid_6">
                <div class="module">
                     <h2><span>Settings</span></h2>
                        
                     <div class="module-body">
                        <p class="notification n-attention"><strong>Running out of space?</strong><br />Just contact us and switch to a bigger plan</p>
                        
                         <div>
                             <div class="indicator">
                                 <div style="width: 23%;"><!-- change the width value (23%) to dynamically control your indicator -->
                                  </div>
                             </div>
                             <p>Your storage space: 23 MB out of 100MB</p>
                         </div>
                         
                         <div>
                             <div class="indicator">
                                 <div style="width: 100%;"><!-- change the width value (100%) to dynamically control your indicator -->
                                  </div>
                             </div>
                             <p>Your bandwidth (January): 1 GB out of 1 GB</p>
                         </div>
                         
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
            </div> <!-- End .grid_6 -->
                
            <!-- Password -->
            <div class="grid_6">
                <div class="module">
				     
                     <h2><span>Password</span></h2>
                        
                     <div class="module-body">
                        <form method="post">
                            <p>
                                <label>Type in new password</label>
                                <input class="input-medium password" required type="password" name="newpass1"/>
                            </p>
                            <p>
                                <label>Repeat password</label>
                                <input type="password" class="input-medium" required name="newpass2"/>
                            </p>
                            <fieldset>
                                <input class="submit-green" type="submit" value="Submit" name="change_pass"/> 
                                <input class="submit-gray" type="submit" value="Cancel" />
                            </fieldset>
                        </form>
                        <p><span><?php 
                                 
						         if(isset($_REQUEST['change_pass']))
						         {
						         	$newpass1=$_REQUEST['newpass1'];
						         	$newpass2=$_REQUEST['newpass2'];
						         	include '../controller/change_password.php';
						         	$obj=new ChangePass();
						         	$res=$obj->Change_Pass($newpass1,$newpass2);
						         	if($res)
						         	{
						         		echo "Password Changed Successfully.....!!!";
						         	}
						         	if($res==0)
						         	{
						         		echo "Password did not match...!!!";
						         	}
						         }
						         ?>
	                    </span></p>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div><!-- End .grid_3 --><!-- End .grid_6 -->

            
          <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12"></div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>