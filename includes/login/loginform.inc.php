 
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

	if (isset($_POST['registerButton'])) {
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$passwordHash = md5($password);

		$insertQuery = mysqli_query($con, "INSERT INTO `user_info`(`id`, `user_name`, `password`, `first_name`, `last_name`) VALUES ('', '$username', '$passwordHash', '$first_name', '$last_name')") or die("Unable to register:".mysqli_error($con));

		$_SESSION['username'] = $username;
		header('location:'.$currentFile);	#return back to index page

		mysqli_close($con);
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
	<style type="text/css">
	.tab-panel{
		border: 1px solid ##B8B8B8;
		border-radius:10px;		
	}
	</style>

</head>
<body ng-app>
	<h2 class="form-signin-heading text-center">OM ENTERPRISES MIS</h2>
	<br>
	<div class="container" style="width:500px;border: 1px solid #A8A8A8;border-radius:10px;">

		<section ng-init="tab = 1">
			<br>
			<ul class="nav nav-pills">
				<li ng-class="{ active:tab === 1 }"> 
					<a href ng-click="tab = 1"> SignIn </a> 
				</li>
				<li ng-class="{ active:tab === 2 }"> 
					<a href ng-click="tab = 2"> Register </a> 
				</li>
			</ul>


			<div class="panel tab-panel" ng-show="tab === 1" >
				<!-- User login form starts here-->
				<form class="form-signin form-horizontal" action="<?php echo $currentFile; ?>" method="post" role="form">
				    
				    <!--<div class="row">-->
				        <div class="form-group">
				        	<label class="control-label col-sm-4">Username </label>
				        	<div class="col-sm-8">
				        		<input type="text" name="username" class="form-control" placeholder="username" required autofocus/>		
				        	</div>
		                	
				        </div>
		                
		                <div class="form-group">
		                	<label class="control-label col-sm-4">Password </label>
		                	<div class="col-sm-8">
		                		<input type="password" name="password" class="form-control" placeholder="password" required/>		
		                	</div>
		                	
		                </div>
		                
		                <div class="form-group">
			                <div class="col-sm-offset-4 col-sm-4">
			                	<button type="submit" id="loginButton" name="loginButton" class="btn btn-lg btn-primary btn-block">Login</button>
			                </div>
		                </div>
		                
				    
				    <!--</div>-->
				    <!-- .row -->
				</form> <!-- User login form ends here-->	
			</div>

			<div class="panel tab-panel" ng-show="tab === 2" >
				<!-- User registration form starts here-->
				<form class="form-signin form-horizontal" action="<?php echo $currentFile; ?>" method="post" onsubmit="return checkForm()" role="form">
				    
				    <!--<div class="row">-->
						<div class="form-group">
							<label class="control-label col-sm-4">First Name </label>
							<div class="col-sm-8">
								<input type="text" name="first_name" class="form-control" placeholder="First Name" required autofocus/>
							</div>
							
						</div>
				        
		                <div class="form-group">
		                	<label class="control-label col-sm-4">Last Name </label>
		                	<div class="col-sm-8">
		                		<input type="text" name="last_name" class="form-control" placeholder="Last Name" required autofocus/>
		                	</div>
		                	
		                </div>
		                
		                <div class="form-group">
		                	<label class="control-label col-sm-4">Username </label>
		                	<div class="col-sm-8">
		                		<input type="text" name="username" class="form-control" placeholder="username" required autofocus/>
		                	</div>
		                	
		                </div>
		                
		                <div class="form-group">
		                	<label class="control-label col-sm-4">Password </label>
		                	<div class="col-sm-8">
		                		<input type="password" name="password" class="form-control" id="pwd" placeholder="Password" required/>
		                	</div>
		                	
		                </div>
		                
		                <div class="form-group">
		                	<label class="control-label col-sm-4">Confirm Password </label>
		                	<div class="col-sm-8">
		                		<input type="password" name="confirmPassword" class="form-control" id="confirmPwd" placeholder="Confirm Password" required/>
		                	</div>
		                	
		                </div>
		                
		                <div class="form-group">
			                <div class="col-sm-offset-4 col-sm-4">
			                	<button type="submit" id="registerButton" name="registerButton" class="btn btn-lg btn-primary btn-block">Register</button>
			                </div>
		                	
		                </div>
		                
				    
				    <!--</div>-->
				    <!-- .row -->
				</form> <!-- User registration form ends here-->	
			</div>

		</section>

		<br>		
		
	</div>
	
	<script type="text/javascript">
		function checkForm(){
			var pass1 = document.getElementById("pwd").value;
			var pass2 = document.getElementById("confirmPwd").value;

			if (pass1 != pass2) {
	            alert("Passwords Do not match");
	            document.getElementById("pass1").style.borderColor = "#E34234";
	            document.getElementById("pass2").style.borderColor = "#E34234";
	            return false;
        	}
        	else {
	            return true;
	        }
		}
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	
</body>