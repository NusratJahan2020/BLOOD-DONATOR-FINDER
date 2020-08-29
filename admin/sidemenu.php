<!-- ==============
		Menu 
	=============-->

	<div class="col-md-3 col-sm-3 bg-danger text-light">
<!-- ===================== -->

		<h2 class="text-dark">Admin board</h2>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" class="btn btn-dark text-light">logout</a> </p>
		<?php endif ?>
		<div class="row">
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
		</div>

		<div>
			 <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                <li class="nav-item active">
                  <a class="nav-link text-light" href="index.php">Admin Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="registerdonor.php">Donors</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="requestblood.php">Requests</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="../index.php">Back to Site</a>
                </li>
                
             </ul>
		</div>


<!-- ===================== -->
	</div>

<!-- ==============
		Menu 
	=============-->
