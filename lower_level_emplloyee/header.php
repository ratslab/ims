
<!-- <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

<body> -->

<div id="header">
            <!-- Header. Status part -->
            <div id="header-status">
                <div class="container_12">
                    <div class="grid_8">
					&nbsp;
                    </div>
                    <div class="grid_4">
                        
                        <a href="../controller/lout.php" id="logout">
                        Hello <?php 
						      if($_SESSION['name']==null)
							  {
							 	header("location:../index.html");					  
							  }
							  else							  
						      echo $_SESSION['name'];
							  
							  ?> (Logout)
                        </a>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End #header-status -->
            
            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                            
                            
                                <li <?php if ($fileName=="Home.php") echo "id='current'";?>><a href="Home.php">Home</a></li>
                                <li <?php if ($fileName=="SB.php") echo "id='current'";?>><a href="SB.php">Sell/Buy</a></li>
                                <li <?php if ($fileName=="Order.php") echo "id='current'";?>><a href="Order.php">Order</a></li>
                                <li <?php if ($fileName=="Transport.php") echo "id='current'";?>><a href="Transport.php">Transport</a></li>
                                <li <?php if ($fileName=="Profile.php") echo "id='current'";?>><a href="Profile.php">Profile</a></li>
                                
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <!-- <div id="subnav">
                <div class="container_12">
                    <div class="grid_12">
                        <ul>
                            <li><a href="#">link 1</a></li>
                            <li><a href="#">link 2</a></li>
                            <li><a href="#">link 3</a></li>
                            <li><a href="#">link 4</a></li>
                            <li><a href="#">link 5</a></li>
                        </ul>
                        
                    </div><!-- End. .grid_12-->
                <!--</div><!-- End. .container_12 -->
                <!--<div style="clear: both;"></div>
            </div> --><!-- End #subnav -->
        </div>
<!-- </body>
</html> -->
