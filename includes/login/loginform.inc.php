 
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
	<br>
	<h2 style="text-align:center">Please Login</h2>
	<!-- User login form starts here-->
	<form class="container" action="<?php echo $currentFile; ?>" method="post" id="loginForm">
        
        <div class="row">

            <div class="col-md-4"><br>
                <form action="<?php echo $currentFile; ?>" name="loginForm" method="post">
                    <label>Username </label>
                    <input type="text" name="username" /><br><br>
                    <label>Password </label>
                    <input type="password" name="password" /><br> <br> 
                    <button type="submit" id="loginButton" name="loginButton">Login</button>
                </form>
            </div>
        
        </div>
        <!-- .row -->
	</form> <!-- User login form ends here-->

	<script>
		var myElement = document.querySelector(".header");
		myElement.style.backgroundColor = "white";
	</script>