<!-- Including files for DB connection and Session Control -->
<?php
    include 'includes/login/core.inc.php';
    include 'includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<!DOCTYPE html>
<html lang="en">

  <?php
    if(loggedIn()){ #This function is in /includes/login/core.inc.pho for verfying user session

    	if (isset($_POST['submitItem'])) {
    		# insert new item details
    		if (!empty($_POST['brandName'])) {
    			# code...
    			$brandName = $_POST['brandName'];
    			$itemDimension = $_POST['itemDimension'];
    			$itemThickness = $_POST['itemThickness'];
    			$availableStock = $_POST['availableStock'];

    			$queryRun = mysqli_query($con, "INSERT INTO `brand`(`brand_no`, `brand_name`, `dimension`, `thickness`, `stock`) VALUES ( '', '$brandName', '$itemDimension', '$itemThickness', '$availableStock')");
    		}
    	}

  ?>

	<head>
	      <meta charset="utf-8">
	      <meta http-equiv="X-UA-Compatible" content="IE=edge">
	      <meta name="viewport" content="width=device-width, initial-scale=1">
	      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	      <link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/x-icon"> 
	      <title>Add New Item</title>

	      <!-- Bootstrap core css -->
	      <link href="assets/css/bootstrap.min.css" rel="stylesheet">

	      <!-- Custom CSS -->
	      <link href="assets/css/sb-admin.css" rel="stylesheet">

	      <!-- Morris Charts CSS -->
	      <link href="assets/css/plugins/morris.css" rel="stylesheet">

	      <!-- Custom Fonts -->
	      <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	      <!-- Custom styles for this template -->
	      <link href="assets/css/justified-nav.css" rel="stylesheet">

	      <!-- Custom styles for login -->
      	  <link href="assets/css/signin.css" rel="stylesheet">

	      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	      <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	      <![endif]-->
	</head>
	<body>
	
	    <!-- code to include navigation menu-->
	      <div id="wrapper">
	      
	        <?php require 'includes/menu_bar.inc.php';?>  
	      
	        <!-- div for main pages-->
	        <div id="page-wrapper">
	        	<h1>
	        		Add new items
	        	</h1>
	        	<div class="form-group">
	        		<form action="#" method="POST" class="form-inline" role="form">
		        		<pre>
		        			<strong>Brand Name</strong>			<input type="text" class="form-control" placeholder="name" name="brandName" id="brandName" required><br>
		        			<strong>Dimension</strong>			<select class="form-control" name="itemDimension" id="itemDimension" required>
		        													<option value="8x4">8x4</option>
		        													<option value="8x4">8x3</option>
		        													<option value="7x4">7x4</option>
		        													<option value="7x3">7x3</option>
		        													<option value="6x4">6x4</option>
		        													<option value="6x3">6x3</option>
		        												</select><br>
		        			<strong>Thickness</strong>			<select class="form-control" name="itemThickness" id="itemThickness" required>
		        													<option value="4mm">4mm</option>
		        													<option value="6mm">6mm</option>
		        													<option value="8mm">8mm</option>
		        													<option value="12mm">12mm</option>
		        													<option value="15mm">15mm</option>
		        													<option value="16mm">16mm</option>
		        													<option value="18mm">18mm</option>
		        													<option value="19mm Blockboard">19mm Blockboard</option>
		        													<option value="25mm board">25mm board</option>
		        												</select><br>
		        			<strong>Available Stock</strong>	<input type="number" class="form-control" placeholder="0" name="availableStock" id="availableStock" required>
		        			<br>
		        			<input type="submit" class="btn btn-default form-control" label="Submit" value="Submit" id="submitItem" name="submitItem" required>	
		        		</pre>   		
	        		</form>
	        	</div>	<!-- /.form-group-->
	        	
	        </div>  <!-- /#page-wrapper-->
      
			</div> <!-- /#wrapper -->


			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

			<!-- jQuery -->
			<script src="assets/js/jquery.js"></script>

			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="assets/js/bootstrap.min.js"></script>

			<!-- Morris Charts JavaScript -->
			<script src="../assets/js/plugins/morris/raphael.min.js"></script>
			<script src="../assets/js/plugins/morris/morris.min.js"></script>
			<script src="../assets/js/plugins/morris/morris-data.js"></script>

  <?php
    } #End of LoggedIn function
    else{
        #redired to loginform if not loggedIn
        include 'includes/login/loginform.inc.php' ;
    }
  ?>

	</body>
</html>