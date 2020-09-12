<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Blood Donator Finder</title>
  </head>
  <body>

    <div class="container">
    <!-- =========================================
                          Nav bar
        ============================================ -->

          <!-- <div class="row"> -->
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="./index.php">Blood Donator Finder</a>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav mr-2 mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="./donorslist.php">Donors List </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./registerdonor.php">Register to Donate</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./admin/index.php">ADMIN</a>
                </li>
                
              </ul>
              <!-- NaV Bar  Srarch BOX -->
              <form class="form-inline my-2 my-lg-0" method="POST" >
                <input class=" form-control mr-sm-2" name="searchdata" type="search" placeholder="City,Donor,Blood Grp " aria-label="Search">
                <button class="btn btn-light my-2 my-sm-0" name="search" type="submit" >Search</button>
                <!-- Search code below -->
              </form>
            </div>
          </nav>


         <!--  </div>  --> 

    <!-- =========================================
                          Nav bar
        ============================================ -->


<!-- ---------------------------------------Nav bar Search Code------------------------------------------------- -->
<div class="row">
  <div class="col-md-8 offset-md-1">

<?php 
  include 'connect.php';//Mysql DataBase Connection $connect

  if (isset($_POST['search'])) {
    $search=mysqli_real_escape_string($connect,$_POST['searchdata']);


    $query= "SELECT*FROM register_donor WHERE donor_bloodgroup='$search' OR donor_city='$search' OR donor_name='$search'OR donor_age='$search' OR donor_postalcode='$search' ORDER BY donor_city,donor_bloodgroup DESC";

    //`register_donor`(`donor_id`, `donor_bloodgroup`, `donor_city`, `donor_name`, `donor_age`, `donor_nid_no`, `donor_mobile`, `donor_address`, `donor_postalcode`)

                  $result= mysqli_query($connect, $query);
                  $num_rows=mysqli_num_rows($result);

                    ?>
                    <div class="row">
                      <h6 class="text-info ">
                        Total results loaded <?php echo $num_rows; ?>
                      </h6>
                    </div>

                 <?php  
                  if ($num_rows > 0){
                    while ($row = mysqli_fetch_assoc($result)){

                      //echo "Row  ".$num_rows."  donor_bloodgroup".$row['donor_bloodgroup'].", "."  donor_city".$row['donor_city']." "."  donor_name".$row['donor_name']." "."  donor_age".$row['donor_age'].", "."  donor_mobile".$row['donor_mobile'];
               ?>

               
                   <div class="row alert alert-danger p-2 text-center">
                    <h6>
                      <?php //echo $num_rows; ?>    City/Village: <?php echo $row['donor_city']; ?>       <?php echo $row['donor_bloodgroup']; ?>        Name: <?php echo $row['donor_name']; ?>      Age:<?php echo $row['donor_age']; ?>       Mobile no: <a href="tel: <?php echo $row['donor_mobile']; ?>"><?php echo $row['donor_mobile']; ?></a>
                    </h6>
                     
                   </div>
                 
              


              <?php 
                      }
                    }

                  }
              ?>
  </div>
</div>
<!-- ---------------------------------------Nav bar Search Code------------------------------------------------- -->





<div class="row m-1">
  <!-- -----===============================Urgent Request========================================----- -->

    <div class="col-md-12 border-top border-bottom border-danger" style="border-width: 10px !important;">
      <!-- Col Starts -->
        <div class="row bg-dark">
          <div class="col-md-3">
            <h5 class="text-danger bg-dark text-justify" style="text-align: center;  "> Emergency Requests </h5>
           
            <a href="./bloodrequest.php" class=" btn btn-danger text-white" type="submit" name="submit" value="">Click To Make A Request</a>
          </div>
          <div class="col-md-9">
            <marquee>
              <?php 
                     include 'connect.php';//Mysql DataBase Connection $connect
                  //$connect= mysqli_connect("localhost","root","","bdfclub");
                  $query= "SELECT*FROM req_blood ORDER BY req_date DESC";
                  $result= mysqli_query($connect, $query);
                  $num_rows=mysqli_num_rows($result);

                  
                  if ($num_rows > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                    
              ?>
              <!--  Slider  -->
                <em class="display-4 text-white">
                 | Blood Group:<b> <?php echo $row['req_bloodgroup']; ?> </b> City:<?php echo $row['req_city']; ?>, Hospital: <b> <?php echo $row['req_hospital']; ?> </b>, Call: <i><?php echo $row['req_contactnum']; ?></i> |

                </em>
              <!--  Slider  -->
              <?php 
                        }
                      }

                    ?>
            </marquee>
          </div>
        </div>
        
      <!-- Col ends -->
    </div>

  <!-- ---------- -->

  <!-- -----===============================Urgent Request========================================----- -->
</div>

        <!--------------------------------- Header Ends----------------------- -->

