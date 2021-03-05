<?php
  require 'php/config.php';
  $role = include("php/findRole.php");

  if(!isset($_SESSION['LoginUser'])){
    header('Location: index.php');
  }
  if ($role != "Manager" && $role != "Tester") {
    echo '<script type="text/javascript">alert("You are unauthorized to access this page.");location.replace("/CTIS/php/logout.php")</script>';
  }

  //if($role != "Manager"){
    //echo '<script type="text/javascript">alert("You are unauthorized to access this page.");location.replace("/CTIS/php/logout.php")</script>';
  //}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Generate Test Report</title>
  </head>
  <body>
    <?php
    if ($role == "Manager") {
      include 'nav-Manager.php';
    }
    else{
      include 'nav-Tester.php';
    } ?>

    <?php include 'sideNav-Officer.php'; ?>

    <div class="container">
      <h1 class="display-4 mt-3 mb-5 text-center">Test Report</h1>

      <table class="table text-center">
        <thead class="thead-light">
          <tr>
            <th scope="col">TestID</th>
            <th scope="col">Test Date</th>
            <th scope="col">Result</th>
            <th scope="col">Result Date</th>
            <th scope="col">Status</th>
            <th scope="col">Patient Username</th>
            <th scope="col">Tester Username</th>
            <th scope="col">Kit ID</th>

          </tr>
        </thead>

        <?php

          $username = $_SESSION['LoginUser'];
          $query_centreID = "SELECT CENTRE_ID FROM db_centreofficer WHERE USERNAME = '$username'";
          $query_run_centreID = mysqli_query($conn, $query_centreID);
          if ($query_run_centreID) {
            foreach ($query_run_centreID as $row_centreID) {
              $centreID = $row_centreID['CENTRE_ID'];
            }
        }
          $query_Tester = "SELECT USERNAME FROM db_centreofficer WHERE CENTRE_ID ='$centreID' AND POSITION = 'Tester'";
          $query_run_Tester = mysqli_query($conn,$query_Tester);
          if($query_run_Tester){
              foreach($query_run_Tester as $row_Tester){
                $testerUsername = $row_Tester['USERNAME'];
                $query = "Select * from db_covidtest where TESTER_USERNAME = '$testerUsername'";
                $query_run = mysqli_query($conn, $query);
                if($query_run){
                  foreach ($query_run as $rows)
                  {

                    $testID = $rows['TEST_ID'];
                    $testDate = $rows['TEST_DATE'];
                    $result = $rows['RESULT'];
                    $resultDate = $rows['RESULT_DATE'];
                    $status = $rows['STATUS'];
                    $patientUsername = $rows['PATIENT_USERNAME'];
                    $testerUsername = $rows['TESTER_USERNAME'] ;
                    $kitID = $rows['KIT_ID'];
        ?>
          <tbody >
              <tr>
                <th scope="row"><?php echo $testID ?></th>
                <td ><?php echo $testDate ?></td>
                <td><?php echo $result?></td>
                <td><?php echo $resultDate ?></td>
                <td><?php echo $status ?></td>
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#patientDetails<?php echo $testID; ?>"><?php  echo $patientUsername ?></button></td>
                <td><?php echo $testerUsername ?></td>
                <td><?php echo $kitID ?></td>
                <!--td style="text-align:right"><img src="Image/ManageTestKit/edit.png" type="button"  alt="..." class="img-thumbnail btn" data-toggle="modal" data-target="#edit<?php echo $kitID; ?>" height=100 width=50></td>
                <td style="text-align:right"><img src="Image/ManageTestKit/delete.png" type="button" alt="..." class="img-thumbnail btn" data-toggle="modal" data-target="#delete<?php echo $kitID; ?>" height=100 width=50></td-->
              </tr>
          </tbody>
          <?php
          $query_patientDetails = "SELECT * from db_patient where USERNAME ='$patientUsername' ";
          $queryPatientDetails_run = mysqli_query($conn,$query_patientDetails);
          if($queryPatientDetails_run){
              foreach($queryPatientDetails_run as $row_patientDetails){
                  $name = $row_patientDetails['NAME'];
                  $ic = $row_patientDetails['PATIENT_IC'];
                  $email = $row_patientDetails['EMAIL'];
                  $address = $row_patientDetails['ADDRESS'];
              }
          }
          ?>

          <div class="modal fade" id="patientDetails<?php  echo $testID; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Patient Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="row ml-5 mr-5 mt-3 mb-3" style="text-align:center">
            <div class="col">Name: </div>
            <div class="col"><?php echo $name; ?></div>
          </div>

          <div class="row ml-5 mr-5 mb-3" style="text-align:center">
            <div class="col">IC: </div>
            <div class="col"><?php echo $ic; ?></div>
          </div>

          <div class="row ml-5 mr-5 mb-3" style="text-align:center">
            <div class="col">Email: </div>
            <div class="col"><?php echo $email; ?></div>
          </div>

          <div class="row ml-5 mr-5 mb-3" style="text-align:center">
            <div class="col">Address: </div>
            <div class="col"><?php echo $address; ?></div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


          <?php


                  }
              }
            }
        }

          ?>


          <!-- Button trigger modal -->

    <!-- Optional JavaScript -->
    <script src="js\sideNav.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  </body>
</html>
