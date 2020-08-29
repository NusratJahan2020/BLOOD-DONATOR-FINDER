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
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
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
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>


         <!--  </div>  --> 

    <!-- =========================================
                          Nav bar
        ============================================ -->

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
                     
                  $connect= mysqli_connect("localhost","root","","bdfclub");
                  $query= "SELECT*FROM req_blood ORDER BY req_date DESC";
                  $result= mysqli_query($connect, $query);
                  $num_rows=mysqli_num_rows($result);

                  
                  if ($num_rows > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                    
              ?>
              <!--  Slider  -->
                <em class="display-4 text-white">
                 | Blood Group:<b> <?php echo $row['req_bloodgroup']; ?> </b> City:<?php echo $row['req_city']; ?>, Hospital: <b> <?php echo $row['req_hospital']; ?> </b>, Call: <i><?php echo $row['req_contactnum']; ?></i> |
<!--                  | Blood Group:<b>B+</b> City:Khulna, Hospital: <b>GMC</b>, Call: <i>019 12 123456</i> |
                 | Blood Group:<b>A-</b> City:Khulna, Hospital: <b>KMCH</b>, Call: <i>019 12 123456</i> |
                 | Blood Group:<b>B+</b> City:Khulna, Hospital: <b>KMCH</b>, Call: <i>019 12 123456</i> |
                 | Blood Group:<b>A-</b> City:Khulna, Hospital: <b>KMCH</b>, Call: <i>019 12 123456</i> |
                 | Blood Group:<b>O-</b> City:Khulna, Hospital: <b>KMCH</b>, Call: <i>019 12 123456</i> | -->
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

