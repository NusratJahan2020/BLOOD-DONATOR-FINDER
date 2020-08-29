<?php 
session_start();
// variable declaration
  $donor_bloodgroup="";
  $donor_name="";
  $donor_age="";
  $donor_nid_no="";
  $donor_mobile="";
  $donor_address="";
  $donor_city="";
  $donor_postalcode ="";

$connect= mysqli_connect("localhost", "root", "","bdfclub");


if(isset($_POST['submit']))
{
 
  $donor_bloodgroup=mysqli_real_escape_string($connect,($_POST['donor_bloodgroup']));
  $donor_name=mysqli_real_escape_string($connect,($_POST['donor_name']));
  $donor_age=mysqli_real_escape_string($connect,($_POST['donor_age']));
  $donor_nid_no=mysqli_real_escape_string($connect,($_POST['donor_nid_no']));
  $donor_mobile=mysqli_real_escape_string($connect,($_POST['donor_mobile']));
  $donor_address=mysqli_real_escape_string($connect,($_POST['donor_address']));
  $donor_city=mysqli_real_escape_string($connect,($_POST['donor_city']));
  $donor_postalcode =mysqli_real_escape_string($connect,($_POST['donor_postalcode']));


  $insert= "INSERT INTO register_donor(donor_bloodgroup, donor_city, donor_name, donor_age, donor_nid_no, donor_mobile, donor_address, donor_postalcode) VALUES ('$donor_bloodgroup', '$donor_city', '$donor_name', '$donor_age', '$donor_nid_no', '$donor_mobile', '$donor_address', '$donor_postalcode')";

  if(mysqli_query($connect, $insert))
  {
  echo "inserted successfully..!";
  }
  else {
    echo "NOT inserted! ! ! Error!!";
  }

}
 

 ?>


<!--==============================================  Header Starts ==================================== -->
<?php include 'header.php'; ?>
<!-- =============================================  Header Ends   ======================================  -->
   


<!-- 
========================================================
  master row
============================================================= -->
<div class="row">
  
    <!-- Registation Form for Donor -->
   <div class="col-md-10 offset-md-1">
              <div class="row">
                <h3 class="text-danger">
                    If you want to be a blood donor. Register your name below:
                </h3>
              </div>
              <div class="border-left border-danger m-2 p-5" style="border-width:  20px !important; " >

                    <form method="POST" enctype="multipart/form-data">

                      
                      <div class="form-group">
                        <label>Blood Group</label>
                        <input class="form-control form-control-lg" type="text" name="donor_bloodgroup" placeholder="A+, A-, B+, B-, AB+, AB-, O+, O- Type your's">
                      </div>
                      
                      <div class="form-group">
                        <label  >Name</label>
                        <input class="form-control form-control-lg" type="text" name="donor_name" placeholder="Full name">
                      </div>

                      <div class="form-group">
                          <label >Age (must be more than 18):</label>
                        <input class="form-control form-control-lg" type="text" name="donor_age" placeholder="(Age must be more than 18)">
                      </div>
                      
                      <div class="form-group">
                        <label  >Mobile no :</label>
                        <input class="form-control form-control-lg" type="text" name="donor_mobile" placeholder="+88 01x-xx-xxxxxx">
                      </div>

                      <div class="form-group">
                        <label  >NID/Birth Cirtificate No.:</label>
                        <input class="form-control form-control-lg" type="text" name="donor_nid_no" placeholder="123567890..">
                      </div>

                      <div class="form-group">
                        <label  >Address :</label>
                        <input class="form-control form-control-lg" type="text" name="donor_address" placeholder="House no.# , Road#, Village/Union/Ward no.#">
                      </div>

                      <div class="form-group">
                        <label  >City :</label>
                        <input class="form-control form-control-lg" type="text" name="donor_city" placeholder="eg. Khulna">
                      </div>

                      <div class="form-group">
                        <label  >Postal Code :</label>
                        <input class="form-control form-control-lg" type="text" name="donor_postalcode" placeholder="eg. 9100">
                      </div>
                      
                      <!-- <div class="form-group">
                        <label  >Image</label>
                      
                      <input class="form-control form-control-lg" type="file" name="item_img">
                      
                      </div> -->
                      
                       
                      <input type="submit" value="Register" class="text-white btn btn-danger" name="submit">


                    </form>
              </div>
     
   </div>


</div>

<!-- ========================================================
  master row
============================================================= -->




<!--==============================================  footer Starts ==================================== -->
<?php include 'footer.php'; ?>
<!-- =============================================  footer Ends   ======================================  -->
   

