<?php 
session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	

 ?>



 <?php 
 // connect to database
	$db = mysqli_connect('localhost', 'root', '', 'bdfclub');

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
 ?>
<!-- Login COdes -->
<!--==============================================  Header Starts ==================================== -->
<?php include '../header.php'; ?>
<!-- =============================================  Header Ends   ======================================  -->
 
	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>User Name</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn btn-danger text-light" name="login_user">Login</button>
		</div>
	
	</form>








<!--==============================================  footer Starts ==================================== -->
<?php include '../footer.php'; ?>
<!-- =============================================  footer Ends   ======================================  -->
   

