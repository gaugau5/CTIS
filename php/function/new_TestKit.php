<?php

  require '../config.php';
  session_start();

  if(isset($_POST['btnAdd'])) {

    @$testName = $_POST['testName_Input'];
    @$stockNo = $_POST['stockNo_Input'];

    $query = "SELECT TEST_NAME FROM db_testkit WHERE TEST_NAME = '$testName'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
      foreach ($query_run as $rows)
      {
        $testNameTemp = $rows['TEST_NAME'];
      }
    }


    if($testName == "" || $stockNo == ""){
      echo '<script type="text/javascript">alert("Insert in all field.");location.replace("/CTIS/manageTestKit.php")</script>';
    }
    elseif ($testNameTemp == $testName) {
      echo '<script type="text/javascript">alert("The test name you enter belongs to another test kit. Please try again.");location.replace("/CTIS/manageTestKit.php")</script>';
    }
    else{



      $centreManager = $_SESSION['LoginUser'];
      $query_centreID = "select CENTRE_ID from db_centreofficer where USERNAME = '$centreManager'";
      $query_centreID = mysqli_query($conn, $query_centreID);
      while ($row = mysqli_fetch_array($query_centreID)) {
        $centreID = $row['CENTRE_ID'];

        $query = "insert into db_testkit values(NULL, '$testName', '$stockNo', '$centreID')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
          echo '<script type="text/javascript">alert("Kit successfully added.");location.replace("/CTIS/manageTestKit.php")</script>';

        }
        else {
          echo '<script type="text/javascript">alert("Fail to add kit. Please try again.");location.replace("/CTIS/manageTestKit.php")</script>';
        }
      }
    }
  }
?>
