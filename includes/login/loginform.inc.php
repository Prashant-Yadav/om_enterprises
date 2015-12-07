 
<?php

	if(isset($_POST['loginButton'])) {
		# code...

		if(isset($_POST['username']) and isset($_POST['password'])){
			$userName = $_POST['username']; 
			$password = $_POST['password'];

			$passwordHash = md5($password);

			//check if username and password are not empty
			if(!empty($userName) and !empty($passwordHash)){

				//query to select username password from database
				$result = mysqli_query($con,"Select * from user_info where `user_name` ='".$userName."' AND `password` = '".$passwordHash."'") or die(mysqli_error($con));
			
				if ($result) {
					# compute the number of rows returned from query execution
					$queryNumRows = mysqli_num_rows($result);

					if ($queryNumRows == 0) {
						# check if username/password wrong 
						echo " <center> <h3> Invalid Username/Password Combination </h3> </center>";
					}
					elseif ($queryNumRows == 1) {
						# get data retrieved from sucessful exection of query
						$row = mysqli_fetch_array($result);
						
						#check if username/password combination is correct
						if($row['user_name']==$userName and $row['password']==$passwordHash){

							$_SESSION['username'] = $userName;
							header('location:'.$currentFile);	#return back to index page
						}
					}
				}
				else{
					echo " <center> <h3> Invalid Username/Password Combination </h3> </center>";
				}
				mysqli_close($con);
			}
		}
	}
?>

<head>
	
	<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

	<title>Login</title>

	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="assets/css/signin.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container">
		<br>
		<!-- User login form starts here-->
		<form class="form-signin" action="<?php echo $currentFile; ?>" method="post" role="form">
		    
		    <!--<div class="row">-->
		    	<h2 class="form-signin-heading">Please sign in</h2>
		        
                <h4><label>Username </label></h4>
                <input type="text" name="username" class="form-control" placeholder="username" required autofocus/>
                <h4><label>Password </label></h4>
                <input type="password" name="password" class="form-control" placeholder="password" required/><br> <br> 
                <button type="submit" id="loginButton" name="loginButton" class="btn btn-lg btn-primary btn-block">Login</button>
		    
		    <!--</div>-->
		    <!-- .row -->
		</form> <!-- User login form ends here-->
	</div>
	

	
</body>