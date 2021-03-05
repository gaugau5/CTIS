<?php

  require '../config.php';
  session_start();

  if(isset($_POST['btnRegister'])){

    @$centreName = $_POST['centrename_Input'];
    @$centreAddress = $_POST['centreAddress_Input'];
    @$centreNumber = $_POST['centreNum_Input'];


    if($centreName == "" || $centreAddress == "" || $centreNumber == ""){
      echo '<script type="text/javascript">alert("Insert in all field");location.replace("/CTIS/registerTestCentre.php")</script>';
    }
    else
    {
      $centreManager = $_SESSION['LoginUser'];
      $query4 = "select CENTRE_ID from db_centreofficer where USERNAME = '$centreManager'";
      $query_run4 = mysqli_query($conn,$query4);
      while ($row = mysqli_fetch_array($query_run4)) {
        if($row["CENTRE_ID"] == null){
          $query = "insert into db_testcentre values(NULL,'$centreName','$centreAddress','$centreNumber','$centreManager')";
          $query2 = "SELECT CENTRE_ID from db_testcentre WHERE MANAGER_USERNAME ='$centreManager'";
          $query_run = mysqli_query($conn,$query);
          if ($query_run) {
            echo '<script type="text/javascript">alert("Test Centre Registered Successfully");location.replace("/CTIS/registerTestCentre.php")</script>';
            $query_run2 = mysqli_query($conn, $query2);
            while ($row = mysqli_fetch_array($query_run2)){
              $centreID = $row["CENTRE_ID"];
              $query3 = "update db_centreofficer set CENTRE_ID = '$centreID' where USERNAME = '$centreManager'";
              mysqli_query($conn,$query3);
              echo '<script type="text/javascript">alert("Successfully created test centre");location.replace("/CTIS/managerHome.php")</script>';
            }

          }
          else {
            echo '<script type="text/javascript">alert("Test Centre Registeration Unsuccessful");location.replace("/CTIS/registerTestCentre.php")</script>';
          }
        }
        else {
          echo '<script type="text/javascript">alert("You are restricted to only one test centre");location.replace("/CTIS/registerTestCentre.php")</script>';
        }

      }
    }
  }
?>
