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
<div class="row m-1 p-3">
	
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
		<h2 class="text-danger">Requests for Blood </h2>
			</div>
			<!-- ---------------------------------------List of Requests for Blood-------------------------------------------- -->
			<div class="">
            
            	<table class="table table-responsive table-danger">
            		<thead class="thead-dark">
            			<tr>
            				<th>Date</th>
            				<th>time</th>
            				<th>City</th>
            				<th>Blood Grp</th>
            				<th>Contact Name</th>
            				<th>Contact No</th>
            				<th>Patient Name</th>
            				<th>Patient Age</th>
            				<th>Patient Gender</th>
            				<th>Comments</th>
            				
            			</tr>
            		</thead>
            		<tbody>
              <?php 
                     
                  $connect= mysqli_connect("localhost","root","","bdfclub");
                  $query= "SELECT*FROM req_blood ORDER BY req_date DESC";
                  $result= mysqli_query($connect, $query);
                  $num_rows=mysqli_num_rows($result);

                  
                  if ($num_rows > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                    
              ?>
              <!-- table  -->
              	
              	<tr>
              		<td><?php echo $row['req_date']; ?></td>
              		<td><?php echo $row['req_time']; ?></td>
              		<td><?php echo $row['req_city']; ?></td>
              		<td><?php echo $row['req_bloodgroup']; ?></td>
              		<td><?php echo $row['req_contactname']; ?></td>
              		<td><?php echo $row['req_contactnum']; ?></td>
              		<td><?php echo $row['req_patientname']; ?></td>
              		<td><?php echo $row['req_patientage']; ?></td>
              		<td><?php echo $row['req_patientgender']; ?></td>
              		<td><?php echo $row['req_comments']; ?></td>
              	</tr>
               
              <!--  table  -->
              <?php 
                        }


                      }

                    ?>
                  </tbody>
                </table>
           
          </div>

			<!-- ---------------------------------------List of Requests for Blood-------------------------------------------- -->


			<div class="row">
				

				<!-- 
				========================================================
				 SUB row
				============================================================= -->
				<div class="row">
				  
					<?php 
					// variable declaration
					  $date=date("l,d/m/Y");
					  $time=date("h:i:s a");
					$req_date = $date;
					  $req_time= $time;
					  $req_bloodgroup="";
					  $req_numofbags= "";
					  $req_contactname="";
					  $req_contactnum="";
					  $req_city="";
					  $req_hospital ="";
					  $req_patientname="";
					  $req_patientage="";
					  $req_patientgender="";
					  $req_comments ="";



					$connect= mysqli_connect("localhost", "root", "","bdfclub");


					if(isset($_POST['submit']))
					{
					 
					  // $req_date =date("l,d/m/Y");
					  // $req_time=date("h:i:s a");
					  $req_bloodgroup=mysqli_real_escape_string($connect,($_POST['req_bloodgroup']));
					  $req_numofbags=mysqli_real_escape_string($connect,($_POST['req_numofbags']));
					  $req_contactname=mysqli_real_escape_string($connect,($_POST['req_contactname']));
					  $req_contactnum=mysqli_real_escape_string($connect,($_POST['req_contactnum']));
					  $req_city=mysqli_real_escape_string($connect,($_POST['req_city']));
					  $req_hospital =mysqli_real_escape_string($connect,($_POST['req_hospital']));
					  $req_patientname=mysqli_real_escape_string($connect,($_POST['req_patientname']));
					  $req_patientage=mysqli_real_escape_string($connect,($_POST['req_patientage']));
					  $req_patientgender=mysqli_real_escape_string($connect,($_POST['req_patientgender']));
					  $req_comments =mysqli_real_escape_string($connect,($_POST['req_comments']));

					  $insert= "INSERT INTO req_blood(req_bloodgroup, req_numofbags,req_contactname,req_contactnum,req_city,req_hospital,req_patientname,req_patientage,req_patientgender,req_comments, req_date, req_time ) VALUES( '$req_bloodgroup', '$req_numofbags', '$req_contactname', '$req_contactnum', '$req_city', '$req_hospital', '$req_patientname', '$req_patientage', '$req_patientgender', '$req_comments','$req_date', '$req_time')";

					  if(mysqli_query($connect, $insert))
					  {
					  echo "inserted successfully..!";
					  }
					  else {
					    echo "NOT inserted! ! ! Error!!";
					  }

					}
					 


					 ?>
				    <!-- Registation Form for Donor -->
				   <div class="col-md-10 offset-md-1">
				              <div class="row">
				                <h3 class="text-danger">
				                    For emergency need of blood donor. Submit your info below. Our donors will reach you as soon as possible.
				                </h3>
				              </div>
				              <div class="border-left border-danger m-2 p-5" style="border-width:  20px !important; " >

				                    <form method="POST" enctype="multipart/form-data">

				                      
				                      <div class="form-group">
				                        <label></label>
				                        <input class="form-control form-control-lg" type="text" name="req_bloodgroup" placeholder="What Is the Blood Group You Need A+, A-, B+, B-, AB+, AB-, O+, O- Type your's">
				                      </div>
				                      <div class="form-group">
				                        
				                        <input class="form-control form-control-lg" type="text" name="req_numofbags" placeholder="Type in how many bag of blood do you need.">
				                      </div>
				                      
				                      <div class="form-group">
				                        <!-- <label  ></label> -->
				                        <input class="form-control form-control-lg" type="text" name="req_contactname" placeholder="Name of contact person">
				                      </div>

				                      <div class="form-group">
				                        <input class="form-control form-control-lg" type="text" name="req_contactnum" placeholder="Mobile Number of Contact Person">
				                      </div>


				                      <div class="form-group">
				                        <input class="form-control form-control-lg" type="text" name="req_city" placeholder="Which City Are You In? ">
				                      </div>


				                      <div class="form-group">
				                        <input class="form-control form-control-lg" type="text" name="req_hospital" placeholder="Which Hospital Is The Patient In?">
				                      </div>

				                      <div class="form-group">
				                        <input class="form-control form-control-lg" type="text" name="req_patientname" placeholder="Please Type In The Patient's Name">
				                      </div>

				                      <div class="form-group">
				                        <input class="form-control form-control-lg" type="text" name="req_patientage" placeholder="Please Type In The Patient's Age(eg. 65)">
				                      </div>

				                      <div class="form-group">
				                        <input class="form-control form-control-lg" type="text" name="req_patientgender" placeholder="Please Type In The Patient's Gender (Male or Female)">
				                      </div>

				                      <div class="form-group">
				                        <input class="form-control form-control-lg" type="text" size="100px" name="req_comments" placeholder="Type in any other important message you wanna share....">
				                      </div>

				                       
				                      <input type="submit" value="Submit Request for donors" class="text-white btn btn-danger" name="submit">

				                      
				                    </form>
				              </div>
				     
				   </div>


				</div>

				<!-- ========================================================
				  SUB row
				============================================================= -->





			</div>

<!-- ======================================================================================== -->




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
   

