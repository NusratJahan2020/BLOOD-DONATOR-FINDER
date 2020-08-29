<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<!--==============================================  Header Starts ==================================== -->
<?php include '../header.php'; ?>
<!-- =============================================  Header Ends   ======================================  -->
 


<!-- 
========================================================
  master row
============================================================= -->
<div class="row m-1 p-1">
	
<!-- ==============
		Menu 
	=============-->
	<?php include 'sidemenu.php'; ?>

<!-- ==============
		Menu 
	=============-->
<!-- =============
		page contents 
		================-->

		<div class="col-md-9">
			<!-- =========================================================================== -->
			<!-- =========================Page Content====================================== -->
			<!-- =========================================================================== -->
				<div class="header">
					<h2>Welcome to dashboard ...</h2>
				</div>
			<div class="content">

				<!-- notification message -->
				<?php if (isset($_SESSION['success'])) : ?>
					<div class="error success" >
						<h3>
							<?php 
								echo $_SESSION['success']; 
								unset($_SESSION['success']);
							?>
						</h3>
					</div>
				<?php endif ?>

				<!-- logged in user information -->
				<?php  if (isset($_SESSION['username'])) : ?>
					<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
					<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
				<?php endif ?>
			</div>
			<!-- ============================== -->
			<div class="row">
					<div class="col-md-6">
						<?php 
		                      $connect= mysqli_connect("localhost", "root", "","bdfclub");//Connect to Database
		                      $query="SELECT*FROM register_donor ORDER BY 'donor_bloodgroup'";
		                      $donorsdata= mysqli_query($connect, $query);
		                      $number_of_rows= mysqli_num_rows($donorsdata);

		                      // if ($number_of_rows > 0){
		                      //   while ($row = mysqli_fetch_assoc($donorsdata)){


		                ?>
		                <h2 class="text-danger">Tolal Members Currently:</h2>
		                <h1 class="text-info "><em><?php echo $number_of_rows; ?></em></h1>
					</div>

					<div class="col-md-6">
						<?php 
		                      $connect= mysqli_connect("localhost", "root", "","bdfclub");//Connect to Database
		                      $query="SELECT*FROM req_blood ORDER BY 'req_bloodgroup'";
		                      $donorsdata= mysqli_query($connect, $query);
		                      $number_of_rows= mysqli_num_rows($donorsdata);

		                      // if ($number_of_rows > 0){
		                      //   while ($row = mysqli_fetch_assoc($donorsdata)){


		                ?>
		                <h2 class="text-danger">Tolal Requests Currently:</h2>
		                <h1 class="text-info "><em><?php echo $number_of_rows; ?></em></h1>
					</div>

			</div>
			
			<!-- =========================================================================== -->
			<!-- =========================Page Content====================================== -->
			<!-- =========================================================================== -->
		</div>



</div>	

<!-- 
========================================================
  master row
============================================================= -->









<!--==============================================  footer Starts ==================================== -->
<?php include '../footer.php'; ?>
<!-- =============================================  footer Ends   ======================================  -->
   

