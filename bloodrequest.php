<?php 
session_start();
// variable declaration
 
  // $req_date="";
  // $req_time="";
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
  master row
============================================================= -->




<!--==============================================  footer Starts ==================================== -->
<?php include 'footer.php'; ?>
<!-- =============================================  footer Ends   ======================================  -->
   

