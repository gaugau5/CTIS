<?php

  require '../config.php';

  if(isset($_POST['btnAdd'])) {

    @$managerUsername = $_POST['managerUsername'];
    @$username = $_POST['username_Input'];
    @$password = $_POST['password_Input'];
    @$name = $_POST['name_Input'];
    @$IC = $_POST['IC_Input'];
    @$phoneNo = $_POST['phoneNo_Input'];
    @$email = $_POST['email_Input'];
    @$address = $_POST['address_Input'];

    $query = "SELECT USERNAME FROM db_centreofficer WHERE USERNAME = '$username'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
      foreach ($query_run as $rows)
      {
        $usernameTemp = $rows['USERNAME'];
      }
    }

    if($username == "" || $password == "" || $name == "" || $IC == "" || $phoneNo == "" || $email == "" || $address == ""){
      echo '<script type="text/javascript">alert("Insert in all field.");location.replace("/CTIS/addTester.php")</script>';
    }
    elseif ($usernameTemp == $username) {
      echo '<script type="text/javascript">alert("The username you enter belongs to another user. Please try again.");location.replace("/CTIS/addTester.php")</script>';
    }
    else{
      $query_centreID = "SELECT CENTRE_ID FROM db_centreofficer WHERE USERNAME = '$managerUsername'";
      $query_run_centreID = mysqli_query($conn, $query_centreID);
      if ($query_run_centreID) {
        foreach ($query_run_centreID as $row_centreID) {
          $centreID = $row_centreID['CENTRE_ID'];
          $position = "Tester";
          $query = "insert into db_centreofficer values('$username', '$password', '$name', '$IC', '$phoneNo', '$email', '$address', '$position', '$centreID')";
          $query2 = "insert into db_role values('$username', '$password', '$position')";

          $query_run = mysqli_query($conn, $query);

          if ($query_run) {
            echo '<script type="text/javascript">alert("Tester added.");location.replace("/CTIS/addTester.php")</script>';
            mysqli_query($conn, $query2);
          }
          else {
            echo '<script type="text/javascript">alert("Fail to create tester. Please try again.");location.replace("/CTIS/addTester.php")</script>';
          }
        }
      }


    }



  }
?>
