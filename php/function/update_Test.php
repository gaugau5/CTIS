<?php

  require '../config.php';

  if(isset($_POST['btnUpdate'])) {

    @$testID = $_POST['testID_Input'];
    @$result = $_POST['result_Input'];
    @$resultDate = date("Y-m-d");

    $query = "SELECT * FROM db_covidtest WHERE TEST_ID='$testID' AND STATUS='Pending'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
      $queryUpdate = "UPDATE db_covidtest SET RESULT='$result', STATUS='Complete', RESULT_DATE='$resultDate'  WHERE TEST_ID='$testID'";
      $queryUpdate_run = mysqli_query($conn, $queryUpdate);

      echo '<script type="text/javascript">alert("Test updated successfully.");location.replace("/CTIS/updateTest.php")</script>';
    } else {
      echo '<script type="text/javascript">alert("Update fail. TestID entered is either invalid or the status is complete.");location.replace("/CTIS/updateTest.php")</script>';
    }
  }
?>
