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
                    All Donors List:
                </h3>
              </div>
              <div class="border-left border-danger m-2 p-5" style="border-width:  20px !important; " >

                      <table class="table table-hover table-danger">
                        <thead>
                          <tr>
                            <th scope="col">Blood Group</th>
                            <th scope="col">City</th>
                            <th scope="col">Name </th>
                            <th scope="col">Contact</th>
                          </tr>
                        </thead>
                        <!-- Fetch Donors list Dynamically -->
                    <?php 
                      $connect= mysqli_connect("localhost", "root", "","bdfclub");//Connect to Database
                      $query="SELECT*FROM register_donor ORDER BY 'donor_bloodgroup'";
                      $donorsdata= mysqli_query($connect, $query);
                      $number_of_rows= mysqli_num_rows($donorsdata);

                      if ($number_of_rows > 0){
                        while ($row = mysqli_fetch_assoc($donorsdata)){


                        ?>
                        <!-- Fetch  Dynamically -->

                        <tbody>
                          <tr>
                            <!-- <th scope="row"></th> -->
                            <td><?php echo $row['donor_bloodgroup']; ?></td>
                            <td><?php echo $row['donor_city']; ?></td>
                            <td><?php echo $row['donor_name']; ?></td>
                            <td><?php echo $row['donor_mobile']; ?></td>
                          </tr>
                       

                      <?php

                           }
                      }
                      
                      ?>
                          
                        <!-- Fetch Cart Items Dynamically -->
                    <?php 
                      
                    ?>



                      </table>


                    
              </div>
     
   </div>


</div>

<!-- ========================================================
  master row
============================================================= -->




<!--==============================================  footer Starts ==================================== -->
<?php include 'footer.php'; ?>
<!-- =============================================  footer Ends   ======================================  -->
   

